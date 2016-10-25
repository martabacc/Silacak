<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Custom Model for custom query ex: report
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_journal extends MY_Model {
	protected $pk_col = 'jou_id';
	protected $table_name = 'journal';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_access->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_access->get_by_column($pk);
	 * or $this->m_access->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_access->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_access->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_access->permanent_delete($pk);
	 * or you can call with $this->m_access->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('jou_id');
		$this->db->select('jou_title');
		$this->db->select('jou_desc');
		$this->db->select('jou_date');

		$this->db->from('journal');

	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel access
	* @param type $acc_name        adalah field untuk kolom acc_name       , default = false
	* @param type $acc_group       adalah field untuk kolom acc_group      , default = false
	* @param type $acc_detail      adalah field untuk kolom acc_detail     , default = false
	* @param type $acc_description adalah field untuk kolom acc_description, default = false
	* @param type $acc_delete      adalah field untuk kolom acc_delete     , default = false
	*/
	public function insert($jou_title=false,
					$jou_desc=false,
					$jou_date=false){
		$data = array();
        if($jou_title       !== false)$data['jou_title']       =trim($jou_title);
        if($jou_desc      !== false)$data['jou_desc']      =trim($jou_desc);
        if($jou_date     !== false)$data['jou_date']     =trim($jou_date);

		$this->db->insert('journal', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel access
	* @param type $acc_id          adalah field untuk kolom acc_id         , default = false
	* @param type $acc_name        adalah field untuk kolom acc_name       , default = false
	* @param type $acc_group       adalah field untuk kolom acc_group      , default = false
	* @param type $acc_detail      adalah field untuk kolom acc_detail     , default = false
	* @param type $acc_description adalah field untuk kolom acc_description, default = false
	* @param type $acc_delete      adalah field untuk kolom acc_delete     , default = false
	*/
	public function update($jou_id=false,
					$jou_title=false,
					$jou_desc=false,
					$jou_date=false){
		$data = array();
        if($jou_title       !== false)$data['jou_title']       =trim($jou_title);
        if($jou_desc      !== false)$data['jou_desc']      =trim($jou_desc);
        if($jou_date     !== false)$data['jou_date']     =trim($jou_date);

		return $this->db->update('journal', $data, "jou_id = '$jou_id'");
	}
}