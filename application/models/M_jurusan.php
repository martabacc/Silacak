<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table jurusan
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_jurusan extends MY_Model {
	protected $pk_col = 'jur_id';
	protected $table_name = 'jurusan';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_jurusan->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_jurusan->get_by_column($pk);
	 * or $this->m_jurusan->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_jurusan->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_jurusan->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_jurusan->permanent_delete($pk);
	 * or you can call with $this->m_jurusan->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('jur_id');
		$this->db->select('jur_perguruan_tinggi');
		$this->db->select('jur_fakultas');
		$this->db->select('jur_status_validasi');
		$this->db->select('jur_log_audit');
		$this->db->select('jur_nama_indonesia');
		$this->db->select('jur_nama_inggris');
		$this->db->select('jur_dosen_kepala');
		$this->db->select('CONVERT(date, jur_created_at) as jur_created_at', FALSE);;
		$this->db->select('CONVERT(date, jur_updated_at) as jur_updated_at', FALSE);;
		$this->db->select('CONVERT(date, jur_deleted_at) as jur_deleted_at', FALSE);;
		$this->db->select('jur_periode_pelaporan');

		$this->db->select('fak_perguruan_tinggi');
		$this->db->select('fak_status_validasi');
		$this->db->select('fak_log_audit');
		$this->db->select('fak_singkatan');
		$this->db->select('fak_nama_indonesia');
		$this->db->select('fak_nama_inggris');
		$this->db->select('fak_dosen_kepala');
		$this->db->select('fak_tanggal_mulai_efektif');
		$this->db->select('fak_tanggal_akhir_efektif');
		$this->db->select('CONVERT(date, fak_deleted_at) as fak_deleted_at', FALSE);;
		$this->db->select('CONVERT(date, fak_created_at) as fak_created_at', FALSE);;
		$this->db->select('CONVERT(date, fak_updated_at) as fak_updated_at', FALSE);;
		$this->db->from('jurusan');
        $this->db->join('fakultas', 'jur_fakultas = fak_id', 'left');
	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel jurusan
	* @param type $jur_id                adalah field untuk kolom jur_id               , default = FALSE
	* @param type $jur_perguruan_tinggi  adalah field untuk kolom jur_perguruan_tinggi , default = FALSE
	* @param type $jur_fakultas          adalah field untuk kolom jur_fakultas         , default = FALSE
	* @param type $jur_status_validasi   adalah field untuk kolom jur_status_validasi  , default = FALSE
	* @param type $jur_log_audit         adalah field untuk kolom jur_log_audit        , default = FALSE
	* @param type $jur_nama_indonesia    adalah field untuk kolom jur_nama_indonesia   , default = FALSE
	* @param type $jur_nama_inggris      adalah field untuk kolom jur_nama_inggris     , default = FALSE
	* @param type $jur_dosen_kepala      adalah field untuk kolom jur_dosen_kepala     , default = FALSE
	* @param type $jur_created_at        adalah field untuk kolom jur_created_at       , default = FALSE
	* @param type $jur_updated_at        adalah field untuk kolom jur_updated_at       , default = FALSE
	* @param type $jur_deleted_at        adalah field untuk kolom jur_deleted_at       , default = FALSE
	* @param type $jur_periode_pelaporan adalah field untuk kolom jur_periode_pelaporan, default = FALSE
	*/
	public function insert($jur_id=FALSE,
					$jur_perguruan_tinggi=FALSE,
					$jur_fakultas=FALSE,
					$jur_status_validasi=FALSE,
					$jur_log_audit=FALSE,
					$jur_nama_indonesia=FALSE,
					$jur_nama_inggris=FALSE,
					$jur_dosen_kepala=FALSE,
					$jur_created_at=FALSE,
					$jur_updated_at=FALSE,
					$jur_deleted_at=FALSE,
					$jur_periode_pelaporan=FALSE){
		$data = array();
        if($jur_id               !== FALSE)$data['jur_id']               =trim($jur_id);
        if($jur_perguruan_tinggi !== FALSE)$data['jur_perguruan_tinggi'] =($jur_perguruan_tinggi == '' ? NULL : trim($jur_perguruan_tinggi));
        if($jur_fakultas         !== FALSE)$data['jur_fakultas']         =($jur_fakultas == '' ? NULL : trim($jur_fakultas));
        if($jur_status_validasi  !== FALSE)$data['jur_status_validasi']  =($jur_status_validasi == '' ? NULL : trim($jur_status_validasi));
        if($jur_log_audit        !== FALSE)$data['jur_log_audit']        =($jur_log_audit == '' ? NULL : trim($jur_log_audit));
        if($jur_nama_indonesia   !== FALSE)$data['jur_nama_indonesia']   =($jur_nama_indonesia == '' ? NULL : trim($jur_nama_indonesia));
        if($jur_nama_inggris     !== FALSE)$data['jur_nama_inggris']     =($jur_nama_inggris == '' ? NULL : trim($jur_nama_inggris));
        if($jur_dosen_kepala     !== FALSE)$data['jur_dosen_kepala']     =($jur_dosen_kepala == '' ? NULL : trim($jur_dosen_kepala));
        if($jur_created_at       !== FALSE)$data['jur_created_at']       =($jur_created_at == '' ? NULL : $jur_created_at);
        if($jur_updated_at       !== FALSE)$data['jur_updated_at']       =($jur_updated_at == '' ? NULL : $jur_updated_at);
        if($jur_deleted_at       !== FALSE)$data['jur_deleted_at']       =($jur_deleted_at == '' ? NULL : $jur_deleted_at);
        if($jur_periode_pelaporan!== FALSE)$data['jur_periode_pelaporan']=($jur_periode_pelaporan == '' ? NULL : trim($jur_periode_pelaporan));
		$this->db->insert('jurusan', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel jurusan
	* @param type $jur_id                adalah field untuk kolom jur_id               , default = FALSE
	* @param type $jur_perguruan_tinggi  adalah field untuk kolom jur_perguruan_tinggi , default = FALSE
	* @param type $jur_fakultas          adalah field untuk kolom jur_fakultas         , default = FALSE
	* @param type $jur_status_validasi   adalah field untuk kolom jur_status_validasi  , default = FALSE
	* @param type $jur_log_audit         adalah field untuk kolom jur_log_audit        , default = FALSE
	* @param type $jur_nama_indonesia    adalah field untuk kolom jur_nama_indonesia   , default = FALSE
	* @param type $jur_nama_inggris      adalah field untuk kolom jur_nama_inggris     , default = FALSE
	* @param type $jur_dosen_kepala      adalah field untuk kolom jur_dosen_kepala     , default = FALSE
	* @param type $jur_created_at        adalah field untuk kolom jur_created_at       , default = FALSE
	* @param type $jur_updated_at        adalah field untuk kolom jur_updated_at       , default = FALSE
	* @param type $jur_deleted_at        adalah field untuk kolom jur_deleted_at       , default = FALSE
	* @param type $jur_periode_pelaporan adalah field untuk kolom jur_periode_pelaporan, default = FALSE
	*/
	public function update($jur_id=FALSE,
					$jur_perguruan_tinggi=FALSE,
					$jur_fakultas=FALSE,
					$jur_status_validasi=FALSE,
					$jur_log_audit=FALSE,
					$jur_nama_indonesia=FALSE,
					$jur_nama_inggris=FALSE,
					$jur_dosen_kepala=FALSE,
					$jur_created_at=FALSE,
					$jur_updated_at=FALSE,
					$jur_deleted_at=FALSE,
					$jur_periode_pelaporan=FALSE){
		$data = array();
        if($jur_id               !== FALSE)$data['jur_id']               =trim($jur_id);
        if($jur_perguruan_tinggi !== FALSE)$data['jur_perguruan_tinggi'] =($jur_perguruan_tinggi == '' ? NULL : trim($jur_perguruan_tinggi));
        if($jur_fakultas         !== FALSE)$data['jur_fakultas']         =($jur_fakultas == '' ? NULL : trim($jur_fakultas));
        if($jur_status_validasi  !== FALSE)$data['jur_status_validasi']  =($jur_status_validasi == '' ? NULL : trim($jur_status_validasi));
        if($jur_log_audit        !== FALSE)$data['jur_log_audit']        =($jur_log_audit == '' ? NULL : trim($jur_log_audit));
        if($jur_nama_indonesia   !== FALSE)$data['jur_nama_indonesia']   =($jur_nama_indonesia == '' ? NULL : trim($jur_nama_indonesia));
        if($jur_nama_inggris     !== FALSE)$data['jur_nama_inggris']     =($jur_nama_inggris == '' ? NULL : trim($jur_nama_inggris));
        if($jur_dosen_kepala     !== FALSE)$data['jur_dosen_kepala']     =($jur_dosen_kepala == '' ? NULL : trim($jur_dosen_kepala));
        if($jur_created_at       !== FALSE)$data['jur_created_at']       =($jur_created_at == '' ? NULL : $jur_created_at);
        if($jur_updated_at       !== FALSE)$data['jur_updated_at']       =($jur_updated_at == '' ? NULL : $jur_updated_at);
        if($jur_deleted_at       !== FALSE)$data['jur_deleted_at']       =($jur_deleted_at == '' ? NULL : $jur_deleted_at);
        if($jur_periode_pelaporan!== FALSE)$data['jur_periode_pelaporan']=($jur_periode_pelaporan == '' ? NULL : trim($jur_periode_pelaporan));
		return $this->db->update('jurusan', $data, "jur_id = '$jur_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'jur_id'               , 'alias' => 'jur_id'               , 'searchable' => FALSE),
						array('db' => 'jur_perguruan_tinggi' , 'alias' => 'jur_perguruan_tinggi' , 'searchable' => FALSE),
						array('db' => 'fak_perguruan_tinggi' , 'alias' => 'fak_perguruan_tinggi' , 'searchable' => FALSE),
						array('db' => 'jur_status_validasi'  , 'alias' => 'jur_status_validasi'  , 'searchable' => FALSE),
						array('db' => 'jur_log_audit'        , 'alias' => 'jur_log_audit'        , 'searchable' => FALSE),
						array('db' => 'jur_nama_indonesia'   , 'alias' => 'jur_nama_indonesia'   , 'searchable' => FALSE),
						array('db' => 'jur_nama_inggris'     , 'alias' => 'jur_nama_inggris'     , 'searchable' => FALSE),
						array('db' => 'jur_dosen_kepala'     , 'alias' => 'jur_dosen_kepala'     , 'searchable' => FALSE),
						array('db' => 'jur_created_at'       , 'alias' => 'jur_created_at'       , 'searchable' => FALSE),
						array('db' => 'jur_updated_at'       , 'alias' => 'jur_updated_at'       , 'searchable' => FALSE),
						array('db' => 'jur_deleted_at'       , 'alias' => 'jur_deleted_at'       , 'searchable' => FALSE),
						array('db' => 'jur_periode_pelaporan', 'alias' => 'jur_periode_pelaporan', 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where);
	}
}