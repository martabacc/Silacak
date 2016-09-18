<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table pelacakanlog
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_Pelacakanlog extends MY_Model {
	protected $pk_col = 'plg_id';
	protected $table_name = 'pelacakanlog';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_pelacakanlog->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_pelacakanlog->get_by_column($pk);
	 * or $this->m_pelacakanlog->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_pelacakanlog->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_pelacakanlog->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_pelacakanlog->permanent_delete($pk);
	 * or you can call with $this->m_pelacakanlog->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('plg_id');
		$this->db->select('plg_table');
		$this->db->select('plg_action');
		$this->db->select('plg_administrator');
		$this->db->select('CONVERT(date, pld_date) as pld_date', FALSE);;
		$this->db->select('plg_notes');
		$this->db->from('pelacakan');

	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel pelacakanlog
	* @param type $plg_table         adalah field untuk kolom plg_table        , default = false
	* @param type $plg_action        adalah field untuk kolom plg_action       , default = false
	* @param type $plg_administrator adalah field untuk kolom plg_administrator, default = false
	* @param type $fld_date          adalah field untuk kolom fld_date         , default = false
	* @param type $plg_notes         adalah field untuk kolom plg_notes        , default = false
	*/
	public function insert($plg_table=false,
					$plg_action=false,
					$plg_administrator=false,
					$fld_date=false,
					$plg_notes=false){
		$data = array();
        if($plg_table        !== false)$data['plg_table']        =trim($plg_table);
        if($plg_action       !== false)$data['plg_action']       =trim($plg_action);
        if($plg_administrator!== false)$data['plg_administrator']=$plg_administrator;
        if($fld_date         !== false)$data['fld_date']         =$fld_date;
        if($plg_notes        !== false)$data['plg_notes']        =trim($plg_notes);
		$this->db->insert('pelacakanlog', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel pelacakanlog
	* @param type $plg_id            adalah field untuk kolom plg_id           , default = false
	* @param type $plg_table         adalah field untuk kolom plg_table        , default = false
	* @param type $plg_action        adalah field untuk kolom plg_action       , default = false
	* @param type $plg_administrator adalah field untuk kolom plg_administrator, default = false
	* @param type $fld_date          adalah field untuk kolom fld_date         , default = false
	* @param type $plg_notes         adalah field untuk kolom plg_notes        , default = false
	*/
	public function update($plg_id=false,
					$plg_table=false,
					$plg_action=false,
					$plg_administrator=false,
					$fld_date=false,
					$plg_notes=false){
		$data = array();
        if($plg_table        !== false)$data['plg_table']        =trim($plg_table);
        if($plg_action       !== false)$data['plg_action']       =trim($plg_action);
        if($plg_administrator!== false)$data['plg_administrator']=$plg_administrator;
        if($fld_date         !== false)$data['fld_date']         =$fld_date;
        if($plg_notes        !== false)$data['plg_notes']        =trim($plg_notes);
		return $this->db->update('pelacakanlog', $data, "plg_id = '$plg_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
                                  array('db' => 'plg_id'           , 'alias' => 'plg_id'           , 'searchable' => false),
                                  array('db' => 'plg_table'        , 'alias' => 'plg_table'        , 'searchable' => false),
                                  array('db' => 'plg_action'       , 'alias' => 'plg_action'       , 'searchable' => false),
                                  array('db' => 'plg_administrator', 'alias' => 'plg_administrator', 'searchable' => false),
                                  array('db' => 'fld_date'         , 'alias' => 'fld_date'         , 'searchable' => false),
                                  array('db' => 'plg_notes'        , 'alias' => 'plg_notes'        , 'searchable' => false)
		);
		parent::parse_datatable($cols, $where);
	}
}