<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Custom Model for custom query ex: report
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_data_issn extends MY_Model {
	protected $pk_col = 'issn_id';
	protected $table_name = 'data_issn';

	function __construct()
	{ parent::__construct(); }


	public function select(){
		$this->db->select('issn_id');
		$this->db->select('issn_judul');

		$this->db->from('data_issn');

	}
	
	public function insert($issn_judul=false){
		$data = array();
        if($issn_judul      !== false)$data['issn_judul']      =trim($issn_judul);

		$this->db->insert('data_issn', $data);
		return $this->db->insert_id();
	}

	public function update($issn_judul=false,
					$issn_id=false){
		$data = array();
        if($issn_judul       !== false)$data['issn_judul']       =trim($issn_judul);
        if($issn_id      !== false)$data['issn_id']      =trim($issn_id);

		return $this->db->update('data_issn', $data, "issn_id = '$issn_id'");
	}

	// for ajax reason
		/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'issn_id'               , 'alias' => 'issn_id'               , 'searchable' => FALSE),
						array('db' => 'issn_judul' , 'alias' => 'issn_judul' , 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where);
	}
}