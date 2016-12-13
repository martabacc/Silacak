<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table detil_kode_publikasi
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_detil_kode_publikasi extends MY_Model {
	protected $pk_col = 'dkp_id';
	protected $table_name = 'detil_kode_publikasi';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_detil_kode_publikasi->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_detil_kode_publikasi->get_by_column($pk);
	 * or $this->m_detil_kode_publikasi->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_detil_kode_publikasi->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_detil_kode_publikasi->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_detil_kode_publikasi->permanent_delete($pk);
	 * or you can call with $this->m_detil_kode_publikasi->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('dkp_id');
		$this->db->select('dkp_kode');
		$this->db->select('dkp_keterangan');
		$this->db->from('detil_kode_publikasi');

	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel detil_kode_publikasi
	* @param type $dkp_kode       adalah field untuk kolom dkp_kode      , default = FALSE
	* @param type $dkp_keterangan adalah field untuk kolom dkp_keterangan, default = FALSE
	*/
	public function insert($dkp_kode=FALSE,
					$dkp_keterangan=FALSE){
		$data = array();
        if($dkp_kode      !== FALSE)$data['dkp_kode']      =($dkp_kode == '' ? NULL : trim($dkp_kode));
        if($dkp_keterangan!== FALSE)$data['dkp_keterangan']=($dkp_keterangan == '' ? NULL : trim($dkp_keterangan));
		$this->db->insert('detil_kode_publikasi', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel detil_kode_publikasi
	* @param type $dkp_id         adalah field untuk kolom dkp_id        , default = FALSE
	* @param type $dkp_kode       adalah field untuk kolom dkp_kode      , default = FALSE
	* @param type $dkp_keterangan adalah field untuk kolom dkp_keterangan, default = FALSE
	*/
	public function update($dkp_id=FALSE,
					$dkp_kode=FALSE,
					$dkp_keterangan=FALSE){
		$data = array();
        if($dkp_kode      !== FALSE)$data['dkp_kode']      =($dkp_kode == '' ? NULL : trim($dkp_kode));
        if($dkp_keterangan!== FALSE)$data['dkp_keterangan']=($dkp_keterangan == '' ? NULL : trim($dkp_keterangan));
		return $this->db->update('detil_kode_publikasi', $data, "dkp_id = '$dkp_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'dkp_id'        , 'alias' => 'dkp_id'        , 'searchable' => FALSE),
						array('db' => 'dkp_kode'      , 'alias' => 'dkp_kode'      , 'searchable' => FALSE),
						array('db' => 'dkp_keterangan', 'alias' => 'dkp_keterangan', 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where);
	}
}