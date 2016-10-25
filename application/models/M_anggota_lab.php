<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table anggota_lab
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_anggota_lab extends MY_Model {
	protected $pk_col = 'alb_id';
	protected $table_name = 'anggota_lab';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_anggota_lab->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_anggota_lab->get_by_column($pk);
	 * or $this->m_anggota_lab->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_anggota_lab->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_anggota_lab->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_anggota_lab->permanent_delete($pk);
	 * or you can call with $this->m_anggota_lab->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('alb_id');
		$this->db->select('alb_pegawai');
		$this->db->select('alb_laboratorium');
		$this->db->select('alb_status_ketua');
		$this->db->select('alb_periode_aktif');

		$this->db->select('peg_perguruan_tinggi');
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
		$this->db->select('peg_jabatan_fungsional');
		$this->db->select('peg_jabatan_struktural');
		$this->db->select('peg_jenis_kelamin');
		$this->db->select('peg_provinsi');
		$this->db->select('peg_kota');
		$this->db->select('peg_kode_pos');
		$this->db->select('peg_name');
		$this->db->select('peg_log_audit');
		$this->db->select('peg_nip_baru');
		$this->db->select('peg_nip_lama');
		$this->db->select('peg_nidn');
		$this->db->select('peg_nomor_ktp');
		$this->db->select('peg_gelar_depan');
		$this->db->select('peg_gelar_belakang');
		$this->db->select('peg_tempat_lahir');
		$this->db->select('CONVERT(date, peg_tanggal_lahir) as peg_tanggal_lahir', FALSE);;
		$this->db->select('peg_alamat');
		$this->db->select('peg_telepon');
		$this->db->select('peg_handphone');
		$this->db->select('peg_email');
		$this->db->select('CONVERT(date, peg_tanggal_berhenti) as peg_tanggal_berhenti', FALSE);;
		$this->db->select('CONVERT(date, peg_tanggal_masuk) as peg_tanggal_masuk', FALSE);;
		$this->db->select('peg_nomor_sertifikasi');
		$this->db->select('peg_tanggal_keluar_sertifikasi');
		$this->db->select('peg_is_dosen');
		$this->db->select('peg_periode_pelaporan');
		$this->db->select('peg_google_schoolar');
		$this->db->select('peg_penelitian');
		$this->db->select('CONVERT(date, peg_created_at) as peg_created_at', FALSE);;
		$this->db->select('CONVERT(date, peg_updated_at) as peg_updated_at', FALSE);;
		$this->db->select('CONVERT(date, peg_deleted_at) as peg_deleted_at', FALSE);;

		$this->db->select('lab_kode');
		$this->db->select('lab_perguruan_tinggi');
		$this->db->select('lab_fakultas');
		$this->db->select('lab_jurusan');
		$this->db->select('lab_program_studi');
		$this->db->select('lab_validasi');
		$this->db->select('lab_log_audit');
		$this->db->select('lab_nama_indonesia');
		$this->db->select('lab_nama_inggris');
		$this->db->select('lab_periode_pelaporan');
		$this->db->select('lab_jumlah_aktifitas');
		$this->db->select('CONVERT(date, lab_created_at) as lab_created_at', FALSE);;
		$this->db->select('CONVERT(date, lab_updated_at) as lab_updated_at', FALSE);;
		$this->db->select('CONVERT(date, lab_deleted_at) as lab_deleted_at', FALSE);;
		$this->db->from('anggota_lab');
        $this->db->join('pegawai', 'alb_pegawai = peg_id', 'left');
        $this->db->join('laboratorium_penelitian', 'alb_laboratorium = lab_id', 'left');
	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel anggota_lab
	* @param type $alb_pegawai       adalah field untuk kolom alb_pegawai      , default = FALSE
	* @param type $alb_laboratorium  adalah field untuk kolom alb_laboratorium , default = FALSE
	* @param type $alb_status_ketua  adalah field untuk kolom alb_status_ketua , default = FALSE
	* @param type $alb_periode_aktif adalah field untuk kolom alb_periode_aktif, default = FALSE
	*/
	public function insert($alb_pegawai=FALSE,
					$alb_laboratorium=FALSE,
					$alb_status_ketua=FALSE,
					$alb_periode_aktif=FALSE){
		$data = array();
        if($alb_pegawai      !== FALSE)$data['alb_pegawai']      =($alb_pegawai == '' ? NULL : $alb_pegawai);
        if($alb_laboratorium !== FALSE)$data['alb_laboratorium'] =($alb_laboratorium == '' ? NULL : $alb_laboratorium);
        if($alb_status_ketua !== FALSE)$data['alb_status_ketua'] =($alb_status_ketua == '' ? NULL : trim($alb_status_ketua));
        if($alb_periode_aktif!== FALSE)$data['alb_periode_aktif']=($alb_periode_aktif == '' ? NULL : trim($alb_periode_aktif));
		$this->db->insert('anggota_lab', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel anggota_lab
	* @param type $alb_id            adalah field untuk kolom alb_id           , default = FALSE
	* @param type $alb_pegawai       adalah field untuk kolom alb_pegawai      , default = FALSE
	* @param type $alb_laboratorium  adalah field untuk kolom alb_laboratorium , default = FALSE
	* @param type $alb_status_ketua  adalah field untuk kolom alb_status_ketua , default = FALSE
	* @param type $alb_periode_aktif adalah field untuk kolom alb_periode_aktif, default = FALSE
	*/
	public function update($alb_id=FALSE,
					$alb_pegawai=FALSE,
					$alb_laboratorium=FALSE,
					$alb_status_ketua=FALSE,
					$alb_periode_aktif=FALSE){
		$data = array();
        if($alb_pegawai      !== FALSE)$data['alb_pegawai']      =($alb_pegawai == '' ? NULL : $alb_pegawai);
        if($alb_laboratorium !== FALSE)$data['alb_laboratorium'] =($alb_laboratorium == '' ? NULL : $alb_laboratorium);
        if($alb_status_ketua !== FALSE)$data['alb_status_ketua'] =($alb_status_ketua == '' ? NULL : trim($alb_status_ketua));
        if($alb_periode_aktif!== FALSE)$data['alb_periode_aktif']=($alb_periode_aktif == '' ? NULL : trim($alb_periode_aktif));
		return $this->db->update('anggota_lab', $data, "alb_id = '$alb_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'alb_id'              , 'alias' => 'alb_id'              , 'searchable' => FALSE),
						array('db' => 'peg_perguruan_tinggi', 'alias' => 'peg_perguruan_tinggi', 'searchable' => FALSE),
						array('db' => 'lab_kode'            , 'alias' => 'lab_kode'            , 'searchable' => FALSE),
						array('db' => 'alb_status_ketua'    , 'alias' => 'alb_status_ketua'    , 'searchable' => FALSE),
						array('db' => 'alb_periode_aktif'   , 'alias' => 'alb_periode_aktif'   , 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where);
	}
}