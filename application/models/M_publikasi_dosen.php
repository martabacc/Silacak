<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table publikasi_dosen
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_publikasi_dosen extends MY_Model {
	protected $pk_col = 'pub_id';
	protected $table_name = 'publikasi_dosen';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_publikasi_dosen->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_publikasi_dosen->get_by_column($pk);
	 * or $this->m_publikasi_dosen->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_publikasi_dosen->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_publikasi_dosen->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_publikasi_dosen->permanent_delete($pk);
	 * or you can call with $this->m_publikasi_dosen->permanent_delete($pk, 'other_column');
	 */

	public function select(){
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
		$this->db->select('CONVERT(date, pub_tanggal_mulai) as pub_tanggal_mulai', FALSE);;
		$this->db->select('CONVERT(date, pub_tanggal_selesai) as pub_tanggal_selesai', FALSE);;
		$this->db->select('pub_url_unduh');
		$this->db->select('pub_duplicate');
		$this->db->select('pub_citation');
		$this->db->select('CONVERT(date, pub_created_at) as pub_created_at', FALSE);
		$this->db->select('CONVERT(date, pub_updated_at) as pub_updated_at', FALSE);;
		$this->db->select('CONVERT(date, pub_deleted_at) as pub_deleted_at', FALSE);;
		$this->db->select('pub_status_tarik');

		$this->db->select('dkp_kode');
		$this->db->select('dkp_keterangan');

		$this->db->from('publikasi_dosen');
        $this->db->join('detil_kode_publikasi', 'pub_detilkodepub = dkp_id', 'left');
	}

	public function from($group = TRUE){

		$this->db->from('publikasi_dosen');
        $this->db->join('detil_kode_publikasi', 'pub_detilkodepub = dkp_id', 'left');
        $this->db->join('anggota', 'pub_id = ang_publikasi', 'left');
        $this->db->join('pegawai', 'peg_id = ang_pegawai', 'left');
        $this->db->join('fakultas', 'peg_fakultas = fak_id', 'left');
        $this->db->join('jurusan', 'peg_jurusan = jur_id', 'left');
	}

	function selectfrom()
	{
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
		$this->db->select('CONVERT(date, pub_tanggal_mulai) as pub_tanggal_mulai', FALSE);;
		$this->db->select('CONVERT(date, pub_tanggal_selesai) as pub_tanggal_selesai', FALSE);;
		$this->db->select('pub_url_unduh');
		$this->db->select('pub_duplicate');
		$this->db->select('pub_citation');
		$this->db->select('CONVERT(date, pub_created_at) as pub_created_at', FALSE);
		$this->db->select('CONVERT(date, pub_updated_at) as pub_updated_at', FALSE);;
		$this->db->select('CONVERT(date, pub_deleted_at) as pub_deleted_at', FALSE);;
		$this->db->select('pub_status_tarik');

		$this->db->select('ang_id');
		$this->db->select('ang_pegawai');
		$this->db->select('ang_publikasi');
		$this->db->select('ang_sebagai');

		$this->db->select('dkp_kode');
		$this->db->select('dkp_keterangan');

		$this->db->select('peg_jurusan');

		$this->db->from('publikasi_dosen');
        $this->db->join('detil_kode_publikasi', 'pub_detilkodepub = dkp_id', 'left');
        $this->db->join('anggota', 'pub_id = ang_publikasi', 'left');
        $this->db->join('pegawai', 'peg_id = ang_pegawai', 'left');
	}

	function get_data_full($where="", $order="", $limit=NULL, $offset=NULL, $escape=NULL){
		//select, this function implemented by specified file used this model
		$this->selectfrom();
		//check order, if not empty, use order syntax
		if(!empty_or_null($order)) $this->db->order_by($order, '', $escape);

		//check and enable limit query
		if(!empty_or_null($limit) && !empty_or_null($offset)) $this->db->limit($limit, $offset);
		else if(!empty_or_null($limit)) $this->db->limit($limit);

		//check and enable where query
		if(!empty_or_null($where)) $this->db->where($where, NULL, $escape);

		//get data and return it
		$query = $this->db->get();
		return $query->result();
	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel publikasi_dosen
	* @param type $pub_detilkodepub           adalah field untuk kolom pub_detilkodepub          , default = FALSE
	* @param type $pub_kode                   adalah field untuk kolom pub_kode                  , default = FALSE
	* @param type $pub_url_scholar          adalah field untuk kolom pub_url_scholar         , default = FALSE
	* @param type $pub_jenis_peneliti         adalah field untuk kolom pub_jenis_peneliti        , default = FALSE
	* @param type $pub_media_publikasi        adalah field untuk kolom pub_media_publikasi       , default = FALSE
	* @param type $pub_pelaksanaan_penelitian adalah field untuk kolom pub_pelaksanaan_penelitian, default = FALSE
	* @param type $pub_jenis_pembiayaan       adalah field untuk kolom pub_jenis_pembiayaan      , default = FALSE
	* @param type $pub_status_validasi        adalah field untuk kolom pub_status_validasi       , default = FALSE
	* @param type $pub_periode_pelaporan      adalah field untuk kolom pub_periode_pelaporan     , default = FALSE
	* @param type $pub_kode_pegawai           adalah field untuk kolom pub_kode_pegawai          , default = FALSE
	* @param type $pub_jumlah_pembiayaan      adalah field untuk kolom pub_jumlah_pembiayaan     , default = FALSE
	* @param type $pub_tahun                  adalah field untuk kolom pub_tahun                 , default = FALSE
	* @param type $pub_bulan                  adalah field untuk kolom pub_bulan                 , default = FALSE
	* @param type $pub_judul                  adalah field untuk kolom pub_judul                 , default = FALSE
	* @param type $pub_kata_kunci             adalah field untuk kolom pub_kata_kunci            , default = FALSE
	* @param type $pub_total_waktu            adalah field untuk kolom pub_total_waktu           , default = FALSE
	* @param type $pub_lokasi                 adalah field untuk kolom pub_lokasi                , default = FALSE
	* @param type $pub_abstraksi              adalah field untuk kolom pub_abstraksi             , default = FALSE
	* @param type $pub_pengarang              adalah field untuk kolom pub_pengarang             , default = FALSE
	* @param type $pub_keterangan             adalah field untuk kolom pub_keterangan            , default = FALSE
	* @param type $pub_tanggal_mulai          adalah field untuk kolom pub_tanggal_mulai         , default = FALSE
	* @param type $pub_tanggal_selesai        adalah field untuk kolom pub_tanggal_selesai       , default = FALSE
	* @param type $pub_url_unduh              adalah field untuk kolom pub_url_unduh             , default = FALSE
	* @param type $pub_duplicate              adalah field untuk kolom pub_duplicate             , default = FALSE
	* @param type $pub_citation             adalah field untuk kolom pub_citation            , default = FALSE
	* @param type $pub_created_at             adalah field untuk kolom pub_created_at            , default = FALSE
	* @param type $pub_updated_at             adalah field untuk kolom pub_updated_at            , default = FALSE
	* @param type $pub_deleted_at             adalah field untuk kolom pub_deleted_at            , default = FALSE
	*/
	public function insert($pub_detilkodepub=FALSE,
					$pub_kode=FALSE,
					$pub_url_scholar=FALSE,
					$pub_jenis_peneliti=FALSE,
					$pub_media_publikasi=FALSE,
					$pub_pelaksanaan_penelitian=FALSE,
					$pub_jenis_pembiayaan=FALSE,
					$pub_status_validasi=FALSE,
					$pub_periode_pelaporan=FALSE,
					$pub_kode_pegawai=FALSE,
					$pub_jumlah_pembiayaan=FALSE,
					$pub_tahun=FALSE,
					$pub_bulan=FALSE,
					$pub_judul=FALSE,
					$pub_kata_kunci=FALSE,
					$pub_total_waktu=FALSE,
					$pub_lokasi=FALSE,
					$pub_abstraksi=FALSE,
					$pub_pengarang=FALSE,
					$pub_volume=FALSE,
					$pub_halaman=FALSE,
					$pub_issue=FALSE,
					$pub_keterangan=FALSE,
					$pub_tanggal_mulai=FALSE,
					$pub_tanggal_selesai=FALSE,
					$pub_url_unduh=FALSE,
					$pub_duplicate=FALSE,
					$pub_citation=FALSE,
					$pub_created_at=FALSE,
					$pub_updated_at=FALSE,
					$pub_deleted_at=FALSE)
	{
		$data = array();
        if($pub_detilkodepub          !== FALSE)$data['pub_detilkodepub']          =($pub_detilkodepub == '' ? NULL : $pub_detilkodepub);
        if($pub_kode                  !== FALSE)$data['pub_kode']                  =($pub_kode == '' ? NULL : trim($pub_kode));
        if($pub_url_scholar         !== FALSE)$data['pub_url_scholar']         =($pub_url_scholar == '' ? NULL : trim($pub_url_scholar));
        if($pub_jenis_peneliti        !== FALSE)$data['pub_jenis_peneliti']        =($pub_jenis_peneliti == '' ? NULL : trim($pub_jenis_peneliti));
        if($pub_media_publikasi       !== FALSE)$data['pub_media_publikasi']       =($pub_media_publikasi == '' ? NULL : trim($pub_media_publikasi));
        if($pub_pelaksanaan_penelitian!== FALSE)$data['pub_pelaksanaan_penelitian']=($pub_pelaksanaan_penelitian == '' ? NULL : trim($pub_pelaksanaan_penelitian));
        if($pub_jenis_pembiayaan      !== FALSE)$data['pub_jenis_pembiayaan']      =($pub_jenis_pembiayaan == '' ? NULL : trim($pub_jenis_pembiayaan));
        if($pub_status_validasi       !== FALSE)$data['pub_status_validasi']       =($pub_status_validasi == '' ? NULL : $pub_status_validasi);
        if($pub_periode_pelaporan     !== FALSE)$data['pub_periode_pelaporan']     =($pub_periode_pelaporan == '' ? NULL : trim($pub_periode_pelaporan));
        if($pub_kode_pegawai          !== FALSE)$data['pub_kode_pegawai']          =($pub_kode_pegawai == '' ? NULL : trim($pub_kode_pegawai));
        if($pub_jumlah_pembiayaan     !== FALSE)$data['pub_jumlah_pembiayaan']     =($pub_jumlah_pembiayaan == '' ? NULL : $pub_jumlah_pembiayaan);
        if($pub_tahun                 !== FALSE)$data['pub_tahun']                 =($pub_tahun == '' ? NULL : intval($pub_tahun));
        if($pub_bulan                 !== FALSE)$data['pub_bulan']                 =($pub_bulan == '' ? NULL : $pub_bulan);
        if($pub_judul                 !== FALSE)$data['pub_judul']                 =($pub_judul == '' ? NULL : trim($pub_judul));
        if($pub_kata_kunci            !== FALSE)$data['pub_kata_kunci']            =($pub_kata_kunci == '' ? NULL : trim($pub_kata_kunci));
        if($pub_total_waktu           !== FALSE)$data['pub_total_waktu']           =($pub_total_waktu == '' ? NULL : $pub_total_waktu);
        if($pub_lokasi                !== FALSE)$data['pub_lokasi']                =($pub_lokasi == '' ? NULL : trim($pub_lokasi));
        if($pub_abstraksi             !== FALSE)$data['pub_abstraksi']             =($pub_abstraksi == '' ? NULL : trim($pub_abstraksi));
        if($pub_pengarang             !== FALSE)$data['pub_pengarang']             =($pub_pengarang == '' ? NULL : trim($pub_pengarang));
        if($pub_volume           		!== FALSE)$data['pub_volume']             	=($pub_volume == '' ? NULL : trim($pub_volume));
        if($pub_halaman             	!== FALSE)$data['pub_halaman']             	=($pub_halaman == '' ? NULL : trim($pub_halaman));
        if($pub_issue             		!== FALSE)$data['pub_issue']             	=($pub_issue == '' ? NULL : trim($pub_issue));
        if($pub_keterangan            !== FALSE)$data['pub_keterangan']            =($pub_keterangan == '' ? NULL : trim($pub_keterangan));
        if($pub_tanggal_mulai         !== FALSE)$data['pub_tanggal_mulai']         =($pub_tanggal_mulai == '' ? NULL : $pub_tanggal_mulai);
        if($pub_tanggal_selesai       !== FALSE)$data['pub_tanggal_selesai']       =($pub_tanggal_selesai == '' ? NULL : $pub_tanggal_selesai);
        if($pub_url_unduh             !== FALSE)$data['pub_url_unduh']             =($pub_url_unduh == '' ? NULL : trim($pub_url_unduh));
        if($pub_duplicate             !== FALSE)$data['pub_duplicate']             =($pub_duplicate == '' ? NULL : $pub_duplicate);
        if($pub_citation            !== FALSE)$data['pub_citation']            =($pub_citation == '' ? NULL : intval($pub_citation));
        if($pub_created_at            !== FALSE)$data['pub_created_at']            =$pub_created_at;
        if($pub_updated_at            !== FALSE)$data['pub_updated_at']            =$pub_updated_at;
        if($pub_deleted_at            !== FALSE)$data['pub_deleted_at']            =$pub_deleted_at;
		$this->db->insert('publikasi_dosen', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel publikasi_dosen
	* @param type $pub_id                     adalah field untuk kolom pub_id                    , default = FALSE
	* @param type $pub_detilkodepub           adalah field untuk kolom pub_detilkodepub          , default = FALSE
	* @param type $pub_kode                   adalah field untuk kolom pub_kode                  , default = FALSE
	* @param type $pub_url_scholar          adalah field untuk kolom pub_url_scholar         , default = FALSE
	* @param type $pub_jenis_peneliti         adalah field untuk kolom pub_jenis_peneliti        , default = FALSE
	* @param type $pub_media_publikasi        adalah field untuk kolom pub_media_publikasi       , default = FALSE
	* @param type $pub_pelaksanaan_penelitian adalah field untuk kolom pub_pelaksanaan_penelitian, default = FALSE
	* @param type $pub_jenis_pembiayaan       adalah field untuk kolom pub_jenis_pembiayaan      , default = FALSE
	* @param type $pub_status_validasi        adalah field untuk kolom pub_status_validasi       , default = FALSE
	* @param type $pub_periode_pelaporan      adalah field untuk kolom pub_periode_pelaporan     , default = FALSE
	* @param type $pub_kode_pegawai           adalah field untuk kolom pub_kode_pegawai          , default = FALSE
	* @param type $pub_jumlah_pembiayaan      adalah field untuk kolom pub_jumlah_pembiayaan     , default = FALSE
	* @param type $pub_tahun                  adalah field untuk kolom pub_tahun                 , default = FALSE
	* @param type $pub_bulan                  adalah field untuk kolom pub_bulan                 , default = FALSE
	* @param type $pub_judul                  adalah field untuk kolom pub_judul                 , default = FALSE
	* @param type $pub_kata_kunci             adalah field untuk kolom pub_kata_kunci            , default = FALSE
	* @param type $pub_total_waktu            adalah field untuk kolom pub_total_waktu           , default = FALSE
	* @param type $pub_lokasi                 adalah field untuk kolom pub_lokasi                , default = FALSE
	* @param type $pub_abstraksi              adalah field untuk kolom pub_abstraksi             , default = FALSE
	* @param type $pub_pengarang              adalah field untuk kolom pub_pengarang             , default = FALSE
	* @param type $pub_keterangan             adalah field untuk kolom pub_keterangan            , default = FALSE
	* @param type $pub_tanggal_mulai          adalah field untuk kolom pub_tanggal_mulai         , default = FALSE
	* @param type $pub_tanggal_selesai        adalah field untuk kolom pub_tanggal_selesai       , default = FALSE
	* @param type $pub_url_unduh              adalah field untuk kolom pub_url_unduh             , default = FALSE
	* @param type $pub_duplicate              adalah field untuk kolom pub_duplicate             , default = FALSE
	* @param type $pub_citation             adalah field untuk kolom pub_citation            , default = FALSE
	* @param type $pub_created_at             adalah field untuk kolom pub_created_at            , default = FALSE
	* @param type $pub_updated_at             adalah field untuk kolom pub_updated_at            , default = FALSE
	* @param type $pub_deleted_at             adalah field untuk kolom pub_deleted_at            , default = FALSE
	*/
	public function update($pub_id=FALSE,
					$pub_detilkodepub=FALSE,
					$pub_kode=FALSE,
					$pub_url_scholar=FALSE,
					$pub_jenis_peneliti=FALSE,
					$pub_media_publikasi=FALSE,
					$pub_pelaksanaan_penelitian=FALSE,
					$pub_jenis_pembiayaan=FALSE,
					$pub_status_validasi=FALSE,
					$pub_periode_pelaporan=FALSE,
					$pub_kode_pegawai=FALSE,
					$pub_jumlah_pembiayaan=FALSE,
					$pub_tahun=FALSE,
					$pub_bulan=FALSE,
					$pub_judul=FALSE,
					$pub_kata_kunci=FALSE,
					$pub_total_waktu=FALSE,
					$pub_lokasi=FALSE,
					$pub_abstraksi=FALSE,
					$pub_pengarang=FALSE,
					$pub_volume=FALSE,
					$pub_halaman=FALSE,
					$pub_issue=FALSE,
					$pub_keterangan=FALSE,
					$pub_tanggal_mulai=FALSE,
					$pub_tanggal_selesai=FALSE,
					$pub_url_unduh=FALSE,
					$pub_duplicate=FALSE,
					$pub_citation=FALSE,
					$pub_created_at=FALSE,
					$pub_updated_at=FALSE,
					$pub_deleted_at=FALSE)
	{
		$data = array();
        if($pub_detilkodepub          !== FALSE)$data['pub_detilkodepub']          =($pub_detilkodepub == '' ? NULL : $pub_detilkodepub);
        if($pub_kode                  !== FALSE)$data['pub_kode']                  =($pub_kode == '' ? NULL : trim($pub_kode));
        if($pub_url_scholar         !== FALSE)$data['pub_url_scholar']         =($pub_url_scholar == '' ? NULL : trim($pub_url_scholar));
        if($pub_jenis_peneliti        !== FALSE)$data['pub_jenis_peneliti']        =($pub_jenis_peneliti == '' ? NULL : trim($pub_jenis_peneliti));
        if($pub_media_publikasi       !== FALSE)$data['pub_media_publikasi']       =($pub_media_publikasi == '' ? NULL : trim($pub_media_publikasi));
        if($pub_pelaksanaan_penelitian!== FALSE)$data['pub_pelaksanaan_penelitian']=($pub_pelaksanaan_penelitian == '' ? NULL : trim($pub_pelaksanaan_penelitian));
        if($pub_jenis_pembiayaan      !== FALSE)$data['pub_jenis_pembiayaan']      =($pub_jenis_pembiayaan == '' ? NULL : trim($pub_jenis_pembiayaan));
        if($pub_status_validasi       !== FALSE)$data['pub_status_validasi']       =($pub_status_validasi == '' ? NULL : trim($pub_status_validasi));
        if($pub_periode_pelaporan     !== FALSE)$data['pub_periode_pelaporan']     =($pub_periode_pelaporan == '' ? NULL : trim($pub_periode_pelaporan));
        if($pub_kode_pegawai          !== FALSE)$data['pub_kode_pegawai']          =($pub_kode_pegawai == '' ? NULL : trim($pub_kode_pegawai));
        if($pub_jumlah_pembiayaan     !== FALSE)$data['pub_jumlah_pembiayaan']     =($pub_jumlah_pembiayaan == '' ? NULL : $pub_jumlah_pembiayaan);
        if($pub_tahun                 !== FALSE)$data['pub_tahun']                 =($pub_tahun == '' ? NULL : $pub_tahun);
        if($pub_bulan                 !== FALSE)$data['pub_bulan']                 =($pub_bulan == '' ? NULL : $pub_bulan);
        if($pub_judul                 !== FALSE)$data['pub_judul']                 =($pub_judul == '' ? NULL : trim($pub_judul));
        if($pub_kata_kunci            !== FALSE)$data['pub_kata_kunci']            =($pub_kata_kunci == '' ? NULL : trim($pub_kata_kunci));
        if($pub_total_waktu           !== FALSE)$data['pub_total_waktu']           =($pub_total_waktu == '' ? NULL : $pub_total_waktu);
        if($pub_lokasi                !== FALSE)$data['pub_lokasi']                =($pub_lokasi == '' ? NULL : trim($pub_lokasi));
        if($pub_abstraksi             !== FALSE)$data['pub_abstraksi']             =($pub_abstraksi == '' ? NULL : trim($pub_abstraksi));
        if($pub_pengarang             !== FALSE)$data['pub_pengarang']             =($pub_pengarang == '' ? NULL : trim($pub_pengarang));
        if($pub_volume           		!== FALSE)$data['pub_volume']             	=($pub_volume == '' ? NULL : trim($pub_volume));
        if($pub_halaman             	!== FALSE)$data['pub_halaman']             	=($pub_halaman == '' ? NULL : trim($pub_halaman));
        if($pub_issue             		!== FALSE)$data['pub_issue']             	=($pub_issue == '' ? NULL : trim($pub_issue));
        if($pub_keterangan            !== FALSE)$data['pub_keterangan']            =($pub_keterangan == '' ? NULL : trim($pub_keterangan));
        if($pub_tanggal_mulai         !== FALSE)$data['pub_tanggal_mulai']         =($pub_tanggal_mulai == '' ? NULL : $pub_tanggal_mulai);
        if($pub_tanggal_selesai       !== FALSE)$data['pub_tanggal_selesai']       =($pub_tanggal_selesai == '' ? NULL : $pub_tanggal_selesai);
        if($pub_url_unduh             !== FALSE)$data['pub_url_unduh']             =($pub_url_unduh == '' ? NULL : trim($pub_url_unduh));
        if($pub_duplicate             !== FALSE)$data['pub_duplicate']             =($pub_duplicate == '' ? NULL : $pub_duplicate);
        if($pub_citation            !== FALSE)$data['pub_citation']            =($pub_citation == '' ? NULL : intval($pub_citation));
        if($pub_created_at            !== FALSE)$data['pub_created_at']            =$pub_created_at;
        if($pub_updated_at            !== FALSE)$data['pub_updated_at']            =$pub_updated_at;
        if($pub_deleted_at            !== FALSE)$data['pub_deleted_at']            =$pub_deleted_at;
		return $this->db->update('publikasi_dosen', $data, "pub_id = '$pub_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($unfiltered=0, $where=''){
	
		$cols = array(
						array('db' => 'pub_id'                    , 'alias' => 'pub_id'                    , 'searchable' => FALSE),
						array('db' => 'dkp_kode'                  , 'alias' => 'dkp_kode'                  , 'searchable' => FALSE),
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
						array('db' => 'pub_judul'                 , 'alias' => 'pub_judul'                 , 'searchable' => TRUE),
						array('db' => 'pub_kata_kunci'            , 'alias' => 'pub_kata_kunci'            , 'searchable' => FALSE),
						array('db' => 'pub_total_waktu'           , 'alias' => 'pub_total_waktu'           , 'searchable' => FALSE),
						array('db' => 'pub_lokasi'                , 'alias' => 'pub_lokasi'                , 'searchable' => FALSE),
						array('db' => 'pub_abstraksi'             , 'alias' => 'pub_abstraksi'             , 'searchable' => FALSE),
						array('db' => 'pub_pengarang'             , 'alias' => 'pub_pengarang'             , 'searchable' => TRUE),
						array('db' => 'pub_keterangan'            , 'alias' => 'pub_keterangan'            , 'searchable' => TRUE),
						array('db' => 'pub_tanggal_mulai'         , 'alias' => 'pub_tanggal_mulai'         , 'searchable' => FALSE),
						array('db' => 'pub_tanggal_selesai'       , 'alias' => 'pub_tanggal_selesai'       , 'searchable' => FALSE),
						array('db' => 'pub_url_unduh'             , 'alias' => 'pub_url_unduh'             , 'searchable' => FALSE),
						array('db' => 'pub_duplicate'             , 'alias' => 'pub_duplicate'             , 'searchable' => FALSE),
						array('db' => 'pub_citation'            , 'alias' => 'pub_citation'            , 'searchable' => FALSE),
						array('db' => 'pub_created_at'            , 'alias' => 'pub_created_at'            , 'searchable' => FALSE),
						array('db' => 'pub_updated_at'            , 'alias' => 'pub_updated_at'            , 'searchable' => FALSE),
						array('db' => 'pub_deleted_at'            , 'alias' => 'pub_deleted_at'            , 'searchable' => FALSE),
						array('db' => 'dkp_keterangan'            , 'alias' => 'dkp_keterangan'            , 'searchable' => FALSE),
						array('db' => 'pub_status_tarik'            , 'alias' => 'pub_status_tarik'            , 'searchable' => FALSE)
		);
		parent::parse_datatable($cols, $where, $unfiltered);
	}

	public function report_by_unit($fakultas=false, $dkp_id=false, $tahun_awal=false, $tahun_akhir=false){
		
		if($fakultas != false){
			$this->db->select("peg_jurusan as kode, jur_nama_indonesia as unit", FALSE);

		}
		else{
			$this->db->select("peg_fakultas as kode, fak_nama_indonesia as unit", FALSE);
		}
		$this->db->select("COUNT(pub_id) as jumlah", FALSE);

		//$this->db->from($this->table_name);
		$this->db->from('(SELECT DISTINCT ROW_NUMBER() OVER (PARTITION BY pub_id ORDER BY pub_id) AS rownum, pub_id, peg_fakultas, fak_nama_indonesia, pub_detilkodepub, peg_jurusan, jur_nama_indonesia, (pub_tahun) FROM publikasi_dosen LEFT JOIN anggota ON ang_publikasi = pub_id LEFT JOIN pegawai ON ang_pegawai = peg_id LEFT JOIN fakultas ON fak_id = peg_fakultas LEFT JOIN jurusan ON jur_id = peg_jurusan) a');
		
		$this->db->where("rownum = 1");

		if($dkp_id!=false){
			$this->db->where("pub_detilkodepub = ".$dkp_id);
		}

		if($tahun_awal!=null && $tahun_awal!=-1){
			$this->db->where('pub_tahun >= ' . $tahun_awal);
		}
		if($tahun_awal!=null && $tahun_akhir!=-1){
			$this->db->where('pub_tahun <= ' . $tahun_akhir);
		}

		if($fakultas != false){
			$this->db->group_by(array("peg_jurusan","jur_nama_indonesia"));
			$this->db->order_by("peg_jurusan");
			$this->db->where("peg_fakultas = ".$fakultas);
		}
		else{
			$this->db->group_by(array("peg_fakultas","fak_nama_indonesia"));
			$this->db->order_by("peg_fakultas");
		}
		

		$query = $this->db->get();
		return $query->result();
	}


	
	public function report_by_keterangan($fakultas = 0, $jurusan = 0, $tahun = 0, $kode = 0) {

		$this->db->select("pub_keterangan as jurnal", FALSE);
		$this->db->select("COUNT(pub_judul) as jumlah", FALSE);

		$this->db->from('anggota');
        $this->db->join('pegawai', 'ang_pegawai = peg_id', 'left');
        $this->db->join('publikasi_dosen', 'ang_publikasi = pub_id', 'left');
        $this->db->join('jurusan', 'peg_jurusan = jur_id', 'left');
        $this->db->join('fakultas', 'peg_fakultas = fak_id', 'left');
        $this->db->join('detil_kode_publikasi', 'pub_detilkodepub = dkp_id', 'left');

        $this->db->where('pub_keterangan IS NOT NULL');
        $this->db->where('pub_detilkodepub = ' . $kode);
        $this->db->where('pub_status_tarik = 1');
        if ($fakultas != 0) {
        	$this->db->where('peg_fakultas = ' . $fakultas);
        }
        if ($jurusan != 0) {
        	$this->db->where('peg_jurusan = ' . $jurusan);
        }
        if ($tahun != 0) {
        	$this->db->where('YEAR(pub_created_at) = ' . $tahun);
        }

        $this->db->group_by("pub_keterangan");
        $this->db->order_by("jumlah desc");
        $this->db->order_by("pub_keterangan asc");

        $query = $this->db->get();
		return $query->result();
	}

	
	public function reportByPersonal($pegId) {

		$this->db->select("dkp_keterangan", FALSE);
		$this->db->select("count(*) as jumlah ", FALSE);

		$this->db->from('anggota');
        $this->db->join('pegawai', 'ang_pegawai = peg_id', 'left');
        $this->db->join('publikasi_dosen', 'ang_publikasi = pub_id', 'left');
        $this->db->join('detil_kode_publikasi', 'pub_detilkodepub = dkp_id', 'left');
        $this->db->where('peg_id = '. $pegId);

        $this->db->group_by("dkp_keterangan");

        $query = $this->db->get();
		return $query->result();
	}

	public function list_jurnal($fakultas = 0, $jurusan = 0, $minYear = 0, $maxYear = 0, $kode = 0, $pub_keterangan) {

		$this->db->select("publikasi_dosen.*", FALSE);
		// $this->db->select("COUNT(pub_judul) as jumlah", FALSE);

		$this->db->from('anggota');
        $this->db->join('pegawai', 'ang_pegawai = peg_id', 'left');
        $this->db->join('publikasi_dosen', 'ang_publikasi = pub_id', 'left');
        $this->db->join('jurusan', 'peg_jurusan = jur_id', 'left');
        $this->db->join('fakultas', 'peg_fakultas = fak_id', 'left');
        $this->db->join('detil_kode_publikasi', 'pub_detilkodepub = dkp_id', 'left');

        $this->db->where("pub_keterangan ='".$pub_keterangan."'");
        $this->db->where('pub_detilkodepub = ' . $kode);
        $this->db->where('pub_status_tarik = 1');
        if ($fakultas != 0) {
        	$this->db->where('peg_fakultas = ' . $fakultas);
        }
        if ($jurusan != 0) {
        	$this->db->where('peg_jurusan = ' . $jurusan);
        }
        if ($minYear != 0) {
        	$this->db->where('YEAR(pub_created_at) >= ' . $minYear);
        }
        if ($maxYear != 0) {
        	$this->db->where('YEAR(pub_created_at) <= ' . $maxYear);
        }

        // $this->db->group_by("pub_keterangan");
        $this->db->order_by("pub_judul asc");

        $query = $this->db->get();
		return json_encode($query->result());
	}

	public function update_status($pub_id = 0, $status = 0){
		$data = array();
        if($status !== FALSE)$data['pub_status_tarik'] = ($status == 0 ? 0 : $status);
		return $this->db->update('publikasi_dosen', $data, "pub_id = '$pub_id'");
	}

	public function set_sinkron($pub_id = 0, $pub_sinkron = 0){
		$data = array();
        if($pub_sinkron !== FALSE)$data['pub_sinkron'] = ($pub_sinkron == 0 ? 0 : $pub_sinkron);
		return $this->db->update('publikasi_dosen', $data, "pub_id = '$pub_id'");
	}

	public function reset_status(){
		$query = "UPDATE publikasi_dosen SET pub_status_tarik = 0";
		$data = array();
		$data['pub_status_tarik'] = 0;
		return $this->db->update('publikasi_dosen', $data);
	}

	public function get_by_pegawai($where="", $order="", $limit=NULL, $offset=NULL){
		$this->db->select('pub_id');

		$this->db->from('publikasi_dosen');
        $this->db->join('detil_kode_publikasi', 'pub_detilkodepub = dkp_id', 'left');
        $this->db->join('anggota', 'pub_id = ang_publikasi', 'left');

        if(!empty_or_null($order)) $this->db->order_by($order, '');

		//check and enable limit query
		if(!empty_or_null($limit) && !empty_or_null($offset)) $this->db->limit($limit, $offset);
		else if(!empty_or_null($limit)) $this->db->limit($limit);

		//check and enable where query
		if(!empty_or_null($where)) $this->db->where($where, NULL);

		//get data and return it
		$query = $this->db->get();
		return $query->result();
	}

	public function get_datatable_by_keterangan($fakultas = false, $jurusan = false, $tahun = false, $kode = false) {

		$where = 'pub_keterangan IS NOT NULL';

        if ($kode != false) {
        	$where .= ' AND pub_detilkodepub = ' . $kode;
        }
        else {

        	$where .= ' AND pub_detilkodepub = ' . KODE_JURNAL;
        }

        $where .= ' AND pub_status_tarik = 1 ';
        if ($fakultas != false) {
        	$where .= ' AND peg_fakultas = ' . $fakultas;
        }
        if ($jurusan != false) {
        	$where .= ' AND peg_jurusan = ' . $jurusan;
        }
        if ($tahun != false) {
        	$where .= ' AND YEAR(pub_created_at) = ' . $tahun;
        }
        if ($tahun != false) {
        	$where .= ' AND YEAR(pub_created_at) = ' . $tahun;
        }

		$cols = array(
						array('db' => 'pub_keterangan'                    , 'alias' => 'nomor'                    , 'searchable' => FALSE),
						array('db' => 'pub_keterangan'                    , 'alias' => 'jurnal'                    , 'searchable' => FALSE),
						array('db' => 'COUNT(pub_judul)'                  , 'alias' => 'jumlah'                  , 'searchable' => FALSE)
		);

		parent::parse_datatable($cols, $where, 1, array("pub_keterangan"));
	}

	public function get_max_pub_tahun()
	{
		$this->db->select('MAX(pub_tahun) as tahun');
		$this->db->from('publikasi_dosen');
		$query = $this->db->get();
		return $query->result();
	}

	public function report_by_tahun_publikasi($fakultas=false, $jurusan=false)
	{
		$year = $this->get_max_pub_tahun();
		$maxyear = $year[0]->tahun;
		$minyear = $maxyear - 10;

		$this->db->select("pub_tahun as year", FALSE);
		$this->db->select("COUNT(pub_id) as jumlah", FALSE);

		$this->db->from("anggota");

		$this->db->join("publikasi_dosen", "ang_publikasi = pub_id", "left");
		$this->db->join("pegawai", "ang_pegawai = peg_id", "left");
		$this->db->join("fakultas", "fak_id = peg_fakultas", "left");
		$this->db->join("jurusan", "jur_id = peg_jurusan", "left");

		if($jurusan != false){
			$this->db->where("peg_jurusan = ".$jurusan);
		}else if($fakultas != false){
			$this->db->where("peg_fakultas = ".$fakultas);
		}
		$this->db->where($minyear . " <= pub_tahun AND pub_tahun <= " . $maxyear);
		
		$this->db->group_by("pub_tahun");
		$this->db->order_by("pub_tahun desc");
		$query = $this->db->get();
		return $query->result();
	}
}