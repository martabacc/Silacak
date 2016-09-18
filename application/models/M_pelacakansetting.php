<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table pelacakansetting
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_Pelacakansetting extends MY_Model {
	protected $pk_col = 'pst_id';
	protected $table_name = 'pelacakansetting';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_pelacakansetting->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_pelacakansetting->get_by_column($pk);
	 * or $this->m_pelacakansetting->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_pelacakansetting->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_pelacakansetting->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_pelacakansetting->permanent_delete($pk);
	 * or you can call with $this->m_pelacakansetting->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('pst_id');
		$this->db->select('pst_name');
		$this->db->select('pst_value');
		$this->db->from('pelacakansetting');

	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel pelacakansetting
	* @param type $pst_name  adalah field untuk kolom pst_name , default = false
	* @param type $pst_value adalah field untuk kolom pst_value, default = false
	*/
	public function insert($pst_name=false,
					$pst_value=false){
		$data = array();
        if($pst_name !== false)$data['pst_name'] =trim($pst_name);
        if($pst_value!== false)$data['pst_value']=trim($pst_value);
		$this->db->insert('pelacakansetting', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel pelacakansetting
	* @param type $pst_id    adalah field untuk kolom pst_id   , default = false
	* @param type $pst_name  adalah field untuk kolom pst_name , default = false
	* @param type $pst_value adalah field untuk kolom pst_value, default = false
	*/
	public function update($pst_id=false,
					$pst_name=false,
					$pst_value=false){
		$data = array();
        if($pst_name !== false)$data['pst_name'] =trim($pst_name);
        if($pst_value!== false)$data['pst_value']=trim($pst_value);
		return $this->db->update('pelacakansetting', $data, "pst_id = '$pst_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
                                  array('db' => 'pst_id'   , 'alias' => 'pst_id'   , 'searchable' => false),
                                  array('db' => 'pst_name' , 'alias' => 'pst_name' , 'searchable' => false),
                                  array('db' => 'pst_value', 'alias' => 'pst_value', 'searchable' => false)
		);
		parent::parse_datatable($cols, $where);
	}
}