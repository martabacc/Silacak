<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table anggota
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_repository_simpel extends MY_Model {
	protected $db2;

	function __construct()
	{ 
		parent::__construct(); 

		$this->db2 = $this->load->database('simpel',TRUE);

	}

	/*


		yang dilempar ke view :

	*/

	/*
		@author:Rona
		method get List NIP by lab
		return array of NIP's of members whom is joined to a given lab id.
		could be optimized using array map or map.
	*/
	public function getListNip_byLab($id_lab){
		$q = 'select peneliti.peneliti_nip
								from peneliti
								left join anggota_labits on anggota_labits.peneliti_id = peneliti.peneliti_id
								left join labits on labits.labits_id = anggota_labits.labits_id where labits.labits_id='.$id_lab;

		$ret = [];
		foreach( $this->db2->query($q)->result() as $obj)
			array_push($ret, $obj->peneliti_nip);

		return $ret;
	}

	public function getListLab()
	{
		$q = $this->db2->query('select labits.labits_id, labits.labits_nama, jurusan.jurusan_kode, fakultas.fakultas_urut
							from labits, jurusan, fakultas
							where labits.JURUSAN_ID = jurusan.JURUSAN_ID and fakultas.FAKULTAS_ID=jurusan.FAKULTAS_ID
							order by labits_nama asc');

		return $q->result();
	}

	private function getIdLabsByDepartment($jurusan)
	{
		$res = [];
		foreach( $this->db2->query('select labits.labits_id from labits
									left join jurusan on jurusan.jurusan_id = labits.jurusan_id
									left join fakultas on fakultas.fakultas_id = jurusan.fakultas_id
									where jurusan.jurusan_id = '.$jurusan)->result()  as $obj)
			array_push($res, $obj->labits_id);

		return $res;
	}

	public function getPublikasiPerLab($fakultas, $jurusan, $lab, $tahun_mulai, $tahun_selesai)
	{
		if(!$fakultas && !$jurusan && !$lab) //none of the filter is selected
			return $this->getDataLabPerFaculty(false, $tahun_mulai, $tahun_selesai);
		else{

			$helper = [];

			if($lab) array_push($helper[0]['depts']['labs'], $this->getDataPerLab($fakultas, $tahun_mulai, $tahun_selesai));
			if($jurusan) array_push($helper[0]['depts'], $this->getDataLabPerDepartment($jurusan , $tahun_mulai, $tahun_selesai));
			if($fakultas) return $this->getDataLabPerFaculty($fakultas, $tahun_mulai, $tahun_selesai);

			return $helper;
		}
		return false;
	}

	private function getDataPerLab($idLab = false, $yearStart=false, $yearEnd=false)
	{
		$result = [];
		$result['nama_lab'] = $this->db2->query('select labits_nama
							from labits where labits_id = '.$idLab)
							->first_row()->labits_nama;	

		$q = 'select dkp_id, count(*) as jumlah
				from anggota
				right join pegawai on pegawai.peg_id = anggota.ang_pegawai
				right join publikasi_dosen on publikasi_dosen.pub_id = anggota.ang_publikasi
				right join detil_kode_publikasi on detil_kode_publikasi.dkp_id = publikasi_dosen.pub_detilkodepub
				where dkp_isactive = 1 and peg_nip_baru in (';

		$nips = $this->getListNip_byLab($idLab);
		if(sizeof($nips)==0) $result['table'] = null;
		else{
			foreach($nips as  $key => $nip){
	        	$q.= ($nip . ($key < sizeof($nips)-1 ? ',' :' )' ));
	        }

			$q .= ($yearStart ? 'and YEAR(pub_created_at) >= '. $yearStart : '') .
				  ($yearEnd ? 'and YEAR(pub_created_at) <= '. $yearEnd : '') .
			  	   'group by dkp_id';

			foreach($this->db->query($q)->result() as $data)
				$result['table'][$data->dkp_id] = $data->jumlah;
		}

		return $result;
	}

	private function getDataLabPerDepartment($idjur = false, $yearStart=false, $yearEnd=false)
	{
		$result = [];

		$result['nama_jur'] = $this->db2->query('select jurusan_nama
							from jurusan where jurusan_id = '.$idjur)
							->first_row()->jurusan_nama;

		// list id lab
		$id_labs = $this->getIdLabsByDepartment($idjur);

		$result['labs'] = [];
		foreach($id_labs as $id_lab) array_push($result['labs'], $this->getDataPerLab($id_lab, $yearStart, $yearEnd));

		return $result;
	}

	private function getDataLabPerFaculty($idFacs = false, $yearStart=false, $yearEnd=false)
	{


		$arrayOfFaculty = [];
		if(!$idFacs)
		{
			$temp = $this->db2->get('fakultas')->result();
			foreach($temp as $t) array_push($arrayOfFaculty, $t->FAKULTAS_ID);

		}
		else
			array_push($arrayOfFaculty, $idFacs);

		$allres = [];
		foreach($arrayOfFaculty as $idfak)
		{
			$result = [];
			$result['nama_fak'] = $this->db2->query('select fakultas_nama
							from fakultas where fakultas_id = '.$idfak)
							->first_row()->fakultas_nama;

			// list jur
			$depts = $this->db2->query('select jurusan_id from fakultas,jurusan where jurusan.fakultas_id=fakultas.fakultas_id
										and fakultas.fakultas_id ='. $idfak )
							->result();
			$result['depts'] = [];
			foreach($depts as $dept) array_push($result['depts'], $this->getDataLabPerDepartment($dept->jurusan_id, $yearStart, $yearEnd));

			array_push($allres, $result);
		}

		return $allres;
		
	}

	public function getFaculties()
	{
		return $this->db2->get('fakultas')->result();

	}

	public function getDepts(){
		return $this->db2->get('jurusan')->result();
	}

}