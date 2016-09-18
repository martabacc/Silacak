<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table log_sinkron
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_log_sinkron extends MY_Model {
	protected $pk_col = 'snk_id';
	protected $table_name = 'log_sinkron';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_log_sinkron->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_log_sinkron->get_by_column($pk);
	 * or $this->m_log_sinkron->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_log_sinkron->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_log_sinkron->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_log_sinkron->permanent_delete($pk);
	 * or you can call with $this->m_log_sinkron->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('snk_id');
		$this->db->select('snk_publikasi');
		$this->db->select('snk_pdt');
		$this->db->select('CONVERT(date, snk_tanggal) as snk_tanggal', FALSE);
		$this->db->select('snk_distance');
		$this->db->select('snk_action');
		$this->db->select('snk_status');

		$this->db->select('pub_id');
		$this->db->select('pub_detilkodepub');
		$this->db->select('pub_kode');
		$this->db->select('pub_url_scholar');
		$this->db->select('pub_jenis_peneliti');
		$this->db->select('pub_media_publikasi');
		$this->db->select('pub_pelaksanaan_penelitian');
		$this->db->select('pub_jenis_pembiayaan');
		$this->db->select('pub_status_validasi');
		$this->db->select('pub_periode_pelaporan');
		$this->db->select('pub_kode_pegawai');
		$this->db->select('pub_jumlah_pembiayaan');
		$this->db->select('pub_tahun');
		$this->db->select('pub_bulan');
		$this->db->select('pub_judul');
		$this->db->select('pub_kata_kunci');
		$this->db->select('pub_total_waktu');
		$this->db->select('pub_lokasi');
		$this->db->select('pub_abstraksi');
		$this->db->select('pub_pengarang');
		$this->db->select('pub_volume');
		$this->db->select('pub_halaman');
		$this->db->select('pub_issue');
		$this->db->select('pub_keterangan');
		$this->db->select('pub_tanggal_mulai');
		$this->db->select('pub_tanggal_selesai');
		$this->db->select('pub_url_unduh');
		$this->db->select('pub_duplicate');
		$this->db->select('pub_citation');
		$this->db->select('CONVERT(date, pub_created_at) as pub_created_at', FALSE);
		$this->db->select('pub_updated_at');
		$this->db->select('pub_deleted_at');
		$this->db->select('pub_status_tarik');

		$this->db->from('log_sinkron');
		$this->db->join('publikasi_dosen', 'pub_id = snk_publikasi', 'left');
	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel log_sinkron
	* @param type $snk_publikasi    adalah field untuk kolom snk_publikasi   , default = FALSE
	* @param type $snk_tanggal    adalah field untuk kolom snk_tanggal   , default = FALSE
	* @param type $snk_action  adalah field untuk kolom snk_action , default = FALSE
	* @param type $snk_pdt   adalah field untuk kolom snk_pdt , default = FALSE
	* @param type $snk_distance       adalah field untuk kolom snk_distance      , default = FALSE
	* @param type $snk_status adalah field untuk kolom snk_status, default = FALSE
	*/
	public function insert($snk_publikasi=FALSE,
					$snk_tanggal=FALSE,
					$snk_action=FALSE,
					$snk_pdt=FALSE,
					$snk_distance=FALSE,
					$snk_status=FALSE)
	{
		$data = array();
        if($snk_tanggal   !== FALSE)$data['snk_tanggal']   =$snk_tanggal;
        if($snk_publikasi   !== FALSE)$data['snk_publikasi']   =$snk_publikasi;
        if($snk_action !== FALSE)$data['snk_action'] =trim($snk_action);
        if($snk_pdt      !== FALSE)$data['snk_pdt']      =($snk_pdt == '' ? NULL : $snk_pdt);
        if($snk_distance      !== FALSE)$data['snk_distance']      =($snk_distance == '' ? 0 : $snk_distance);
        if($snk_status!== FALSE)$data['snk_status']=($snk_status == '' ? NULL : trim($snk_status));
		$this->db->insert('log_sinkron', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel log_sinkron
	* @param type $snk_id         adalah field untuk kolom snk_id        , default = FALSE
	* @param type $snk_publikasi    adalah field untuk kolom snk_publikasi   , default = FALSE
	* @param type $snk_tanggal    adalah field untuk kolom snk_tanggal   , default = FALSE
	* @param type $snk_action  adalah field untuk kolom snk_action , default = FALSE
	* @param type $snk_distance       adalah field untuk kolom snk_distance      , default = FALSE
	* @param type $snk_status adalah field untuk kolom snk_status, default = FALSE
	*/
	public function update($snk_id=FALSE,
					$snk_publikasi=FALSE,
					$snk_tanggal=FALSE,
					$snk_action=FALSE,
					$snk_pdt=FALSE,
					$snk_distance=FALSE,
					$snk_status=FALSE){
		$data = array();
        if($snk_tanggal   !== FALSE)$data['snk_tanggal']   =$snk_tanggal;
        if($snk_publikasi   !== FALSE)$data['snk_publikasi']   =$snk_publikasi;
        if($snk_action !== FALSE)$data['snk_action'] =trim($snk_action);
        if($snk_pdt      !== FALSE)$data['snk_pdt']      =($snk_pdt == '' ? NULL : $snk_pdt);
        if($snk_distance      !== FALSE)$data['snk_distance']      =($snk_distance == '' ? 0 : $snk_distance);
        if($snk_status!== FALSE)$data['snk_status']=($snk_status == '' ? NULL : trim($snk_status));
		return $this->db->update('log_sinkron', $data, "snk_id = '$snk_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'snk_id'        , 'alias' => 'snk_id'        , 'searchable' => FALSE),
						array('db' => 'pub_judul'                 , 'alias' => 'pub_judul'                 , 'searchable' => TRUE),
						array('db' => 'pub_pengarang'             , 'alias' => 'pub_pengarang'             , 'searchable' => TRUE),
						array('db' => 'snk_tanggal'   , 'alias' => 'snk_tanggal'   , 'searchable' => FALSE),
						array('db' => 'snk_action' , 'alias' => 'snk_action' , 'searchable' => TRUE),
						array('db' => 'snk_distance'      , 'alias' => 'snk_distance'      , 'searchable' => TRUE),
						array('db' => 'snk_status', 'alias' => 'snk_status', 'searchable' => FALSE),

						array('db' => 'snk_pdt'   , 'alias' => 'snk_pdt'   , 'searchable' => FALSE),
						array('db' => 'snk_publikasi'   , 'alias' => 'snk_publikasi'   , 'searchable' => FALSE),
						array('db' => 'pub_id'                    , 'alias' => 'pub_id'                    , 'searchable' => FALSE),
						array('db' => 'pub_kode'                  , 'alias' => 'pub_kode'                  , 'searchable' => FALSE),
						array('db' => 'pub_url_scholar'         , 'alias' => 'pub_url_scholar'         , 'searchable' => FALSE),
						array('db' => 'pub_jenis_peneliti'        , 'alias' => 'pub_jenis_peneliti'        , 'searchable' => FALSE),
						array('db' => 'pub_media_publikasi'       , 'alias' => 'pub_media_publikasi'       , 'searchable' => FALSE),
						array('db' => 'pub_pelaksanaan_penelitian', 'alias' => 'pub_pelaksanaan_penelitian', 'searchable' => FALSE),
						array('db' => 'pub_jenis_pembiayaan'      , 'alias' => 'pub_jenis_pembiayaan'      , 'searchable' => FALSE),
						array('db' => 'pub_status_validasi'       , 'alias' => 'pub_status_validasi'       , 'searchable' => FALSE),
						array('db' => 'pub_periode_pelaporan'     , 'alias' => 'pub_periode_pelaporan'     , 'searchable' => FALSE),
						array('db' => 'pub_kode_pegawai'          , 'alias' => 'pub_kode_pegawai'          , 'searchable' => FALSE),
						array('db' => 'pub_jumlah_pembiayaan'     , 'alias' => 'pub_jumlah_pembiayaan'     , 'searchable' => FALSE),
						array('db' => 'pub_tahun'                 , 'alias' => 'pub_tahun'                 , 'searchable' => FALSE),
						array('db' => 'pub_bulan'                 , 'alias' => 'pub_bulan'                 , 'searchable' => FALSE),
						array('db' => 'pub_kata_kunci'            , 'alias' => 'pub_kata_kunci'            , 'searchable' => FALSE),
						array('db' => 'pub_total_waktu'           , 'alias' => 'pub_total_waktu'           , 'searchable' => FALSE),
						array('db' => 'pub_lokasi'                , 'alias' => 'pub_lokasi'                , 'searchable' => FALSE),
						array('db' => 'pub_abstraksi'             , 'alias' => 'pub_abstraksi'             , 'searchable' => FALSE),
						array('db' => 'pub_keterangan'            , 'alias' => 'pub_keterangan'            , 'searchable' => TRUE),
						array('db' => 'pub_tanggal_mulai'         , 'alias' => 'pub_tanggal_mulai'         , 'searchable' => FALSE),
						array('db' => 'pub_tanggal_selesai'       , 'alias' => 'pub_tanggal_selesai'       , 'searchable' => FALSE),
						array('db' => 'pub_url_unduh'             , 'alias' => 'pub_url_unduh'             , 'searchable' => FALSE),
						array('db' => 'pub_duplicate'             , 'alias' => 'pub_duplicate'             , 'searchable' => FALSE),
						array('db' => 'pub_citation'            , 'alias' => 'pub_citation'            , 'searchable' => FALSE),
						array('db' => 'pub_created_at'            , 'alias' => 'pub_created_at'            , 'searchable' => FALSE),
						array('db' => 'pub_updated_at'            , 'alias' => 'pub_updated_at'            , 'searchable' => FALSE),
						array('db' => 'pub_deleted_at'            , 'alias' => 'pub_deleted_at'            , 'searchable' => FALSE),
						array('db' => 'pub_status_tarik'            , 'alias' => 'pub_status_tarik'            , 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where);
	}
}