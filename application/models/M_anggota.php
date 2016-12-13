<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table anggota
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_anggota extends MY_Model {
	protected $pk_col = 'ang_id';
	protected $table_name = 'anggota';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_anggota->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_anggota->get_by_column($pk);
	 * or $this->m_anggota->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_anggota->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_anggota->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_anggota->permanent_delete($pk);
	 * or you can call with $this->m_anggota->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('ang_id');
		$this->db->select('ang_pegawai');
		$this->db->select('ang_publikasi');
		$this->db->select('ang_sebagai');

		$this->db->select('peg_id');
		$this->db->select('peg_fakultas');
		$this->db->select('peg_jurusan');
		$this->db->select('peg_program_studi');
		$this->db->select('peg_jenjang_pendidikan');
		$this->db->select('peg_satuan_kerja');
		$this->db->select('peg_ikatan_kerja_pegawai');
		$this->db->select('peg_status_aktivitas_pegawai');
		$this->db->select('peg_jenis_pegawai');
		$this->db->select('peg_jenis_dosen');
		$this->db->select('peg_pangkat_pns');
		$this->db->select('peg_jenis_kelamin');
		$this->db->select('peg_provinsi');
		$this->db->select('peg_kota');
		$this->db->select('peg_kode_validasi');
		$this->db->select('peg_log_audit');
		$this->db->select('peg_nip_baru');
		$this->db->select('peg_nip_lama');
		$this->db->select('peg_nidn');
		$this->db->select('peg_name');
		$this->db->select('peg_gelar_depan');
		$this->db->select('peg_gelar_belakang');
		$this->db->select('peg_alamat');
		$this->db->select('peg_telepon');
		$this->db->select('peg_handphone');
		$this->db->select('peg_email');
		$this->db->select('CONVERT(date, peg_tanggal_berhenti) as peg_tanggal_berhenti', FALSE);;
		$this->db->select('CONVERT(date, peg_tanggal_masuk) as peg_tanggal_masuk', FALSE);;
		$this->db->select('peg_is_dosen');
		$this->db->select('peg_google_schoolar');
		$this->db->select('peg_penelitian');
		$this->db->select('CONVERT(date, peg_created_at) as peg_created_at', FALSE);;
		$this->db->select('CONVERT(date, peg_updated_at) as peg_updated_at', FALSE);;
		$this->db->select('CONVERT(date, peg_deleted_at) as peg_deleted_at', FALSE);;
		$this->db->select('peg_status_tarik');

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
		$this->db->select('pub_keterangan');
		$this->db->select('CONVERT(date, pub_tanggal_mulai) as pub_tanggal_mulai', FALSE);;
		$this->db->select('CONVERT(date, pub_tanggal_selesai) as pub_tanggal_selesai', FALSE);;
		$this->db->select('pub_url_unduh');
		$this->db->select('pub_duplicate');
		$this->db->select('pub_citation');
		$this->db->select('CONVERT(date, pub_created_at) as pub_created_at', FALSE);;
		$this->db->select('CONVERT(date, pub_updated_at) as pub_updated_at', FALSE);;
		$this->db->select('CONVERT(date, pub_deleted_at) as pub_deleted_at', FALSE);;
		$this->db->select('pub_status_tarik');

		$this->db->select('jur_perguruan_tinggi');
		$this->db->select('jur_fakultas');
		$this->db->select('jur_status_validasi');
		$this->db->select('jur_log_audit');
		$this->db->select('jur_nama_indonesia');
		$this->db->select('jur_nama_inggris');
		$this->db->select('jur_dosen_kepala');
		$this->db->select('CONVERT(date, jur_created_at) as jur_created_at', FALSE);;
		$this->db->select('CONVERT(date, jur_updated_at) as jur_updated_at', FALSE);;
		$this->db->select('CONVERT(date, jur_deleted_at) as jur_deleted_at', FALSE);;
		$this->db->select('jur_periode_pelaporan');

		$this->db->select('fak_perguruan_tinggi');
		$this->db->select('fak_status_validasi');
		$this->db->select('fak_log_audit');
		$this->db->select('fak_singkatan');
		$this->db->select('fak_nama_indonesia');
		$this->db->select('fak_nama_inggris');
		$this->db->select('fak_dosen_kepala');
		$this->db->select('fak_tanggal_mulai_efektif');
		$this->db->select('fak_tanggal_akhir_efektif');
		$this->db->select('CONVERT(date, fak_deleted_at) as fak_deleted_at', FALSE);;
		$this->db->select('CONVERT(date, fak_created_at) as fak_created_at', FALSE);;
		$this->db->select('CONVERT(date, fak_updated_at) as fak_updated_at', FALSE);;

		$this->db->select('dkp_kode');
		$this->db->select('dkp_keterangan');		

		$this->db->from('anggota');
        $this->db->join('pegawai', 'ang_pegawai = peg_id', 'left');
        $this->db->join('publikasi_dosen', 'ang_publikasi = pub_id', 'left');
        $this->db->join('jurusan', 'peg_jurusan = jur_id', 'left');
        $this->db->join('fakultas', 'peg_fakultas = fak_id', 'left');
        $this->db->join('detil_kode_publikasi', 'pub_detilkodepub = dkp_id', 'left');
	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel anggota
	* @param type $ang_pegawai   adalah field untuk kolom ang_pegawai  , default = FALSE
	* @param type $ang_publikasi adalah field untuk kolom ang_publikasi, default = FALSE
	* @param type $ang_sebagai   adalah field untuk kolom ang_sebagai  , default = FALSE
	*/
	public function insert($ang_pegawai=FALSE,
					$ang_publikasi=FALSE,
					$ang_sebagai=FALSE){
		$data = array();
        if($ang_pegawai  !== FALSE)$data['ang_pegawai']  =($ang_pegawai == '' ? NULL : $ang_pegawai);
        if($ang_publikasi!== FALSE)$data['ang_publikasi']=($ang_publikasi == '' ? NULL : $ang_publikasi);
        if($ang_sebagai  !== FALSE)$data['ang_sebagai']  =($ang_sebagai == '' ? NULL : trim($ang_sebagai));
		$this->db->insert('anggota', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel anggota
	* @param type $ang_id        adalah field untuk kolom ang_id       , default = FALSE
	* @param type $ang_pegawai   adalah field untuk kolom ang_pegawai  , default = FALSE
	* @param type $ang_publikasi adalah field untuk kolom ang_publikasi, default = FALSE
	* @param type $ang_sebagai   adalah field untuk kolom ang_sebagai  , default = FALSE
	*/
	public function update($ang_id=FALSE,
					$ang_pegawai=FALSE,
					$ang_publikasi=FALSE,
					$ang_sebagai=FALSE){
		$data = array();
        if($ang_pegawai  !== FALSE)$data['ang_pegawai']  =($ang_pegawai == '' ? NULL : $ang_pegawai);
        if($ang_publikasi!== FALSE)$data['ang_publikasi']=($ang_publikasi == '' ? NULL : $ang_publikasi);
        if($ang_sebagai  !== FALSE)$data['ang_sebagai']  =($ang_sebagai == '' ? NULL : trim($ang_sebagai));
		return $this->db->update('anggota', $data, "ang_id = '$ang_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'pub_id'              , 'alias' => 'pub_id'              , 'searchable' => FALSE),
						array('db' => 'pub_tahun', 'alias' => 'pub_tahun', 'searchable' => FALSE),
						array('db' => 'pub_judul', 'alias' => 'pub_judul', 'searchable' => TRUE),
						array('db' => 'dkp_keterangan', 'alias' => 'dkp_keterangan', 'searchable' => FALSE),
						array('db' => 'pub_keterangan', 'alias' => 'pub_keterangan', 'searchable' => TRUE),
						array('db' => 'peg_name'            , 'alias' => 'peg_name'            , 'searchable' => TRUE),
						array('db' => 'ang_sebagai'         , 'alias' => 'ang_sebagai'         , 'searchable' => FALSE),
						array('db' => 'fak_nama_indonesia'         , 'alias' => 'fak_nama_indonesia'         , 'searchable' => FALSE),
						array('db' => 'jur_nama_indonesia'         , 'alias' => 'jur_nama_indonesia'         , 'searchable' => FALSE),
						array('db' => 'pub_pengarang', 'alias' => 'pub_pengarang', 'searchable' => TRUE)
		);
		parent::parse_datatable($cols, $where);
	}
}