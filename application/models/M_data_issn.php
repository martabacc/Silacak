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
		$this->db->select('issn_number');

		$this->db->from('data_issn');

	}
	
	public function insert($issn_judul=false,
					$issn_number=false){
		$data = array();
        if($issn_number       !== false)$data['issn_number']       =trim($issn_number);
        if($issn_judul      !== false)$data['issn_judul']      =trim($issn_judul);

		$this->db->insert('data_issn', $data);
		return $this->db->insert_id();
	}

	public function update($issn_judul=false,
					$issn_id=false,
					$issn_number=false){
		$data = array();
        if($issn_judul       !== false)$data['issn_judul']       =trim($issn_judul);
        if($issn_id      !== false)$data['issn_id']      =trim($issn_id);
        if($issn_number     !== false)$data['issn_number']     =trim($issn_number);

		return $this->db->update('data_issn', $data, "issn_id = '$issn_id'");
	}
}