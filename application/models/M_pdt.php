<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table tran_publikasi_dosen_tetap
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_pdt extends MY_Model {
	protected $pk_col = 'kode';
	protected $table_name = 'tran_publikasi_dosen_tetap';
	protected $db_pdt;
	private $_debug = FALSE;

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
		
		$this->db_pdt->select('p1.kode');
		$this->db_pdt->select('p1.kode_kegiatan_publikasi');
		$this->db_pdt->select('p1.kode_publikasi');
		$this->db_pdt->select('p1.kode_jenis_peneliti');
		$this->db_pdt->select('p1.kode_media_publikasi');
		$this->db_pdt->select('p1.kode_pelaksanaan_penelitian');
		$this->db_pdt->select('p1.kode_jenis_pembiayaan');
		$this->db_pdt->select('p1.kode_status_validasi');
		$this->db_pdt->select('p1.kode_periode_pelaporan');
		$this->db_pdt->select('p1.kode_pegawai');
		$this->db_pdt->select('p1.jumlah_pembiayaan');
		$this->db_pdt->select('p1.tahun');
		$this->db_pdt->select('p1.bulan');
		$this->db_pdt->select('p1.judul');
		$this->db_pdt->select('p1.kata_kunci');
		$this->db_pdt->select('p1.total_waktu');
		$this->db_pdt->select('p1.lokasi');
		$this->db_pdt->select('p1.abstraksi');
		$this->db_pdt->select('p1.pengarang');
		$this->db_pdt->select('p1.keterangan');
		$this->db_pdt->select('p1.tanggal_mulai');
		$this->db_pdt->select('p1.tanggal_selesai');
		$this->db_pdt->select('p1.duplicate');
		$this->db_pdt->select('p1.created_at');
		$this->db_pdt->select('p1.updated_at');
		$this->db_pdt->select('p1.deleted_at');
		$this->db_pdt->select('p1.status_clean');
		$this->db_pdt->select('p1.id_duplicate');
		$this->db_pdt->select('p1.similaritas');
		$this->db_pdt->select('p2.judul as judul_duplicate');

		$this->db_pdt->from('tran_publikasi_dosen_tetap p1');
		$this->db_pdt->join('tran_publikasi_dosen_tetap p2', 'p1.id_duplicate = p2.kode');

	}
	public function from(){
		$this->db_pdt->select('tran_publikasi_dosen_tetap.kode as kode');
		$this->db_pdt->select('kode_kegiatan_publikasi');
		$this->db_pdt->select('kode_jenis_peneliti');
		$this->db_pdt->select('kode_media_publikasi');
		$this->db_pdt->select('kode_pelaksanaan_penelitian');
		$this->db_pdt->select('kode_jenis_pembiayaan');
		$this->db_pdt->select('tran_publikasi_dosen_tetap.kode_status_validasi as kode_status_validasi');
		$this->db_pdt->select('tran_publikasi_dosen_tetap.kode_periode_pelaporan as kode_periode_pelaporan');
		$this->db_pdt->select('tran_publikasi_dosen_tetap.kode_pegawai as kode_pegawai');
		$this->db_pdt->select('jumlah_pembiayaan');
		$this->db_pdt->select('tahun');
		$this->db_pdt->select('bulan');
		$this->db_pdt->select('judul');
		$this->db_pdt->select('kata_kunci');
		$this->db_pdt->select('total_waktu');
		$this->db_pdt->select('lokasi');
		$this->db_pdt->select('abstraksi');
		$this->db_pdt->select('pengarang');
		$this->db_pdt->select('keterangan');
		$this->db_pdt->select('tanggal_mulai');
		$this->db_pdt->select('tanggal_selesai');
		$this->db_pdt->select('duplicate');
		$this->db_pdt->select('id_duplicate');
		$this->db_pdt->select('status_clean');

		$this->db_pdt->select('kode_jurusan');
		$this->db_pdt->select('tran_anggota_penelitian_dosen.kode_pegawai as kode_anggota_pegawai');

		$this->db_pdt->from('tran_publikasi_dosen_tetap');
        $this->db_pdt->join('tran_anggota_penelitian_dosen', 'tran_publikasi_dosen_tetap.kode = kode_publikasi_dosen_tetap', 'left');
        $this->db_pdt->join('tmst_pegawai', 'tmst_pegawai.kode = tran_anggota_penelitian_dosen.kode_pegawai', 'left');
	}

	function get_data_full($where="", $order="", $limit=NULL, $offset=NULL, $escape=NULL){
		//select, this function implemented by specified file used this model
		$this->from();
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
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel tran_publikasi_dosen_tetap
	* @param type $kode_kegiatan_publikasi           adalah field untuk kolom kode_kegiatan_publikasi          , default = FALSE
	* @param type $kode_publikasi                   adalah field untuk kolom kode_publikasi                  , default = FALSE
	* @param type $kode_jenis_peneliti         adalah field untuk kolom kode_jenis_peneliti        , default = FALSE
	* @param type $kode_media_publikasi        adalah field untuk kolom kode_media_publikasi       , default = FALSE
	* @param type $kode_pelaksanaan_penelitian adalah field untuk kolom kode_pelaksanaan_penelitian, default = FALSE
	* @param type $kode_jenis_pembiayaan       adalah field untuk kolom kode_jenis_pembiayaan      , default = FALSE
	* @param type $kode_status_validasi        adalah field untuk kolom kode_status_validasi       , default = FALSE
	* @param type $kode_periode_pelaporan      adalah field untuk kolom kode_periode_pelaporan     , default = FALSE
	* @param type $kode_pegawai           adalah field untuk kolom kode_pegawai          , default = FALSE
	* @param type $jumlah_pembiayaan      adalah field untuk kolom jumlah_pembiayaan     , default = FALSE
	* @param type $tahun                  adalah field untuk kolom tahun                 , default = FALSE
	* @param type $bulan                  adalah field untuk kolom bulan                 , default = FALSE
	* @param type $judul                  adalah field untuk kolom judul                 , default = FALSE
	* @param type $kata_kunci             adalah field untuk kolom kata_kunci            , default = FALSE
	* @param type $total_waktu            adalah field untuk kolom total_waktu           , default = FALSE
	* @param type $lokasi                 adalah field untuk kolom lokasi                , default = FALSE
	* @param type $abstraksi              adalah field untuk kolom abstraksi             , default = FALSE
	* @param type $pengarang              adalah field untuk kolom pengarang             , default = FALSE
	* @param type $keterangan             adalah field untuk kolom keterangan            , default = FALSE
	* @param type $tanggal_mulai          adalah field untuk kolom tanggal_mulai         , default = FALSE
	* @param type $tanggal_selesai        adalah field untuk kolom tanggal_selesai       , default = FALSE
	* @param type $pub_url_unduh              adalah field untuk kolom pub_url_unduh             , default = FALSE
	* @param type $duplicate              adalah field untuk kolom duplicate             , default = FALSE
	* @param type $pub_citation             adalah field untuk kolom pub_citation            , default = FALSE
	* @param type $created_at             adalah field untuk kolom created_at            , default = FALSE
	* @param type $updated_at             adalah field untuk kolom updated_at            , default = FALSE
	* @param type $deleted_at             adalah field untuk kolom deleted_at            , default = FALSE
	*/
	public function insert($kode_kegiatan_publikasi=FALSE,
					$tahun=FALSE,
					$bulan=FALSE,
					$judul=FALSE,
					$kata_kunci=FALSE,
					$total_waktu=FALSE,
					$lokasi=FALSE,
					$abstraksi=FALSE,
					$pengarang=FALSE,
					$keterangan=FALSE,
					$tanggal_mulai=FALSE,
					$tanggal_selesai=FALSE,
					$created_at=FALSE,
					$updated_at=FALSE,
					$deleted_at=FALSE){
		$data = array();
        if($kode_kegiatan_publikasi          !== FALSE)$data['kode_kegiatan_publikasi']          =($kode_kegiatan_publikasi == '' ? NULL : $kode_kegiatan_publikasi);
        if($tahun                 !== FALSE)$data['tahun']                 =($tahun == '' ? NULL : intval($tahun));
        if($bulan                 !== FALSE)$data['bulan']                 =($bulan == '' ? NULL : $bulan);
        if($judul                 !== FALSE)$data['judul']                 =($judul == '' ? NULL : trim($judul));
        if($kata_kunci            !== FALSE)$data['kata_kunci']            =($kata_kunci == '' ? NULL : trim($kata_kunci));
        if($total_waktu           !== FALSE)$data['total_waktu']           =($total_waktu == '' ? NULL : $total_waktu);
        if($lokasi                !== FALSE)$data['lokasi']                =($lokasi == '' ? NULL : trim($lokasi));
        if($abstraksi             !== FALSE)$data['abstraksi']             =($abstraksi == '' ? NULL : trim($abstraksi));
        if($pengarang             !== FALSE)$data['pengarang']             =($pengarang == '' ? NULL : trim($pengarang));
        if($keterangan            !== FALSE)$data['keterangan']            =($keterangan == '' ? NULL : trim($keterangan));
        if($tanggal_mulai         !== FALSE)$data['tanggal_mulai']         =($tanggal_mulai == '' ? NULL : $tanggal_mulai);
        if($tanggal_selesai       !== FALSE)$data['tanggal_selesai']       =($tanggal_selesai == '' ? NULL : $tanggal_selesai);
        if($created_at            !== FALSE)$data['created_at']            =$created_at;
        if($updated_at            !== FALSE)$data['updated_at']            =$updated_at;
        if($deleted_at            !== FALSE)$data['deleted_at']            =$deleted_at;
		$this->db_pdt->insert('tran_publikasi_dosen_tetap', $data);
		return $this->db_pdt->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel tran_publikasi_dosen_tetap
	* @param type $kode                     adalah field untuk kolom kode                    , default = FALSE
	* @param type $kode_kegiatan_publikasi           adalah field untuk kolom kode_kegiatan_publikasi          , default = FALSE
	* @param type $kode_publikasi                   adalah field untuk kolom kode_publikasi                  , default = FALSE
	* @param type $kode_jenis_peneliti         adalah field untuk kolom kode_jenis_peneliti        , default = FALSE
	* @param type $kode_media_publikasi        adalah field untuk kolom kode_media_publikasi       , default = FALSE
	* @param type $kode_pelaksanaan_penelitian adalah field untuk kolom kode_pelaksanaan_penelitian, default = FALSE
	* @param type $kode_jenis_pembiayaan       adalah field untuk kolom kode_jenis_pembiayaan      , default = FALSE
	* @param type $kode_status_validasi        adalah field untuk kolom kode_status_validasi       , default = FALSE
	* @param type $kode_periode_pelaporan      adalah field untuk kolom kode_periode_pelaporan     , default = FALSE
	* @param type $kode_pegawai           adalah field untuk kolom kode_pegawai          , default = FALSE
	* @param type $jumlah_pembiayaan      adalah field untuk kolom jumlah_pembiayaan     , default = FALSE
	* @param type $tahun                  adalah field untuk kolom tahun                 , default = FALSE
	* @param type $bulan                  adalah field untuk kolom bulan                 , default = FALSE
	* @param type $judul                  adalah field untuk kolom judul                 , default = FALSE
	* @param type $kata_kunci             adalah field untuk kolom kata_kunci            , default = FALSE
	* @param type $total_waktu            adalah field untuk kolom total_waktu           , default = FALSE
	* @param type $lokasi                 adalah field untuk kolom lokasi                , default = FALSE
	* @param type $abstraksi              adalah field untuk kolom abstraksi             , default = FALSE
	* @param type $pengarang              adalah field untuk kolom pengarang             , default = FALSE
	* @param type $keterangan             adalah field untuk kolom keterangan            , default = FALSE
	* @param type $tanggal_mulai          adalah field untuk kolom tanggal_mulai         , default = FALSE
	* @param type $tanggal_selesai        adalah field untuk kolom tanggal_selesai       , default = FALSE
	* @param type $pub_url_unduh              adalah field untuk kolom pub_url_unduh             , default = FALSE
	* @param type $duplicate              adalah field untuk kolom duplicate             , default = FALSE
	* @param type $pub_citation             adalah field untuk kolom pub_citation            , default = FALSE
	* @param type $created_at             adalah field untuk kolom created_at            , default = FALSE
	* @param type $updated_at             adalah field untuk kolom updated_at            , default = FALSE
	* @param type $deleted_at             adalah field untuk kolom deleted_at            , default = FALSE
	*/
	public function update($kode=FALSE,
					$kode_kegiatan_publikasi=FALSE,
					$tahun=FALSE,
					$bulan=FALSE,
					$judul=FALSE,
					$kata_kunci=FALSE,
					$total_waktu=FALSE,
					$lokasi=FALSE,
					$abstraksi=FALSE,
					$pengarang=FALSE,
					$keterangan=FALSE,
					$tanggal_mulai=FALSE,
					$tanggal_selesai=FALSE,
					$created_at=FALSE,
					$updated_at=FALSE,
					$deleted_at=FALSE){
		$data = array();
         if($kode_kegiatan_publikasi          !== FALSE)$data['kode_kegiatan_publikasi']          =($kode_kegiatan_publikasi == '' ? NULL : $kode_kegiatan_publikasi);
        if($tahun                 !== FALSE)$data['tahun']                 =($tahun == '' ? NULL : intval($tahun));
        if($bulan                 !== FALSE)$data['bulan']                 =($bulan == '' ? NULL : $bulan);
        if($judul                 !== FALSE)$data['judul']                 =($judul == '' ? NULL : trim($judul));
        if($kata_kunci            !== FALSE)$data['kata_kunci']            =($kata_kunci == '' ? NULL : trim($kata_kunci));
        if($total_waktu           !== FALSE)$data['total_waktu']           =($total_waktu == '' ? NULL : $total_waktu);
        if($lokasi                !== FALSE)$data['lokasi']                =($lokasi == '' ? NULL : trim($lokasi));
        if($abstraksi             !== FALSE)$data['abstraksi']             =($abstraksi == '' ? NULL : trim($abstraksi));
        if($pengarang             !== FALSE)$data['pengarang']             =($pengarang == '' ? NULL : trim($pengarang));
        if($keterangan            !== FALSE)$data['keterangan']            =($keterangan == '' ? NULL : trim($keterangan));
        if($tanggal_mulai         !== FALSE)$data['tanggal_mulai']         =($tanggal_mulai == '' ? NULL : $tanggal_mulai);
        if($tanggal_selesai       !== FALSE)$data['tanggal_selesai']       =($tanggal_selesai == '' ? NULL : $tanggal_selesai);
        if($created_at            !== FALSE)$data['created_at']            =$created_at;
        if($updated_at            !== FALSE)$data['updated_at']            =$updated_at;
        if($deleted_at            !== FALSE)$data['deleted_at']            =$deleted_at;
		return $this->db_pdt->update('tran_publikasi_dosen_tetap', $data, "kode = '$kode'");
	}
	public function set_duplicate( $kode = false, $duplicate = false, $similaritas = false){
		$data = array();
		if($duplicate !== FALSE) $data['id_duplicate']             =($duplicate == '' ? NULL : $duplicate);
		if($similaritas !== FALSE) $data['similaritas']             =($similaritas == 0 ? NULL : $similaritas);
		return $this->db_pdt->update('tran_publikasi_dosen_tetap', $data, "kode = '$kode'");
	}
	public function merge($publikasi1 = false, $publikasi2 = false){
		if($publikasi1 && $publikasi2){
			$data['kode_kegiatan_publikasi']    =($publikasi1->kode_kegiatan_publikasi == NULL ? $publikasi2->kode_kegiatan_publikasi : $publikasi1->kode_kegiatan_publikasi);
	        $data['kode_jenis_peneliti']        =($publikasi1->kode_jenis_peneliti == NULL ? $publikasi2->kode_jenis_peneliti : $publikasi1->kode_jenis_peneliti);
	        $data['kode_media_publikasi']       =($publikasi1->kode_media_publikasi == NULL ? $publikasi2->kode_media_publikasi : $publikasi1->kode_media_publikasi);
	        $data['kode_pelaksanaan_penelitian']=($publikasi1->kode_pelaksanaan_penelitian == NULL ? $publikasi2->kode_pelaksanaan_penelitian : $publikasi1->kode_pelaksanaan_penelitian);
	        $data['kode_jenis_pembiayaan']      =($publikasi1->kode_jenis_pembiayaan == NULL ? $publikasi2->kode_jenis_pembiayaan : $publikasi1->kode_jenis_pembiayaan);
	        $data['kode_status_validasi']       =($publikasi1->kode_status_validasi == NULL ? $publikasi2->kode_status_validasi : $publikasi1->kode_status_validasi);
	        $data['kode_periode_pelaporan']     =($publikasi1->kode_periode_pelaporan == NULL ? $publikasi2->kode_periode_pelaporan : $publikasi1->kode_periode_pelaporan);
	        $data['kode_pegawai']          =($publikasi1->kode_pegawai == NULL ? $publikasi2->kode_pegawai : $publikasi1->kode_pegawai);
	        $data['jumlah_pembiayaan']     =($publikasi1->jumlah_pembiayaan == NULL ? $publikasi2->jumlah_pembiayaan : $publikasi1->jumlah_pembiayaan);
	        $data['tahun']                 =($publikasi1->tahun == NULL ? $publikasi2->tahun : $publikasi1->tahun);
	        $data['bulan']                 =($publikasi1->bulan == NULL ? $publikasi2->bulan : $publikasi1->bulan);
	        $data['judul']                 =($publikasi1->judul == NULL ? $publikasi2->judul : $publikasi1->judul);
	        $data['kata_kunci']            =($publikasi1->kata_kunci == NULL ? $publikasi2->kata_kunci : $publikasi1->kata_kunci);
	        $data['total_waktu']           =($publikasi1->total_waktu == NULL ? $publikasi2->total_waktu : $publikasi1->total_waktu);
	        $data['lokasi']                =($publikasi1->lokasi == NULL ? $publikasi2->lokasi : $publikasi1->lokasi);
	        $data['abstraksi']             =($publikasi1->abstraksi == NULL ? $publikasi2->abstraksi : $publikasi1->abstraksi);
	        $data['pengarang']             =($publikasi1->pengarang == NULL ? $publikasi2->pengarang : $publikasi1->pengarang);
	        $data['keterangan']            =($publikasi1->keterangan == NULL ? $publikasi2->keterangan : $publikasi1->keterangan);
	        $data['tanggal_mulai']         =($publikasi1->tanggal_mulai == NULL ? $publikasi2->tanggal_mulai : $publikasi1->tanggal_mulai);
	        $data['tanggal_selesai']       =($publikasi1->tanggal_selesai == NULL ? $publikasi2->tanggal_selesai : $publikasi1->tanggal_selesai);
	        return $this->db_pdt->update('tran_publikasi_dosen_tetap', $data, "kode = '$publikasi1->kode'");
		}

	}
	public function merge_pelacakan($pdt = false, $pelacakan = false){
		if($pdt && $pelacakan){
	        if($pdt->tahun                 == NULL) $data['tahun']                 = $pelacakan->pub_tahun;
	        if($pdt->bulan                 == NULL) $data['bulan']                 = $pelacakan->pub_bulan;
	        if($pdt->judul                 == NULL) $data['judul']                 = $pelacakan->pub_judul;
	        if($pdt->lokasi                = NULL) $data['lokasi']                 = $pelacakan->pub_lokasi;
	        if($pdt->abstraksi             == NULL) $data['abstraksi']             = $pelacakan->pub_abstraksi;
	        if($pdt->pengarang             == NULL) $data['pengarang']             = $pelacakan->pub_pengarang;
	        if($pdt->keterangan            == NULL) $data['keterangan']            = $pelacakan->pub_keterangan;
	        if($pdt->tanggal_mulai         == NULL) $data['tanggal_mulai']         = $pelacakan->pub_tanggal_mulai;
	        if($pdt->tanggal_selesai       == NULL) $data['tanggal_selesai']       = $pelacakan->pub_tanggal_selesai;
		}

	}

	public function set_clean($kode = false, $status = false){
		$data = array();
		if($status !== FALSE) $data['status_clean']             =($status == '' ? NULL : $status);
		return $this->db_pdt->update('tran_publikasi_dosen_tetap', $data, "kode = '$kode'");
	}
	public function set_sinkron($kode = false, $status = false){
		$data = array();
		if($status !== FALSE) $data['status_sinkron']             =($status == '' ? NULL : $status);
		return $this->db_pdt->update('tran_publikasi_dosen_tetap', $data, "kode = '$kode'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'p1.kode'        , 'alias' => 'kode'        , 'searchable' => FALSE),
						array('db' => 'judul'                 , 'alias' => 'judul'                 , 'searchable' => TRUE),
						array('db' => 'pengarang'             , 'alias' => 'pengarang'             , 'searchable' => TRUE),
						array('db' => 'tahun'   , 'alias' => 'tahun'   , 'searchable' => FALSE),
						array('db' => 'judul_duplicate' , 'alias' => 'judul_duplicate' , 'searchable' => TRUE),
						array('db' => 'similaritas'      , 'alias' => 'similaritas'      , 'searchable' => TRUE),
						array('db' => 'status_clean', 'alias' => 'status_clean', 'searchable' => FALSE),
		);
		$this->parse_datatable($cols, $where);
	}


	function count_total($where="", $escape=NULL, $selectcolumn=TRUE, $groupby=NULL){
		//select column, this function implemented by specified file used this model
		if ($selectcolumn==0)
			$this->select();
		else if ($selectcolumn==1)
			$this->from(false);
		else if ($selectcolumn==2)
			$this->fromucup();
		//check if where is empty or null, if not, we used where syntax
		if(!empty_or_null($where)) $this->db_pdt->where($where, NULL, $escape);
		//return number of data
		if (isset($groupby)) {
			$this->db_pdt->select("COUNT(*) AS numrows", false);
			$test = $this->db_pdt->get();
			return count($test->result());
		}
		else
			return $this->db_pdt->count_all_results();
	}

	/*
	 * this function used for custom query
	 * because the creator of this class always forget syntax for custom query
	 * then it will be added in this file
	 * @param query = custom query
	 * @output = array of object
	 */
	function custom_query($query){
		$query_result = $this->db_pdt->query($query);
		return $query_result->result();
	}

	/*
	 * this function used by parse_datatable function
	 * in this version, get moved from specific model file to base model file
	 * so all model extend this base model will have this function
	 * @param where = where query
	 * @param order = order query
	 * @param limit = number of data return by this function, type integer
	 * @param offset = number of first data ignored by this function
	 * @param escape = enable or disable escape query on order_by and where by codeigniter, default null, by system it mean TRUE
	 * @output = array of object, data selected
	 */
	function get($where="", $order="", $limit=NULL, $offset=NULL, $escape=NULL){
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

	/*
	 * this function is modified from get_by_column
	 * but you can filter by more than one column and can return more than 1 row, joined by and
	 * @param column_definition = parameter must [column column 1 => column value 1, column column 2 => column value 2, ...]
	 * @param num_return (default = 1) = number row returned by this function
	 * @param order_by (default = empty) = custom order by query
	 * @param escape = enable or disable escape query on order_by only by codeigniter, default null, by system it mean TRUE
	 * @output = array object
	 */
	function get_by_multiple_column($column_definition, $num_return=1, $order_by='', $escape=NULL){
		//check parameter definition
		if(!is_array($column_definition)) return array();

		foreach($column_definition as $column_name => $column_val){
			$this->db_pdt->where($column_name, $column_val);
		}
		$this->select();
		if(!empty_or_null($order_by)) $this->db_pdt->order_by($order_by, '', $escape);
		if($num_return > 0) $this->db_pdt->limit($num_return);
		$query = $this->db_pdt->get();
		$result = $query->result();

		if($num_return == 1)
			return count($result) == 0 ? NULL : $result[0];

		return $result;
	}

	/*
	 * this function replaced default get_by_id
	 * and increase scalability of replaced function
	 * this function can select by one column data and return only first data
	 * in previous version this function only select by primary key,
	 * so if we want select by another column we create identical function but different where query
	 * @param data = data used by where query
	 * @param column = column selected for where query, default is empty, if this param empty function will replace with pk
	 * @param num_return (default = 1) = number row returned by this function, 0 = return all row
	 * @param order_by (default = empty) = custom order by query
	 * @param escape = enable or disable escape query on order_by only by codeigniter, default null, by system it mean TRUE
	 * @output = null if empty, object if found
	 */
	function get_by_column($data, $column='', $num_return=1, $order_by='', $escape=NULL){
		if($column === '')
			$column = $this->pk_col;

		//if no data supplied, return null
		if(empty_or_null($data)) return NULL;

		//get data call other method
		return $this->get_by_multiple_column(array($column => $data), $num_return, $order_by, $escape);
	}

	/*
	 * this function used for masterdata framework
	 * @param cols = column defined in specific models
	 * @param where = additional where query from controller
	 * @output = json
	 */
	public function parse_datatable($cols, $where="", $selectcolumn=0, $groupby=NULL){
		$keyword = '';
		if(isset($_POST['search'])){
			$keyword = $this->db_pdt->escape_like_str($_POST['search']);
		}

		// 		select top {LIMIT HERE} * from (
		//       select *, ROW_NUMBER() over (order by {ORDER FIELD}) as r_n_n 
		//       from {YOUR TABLES} where {OTHER OPTIONAL FILTERS}
		// ) xx where r_n_n >={OFFSET HERE}
		$select_column = "SELECT ";
		$is_search = !empty_or_null($keyword);

		$where_query = '';
		$like_query = array();
		foreach($cols as $col){
			$this->db_pdt->select($col['db'] . (empty_or_null($col['alias']) ? '' : ' as ' . $col['alias']), FALSE);

			if($is_search && $col['searchable']){
				$like_query[] = $col['db']." like '%$keyword%'";
			}
		}
		if($is_search && count($like_query) > 0){
			$where_query = '(' . implode(' or ', $like_query) . ')';
		}

		if(!empty_or_null($where)){
			$where_query .= (empty_or_null($where_query) ? '' : ' and ' ) . $where;
		}

		/* order always contain 2 data, column, and direction */
		$order_by = '';
		$order_params = $_POST['order'];
		if(isset($order_params['column']) || isset($order_params['dir'])){
			$order_by = $cols[$order_params['column']]['db'] . ' ' . $order_params['dir'];
		}

		$limit = NULL;
		$offset = NULL;

		if(isset($_POST['length'])){
			$limit = intval($_POST['length']);
		}

		if(isset($_POST['start'])){
			$offset = intval($_POST['start']);
		}
		if (isset($groupby)) {
			$this->db_pdt->group_by($groupby);
			$record_total = $this->count_total($where_query, NULL, $selectcolumn, $groupby);
			//---
			foreach($cols as $col){
				$this->db_pdt->select($col['db'] . (empty_or_null($col['alias']) ? '' : ' as ' . $col['alias']), FALSE);

				if($is_search && $col['searchable']){
					$like_query[] = $col['db']." like '%$keyword%'";
				}
			}
			if($is_search && count($like_query) > 0){
				$where_query = '(' . implode(' or ', $like_query) . ')';
			}

			if(!empty_or_null($where)){
				$where_query .= (empty_or_null($where_query) ? '' : ' and ' ) . $where;
			}

			$order_by = '';
			$order_params = $_POST['order'];
			if(isset($order_params['column']) || isset($order_params['dir'])){
				$order_by = $cols[$order_params['column']]['db'] . ' ' . $order_params['dir'];
			}

			$limit = NULL;
			$offset = NULL;

			if(isset($_POST['length'])){
				$limit = intval($_POST['length']);
			}

			if(isset($_POST['start'])){
				$offset = intval($_POST['start']);
			}

			if (isset($groupby)) {
				$this->db_pdt->group_by($groupby);
			}
			//---
		}
		else
			$record_total = $this->count_total($where_query, NULL, $selectcolumn, $groupby);

		if($this->_debug) $query_used = array($this->db_pdt->last_query());

		//$query = $this->get($where_query, $order_by, $limit, $offset);
		if ($selectcolumn==0) {
			$this->select();	
		} else if ($selectcolumn==1) {
			$this->from();
		} else if ($selectcolumn==2) {
			$this->fromucup();
		}
		$this->db_pdt->select("ROW_NUMBER() over (order by $order_by) as r_n_n", FALSE);
		//check order, if not empty, use order syntax
		//if(!empty_or_null($order_by)) $this->db_pdt->order_by($order_by, '', NULL);
		if(!empty_or_null($where_query)) $this->db_pdt->where($where_query);
		
		$select_query = $this->db_pdt->get_compiled_select();
		$select_column = "select top $limit * from ( " . $select_query .
							" ) xx where r_n_n > $offset";
		$query = $this->custom_query($select_column);
		if($this->_debug) $query_used[] = $this->db_pdt->last_query();

		$record_filtered = $query == NULL ? 0 : count($query);

		$result = new stdClass();
		// $result->tes = $select_query;
		$result->draw = intval($_POST['draw']);
		$result->recordsTotal = $record_filtered;
		$result->recordsFiltered = $record_total;
		$result->data = array();
		if($this->_debug) $result->query = $query_used;

		foreach($query as $row){
			$new_row = array();
			foreach($cols as $col){
				$new_row[] = empty_or_null($col['db']) ? '' : $row->$col['alias'];
			}
			$result->data[] = $new_row;
		}

		$this->output->set_content_type('application/json');
		echo json_encode($result);
	}

	/*
	 * permanent delete data from table,
	 * this function equivalent with delete on previous generated model
	 * @param value = value of updated column
	 * @param column = updated column name, default is primary key column
	 * @output = delete result
	 */
	function permanent_delete($value, $column=''){
		//set default column ke primary key
		if(empty_or_null($column)) $column = $this->pk_col;
		//standard from previous function
		$this->db_pdt->where($column, $value);
		return $this->db_pdt->delete($this->table_name);
	}

	/*
	 * this function accept custom query for deleting row/s
	 * @param where = custom where query, query must be escaped
	 * @output = delete result
	 */
	function permanent_delete_custom($where){
		$this->db_pdt->where($where, NULL, FALSE);
		return $this->db_pdt->delete($this->table_name);
	}

	/*
	 * this function used for updating single column
	 * for example change status, deleted, or change password, etc
	 * @param change_column = updated column name
	 * @param change_value = value of updated column
	 * @param id_val = where column value of updated row
	 * @param id_col = where column name of updated row, default is primary key column
	 * @param is_custom_where = bool, if true then id_val must contain custom query
	 * @output = delete result
	 */
	function update_single_column($change_column, $change_value, $id_val, $id_col='', $is_custom_where = FALSE){
		return $this->update_multiple_column(array($change_column => $change_value), $id_val, $id_col, $is_custom_where);
	}

	/*
	 * this function used for updating more than one column
	 * for example change username and password
	 * usage : $this->update_multiple_column(array('col_name'=>'col_data'), '3', 'pk_col');
	 * @param column_data = updated column data, format array('col_name'=>'col_data', 'col_name2'=>'col_data2')
	 * @param id_val = where column value of updated row
	 * @param id_col = where column name of updated row, default is primary key column
	 * @param is_custom_where = bool, if true then id_val must contain custom query
	 */
	function update_multiple_column($column_data, $id_val, $id_col='', $is_custom_where = FALSE){
		if(empty_or_null($id_col)) $id_col = $this->pk_col;
		return $this->db_pdt->update($this->table_name, $column_data, $is_custom_where ? $id_val : "$id_col = '$id_val'");
	}

	/*
	 * this function used for updating more than one column, value of updated column can be function, ex : increment
	 * for example change username and password
	 * usage : $this->update_with_function(array(array('col_name','col_name+1',FALSE)), '3', 'pk_col');
	 * @param column_data = updated column data, format array(('col_name','col_data',TRUE), ('col_name 2','col_data 2',FALSE))
	 * @param id_val = where column value of updated row
	 * @param id_col = where column name of updated row, default is primary key column
	 * @param is_custom_where = bool, if true then id_val must contain custom query
	 */
	function update_with_function($column_data, $id_val, $id_col='', $is_custom_where = FALSE){
		if(empty_or_null($id_col)) $id_col = $this->pk_col;
		foreach($column_data as $update_data){
			$this->db_pdt->set($update_data[0], $update_data[1], $update_data[2]);
		}
		$this->db_pdt->where($is_custom_where ? $id_val : "$id_col = '$id_val'");
		return $this->db_pdt->update($this->table_name);
	}

}