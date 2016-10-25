<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table pengguna
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_pengguna extends MY_Model {
	protected $pk_col = 'usr_id';
	protected $table_name = 'pengguna';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_pengguna->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_pengguna->get_by_column($pk);
	 * or $this->m_pengguna->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_pengguna->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_pengguna->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_pengguna->permanent_delete($pk);
	 * or you can call with $this->m_pengguna->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('usr_id');
		$this->db->select('usr_username');
		$this->db->select('usr_password');
		$this->db->select('usr_email');
		$this->db->select('usr_name');
		$this->db->select('usr_fullname');
		$this->db->select('CONVERT(date, usr_last_logtime) as usr_last_logtime', FALSE);
		$this->db->select('usr_last_ip');
		$this->db->select('usr_enabled');
		$this->db->select('CONVERT(date, usr_deleted_at) as usr_deleted_at', FALSE);
		$this->db->select('CONVERT(date, usr_created_at) as usr_created_at', FALSE);
		$this->db->select('CONVERT(date, usr_updated_at) as usr_updated_at', FALSE);
		$this->db->select('usr_issa');
		$this->db->from('pengguna');

	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel pengguna
	* @param type $usr_username     adalah field untuk kolom usr_username    , default = FALSE
	* @param type $usr_password     adalah field untuk kolom usr_password    , default = FALSE
	* @param type $usr_email        adalah field untuk kolom usr_email       , default = FALSE
	* @param type $usr_name         adalah field untuk kolom usr_name        , default = FALSE
	* @param type $usr_fullname     adalah field untuk kolom usr_fullname    , default = FALSE
	* @param type $usr_last_logtime adalah field untuk kolom usr_last_logtime, default = FALSE
	* @param type $usr_last_ip      adalah field untuk kolom usr_last_ip     , default = FALSE
	* @param type $usr_enabled      adalah field untuk kolom usr_enabled     , default = FALSE
	* @param type $usr_deleted_at   adalah field untuk kolom usr_deleted_at  , default = FALSE
	* @param type $usr_created_at   adalah field untuk kolom usr_created_at  , default = FALSE
	* @param type $usr_updated_at   adalah field untuk kolom usr_updated_at  , default = FALSE
	*/
	public function insert($usr_username=FALSE,
					$usr_password=FALSE,
					$usr_email=FALSE,
					$usr_name=FALSE,
					$usr_fullname=FALSE,
					$usr_last_logtime=FALSE,
					$usr_last_ip=FALSE,
					$usr_enabled=FALSE,
					$usr_issa=FALSE,
					$usr_deleted_at=FALSE,
					$usr_created_at=FALSE,
					$usr_updated_at=FALSE){
		$data = array();
        if($usr_username    !== FALSE)$data['usr_username']    =($usr_username == '' ? NULL : trim($usr_username));
        if($usr_password    !== FALSE)$data['usr_password']    =($usr_password == '' ? NULL : trim($usr_password));
        if($usr_email       !== FALSE)$data['usr_email']       =($usr_email == '' ? NULL : trim($usr_email));
        if($usr_name        !== FALSE)$data['usr_name']        =($usr_name == '' ? NULL : trim($usr_name));
        if($usr_fullname    !== FALSE)$data['usr_fullname']    =($usr_fullname == '' ? NULL : trim($usr_fullname));
        if($usr_last_logtime!== FALSE)$data['usr_last_logtime']=($usr_last_logtime == '' ? NULL : $usr_last_logtime);
        if($usr_last_ip     !== FALSE)$data['usr_last_ip']     =($usr_last_ip == '' ? NULL : trim($usr_last_ip));
        if($usr_enabled     !== FALSE)$data['usr_enabled']     =($usr_enabled == '' ? NULL : $usr_enabled);
        if($usr_issa     !== FALSE)$data['usr_issa']     =($usr_issa == '' ? NULL : $usr_issa);
        if($usr_deleted_at  !== FALSE)$data['usr_deleted_at']  =$usr_deleted_at;
        if($usr_created_at  !== FALSE)$data['usr_created_at']  =$usr_created_at;
        if($usr_updated_at  !== FALSE)$data['usr_updated_at']  =$usr_updated_at;
		$this->db->insert('pengguna', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel pengguna
	* @param type $usr_id           adalah field untuk kolom usr_id          , default = FALSE
	* @param type $usr_username     adalah field untuk kolom usr_username    , default = FALSE
	* @param type $usr_password     adalah field untuk kolom usr_password    , default = FALSE
	* @param type $usr_email        adalah field untuk kolom usr_email       , default = FALSE
	* @param type $usr_name         adalah field untuk kolom usr_name        , default = FALSE
	* @param type $usr_fullname     adalah field untuk kolom usr_fullname    , default = FALSE
	* @param type $usr_last_logtime adalah field untuk kolom usr_last_logtime, default = FALSE
	* @param type $usr_last_ip      adalah field untuk kolom usr_last_ip     , default = FALSE
	* @param type $usr_enabled      adalah field untuk kolom usr_enabled     , default = FALSE
	* @param type $usr_deleted_at   adalah field untuk kolom usr_deleted_at  , default = FALSE
	* @param type $usr_created_at   adalah field untuk kolom usr_created_at  , default = FALSE
	* @param type $usr_updated_at   adalah field untuk kolom usr_updated_at  , default = FALSE
	*/
	public function update($usr_id=FALSE,
					$usr_username=FALSE,
					$usr_password=FALSE,
					$usr_email=FALSE,
					$usr_name=FALSE,
					$usr_fullname=FALSE,
					$usr_last_logtime=FALSE,
					$usr_last_ip=FALSE,
					$usr_enabled=FALSE,
					$usr_issa=FALSE,
					$usr_deleted_at=FALSE,
					$usr_created_at=FALSE,
					$usr_updated_at=FALSE){
		$data = array();
        if($usr_username    !== FALSE)$data['usr_username']    =($usr_username == '' ? NULL : trim($usr_username));
        if($usr_password    !== FALSE)$data['usr_password']    =($usr_password == '' ? NULL : trim($usr_password));
        if($usr_email       !== FALSE)$data['usr_email']       =($usr_email == '' ? NULL : trim($usr_email));
        if($usr_name        !== FALSE)$data['usr_name']        =($usr_name == '' ? NULL : trim($usr_name));
        if($usr_fullname    !== FALSE)$data['usr_fullname']    =($usr_fullname == '' ? NULL : trim($usr_fullname));
        if($usr_last_logtime!== FALSE)$data['usr_last_logtime']=($usr_last_logtime == '' ? NULL : $usr_last_logtime);
        if($usr_last_ip     !== FALSE)$data['usr_last_ip']     =($usr_last_ip == '' ? NULL : trim($usr_last_ip));
        if($usr_enabled     !== FALSE)$data['usr_enabled']     =($usr_enabled == '' ? NULL : $usr_enabled);
        if($usr_issa     !== FALSE)$data['usr_issa']     =($usr_issa == '' ? NULL : $usr_issa);
        if($usr_deleted_at  !== FALSE)$data['usr_deleted_at']  =$usr_deleted_at;
        if($usr_created_at  !== FALSE)$data['usr_created_at']  =$usr_created_at;
        if($usr_updated_at  !== FALSE)$data['usr_updated_at']  =$usr_updated_at;
		return $this->db->update('pengguna', $data, "usr_id = '$usr_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'usr_id'          , 'alias' => 'usr_id'          , 'searchable' => FALSE),
						array('db' => 'usr_username'    , 'alias' => 'usr_username'    , 'searchable' => FALSE),
						//array('db' => 'usr_password'    , 'alias' => 'usr_password'    , 'searchable' => FALSE),
						array('db' => 'usr_email'       , 'alias' => 'usr_email'       , 'searchable' => FALSE),
						array('db' => 'usr_name'        , 'alias' => 'usr_name'        , 'searchable' => FALSE),
						array('db' => 'usr_fullname'    , 'alias' => 'usr_fullname'    , 'searchable' => FALSE),
						array('db' => 'usr_issa'    , 'alias' => 'usr_issa'    , 'searchable' => FALSE),
		);
		parent::parse_datatable($cols, $where);
	}
}