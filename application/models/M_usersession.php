<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table usersession
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_Usersession extends MY_Model {
	protected $pk_col = 'uss_id';
	protected $table_name = 'usersession';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_usersession->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_usersession->get_by_column($pk);
	 * or $this->m_usersession->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_usersession->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_usersession->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_usersession->permanent_delete($pk);
	 * or you can call with $this->m_usersession->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('uss_id');
		$this->db->select('uss_ip');
		$this->db->select('uss_useragent');
		$this->db->select('uss_lastactivity');
		$this->db->select('uss_content');
		$this->db->select('uss_user');
		$this->db->from('usersession');

	}

	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel usersession
	* @param type $uss_ip           adalah field untuk kolom uss_ip          , default = false
	* @param type $uss_useragent    adalah field untuk kolom uss_useragent   , default = false
	* @param type $uss_lastactivity adalah field untuk kolom uss_lastactivity, default = false
	* @param type $uss_content      adalah field untuk kolom uss_content     , default = false
	* @param type $uss_user         adalah field untuk kolom uss_user        , default = false
	*/
	public function insert($uss_id=false,
					$uss_ip=false,
					$uss_useragent=false,
					$uss_lastactivity=false,
					$uss_content=false,
					$uss_user=false){
		$data = array();
        if($uss_id          !== false)$data['uss_id']          =trim($uss_id);
        if($uss_ip          !== false)$data['uss_ip']          =trim($uss_ip);
        if($uss_useragent   !== false)$data['uss_useragent']   =trim($uss_useragent);
        if($uss_lastactivity!== false)$data['uss_lastactivity']=$uss_lastactivity;
        if($uss_content     !== false)$data['uss_content']     =trim($uss_content);
        if($uss_user        !== false)$data['uss_user']        =$uss_user;
		$this->db->insert('usersession', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel usersession
	* @param type $uss_id           adalah field untuk kolom uss_id          , default = false
	* @param type $uss_ip           adalah field untuk kolom uss_ip          , default = false
	* @param type $uss_useragent    adalah field untuk kolom uss_useragent   , default = false
	* @param type $uss_lastactivity adalah field untuk kolom uss_lastactivity, default = false
	* @param type $uss_content      adalah field untuk kolom uss_content     , default = false
	* @param type $uss_user         adalah field untuk kolom uss_user        , default = false
	*/
	public function update($uss_id=false,
					$uss_ip=false,
					$uss_useragent=false,
					$uss_lastactivity=false,
					$uss_content=false,
					$uss_user=false){
		$data = array();
        if($uss_ip          !== false)$data['uss_ip']          =trim($uss_ip);
        if($uss_useragent   !== false)$data['uss_useragent']   =trim($uss_useragent);
        if($uss_lastactivity!== false)$data['uss_lastactivity']=$uss_lastactivity;
        if($uss_content     !== false)$data['uss_content']     =trim($uss_content);
        if($uss_user        !== false)$data['uss_user']        =$uss_user;
		return $this->db->update('usersession', $data, "uss_id = '$uss_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
                                  array('db' => 'uss_id'          , 'alias' => 'uss_id'          , 'searchable' => false),
                                  array('db' => 'uss_ip'          , 'alias' => 'uss_ip'          , 'searchable' => false),
                                  array('db' => 'uss_useragent'   , 'alias' => 'uss_useragent'   , 'searchable' => false),
                                  array('db' => 'uss_lastactivity', 'alias' => 'uss_lastactivity', 'searchable' => false),
                                  array('db' => 'uss_content'     , 'alias' => 'uss_content'     , 'searchable' => false),
                                  array('db' => 'uss_user'        , 'alias' => 'uss_user'        , 'searchable' => false)
		);
		parent::parse_datatable($cols, $where);
	}
}