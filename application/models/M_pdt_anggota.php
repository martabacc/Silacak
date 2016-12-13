<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table tran_anggota_penelitian_dosen
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */

class M_pdt_anggota extends MY_Model {
	protected $pk_col = 'kode';
	protected $table_name = 'tran_anggota_penelitian_dosen';
	protected $db_pdt;
	function __construct()
	{ 
		parent::__construct();
		$this->db_pdt = $this->load->database('pdt', TRUE);
	
	}

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->M_pdt->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->M_pdt->get_by_column($pk);
	 * or $this->M_pdt->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->M_pdt->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->M_pdt->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->M_pdt->permanent_delete($pk);
	 * or you can call with $this->M_pdt->permanent_delete($pk, 'other_column');
	 */
	
	public function select(){
		
		$this->db_pdt->select('kode');
		$this->db_pdt->select('kode_publikasi');
		$this->db_pdt->select('kode_pegawai');
		$this->db_pdt->select('kode_log_audit');
		$this->db_pdt->select('status_ketua');
		$this->db_pdt->select('kode_periode_pelaporan');
		$this->db_pdt->select('jenis_peneliti');
		$this->db_pdt->select('urutan');
		$this->db_pdt->select('created_at');
		$this->db_pdt->select('updated_at');
		$this->db_pdt->select('deleted_at');
		
		$this->db_pdt->from('tran_anggota_penelitian_dosen');
	}


	function get_data($where="", $order="", $limit=NULL, $offset=NULL, $escape=NULL){
		//select, this function implemented by specified file used this model
		$this->select();
		//check order, if not empty, use order syntax
		if(!empty_or_null($order)) $this->db_pdt->order_by($order, '', $escape);

		//check and enable limit query
		if(!empty_or_null($limit) && !empty_or_null($offset)) $this->db_pdt->limit($limit, $offset);
		else if(!empty_or_null($limit)) $this->db_pdt->limit($limit);

		//check and enable where query
		if(!empty_or_null($where)) $this->db_pdt->where($where, NULL, $escape);

		//get data and return it
		$query = $this->db_pdt->get();
		return $query->result();
	}
	
	public function insert($kode_publikasi=FALSE,
					$kode_pegawai=FALSE,
					$status_ketua=FALSE,
					$jenis_peneliti=FALSE,
					$urutan=FALSE,
					$created_at=FALSE,
					$updated_at=FALSE,
					$deleted_at=FALSE){
		$data = array();
        if($kode_publikasi          !== FALSE)$data['kode_publikasi']          =($kode_publikasi == '' ? NULL : $kode_publikasi);
        if($kode_pegawai                 !== FALSE)$data['kode_pegawai']                 =($kode_pegawai == '' ? NULL : $kode_pegawai);
        if($status_ketua                 !== FALSE)$data['status_ketua']                 =($status_ketua == '' ? NULL : $status_ketua);
        if($jenis_peneliti             !== FALSE)$data['jenis_peneliti']             =($jenis_peneliti == '' ? NULL : $jenis_peneliti);
        if($urutan            !== FALSE)$data['urutan']            =($urutan == '' ? NULL : trim($urutan));
        if($created_at            !== FALSE)$data['created_at']            =$created_at;
        if($updated_at            !== FALSE)$data['updated_at']            =$updated_at;
        if($deleted_at            !== FALSE)$data['deleted_at']            =$deleted_at;
		$this->db_pdt->insert('tran_anggota_penelitian_dosen', $data);
		return $this->db_pdt->insert_id();
	}
	
}