<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table log_admin
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_log_admin extends MY_Model {
	protected $pk_col = 'adm_id';
	protected $table_name = 'log_admin';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_log_admin->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_log_admin->get_by_column($pk);
	 * or $this->m_log_admin->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_log_admin->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_log_admin->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_log_admin->permanent_delete($pk);
	 * or you can call with $this->m_log_admin->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('adm_id');
		$this->db->select('adm_pengguna');
		$this->db->select('CONVERT(date, adm_tanggal) as adm_tanggal', FALSE);;
		$this->db->select('adm_aktivitas');
		$this->db->select('adm_keterangan');

		$this->db->select('usr_username');
		$this->db->select('usr_password');
		$this->db->select('usr_email');
		$this->db->select('usr_name');
		$this->db->select('usr_fullname');
		$this->db->select('CONVERT(date, usr_last_logtime) as usr_last_logtime', FALSE);;
		$this->db->select('usr_last_ip');
		$this->db->select('usr_enabled');
		$this->db->select('CONVERT(date, usr_deleted_at) as usr_deleted_at', FALSE);;
		$this->db->select('CONVERT(date, usr_created_at) as usr_created_at', FALSE);;
		$this->db->select('CONVERT(date, usr_updated_at) as usr_updated_at', FALSE);;
		$this->db->from('log_admin');
        $this->db->join('pengguna', 'adm_pengguna = usr_id', 'left');
	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel log_admin
	* @param type $adm_pengguna   adalah field untuk kolom adm_pengguna  , default = FALSE
	* @param type $adm_tanggal    adalah field untuk kolom adm_tanggal   , default = FALSE
	* @param type $adm_aktivitas  adalah field untuk kolom adm_aktivitas , default = FALSE
	* @param type $adm_keterangan adalah field untuk kolom adm_keterangan, default = FALSE
	*/
	public function insert($adm_pengguna=FALSE,
					$adm_tanggal=FALSE,
					$adm_aktivitas=FALSE,
					$adm_keterangan=FALSE){
		$data = array();
        if($adm_pengguna  !== FALSE)$data['adm_pengguna']  =($adm_pengguna == '' ? NULL : $adm_pengguna);
        if($adm_tanggal   !== FALSE)$data['adm_tanggal']   =($adm_tanggal == '' ? NULL : $adm_tanggal);
        if($adm_aktivitas !== FALSE)$data['adm_aktivitas'] =($adm_aktivitas == '' ? NULL : trim($adm_aktivitas));
        if($adm_keterangan!== FALSE)$data['adm_keterangan']=($adm_keterangan == '' ? NULL : trim($adm_keterangan));
		$this->db->insert('log_admin', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel log_admin
	* @param type $adm_id         adalah field untuk kolom adm_id        , default = FALSE
	* @param type $adm_pengguna   adalah field untuk kolom adm_pengguna  , default = FALSE
	* @param type $adm_tanggal    adalah field untuk kolom adm_tanggal   , default = FALSE
	* @param type $adm_aktivitas  adalah field untuk kolom adm_aktivitas , default = FALSE
	* @param type $adm_keterangan adalah field untuk kolom adm_keterangan, default = FALSE
	*/
	public function update($adm_id=FALSE,
					$adm_pengguna=FALSE,
					$adm_tanggal=FALSE,
					$adm_aktivitas=FALSE,
					$adm_keterangan=FALSE){
		$data = array();
        if($adm_pengguna  !== FALSE)$data['adm_pengguna']  =($adm_pengguna == '' ? NULL : $adm_pengguna);
        if($adm_tanggal   !== FALSE)$data['adm_tanggal']   =($adm_tanggal == '' ? NULL : $adm_tanggal);
        if($adm_aktivitas !== FALSE)$data['adm_aktivitas'] =($adm_aktivitas == '' ? NULL : trim($adm_aktivitas));
        if($adm_keterangan!== FALSE)$data['adm_keterangan']=($adm_keterangan == '' ? NULL : trim($adm_keterangan));
		return $this->db->update('log_admin', $data, "adm_id = '$adm_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'adm_id'        , 'alias' => 'adm_id'        , 'searchable' => FALSE),
						array('db' => 'usr_username'  , 'alias' => 'usr_username'  , 'searchable' => FALSE),
						array('db' => 'adm_tanggal'   , 'alias' => 'adm_tanggal'   , 'searchable' => FALSE),
						array('db' => 'adm_aktivitas' , 'alias' => 'adm_aktivitas' , 'searchable' => FALSE),
						array('db' => 'adm_keterangan', 'alias' => 'adm_keterangan', 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where);
	}
}