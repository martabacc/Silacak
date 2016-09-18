<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Model class implementation for table user
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_User extends MY_Model {
	protected $pk_col = 'usr_id';
	protected $table_name = 'users';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_user->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_user->get_by_column($pk);
	 * or $this->m_user->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_user->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_user->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_user->permanent_delete($pk);
	 * or you can call with $this->m_user->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('usr_id');
		$this->db->select('usr_name');
		$this->db->select('usr_url');
		
		$this->db->from('users');
	}
	
	/**
	* @author Doni's Generator
	* fungsi untuk mendapatkan user dengan id tertentu
	* @param type $usr_id id user yang dicari
	* @return type object user yang dicari, null jika tidak ketemu
	*/
	function get_by_id($usr_id)
	{
		$result = $this->get("usr_id = '".intval($usr_id)."'");
		return count($result) == 0?null:$result[0];
	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel user
	* @param type $usr_name       adalah field untuk kolom usr_name      , default = false
	* @param type $usr_url  adalah field untuk kolom usr_url , default = false
	*/
	public function insert(
					$usr_name=false,
					$usr_url=false
					){
		$data = array();
        if($usr_name      !== false)$data['usr_name']      =trim($usr_name);
        if($usr_url  !== false)$data['usr_url']  =trim($usr_url);
        
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel user
	* @param type $usr_id         adalah field untuk kolom usr_id        , default = false
	* @param type $usr_name       adalah field untuk kolom usr_name      , default = false
	* @param type $usr_url  adalah field untuk kolom usr_url , default = false
	*/
	public function update($usr_id=false,
					$usr_name=false,
					$usr_url=false){
		$data = array();
        if($usr_name      !== false)$data['usr_name']      =trim($usr_name);
        if($usr_url  !== false)$data['usr_url']  =trim($usr_url);
		return $this->db->update('users', $data, "usr_id = '$usr_id'");
	}

	function count_all($where = "")
	{
		if($where != null)$this->db->where($where);
		return $this->db->count_all_results('users');
	}
	
}