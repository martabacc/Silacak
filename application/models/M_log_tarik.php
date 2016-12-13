<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table log_tarik
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_log_tarik extends MY_Model {
	protected $pk_col = 'tar_id';
	protected $table_name = 'log_tarik';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_log_tarik->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_log_tarik->get_by_column($pk);
	 * or $this->m_log_tarik->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_log_tarik->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_log_tarik->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_log_tarik->permanent_delete($pk);
	 * or you can call with $this->m_log_tarik->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('tar_id');
		$this->db->select('tar_jenis');
		$this->db->select('CONVERT(date, tar_tanggal) as tar_tanggal', FALSE);
		$this->db->select('tar_keterangan');
		$this->db->select('tar_status');

		$this->db->from('log_tarik');
	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel log_tarik
	* @param type $tar_jenis   adalah field untuk kolom tar_jenis  , default = FALSE
	* @param type $tar_tanggal    adalah field untuk kolom tar_tanggal   , default = FALSE
	* @param type $tar_keterangan  adalah field untuk kolom tar_keterangan , default = FALSE
	* @param type $tar_status adalah field untuk kolom tar_status, default = FALSE
	*/
	public function insert($tar_jenis=FALSE,
					$tar_tanggal=FALSE,
					$tar_keterangan=FALSE,
					$tar_status=FALSE){
		$data = array();
        if($tar_jenis  !== FALSE)$data['tar_jenis']  =($tar_jenis == '' ? NULL : $tar_jenis);
        if($tar_tanggal   !== FALSE)$data['tar_tanggal']   =($tar_tanggal == '' ? NULL : $tar_tanggal);
        if($tar_keterangan !== FALSE)$data['tar_keterangan'] =($tar_keterangan == '' ? NULL : trim($tar_keterangan));
        if($tar_status!== FALSE)$data['tar_status']=($tar_status == '' ? NULL : trim($tar_status));
		$this->db->insert('log_tarik', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel log_tarik
	* @param type $tar_id         adalah field untuk kolom tar_id        , default = FALSE
	* @param type $tar_jenis   adalah field untuk kolom tar_jenis  , default = FALSE
	* @param type $tar_tanggal    adalah field untuk kolom tar_tanggal   , default = FALSE
	* @param type $tar_keterangan  adalah field untuk kolom tar_keterangan , default = FALSE
	* @param type $tar_status adalah field untuk kolom tar_status, default = FALSE
	*/
	public function update($tar_id=FALSE,
					$tar_jenis=FALSE,
					$tar_tanggal=FALSE,
					$tar_keterangan=FALSE,
					$tar_status=FALSE){
		$data = array();
        if($tar_jenis  !== FALSE)$data['tar_jenis']  =($tar_jenis == '' ? NULL : $tar_jenis);
        if($tar_tanggal   !== FALSE)$data['tar_tanggal']   =($tar_tanggal == '' ? NULL : $tar_tanggal);
        if($tar_keterangan !== FALSE)$data['tar_keterangan'] =($tar_keterangan == '' ? NULL : trim($tar_keterangan));
        if($tar_status!== FALSE)$data['tar_status']=($tar_status == '' ? NULL : trim($tar_status));
		return $this->db->update('log_tarik', $data, "tar_id = '$tar_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'tar_id'        , 'alias' => 'tar_id'        , 'searchable' => FALSE),
						array('db' => 'tar_jenis'  , 'alias' => 'tar_jenis'  , 'searchable' => FALSE),
						array('db' => 'tar_tanggal'   , 'alias' => 'tar_tanggal'   , 'searchable' => FALSE),
						array('db' => 'tar_keterangan' , 'alias' => 'tar_keterangan' , 'searchable' => FALSE),
						array('db' => 'tar_status', 'alias' => 'tar_status', 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where);
	}
}