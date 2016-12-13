<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table log_sistem
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_log_sistem extends MY_Model {
	protected $pk_col = 'log_id';
	protected $table_name = 'log_sistem';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_log_sistem->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_log_sistem->get_by_column($pk);
	 * or $this->m_log_sistem->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_log_sistem->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_log_sistem->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_log_sistem->permanent_delete($pk);
	 * or you can call with $this->m_log_sistem->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('log_id');
		$this->db->select('CONVERT(date, log_tanggal) as log_tanggal', FALSE);
		$this->db->select('log_aktivitas');
		$this->db->select('log_pegawai');
		$this->db->select('log_data');
		$this->db->select('log_keterangan');

		$this->db->select('peg_fakultas');
		$this->db->select('peg_jurusan');
		$this->db->select('peg_program_studi');
		$this->db->select('peg_jenjang_pendidikan');
		$this->db->select('peg_satuan_kerja');
		$this->db->select('peg_ikatan_kerja_pegawai');
		$this->db->select('peg_status_aktivitas_pegawai');
		$this->db->select('peg_jenis_pegawai');
		$this->db->select('peg_jenis_dosen');
		$this->db->select('peg_pangkat_pns');
		$this->db->select('peg_jenis_kelamin');
		$this->db->select('peg_provinsi');
		$this->db->select('peg_kota');
		$this->db->select('peg_kode_validasi');
		$this->db->select('peg_log_audit');
		$this->db->select('peg_nip_baru');
		$this->db->select('peg_nip_lama');
		$this->db->select('peg_nidn');
		$this->db->select('peg_name');
		$this->db->select('peg_gelar_depan');
		$this->db->select('peg_gelar_belakang');
		$this->db->select('peg_alamat');
		$this->db->select('peg_telepon');
		$this->db->select('peg_handphone');
		$this->db->select('peg_email');
		$this->db->select('CONVERT(date, peg_tanggal_berhenti) as peg_tanggal_berhenti', FALSE);
		$this->db->select('CONVERT(date, peg_tanggal_masuk) as peg_tanggal_masuk', FALSE);
		$this->db->select('peg_is_dosen');
		$this->db->select('peg_google_schoolar');
		$this->db->select('peg_penelitian');
		$this->db->select('CONVERT(date, peg_created_at) as peg_created_at', FALSE);
		$this->db->select('CONVERT(date, peg_updated_at) as peg_updated_at', FALSE);
		$this->db->select('CONVERT(date, peg_deleted_at) as peg_deleted_at', FALSE);

		$this->db->from('log_sistem');
		$this->db->join('pegawai', 'log_pegawai = peg_id', 'left');

	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel log_sistem
	* @param type $log_tanggal    adalah field untuk kolom log_tanggal   , default = FALSE
	* @param type $log_aktivitas  adalah field untuk kolom log_aktivitas , default = FALSE
	* @param type $log_pegawai   adalah field untuk kolom log_pegawai , default = FALSE
	* @param type $log_data       adalah field untuk kolom log_data      , default = FALSE
	* @param type $log_keterangan adalah field untuk kolom log_keterangan, default = FALSE
	*/
	public function insert($log_tanggal=FALSE,
					$log_aktivitas=FALSE,
					$log_pegawai=FALSE,
					$log_data=FALSE,
					$log_keterangan=FALSE){
		$data = array();
        if($log_tanggal   !== FALSE)$data['log_tanggal']   =$log_tanggal;
        if($log_aktivitas !== FALSE)$data['log_aktivitas'] =trim($log_aktivitas);
        if($log_pegawai      !== FALSE)$data['log_pegawai']      =($log_pegawai == '' ? NULL : $log_pegawai);
        if($log_data      !== FALSE)$data['log_data']      =($log_data == '' ? NULL : $log_data);
        if($log_keterangan!== FALSE)$data['log_keterangan']=($log_keterangan == '' ? NULL : trim($log_keterangan));
		$this->db->insert('log_sistem', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel log_sistem
	* @param type $log_id         adalah field untuk kolom log_id        , default = FALSE
	* @param type $log_tanggal    adalah field untuk kolom log_tanggal   , default = FALSE
	* @param type $log_aktivitas  adalah field untuk kolom log_aktivitas , default = FALSE
	* @param type $log_data       adalah field untuk kolom log_data      , default = FALSE
	* @param type $log_keterangan adalah field untuk kolom log_keterangan, default = FALSE
	*/
	public function update($log_id=FALSE,
					$log_tanggal=FALSE,
					$log_aktivitas=FALSE,
					$log_pegawai=FALSE,
					$log_data=FALSE,
					$log_keterangan=FALSE){
		$data = array();
        if($log_tanggal   !== FALSE)$data['log_tanggal']   =$log_tanggal;
        if($log_aktivitas !== FALSE)$data['log_aktivitas'] =trim($log_aktivitas);
        if($log_pegawai      !== FALSE)$data['log_pegawai']      =($log_pegawai == '' ? NULL : $log_pegawai);
        if($log_data      !== FALSE)$data['log_data']      =($log_data == '' ? NULL : $log_data);
        if($log_keterangan!== FALSE)$data['log_keterangan']=($log_keterangan == '' ? NULL : trim($log_keterangan));
		return $this->db->update('log_sistem', $data, "log_id = '$log_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'log_id'        , 'alias' => 'log_id'        , 'searchable' => FALSE),
						array('db' => 'log_tanggal'   , 'alias' => 'log_tanggal'   , 'searchable' => FALSE),
						array('db' => 'log_aktivitas' , 'alias' => 'log_aktivitas' , 'searchable' => TRUE),
						array('db' => 'log_pegawai'   , 'alias' => 'log_pegawai'   , 'searchable' => FALSE),
						array('db' => 'peg_name'	, 'alias' => 'peg_name'	, 'searchable' => TRUE),
						array('db' => 'peg_google_schoolar'	, 'alias' => 'peg_google_schoolar'	, 'searchable' => TRUE),
						array('db' => 'log_data'      , 'alias' => 'log_data'      , 'searchable' => FALSE),
						array('db' => 'log_keterangan', 'alias' => 'log_keterangan', 'searchable' => TRUE)
		);
		parent::parse_datatable($cols, $where);
	}
	public function get_sukses_tarik_data($tar_id){

		$this->load->model("m_log_tarik");
		if($tar_id == 0){
			$periode_now = date("Y-m-d");
			$periode_prev = $this->m_log_tarik->get("tar_tanggal < '$periode_now'", "tar_id desc");
		}
		else{
			$log_tarik =  $this->m_log_tarik->get("tar_id = $tar_id");
			$log_tarik = $log_tarik[0];
			$periode_now = $log_tarik->tar_tanggal;
			$periode_prev = $this->m_log_tarik->get("tar_id < $tar_id AND tar_tanggal < '$periode_now'", "tar_id desc");
		}

		if(count($periode_prev) > 0)
			$periode_prev = $periode_prev[0]->tar_tanggal;
		else
			$periode_prev = "1970-1-1";
		//$this->db->distinct();
		$this->db->select("peg_jurusan");
		$this->db->select("jur_nama_indonesia");
		$this->db->select("peg_nip_baru");
		$this->db->select("peg_name");
		$this->db->select("peg_google_schoolar");
		$this->db->select("sum(log_data) as jumlah");
		//$this->db->select("log_keterangan");

		$this->db->from($this->table_name);
		$this->db->join('pegawai', 'log_pegawai = peg_id', 'left');
		$this->db->join('jurusan', 'peg_jurusan = jur_id', 'left');
		$this->db->where('log_keterangan', "Sukses");
		$this->db->where('log_aktivitas', "Tarik Data");
		$this->db->where("log_tanggal <= '$periode_now' AND log_tanggal > '" .$periode_prev."'");

		$this->db->group_by("peg_jurusan, jur_nama_indonesia, peg_nip_baru, peg_name, peg_google_schoolar");
		$this->db->order_by("peg_jurusan asc");

		$query = $this->db->get();
		//var_dump($query->result());exit();
		return $query->result();
	}
	public function get_gagal_tarik_data($tar_id){

		$this->load->model("m_log_tarik");
		if($tar_id == 0){
			$periode_now = date("Y-m-d");
			$periode_prev = $this->m_log_tarik->get("tar_tanggal < '$periode_now'", "tar_id desc");
		}
		else{
			$log_tarik =  $this->m_log_tarik->get("tar_id = $tar_id");
			$log_tarik = $log_tarik[0];
			$periode_now = $log_tarik->tar_tanggal;
			$periode_prev = $this->m_log_tarik->get("tar_id < $tar_id AND tar_tanggal < '$periode_now'", "tar_id desc");
		}

		if(count($periode_prev) > 0)
			$periode_prev = $periode_prev[0]->tar_tanggal;
		else
			$periode_prev = "1970-1-1";
		$this->db->distinct();
		$this->db->select("peg_jurusan");
		$this->db->select("jur_nama_indonesia");
		$this->db->select("peg_nip_baru");
		$this->db->select("peg_name");
		$this->db->select("peg_google_schoolar");
		//$this->db->select("log_keterangan");

		$this->db->from($this->table_name);
		$this->db->join('pegawai', 'log_pegawai = peg_id', 'left');
		$this->db->join('jurusan', 'peg_jurusan = jur_id', 'left');
		$this->db->where('log_keterangan', "Gagal - ID Salah");
		$this->db->where("log_tanggal <= '$periode_now' AND log_tanggal > '" .$periode_prev."'");

		$this->db->order_by("peg_jurusan asc");
		$query = $this->db->get();
		return $query->result();
	}

	public function get_kosong_tarik_data($tar_id){
		$this->load->model("m_log_tarik");
		if($tar_id == 0){
			$periode_now = date("Y-m-d");
			$periode_prev = $this->m_log_tarik->get("tar_tanggal < '$periode_now'", "tar_id desc");
		}
		else{
			$log_tarik =  $this->m_log_tarik->get("tar_id = $tar_id");
			$log_tarik = $log_tarik[0];
			$periode_now = $log_tarik->tar_tanggal;
			$periode_prev = $this->m_log_tarik->get("tar_id < $tar_id AND tar_tanggal < '$periode_now'", "tar_id desc");
		}

		if(count($periode_prev) > 0)
			$periode_prev = $periode_prev[0]->tar_tanggal;
		else
			$periode_prev = "1970-1-1";
		$this->db->distinct();
		$this->db->select("peg_jurusan");
		$this->db->select("jur_nama_indonesia");
		$this->db->select("peg_nip_baru");
		$this->db->select("peg_name");
		$this->db->select("peg_google_schoolar");
		//$this->db->select("log_keterangan");

		$this->db->from($this->table_name);
		$this->db->join('pegawai', 'log_pegawai = peg_id', 'left');
		$this->db->join('jurusan', 'peg_jurusan = jur_id', 'left');
		$this->db->where('log_keterangan', "Sukses - Data Kosong");
		$this->db->where("log_tanggal <= '$periode_now' AND log_tanggal > '" .$periode_prev."'");

		$this->db->order_by("peg_jurusan asc");
		$query = $this->db->get();
		return $query->result();
	}


	public function report_by_year($year=false){
		if($year === false) return false;

		// $this->db->select("Month(pub_created_at) as month", FALSE);
		$this->db->select("month", FALSE);
		$this->db->select("ISNULL(YEAR(log_tanggal), $year) as year", FALSE);
		$this->db->select("COUNT(log_id) as jumlah", FALSE);

		//$this->db->from($this->table_name);
		$this->db->from("(SELECT (1) UNION SELECT (2) UNION SELECT (3) UNION SELECT (4) 
			UNION SELECT (5) UNION SELECT (6) UNION SELECT (7) UNION SELECT (8) UNION SELECT (9)
			UNION SELECT (10) UNION SELECT (11) UNION SELECT (12))t(month)");

		$this->db->order_by("month");
		$this->db->join($this->table_name, "month=Month(log_tanggal) AND $year = YEAR(log_tanggal)", "left");
		$this->db->group_by(array("month", "Year(log_tanggal)"));
		$query = $this->db->get();
		return $query->result();
	}

	public function report_yearly_by_unit($fakultas=false, $jurusan=false)
	{
		$this->db->select("YEAR(log_tanggal) as year", FALSE);
		$this->db->select("COUNT(log_id) as jumlah", FALSE);

		$this->db->from($this->table_name);

		$this->db->join("pegawai", "log_pegawai = peg_id", "left");
		$this->db->join("fakultas", "fak_id = peg_fakultas", "left");
		$this->db->join("jurusan", "jur_id = peg_jurusan", "left");

		$year_now = date("Y");
		$min_year = $year_now - 5;
		if($min_year < 2015) $min_year = 2014;
		
		if($jurusan != false){
			$this->db->where("peg_jurusan = '".$jurusan."'");
		}else if($fakultas != false){
			$this->db->where("peg_fakultas = ".$fakultas);
		}
		

		$this->db->group_by("YEAR(log_tanggal)");
		$query = $this->db->get();
		return $query->result();
	}
}