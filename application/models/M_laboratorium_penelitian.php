<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table laboratorium_penelitian
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_laboratorium_penelitian extends MY_Model {
	protected $pk_col = 'lab_id';
	protected $table_name = 'laboratorium_penelitian';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_laboratorium_penelitian->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_laboratorium_penelitian->get_by_column($pk);
	 * or $this->m_laboratorium_penelitian->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_laboratorium_penelitian->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_laboratorium_penelitian->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_laboratorium_penelitian->permanent_delete($pk);
	 * or you can call with $this->m_laboratorium_penelitian->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('lab_id');
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
		$this->db->from('laboratorium_penelitian');

	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel laboratorium_penelitian
	* @param type $lab_kode              adalah field untuk kolom lab_kode             , default = FALSE
	* @param type $lab_perguruan_tinggi  adalah field untuk kolom lab_perguruan_tinggi , default = FALSE
	* @param type $lab_fakultas          adalah field untuk kolom lab_fakultas         , default = FALSE
	* @param type $lab_jurusan           adalah field untuk kolom lab_jurusan          , default = FALSE
	* @param type $lab_program_studi     adalah field untuk kolom lab_program_studi    , default = FALSE
	* @param type $lab_validasi          adalah field untuk kolom lab_validasi         , default = FALSE
	* @param type $lab_log_audit         adalah field untuk kolom lab_log_audit        , default = FALSE
	* @param type $lab_nama_indonesia    adalah field untuk kolom lab_nama_indonesia   , default = FALSE
	* @param type $lab_nama_inggris      adalah field untuk kolom lab_nama_inggris     , default = FALSE
	* @param type $lab_periode_pelaporan adalah field untuk kolom lab_periode_pelaporan, default = FALSE
	* @param type $lab_jumlah_aktifitas  adalah field untuk kolom lab_jumlah_aktifitas , default = FALSE
	* @param type $lab_created_at        adalah field untuk kolom lab_created_at       , default = FALSE
	* @param type $lab_updated_at        adalah field untuk kolom lab_updated_at       , default = FALSE
	* @param type $lab_deleted_at        adalah field untuk kolom lab_deleted_at       , default = FALSE
	*/
	public function insert($lab_kode=FALSE,
					$lab_perguruan_tinggi=FALSE,
					$lab_fakultas=FALSE,
					$lab_jurusan=FALSE,
					$lab_program_studi=FALSE,
					$lab_validasi=FALSE,
					$lab_log_audit=FALSE,
					$lab_nama_indonesia=FALSE,
					$lab_nama_inggris=FALSE,
					$lab_periode_pelaporan=FALSE,
					$lab_jumlah_aktifitas=FALSE,
					$lab_created_at=FALSE,
					$lab_updated_at=FALSE,
					$lab_deleted_at=FALSE){
		$data = array();
        if($lab_kode             !== FALSE)$data['lab_kode']             =($lab_kode == '' ? NULL : trim($lab_kode));
        if($lab_perguruan_tinggi !== FALSE)$data['lab_perguruan_tinggi'] =($lab_perguruan_tinggi == '' ? NULL : trim($lab_perguruan_tinggi));
        if($lab_fakultas         !== FALSE)$data['lab_fakultas']         =($lab_fakultas == '' ? NULL : trim($lab_fakultas));
        if($lab_jurusan          !== FALSE)$data['lab_jurusan']          =($lab_jurusan == '' ? NULL : trim($lab_jurusan));
        if($lab_program_studi    !== FALSE)$data['lab_program_studi']    =($lab_program_studi == '' ? NULL : trim($lab_program_studi));
        if($lab_validasi         !== FALSE)$data['lab_validasi']         =($lab_validasi == '' ? NULL : trim($lab_validasi));
        if($lab_log_audit        !== FALSE)$data['lab_log_audit']        =($lab_log_audit == '' ? NULL : trim($lab_log_audit));
        if($lab_nama_indonesia   !== FALSE)$data['lab_nama_indonesia']   =($lab_nama_indonesia == '' ? NULL : trim($lab_nama_indonesia));
        if($lab_nama_inggris     !== FALSE)$data['lab_nama_inggris']     =($lab_nama_inggris == '' ? NULL : trim($lab_nama_inggris));
        if($lab_periode_pelaporan!== FALSE)$data['lab_periode_pelaporan']=($lab_periode_pelaporan == '' ? NULL : trim($lab_periode_pelaporan));
        if($lab_jumlah_aktifitas !== FALSE)$data['lab_jumlah_aktifitas'] =($lab_jumlah_aktifitas == '' ? NULL : $lab_jumlah_aktifitas);
        if($lab_created_at       !== FALSE)$data['lab_created_at']       =$lab_created_at;
        if($lab_updated_at       !== FALSE)$data['lab_updated_at']       =$lab_updated_at;
        if($lab_deleted_at       !== FALSE)$data['lab_deleted_at']       =$lab_deleted_at;
		$this->db->insert('laboratorium_penelitian', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel laboratorium_penelitian
	* @param type $lab_id                adalah field untuk kolom lab_id               , default = FALSE
	* @param type $lab_kode              adalah field untuk kolom lab_kode             , default = FALSE
	* @param type $lab_perguruan_tinggi  adalah field untuk kolom lab_perguruan_tinggi , default = FALSE
	* @param type $lab_fakultas          adalah field untuk kolom lab_fakultas         , default = FALSE
	* @param type $lab_jurusan           adalah field untuk kolom lab_jurusan          , default = FALSE
	* @param type $lab_program_studi     adalah field untuk kolom lab_program_studi    , default = FALSE
	* @param type $lab_validasi          adalah field untuk kolom lab_validasi         , default = FALSE
	* @param type $lab_log_audit         adalah field untuk kolom lab_log_audit        , default = FALSE
	* @param type $lab_nama_indonesia    adalah field untuk kolom lab_nama_indonesia   , default = FALSE
	* @param type $lab_nama_inggris      adalah field untuk kolom lab_nama_inggris     , default = FALSE
	* @param type $lab_periode_pelaporan adalah field untuk kolom lab_periode_pelaporan, default = FALSE
	* @param type $lab_jumlah_aktifitas  adalah field untuk kolom lab_jumlah_aktifitas , default = FALSE
	* @param type $lab_created_at        adalah field untuk kolom lab_created_at       , default = FALSE
	* @param type $lab_updated_at        adalah field untuk kolom lab_updated_at       , default = FALSE
	* @param type $lab_deleted_at        adalah field untuk kolom lab_deleted_at       , default = FALSE
	*/
	public function update($lab_id=FALSE,
					$lab_kode=FALSE,
					$lab_perguruan_tinggi=FALSE,
					$lab_fakultas=FALSE,
					$lab_jurusan=FALSE,
					$lab_program_studi=FALSE,
					$lab_validasi=FALSE,
					$lab_log_audit=FALSE,
					$lab_nama_indonesia=FALSE,
					$lab_nama_inggris=FALSE,
					$lab_periode_pelaporan=FALSE,
					$lab_jumlah_aktifitas=FALSE,
					$lab_created_at=FALSE,
					$lab_updated_at=FALSE,
					$lab_deleted_at=FALSE){
		$data = array();
        if($lab_kode             !== FALSE)$data['lab_kode']             =($lab_kode == '' ? NULL : trim($lab_kode));
        if($lab_perguruan_tinggi !== FALSE)$data['lab_perguruan_tinggi'] =($lab_perguruan_tinggi == '' ? NULL : trim($lab_perguruan_tinggi));
        if($lab_fakultas         !== FALSE)$data['lab_fakultas']         =($lab_fakultas == '' ? NULL : trim($lab_fakultas));
        if($lab_jurusan          !== FALSE)$data['lab_jurusan']          =($lab_jurusan == '' ? NULL : trim($lab_jurusan));
        if($lab_program_studi    !== FALSE)$data['lab_program_studi']    =($lab_program_studi == '' ? NULL : trim($lab_program_studi));
        if($lab_validasi         !== FALSE)$data['lab_validasi']         =($lab_validasi == '' ? NULL : trim($lab_validasi));
        if($lab_log_audit        !== FALSE)$data['lab_log_audit']        =($lab_log_audit == '' ? NULL : trim($lab_log_audit));
        if($lab_nama_indonesia   !== FALSE)$data['lab_nama_indonesia']   =($lab_nama_indonesia == '' ? NULL : trim($lab_nama_indonesia));
        if($lab_nama_inggris     !== FALSE)$data['lab_nama_inggris']     =($lab_nama_inggris == '' ? NULL : trim($lab_nama_inggris));
        if($lab_periode_pelaporan!== FALSE)$data['lab_periode_pelaporan']=($lab_periode_pelaporan == '' ? NULL : trim($lab_periode_pelaporan));
        if($lab_jumlah_aktifitas !== FALSE)$data['lab_jumlah_aktifitas'] =($lab_jumlah_aktifitas == '' ? NULL : $lab_jumlah_aktifitas);
        if($lab_created_at       !== FALSE)$data['lab_created_at']       =$lab_created_at;
        if($lab_updated_at       !== FALSE)$data['lab_updated_at']       =$lab_updated_at;
        if($lab_deleted_at       !== FALSE)$data['lab_deleted_at']       =$lab_deleted_at;
		return $this->db->update('laboratorium_penelitian', $data, "lab_id = '$lab_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'lab_id'               , 'alias' => 'lab_id'               , 'searchable' => FALSE),
						array('db' => 'lab_kode'             , 'alias' => 'lab_kode'             , 'searchable' => FALSE),
						array('db' => 'lab_perguruan_tinggi' , 'alias' => 'lab_perguruan_tinggi' , 'searchable' => FALSE),
						array('db' => 'lab_fakultas'         , 'alias' => 'lab_fakultas'         , 'searchable' => FALSE),
						array('db' => 'lab_jurusan'          , 'alias' => 'lab_jurusan'          , 'searchable' => FALSE),
						array('db' => 'lab_program_studi'    , 'alias' => 'lab_program_studi'    , 'searchable' => FALSE),
						array('db' => 'lab_validasi'         , 'alias' => 'lab_validasi'         , 'searchable' => FALSE),
						array('db' => 'lab_log_audit'        , 'alias' => 'lab_log_audit'        , 'searchable' => FALSE),
						array('db' => 'lab_nama_indonesia'   , 'alias' => 'lab_nama_indonesia'   , 'searchable' => FALSE),
						array('db' => 'lab_nama_inggris'     , 'alias' => 'lab_nama_inggris'     , 'searchable' => FALSE),
						array('db' => 'lab_periode_pelaporan', 'alias' => 'lab_periode_pelaporan', 'searchable' => FALSE),
						array('db' => 'lab_jumlah_aktifitas' , 'alias' => 'lab_jumlah_aktifitas' , 'searchable' => FALSE),
						array('db' => 'lab_created_at'       , 'alias' => 'lab_created_at'       , 'searchable' => FALSE),
						array('db' => 'lab_updated_at'       , 'alias' => 'lab_updated_at'       , 'searchable' => FALSE),
						array('db' => 'lab_deleted_at'       , 'alias' => 'lab_deleted_at'       , 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where);
	}
}