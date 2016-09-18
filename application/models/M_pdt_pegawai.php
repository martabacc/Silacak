<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table tmst_pegawai
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */

class M_pdt_pegawai extends MY_Model {
	protected $pk_col = 'kode';
	protected $table_name = 'tmst_pegawai';
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
		

		
		//$this->db_pdt->select('kode');
		$this->db_pdt->select('kode_fakultas');
		$this->db_pdt->select('kode_jurusan');
		$this->db_pdt->select('kode_program_studi');
		$this->db_pdt->select('kode_jenjang_pendidikan');
		//$this->db_pdt->select('kode_satuan_kerja');
		$this->db_pdt->select('kode_ikatan_kerja_pegawai');
		$this->db_pdt->select('kode_status_aktivitas_pegawai');
		//$this->db_pdt->select('kode_jenis_pegawai');
		//$this->db_pdt->select('kode_jenis_dosen');
		//$this->db_pdt->select('kode_pangkat_pns');
		$this->db_pdt->select('kode_jenis_kelamin');
		$this->db_pdt->select('kode_provinsi');
		$this->db_pdt->select('kode_kota');
		//$this->db_pdt->select('kode_status_validasi');
		//$this->db_pdt->select('kode_log_audit');
		$this->db_pdt->select('nip_baru');
		$this->db_pdt->select('nip_lama');
		$this->db_pdt->select('nidn');
		$this->db_pdt->select('nama');
		$this->db_pdt->select('gelar_akademik_depan');
		$this->db_pdt->select('gelar_akademik_belakang');
		$this->db_pdt->select('alamat');
		$this->db_pdt->select('telepon');
		$this->db_pdt->select('handphone');
		$this->db_pdt->select('email');
		$this->db_pdt->select('is_dosen');
		
		$this->db_pdt->from('tmst_pegawai');
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
	
	
}