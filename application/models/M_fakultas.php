<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table fakultas
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_fakultas extends MY_Model {
	protected $pk_col = 'fak_id';
	protected $table_name = 'fakultas';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_fakultas->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_fakultas->get_by_column($pk);
	 * or $this->m_fakultas->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_fakultas->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_fakultas->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_fakultas->permanent_delete($pk);
	 * or you can call with $this->m_fakultas->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('fak_id');
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
		$this->db->from('fakultas');

	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel fakultas
	* @param type $fak_id                    adalah field untuk kolom fak_id                   , default = FALSE
	* @param type $fak_perguruan_tinggi      adalah field untuk kolom fak_perguruan_tinggi     , default = FALSE
	* @param type $fak_status_validasi       adalah field untuk kolom fak_status_validasi      , default = FALSE
	* @param type $fak_log_audit             adalah field untuk kolom fak_log_audit            , default = FALSE
	* @param type $fak_singkatan             adalah field untuk kolom fak_singkatan            , default = FALSE
	* @param type $fak_nama_indonesia        adalah field untuk kolom fak_nama_indonesia       , default = FALSE
	* @param type $fak_nama_inggris          adalah field untuk kolom fak_nama_inggris         , default = FALSE
	* @param type $fak_dosen_kepala          adalah field untuk kolom fak_dosen_kepala         , default = FALSE
	* @param type $fak_tanggal_mulai_efektif adalah field untuk kolom fak_tanggal_mulai_efektif, default = FALSE
	* @param type $fak_tanggal_akhir_efektif adalah field untuk kolom fak_tanggal_akhir_efektif, default = FALSE
	* @param type $fak_deleted_at            adalah field untuk kolom fak_deleted_at           , default = FALSE
	* @param type $fak_created_at            adalah field untuk kolom fak_created_at           , default = FALSE
	* @param type $fak_updated_at            adalah field untuk kolom fak_updated_at           , default = FALSE
	*/
	public function insert($fak_id=FALSE,
					$fak_perguruan_tinggi=FALSE,
					$fak_status_validasi=FALSE,
					$fak_log_audit=FALSE,
					$fak_singkatan=FALSE,
					$fak_nama_indonesia=FALSE,
					$fak_nama_inggris=FALSE,
					$fak_dosen_kepala=FALSE,
					$fak_tanggal_mulai_efektif=FALSE,
					$fak_tanggal_akhir_efektif=FALSE,
					$fak_deleted_at=FALSE,
					$fak_created_at=FALSE,
					$fak_updated_at=FALSE){
		$data = array();
        if($fak_id                   !== FALSE)$data['fak_id']                   =trim($fak_id);
        if($fak_perguruan_tinggi     !== FALSE)$data['fak_perguruan_tinggi']     =($fak_perguruan_tinggi == '' ? NULL : trim($fak_perguruan_tinggi));
        if($fak_status_validasi      !== FALSE)$data['fak_status_validasi']      =($fak_status_validasi == '' ? NULL : trim($fak_status_validasi));
        if($fak_log_audit            !== FALSE)$data['fak_log_audit']            =($fak_log_audit == '' ? NULL : trim($fak_log_audit));
        if($fak_singkatan            !== FALSE)$data['fak_singkatan']            =($fak_singkatan == '' ? NULL : trim($fak_singkatan));
        if($fak_nama_indonesia       !== FALSE)$data['fak_nama_indonesia']       =($fak_nama_indonesia == '' ? NULL : trim($fak_nama_indonesia));
        if($fak_nama_inggris         !== FALSE)$data['fak_nama_inggris']         =($fak_nama_inggris == '' ? NULL : trim($fak_nama_inggris));
        if($fak_dosen_kepala         !== FALSE)$data['fak_dosen_kepala']         =($fak_dosen_kepala == '' ? NULL : trim($fak_dosen_kepala));
        if($fak_tanggal_mulai_efektif!== FALSE)$data['fak_tanggal_mulai_efektif']=($fak_tanggal_mulai_efektif == '' ? NULL : trim($fak_tanggal_mulai_efektif));
        if($fak_tanggal_akhir_efektif!== FALSE)$data['fak_tanggal_akhir_efektif']=($fak_tanggal_akhir_efektif == '' ? NULL : trim($fak_tanggal_akhir_efektif));
        if($fak_deleted_at           !== FALSE)$data['fak_deleted_at']           =($fak_deleted_at == '' ? NULL : $fak_deleted_at);
        if($fak_created_at           !== FALSE)$data['fak_created_at']           =($fak_created_at == '' ? NULL : $fak_created_at);
        if($fak_updated_at           !== FALSE)$data['fak_updated_at']           =($fak_updated_at == '' ? NULL : $fak_updated_at);
		$this->db->insert('fakultas', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel fakultas
	* @param type $fak_id                    adalah field untuk kolom fak_id                   , default = FALSE
	* @param type $fak_perguruan_tinggi      adalah field untuk kolom fak_perguruan_tinggi     , default = FALSE
	* @param type $fak_status_validasi       adalah field untuk kolom fak_status_validasi      , default = FALSE
	* @param type $fak_log_audit             adalah field untuk kolom fak_log_audit            , default = FALSE
	* @param type $fak_singkatan             adalah field untuk kolom fak_singkatan            , default = FALSE
	* @param type $fak_nama_indonesia        adalah field untuk kolom fak_nama_indonesia       , default = FALSE
	* @param type $fak_nama_inggris          adalah field untuk kolom fak_nama_inggris         , default = FALSE
	* @param type $fak_dosen_kepala          adalah field untuk kolom fak_dosen_kepala         , default = FALSE
	* @param type $fak_tanggal_mulai_efektif adalah field untuk kolom fak_tanggal_mulai_efektif, default = FALSE
	* @param type $fak_tanggal_akhir_efektif adalah field untuk kolom fak_tanggal_akhir_efektif, default = FALSE
	* @param type $fak_deleted_at            adalah field untuk kolom fak_deleted_at           , default = FALSE
	* @param type $fak_created_at            adalah field untuk kolom fak_created_at           , default = FALSE
	* @param type $fak_updated_at            adalah field untuk kolom fak_updated_at           , default = FALSE
	*/
	public function update($fak_id=FALSE,
					$fak_perguruan_tinggi=FALSE,
					$fak_status_validasi=FALSE,
					$fak_log_audit=FALSE,
					$fak_singkatan=FALSE,
					$fak_nama_indonesia=FALSE,
					$fak_nama_inggris=FALSE,
					$fak_dosen_kepala=FALSE,
					$fak_tanggal_mulai_efektif=FALSE,
					$fak_tanggal_akhir_efektif=FALSE,
					$fak_deleted_at=FALSE,
					$fak_created_at=FALSE,
					$fak_updated_at=FALSE){
		$data = array();
        if($fak_id                   !== FALSE)$data['fak_id']                   =trim($fak_id);
        if($fak_perguruan_tinggi     !== FALSE)$data['fak_perguruan_tinggi']     =($fak_perguruan_tinggi == '' ? NULL : trim($fak_perguruan_tinggi));
        if($fak_status_validasi      !== FALSE)$data['fak_status_validasi']      =($fak_status_validasi == '' ? NULL : trim($fak_status_validasi));
        if($fak_log_audit            !== FALSE)$data['fak_log_audit']            =($fak_log_audit == '' ? NULL : trim($fak_log_audit));
        if($fak_singkatan            !== FALSE)$data['fak_singkatan']            =($fak_singkatan == '' ? NULL : trim($fak_singkatan));
        if($fak_nama_indonesia       !== FALSE)$data['fak_nama_indonesia']       =($fak_nama_indonesia == '' ? NULL : trim($fak_nama_indonesia));
        if($fak_nama_inggris         !== FALSE)$data['fak_nama_inggris']         =($fak_nama_inggris == '' ? NULL : trim($fak_nama_inggris));
        if($fak_dosen_kepala         !== FALSE)$data['fak_dosen_kepala']         =($fak_dosen_kepala == '' ? NULL : trim($fak_dosen_kepala));
        if($fak_tanggal_mulai_efektif!== FALSE)$data['fak_tanggal_mulai_efektif']=($fak_tanggal_mulai_efektif == '' ? NULL : trim($fak_tanggal_mulai_efektif));
        if($fak_tanggal_akhir_efektif!== FALSE)$data['fak_tanggal_akhir_efektif']=($fak_tanggal_akhir_efektif == '' ? NULL : trim($fak_tanggal_akhir_efektif));
        if($fak_deleted_at           !== FALSE)$data['fak_deleted_at']           =($fak_deleted_at == '' ? NULL : $fak_deleted_at);
        if($fak_created_at           !== FALSE)$data['fak_created_at']           =($fak_created_at == '' ? NULL : $fak_created_at);
        if($fak_updated_at           !== FALSE)$data['fak_updated_at']           =($fak_updated_at == '' ? NULL : $fak_updated_at);
		return $this->db->update('fakultas', $data, "fak_id = '$fak_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'fak_id'                   , 'alias' => 'fak_id'                   , 'searchable' => FALSE),
						array('db' => 'fak_perguruan_tinggi'     , 'alias' => 'fak_perguruan_tinggi'     , 'searchable' => FALSE),
						array('db' => 'fak_status_validasi'      , 'alias' => 'fak_status_validasi'      , 'searchable' => FALSE),
						array('db' => 'fak_log_audit'            , 'alias' => 'fak_log_audit'            , 'searchable' => FALSE),
						array('db' => 'fak_singkatan'            , 'alias' => 'fak_singkatan'            , 'searchable' => FALSE),
						array('db' => 'fak_nama_indonesia'       , 'alias' => 'fak_nama_indonesia'       , 'searchable' => FALSE),
						array('db' => 'fak_nama_inggris'         , 'alias' => 'fak_nama_inggris'         , 'searchable' => FALSE),
						array('db' => 'fak_dosen_kepala'         , 'alias' => 'fak_dosen_kepala'         , 'searchable' => FALSE),
						array('db' => 'fak_tanggal_mulai_efektif', 'alias' => 'fak_tanggal_mulai_efektif', 'searchable' => FALSE),
						array('db' => 'fak_tanggal_akhir_efektif', 'alias' => 'fak_tanggal_akhir_efektif', 'searchable' => FALSE),
						array('db' => 'fak_deleted_at'           , 'alias' => 'fak_deleted_at'           , 'searchable' => FALSE),
						array('db' => 'fak_created_at'           , 'alias' => 'fak_created_at'           , 'searchable' => FALSE),
						array('db' => 'fak_updated_at'           , 'alias' => 'fak_updated_at'           , 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where);
	}
}