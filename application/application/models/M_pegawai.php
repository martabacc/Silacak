<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model class implementation for table pegawai
 * Generated with Doni's Generator
 *
 * @author: Doni Setio Pambudi (donisp06@gmail.com)
 */
class M_pegawai extends MY_Model {
	protected $pk_col = 'peg_id';
	protected $table_name = 'pegawai';

	function __construct()
	{ parent::__construct(); }

	/*
	 * # changelog get #
	 * get function removed for specific model file
	 * it replced with base model MY_Model function get
	 * just call with $result = $this->m_pegawai->get($where, $order, $limit, $offset);
	 * all parameter are optional
	 *
	 * # changelog get_by_id #
	 * get_by_id function removed for specific model file
	 * it replced with base model MY_Model function get_by_column
	 * just call with $result = $this->m_pegawai->get_by_column($pk);
	 * or $this->m_pegawai->get_by_column($col_value, $col_name);
	 * get_by_column more robust function, it can filter all data by one column
	 * so it is unnecessary for redefinition of same function to get other column
	 *
	 * # changelog update_single_column #
	 * update single column definition can be found in MY_Model file
	 * this function is used for updating one column in specific model
	 * for example we want only update username or status delete
	 * so we just call $this->m_pegawai->update_single_column($change_column, $change value, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog update_multiple_column #
	 * update multiple column definition can be found in MY_Model file
	 * this function is used for updating more than one column in specific model
	 * for example we want only update username and password
	 * so we just call $this->m_pegawai->update_multiple_column($column_data, $pk_value, $pk_col)
	 * pk_col is optional, if pk col empty than function will set pk col with varible defined in specific model
	 *
	 * # changelog delete #
	 * delete function removed for specific model file
	 * it replced with base model MY_Model function permanent_delete
	 * just call with $this->m_pegawai->permanent_delete($pk);
	 * or you can call with $this->m_pegawai->permanent_delete($pk, 'other_column');
	 */

	public function select(){
		$this->db->select('peg_id');
		$this->db->select('peg_perguruan_tinggi');
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
		$this->db->select('peg_jabatan_fungsional');
		$this->db->select('peg_jabatan_struktural');
		$this->db->select('peg_jenis_kelamin');
		$this->db->select('peg_provinsi');
		$this->db->select('peg_kota');
		$this->db->select('peg_kode_pos');
		$this->db->select('peg_kode_validasi');
		$this->db->select('peg_log_audit');
		$this->db->select('peg_nip_baru');
		$this->db->select('peg_nip_lama');
		$this->db->select('peg_nidn');
		$this->db->select('peg_name');
		$this->db->select('peg_nomor_ktp');
		$this->db->select('peg_gelar_depan');
		$this->db->select('peg_gelar_belakang');
		$this->db->select('peg_tempat_lahir');
		$this->db->select('CONVERT(date, peg_tanggal_lahir) as peg_tanggal_lahir', FALSE);;
		$this->db->select('peg_alamat');
		$this->db->select('peg_telepon');
		$this->db->select('peg_handphone');
		$this->db->select('peg_email');
		$this->db->select('CONVERT(date, peg_tanggal_berhenti) as peg_tanggal_berhenti', FALSE);;
		$this->db->select('CONVERT(date, peg_tanggal_masuk) as peg_tanggal_masuk', FALSE);;
		$this->db->select('peg_nomor_sertifikasi');
		$this->db->select('peg_tanggal_keluar_sertifikasi');
		$this->db->select('peg_is_dosen');
		$this->db->select('peg_periode_pelaporan');
		$this->db->select('peg_google_schoolar');
		$this->db->select('peg_penelitian');
		$this->db->select('CONVERT(date, peg_created_at) as peg_created_at', FALSE);;
		$this->db->select('CONVERT(date, peg_updated_at) as peg_updated_at', FALSE);;
		$this->db->select('CONVERT(date, peg_deleted_at) as peg_deleted_at', FALSE);;

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

		$this->db->from('pegawai');
        $this->db->join('fakultas', 'peg_fakultas = fak_id', 'left');
        $this->db->join('jurusan', 'peg_jurusan = jur_id', 'left');        
	}

	public function from($group = TRUE)
	{
		$this->db->select('peg_name');
		$this->db->select('fak_nama_indonesia');
		$this->db->select('jur_nama_indonesia');
		$this->db->select('peg_status_tarik');
		
        if ($group)
        {
        	$this->db->select('SUM(CASE WHEN pub_status_tarik = 1 THEN 1 END) as peg_tarik_2_done');
			$this->db->select('COUNT(ang_publikasi) as peg_tarik_2_all');

			$this->db->join('anggota', 'peg_id = ang_pegawai', 'left');
        	$this->db->join('publikasi_dosen', 'ang_publikasi = pub_id', 'left');
	        $this->db->group_by(array("peg_id", "peg_name", "fak_nama_indonesia", "jur_nama_indonesia", "peg_status_tarik", "peg_fakultas", "peg_jurusan"));
        }    
        $this->db->select('peg_id');


		$this->db->select('peg_fakultas');
		$this->db->select('peg_jurusan');

		$this->db->from('pegawai');
        $this->db->join('fakultas', 'peg_fakultas = fak_id', 'left');
        $this->db->join('jurusan', 'peg_jurusan = jur_id', 'left');
   
	}
	
	/**
	* @author Doni's Generator
	* Fungsi untuk insert data ke tabel pegawai
	* @param type $peg_perguruan_tinggi                adalah field untuk kolom peg_perguruan_tinggi               , default = FALSE
	* @param type $peg_fakultas                        adalah field untuk kolom peg_fakultas                       , default = FALSE
	* @param type $peg_jurusan                         adalah field untuk kolom peg_jurusan                        , default = FALSE
	* @param type $peg_program_studi                   adalah field untuk kolom peg_program_studi                  , default = FALSE
	* @param type $peg_jenjang_pendidikan              adalah field untuk kolom peg_jenjang_pendidikan             , default = FALSE
	* @param type $peg_satuan_kerja                    adalah field untuk kolom peg_satuan_kerja                   , default = FALSE
	* @param type $peg_ikatan_kerja_pegawai            adalah field untuk kolom peg_ikatan_kerja_pegawai           , default = FALSE
	* @param type $peg_status_aktivitas_pegawai        adalah field untuk kolom peg_status_aktivitas_pegawai       , default = FALSE
	* @param type $peg_jenis_pegawai                   adalah field untuk kolom peg_jenis_pegawai                  , default = FALSE
	* @param type $peg_jenis_dosen                     adalah field untuk kolom peg_jenis_dosen                    , default = FALSE
	* @param type $peg_pangkat_pns                     adalah field untuk kolom peg_pangkat_pns                    , default = FALSE
	* @param type $peg_jabatan_fungsional              adalah field untuk kolom peg_jabatan_fungsional             , default = FALSE
	* @param type $peg_jabatan_struktural              adalah field untuk kolom peg_jabatan_struktural             , default = FALSE
	* @param type $peg_jenis_kelamin                   adalah field untuk kolom peg_jenis_kelamin                  , default = FALSE
	* @param type $peg_provinsi                        adalah field untuk kolom peg_provinsi                       , default = FALSE
	* @param type $peg_kota                            adalah field untuk kolom peg_kota                           , default = FALSE
	* @param type $peg_kode_pos                        adalah field untuk kolom peg_kode_pos                       , default = FALSE
	* @param type $peg_kode_validasi                 adalah field untuk kolom peg_kode_validasi                , default = FALSE
	* @param type $peg_log_audit                       adalah field untuk kolom peg_log_audit                      , default = FALSE
	* @param type $peg_nip_baru                        adalah field untuk kolom peg_nip_baru                       , default = FALSE
	* @param type $peg_nip_lama                        adalah field untuk kolom peg_nip_lama                       , default = FALSE
	* @param type $peg_nidn                            adalah field untuk kolom peg_nidn                           , default = FALSE
	* @param type $peg_name                            adalah field untuk kolom peg_name                           , default = FALSE
	* @param type $peg_nomor_ktp                       adalah field untuk kolom peg_nomor_ktp                      , default = FALSE
	* @param type $peg_gelar_depan    adalah field untuk kolom peg_gelar_depan   , default = FALSE
	* @param type $peg_gelar_belakang adalah field untuk kolom peg_gelar_belakang, default = FALSE
	* @param type $peg_tempat_lahir                    adalah field untuk kolom peg_tempat_lahir                   , default = FALSE
	* @param type $peg_tanggal_lahir                   adalah field untuk kolom peg_tanggal_lahir                  , default = FALSE
	* @param type $peg_alamat                          adalah field untuk kolom peg_alamat                         , default = FALSE
	* @param type $peg_telepon                         adalah field untuk kolom peg_telepon                        , default = FALSE
	* @param type $peg_handphone                       adalah field untuk kolom peg_handphone                      , default = FALSE
	* @param type $peg_email                           adalah field untuk kolom peg_email                          , default = FALSE
	* @param type $peg_tanggal_berhenti                adalah field untuk kolom peg_tanggal_berhenti               , default = FALSE
	* @param type $peg_tanggal_masuk                   adalah field untuk kolom peg_tanggal_masuk                  , default = FALSE
	* @param type $peg_nomor_sertifikasi               adalah field untuk kolom peg_nomor_sertifikasi              , default = FALSE
	* @param type $peg_tanggal_keluar_sertifikasi      adalah field untuk kolom peg_tanggal_keluar_sertifikasi     , default = FALSE
	* @param type $peg_is_dosen                        adalah field untuk kolom peg_is_dosen                       , default = FALSE
	* @param type $peg_periode_pelaporan               adalah field untuk kolom peg_periode_pelaporan              , default = FALSE
	* @param type $peg_google_schoolar                 adalah field untuk kolom peg_google_schoolar                , default = FALSE
	* @param type $peg_penelitian                      adalah field untuk kolom peg_penelitian                     , default = FALSE
	* @param type $peg_created_at                      adalah field untuk kolom peg_created_at                     , default = FALSE
	* @param type $peg_updated_at                      adalah field untuk kolom peg_updated_at                     , default = FALSE
	* @param type $peg_deleted_at                      adalah field untuk kolom peg_deleted_at                     , default = FALSE
	*/
	public function insert($peg_perguruan_tinggi=FALSE,
					$peg_fakultas=FALSE,
					$peg_jurusan=FALSE,
					$peg_program_studi=FALSE,
					$peg_jenjang_pendidikan=FALSE,
					$peg_satuan_kerja=FALSE,
					$peg_ikatan_kerja_pegawai=FALSE,
					$peg_status_aktivitas_pegawai=FALSE,
					$peg_jenis_pegawai=FALSE,
					$peg_jenis_dosen=FALSE,
					$peg_pangkat_pns=FALSE,
					$peg_jabatan_fungsional=FALSE,
					$peg_jabatan_struktural=FALSE,
					$peg_jenis_kelamin=FALSE,
					$peg_provinsi=FALSE,
					$peg_kota=FALSE,
					$peg_kode_pos=FALSE,
					$peg_kode_validasi=FALSE,
					$peg_log_audit=FALSE,
					$peg_nip_baru=FALSE,
					$peg_nip_lama=FALSE,
					$peg_nidn=FALSE,
					$peg_name=FALSE,
					$peg_nomor_ktp=FALSE,
					$peg_gelar_depan=FALSE,
					$peg_gelar_belakang=FALSE,
					$peg_tempat_lahir=FALSE,
					$peg_tanggal_lahir=FALSE,
					$peg_alamat=FALSE,
					$peg_telepon=FALSE,
					$peg_handphone=FALSE,
					$peg_email=FALSE,
					$peg_tanggal_berhenti=FALSE,
					$peg_tanggal_masuk=FALSE,
					$peg_nomor_sertifikasi=FALSE,
					$peg_tanggal_keluar_sertifikasi=FALSE,
					$peg_is_dosen=FALSE,
					$peg_periode_pelaporan=FALSE,
					$peg_google_schoolar=FALSE,
					$peg_penelitian=FALSE,
					$peg_created_at=FALSE,
					$peg_updated_at=FALSE,
					$peg_deleted_at=FALSE){
		$data = array();
        if($peg_perguruan_tinggi               !== FALSE)$data['peg_perguruan_tinggi']               =($peg_perguruan_tinggi == '' ? NULL : trim($peg_perguruan_tinggi));
        if($peg_fakultas                       !== FALSE)$data['peg_fakultas']                       =($peg_fakultas == '' ? NULL : trim($peg_fakultas));
        if($peg_jurusan                        !== FALSE)$data['peg_jurusan']                        =($peg_jurusan == '' ? NULL : trim($peg_jurusan));
        if($peg_program_studi                  !== FALSE)$data['peg_program_studi']                  =($peg_program_studi == '' ? NULL : trim($peg_program_studi));
        if($peg_jenjang_pendidikan             !== FALSE)$data['peg_jenjang_pendidikan']             =($peg_jenjang_pendidikan == '' ? NULL : trim($peg_jenjang_pendidikan));
        if($peg_satuan_kerja                   !== FALSE)$data['peg_satuan_kerja']                   =($peg_satuan_kerja == '' ? NULL : trim($peg_satuan_kerja));
        if($peg_ikatan_kerja_pegawai           !== FALSE)$data['peg_ikatan_kerja_pegawai']           =($peg_ikatan_kerja_pegawai == '' ? NULL : trim($peg_ikatan_kerja_pegawai));
        if($peg_status_aktivitas_pegawai       !== FALSE)$data['peg_status_aktivitas_pegawai']       =($peg_status_aktivitas_pegawai == '' ? NULL : trim($peg_status_aktivitas_pegawai));
        if($peg_jenis_pegawai                  !== FALSE)$data['peg_jenis_pegawai']                  =($peg_jenis_pegawai == '' ? NULL : trim($peg_jenis_pegawai));
        if($peg_jenis_dosen                    !== FALSE)$data['peg_jenis_dosen']                    =($peg_jenis_dosen == '' ? NULL : trim($peg_jenis_dosen));
        if($peg_pangkat_pns                    !== FALSE)$data['peg_pangkat_pns']                    =($peg_pangkat_pns == '' ? NULL : trim($peg_pangkat_pns));
        if($peg_jabatan_fungsional             !== FALSE)$data['peg_jabatan_fungsional']             =($peg_jabatan_fungsional == '' ? NULL : trim($peg_jabatan_fungsional));
        if($peg_jabatan_struktural             !== FALSE)$data['peg_jabatan_struktural']             =($peg_jabatan_struktural == '' ? NULL : trim($peg_jabatan_struktural));
        if($peg_jenis_kelamin                  !== FALSE)$data['peg_jenis_kelamin']                  =($peg_jenis_kelamin == '' ? NULL : trim($peg_jenis_kelamin));
        if($peg_provinsi                       !== FALSE)$data['peg_provinsi']                       =($peg_provinsi == '' ? NULL : trim($peg_provinsi));
        if($peg_kota                           !== FALSE)$data['peg_kota']                           =($peg_kota == '' ? NULL : trim($peg_kota));
        if($peg_kode_pos                       !== FALSE)$data['peg_kode_pos']                       =($peg_kode_pos == '' ? NULL : trim($peg_kode_pos));
        if($peg_kode_validasi                !== FALSE)$data['peg_kode_validasi']                =($peg_kode_validasi == '' ? NULL : trim($peg_kode_validasi));
        if($peg_log_audit                      !== FALSE)$data['peg_log_audit']                      =($peg_log_audit == '' ? NULL : trim($peg_log_audit));
        if($peg_nip_baru                       !== FALSE)$data['peg_nip_baru']                       =($peg_nip_baru == '' ? NULL : trim($peg_nip_baru));
        if($peg_nip_lama                       !== FALSE)$data['peg_nip_lama']                       =($peg_nip_lama == '' ? NULL : trim($peg_nip_lama));
        if($peg_nidn                           !== FALSE)$data['peg_nidn']                           =($peg_nidn == '' ? NULL : trim($peg_nidn));
        if($peg_name                           !== FALSE)$data['peg_name']                           =($peg_name == '' ? NULL : trim($peg_name));
        if($peg_nomor_ktp                      !== FALSE)$data['peg_nomor_ktp']                      =($peg_nomor_ktp == '' ? NULL : trim($peg_nomor_ktp));
        if($peg_gelar_depan   !== FALSE)$data['peg_gelar_depan']   =($peg_gelar_depan == '' ? NULL : trim($peg_gelar_depan));
        if($peg_gelar_belakang!== FALSE)$data['peg_gelar_belakang']=($peg_gelar_belakang == '' ? NULL : trim($peg_gelar_belakang));
        if($peg_tempat_lahir                   !== FALSE)$data['peg_tempat_lahir']                   =($peg_tempat_lahir == '' ? NULL : trim($peg_tempat_lahir));
        if($peg_tanggal_lahir                  !== FALSE)$data['peg_tanggal_lahir']                  =($peg_tanggal_lahir == '' ? NULL : $peg_tanggal_lahir);
        if($peg_alamat                         !== FALSE)$data['peg_alamat']                         =($peg_alamat == '' ? NULL : trim($peg_alamat));
        if($peg_telepon                        !== FALSE)$data['peg_telepon']                        =($peg_telepon == '' ? NULL : trim($peg_telepon));
        if($peg_handphone                      !== FALSE)$data['peg_handphone']                      =($peg_handphone == '' ? NULL : trim($peg_handphone));
        if($peg_email                          !== FALSE)$data['peg_email']                          =($peg_email == '' ? NULL : trim($peg_email));
        if($peg_tanggal_berhenti               !== FALSE)$data['peg_tanggal_berhenti']               =($peg_tanggal_berhenti == '' ? NULL : $peg_tanggal_berhenti);
        if($peg_tanggal_masuk                  !== FALSE)$data['peg_tanggal_masuk']                  =($peg_tanggal_masuk == '' ? NULL : $peg_tanggal_masuk);
        if($peg_nomor_sertifikasi              !== FALSE)$data['peg_nomor_sertifikasi']              =($peg_nomor_sertifikasi == '' ? NULL : trim($peg_nomor_sertifikasi));
        if($peg_tanggal_keluar_sertifikasi     !== FALSE)$data['peg_tanggal_keluar_sertifikasi']     =($peg_tanggal_keluar_sertifikasi == '' ? NULL : trim($peg_tanggal_keluar_sertifikasi));
        if($peg_is_dosen                       !== FALSE)$data['peg_is_dosen']                       =($peg_is_dosen == '' ? NULL : trim($peg_is_dosen));
        if($peg_periode_pelaporan              !== FALSE)$data['peg_periode_pelaporan']              =($peg_periode_pelaporan == '' ? NULL : trim($peg_periode_pelaporan));
        if($peg_google_schoolar                !== FALSE)$data['peg_google_schoolar']                =($peg_google_schoolar == '' ? NULL : trim($peg_google_schoolar));
        if($peg_penelitian                     !== FALSE)$data['peg_penelitian']                     =($peg_penelitian == '' ? NULL : trim($peg_penelitian));
        if($peg_created_at                     !== FALSE)$data['peg_created_at']                     =($peg_created_at == '' ? NULL : $peg_created_at);
        if($peg_updated_at                     !== FALSE)$data['peg_updated_at']                     =($peg_updated_at == '' ? NULL : $peg_updated_at);
        if($peg_deleted_at                     !== FALSE)$data['peg_deleted_at']                     =($peg_deleted_at == '' ? NULL : $peg_deleted_at);
		$this->db->insert('pegawai', $data);
		return $this->db->insert_id();
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk update data ke tabel pegawai
	* @param type $peg_id                              adalah field untuk kolom peg_id                             , default = FALSE
	* @param type $peg_perguruan_tinggi                adalah field untuk kolom peg_perguruan_tinggi               , default = FALSE
	* @param type $peg_fakultas                        adalah field untuk kolom peg_fakultas                       , default = FALSE
	* @param type $peg_jurusan                         adalah field untuk kolom peg_jurusan                        , default = FALSE
	* @param type $peg_program_studi                   adalah field untuk kolom peg_program_studi                  , default = FALSE
	* @param type $peg_jenjang_pendidikan              adalah field untuk kolom peg_jenjang_pendidikan             , default = FALSE
	* @param type $peg_satuan_kerja                    adalah field untuk kolom peg_satuan_kerja                   , default = FALSE
	* @param type $peg_ikatan_kerja_pegawai            adalah field untuk kolom peg_ikatan_kerja_pegawai           , default = FALSE
	* @param type $peg_status_aktivitas_pegawai        adalah field untuk kolom peg_status_aktivitas_pegawai       , default = FALSE
	* @param type $peg_jenis_pegawai                   adalah field untuk kolom peg_jenis_pegawai                  , default = FALSE
	* @param type $peg_jenis_dosen                     adalah field untuk kolom peg_jenis_dosen                    , default = FALSE
	* @param type $peg_pangkat_pns                     adalah field untuk kolom peg_pangkat_pns                    , default = FALSE
	* @param type $peg_jabatan_fungsional              adalah field untuk kolom peg_jabatan_fungsional             , default = FALSE
	* @param type $peg_jabatan_struktural              adalah field untuk kolom peg_jabatan_struktural             , default = FALSE
	* @param type $peg_jenis_kelamin                   adalah field untuk kolom peg_jenis_kelamin                  , default = FALSE
	* @param type $peg_provinsi                        adalah field untuk kolom peg_provinsi                       , default = FALSE
	* @param type $peg_kota                            adalah field untuk kolom peg_kota                           , default = FALSE
	* @param type $peg_kode_pos                        adalah field untuk kolom peg_kode_pos                       , default = FALSE
	* @param type $peg_kode_validasi                 adalah field untuk kolom peg_kode_validasi                , default = FALSE
	* @param type $peg_log_audit                       adalah field untuk kolom peg_log_audit                      , default = FALSE
	* @param type $peg_nip_baru                        adalah field untuk kolom peg_nip_baru                       , default = FALSE
	* @param type $peg_nip_lama                        adalah field untuk kolom peg_nip_lama                       , default = FALSE
	* @param type $peg_nidn                            adalah field untuk kolom peg_nidn                           , default = FALSE
	* @param type $peg_name                            adalah field untuk kolom peg_name                           , default = FALSE
	* @param type $peg_nomor_ktp                       adalah field untuk kolom peg_nomor_ktp                      , default = FALSE
	* @param type $peg_gelar_depan    adalah field untuk kolom peg_gelar_depan   , default = FALSE
	* @param type $peg_gelar_belakang adalah field untuk kolom peg_gelar_belakang, default = FALSE
	* @param type $peg_tempat_lahir                    adalah field untuk kolom peg_tempat_lahir                   , default = FALSE
	* @param type $peg_tanggal_lahir                   adalah field untuk kolom peg_tanggal_lahir                  , default = FALSE
	* @param type $peg_alamat                          adalah field untuk kolom peg_alamat                         , default = FALSE
	* @param type $peg_telepon                         adalah field untuk kolom peg_telepon                        , default = FALSE
	* @param type $peg_handphone                       adalah field untuk kolom peg_handphone                      , default = FALSE
	* @param type $peg_email                           adalah field untuk kolom peg_email                          , default = FALSE
	* @param type $peg_tanggal_berhenti                adalah field untuk kolom peg_tanggal_berhenti               , default = FALSE
	* @param type $peg_tanggal_masuk                   adalah field untuk kolom peg_tanggal_masuk                  , default = FALSE
	* @param type $peg_nomor_sertifikasi               adalah field untuk kolom peg_nomor_sertifikasi              , default = FALSE
	* @param type $peg_tanggal_keluar_sertifikasi      adalah field untuk kolom peg_tanggal_keluar_sertifikasi     , default = FALSE
	* @param type $peg_is_dosen                        adalah field untuk kolom peg_is_dosen                       , default = FALSE
	* @param type $peg_periode_pelaporan               adalah field untuk kolom peg_periode_pelaporan              , default = FALSE
	* @param type $peg_google_schoolar                 adalah field untuk kolom peg_google_schoolar                , default = FALSE
	* @param type $peg_penelitian                      adalah field untuk kolom peg_penelitian                     , default = FALSE
	* @param type $peg_created_at                      adalah field untuk kolom peg_created_at                     , default = FALSE
	* @param type $peg_updated_at                      adalah field untuk kolom peg_updated_at                     , default = FALSE
	* @param type $peg_deleted_at                      adalah field untuk kolom peg_deleted_at                     , default = FALSE
	*/
	public function update($peg_id=FALSE,
					$peg_perguruan_tinggi=FALSE,
					$peg_fakultas=FALSE,
					$peg_jurusan=FALSE,
					$peg_program_studi=FALSE,
					$peg_jenjang_pendidikan=FALSE,
					$peg_satuan_kerja=FALSE,
					$peg_ikatan_kerja_pegawai=FALSE,
					$peg_status_aktivitas_pegawai=FALSE,
					$peg_jenis_pegawai=FALSE,
					$peg_jenis_dosen=FALSE,
					$peg_pangkat_pns=FALSE,
					$peg_jabatan_fungsional=FALSE,
					$peg_jabatan_struktural=FALSE,
					$peg_jenis_kelamin=FALSE,
					$peg_provinsi=FALSE,
					$peg_kota=FALSE,
					$peg_kode_pos=FALSE,
					$peg_kode_validasi=FALSE,
					$peg_log_audit=FALSE,
					$peg_nip_baru=FALSE,
					$peg_nip_lama=FALSE,
					$peg_nidn=FALSE,
					$peg_name=FALSE,
					$peg_nomor_ktp=FALSE,
					$peg_gelar_depan=FALSE,
					$peg_gelar_belakang=FALSE,
					$peg_tempat_lahir=FALSE,
					$peg_tanggal_lahir=FALSE,
					$peg_alamat=FALSE,
					$peg_telepon=FALSE,
					$peg_handphone=FALSE,
					$peg_email=FALSE,
					$peg_tanggal_berhenti=FALSE,
					$peg_tanggal_masuk=FALSE,
					$peg_nomor_sertifikasi=FALSE,
					$peg_tanggal_keluar_sertifikasi=FALSE,
					$peg_is_dosen=FALSE,
					$peg_periode_pelaporan=FALSE,
					$peg_google_schoolar=FALSE,
					$peg_penelitian=FALSE,
					$peg_created_at=FALSE,
					$peg_updated_at=FALSE,
					$peg_deleted_at=FALSE){
		$data = array();
        if($peg_perguruan_tinggi               !== FALSE)$data['peg_perguruan_tinggi']               =($peg_perguruan_tinggi == '' ? NULL : trim($peg_perguruan_tinggi));
        if($peg_fakultas                       !== FALSE)$data['peg_fakultas']                       =($peg_fakultas == '' ? NULL : trim($peg_fakultas));
        if($peg_jurusan                        !== FALSE)$data['peg_jurusan']                        =($peg_jurusan == '' ? NULL : trim($peg_jurusan));
        if($peg_program_studi                  !== FALSE)$data['peg_program_studi']                  =($peg_program_studi == '' ? NULL : trim($peg_program_studi));
        if($peg_jenjang_pendidikan             !== FALSE)$data['peg_jenjang_pendidikan']             =($peg_jenjang_pendidikan == '' ? NULL : trim($peg_jenjang_pendidikan));
        if($peg_satuan_kerja                   !== FALSE)$data['peg_satuan_kerja']                   =($peg_satuan_kerja == '' ? NULL : trim($peg_satuan_kerja));
        if($peg_ikatan_kerja_pegawai           !== FALSE)$data['peg_ikatan_kerja_pegawai']           =($peg_ikatan_kerja_pegawai == '' ? NULL : trim($peg_ikatan_kerja_pegawai));
        if($peg_status_aktivitas_pegawai       !== FALSE)$data['peg_status_aktivitas_pegawai']       =($peg_status_aktivitas_pegawai == '' ? NULL : trim($peg_status_aktivitas_pegawai));
        if($peg_jenis_pegawai                  !== FALSE)$data['peg_jenis_pegawai']                  =($peg_jenis_pegawai == '' ? NULL : trim($peg_jenis_pegawai));
        if($peg_jenis_dosen                    !== FALSE)$data['peg_jenis_dosen']                    =($peg_jenis_dosen == '' ? NULL : trim($peg_jenis_dosen));
        if($peg_pangkat_pns                    !== FALSE)$data['peg_pangkat_pns']                    =($peg_pangkat_pns == '' ? NULL : trim($peg_pangkat_pns));
        if($peg_jabatan_fungsional             !== FALSE)$data['peg_jabatan_fungsional']             =($peg_jabatan_fungsional == '' ? NULL : trim($peg_jabatan_fungsional));
        if($peg_jabatan_struktural             !== FALSE)$data['peg_jabatan_struktural']             =($peg_jabatan_struktural == '' ? NULL : trim($peg_jabatan_struktural));
        if($peg_jenis_kelamin                  !== FALSE)$data['peg_jenis_kelamin']                  =($peg_jenis_kelamin == '' ? NULL : trim($peg_jenis_kelamin));
        if($peg_provinsi                       !== FALSE)$data['peg_provinsi']                       =($peg_provinsi == '' ? NULL : trim($peg_provinsi));
        if($peg_kota                           !== FALSE)$data['peg_kota']                           =($peg_kota == '' ? NULL : trim($peg_kota));
        if($peg_kode_pos                       !== FALSE)$data['peg_kode_pos']                       =($peg_kode_pos == '' ? NULL : trim($peg_kode_pos));
        if($peg_kode_validasi                !== FALSE)$data['peg_kode_validasi']                =($peg_kode_validasi == '' ? NULL : trim($peg_kode_validasi));
        if($peg_log_audit                      !== FALSE)$data['peg_log_audit']                      =($peg_log_audit == '' ? NULL : trim($peg_log_audit));
        if($peg_nip_baru                       !== FALSE)$data['peg_nip_baru']                       =($peg_nip_baru == '' ? NULL : trim($peg_nip_baru));
        if($peg_nip_lama                       !== FALSE)$data['peg_nip_lama']                       =($peg_nip_lama == '' ? NULL : trim($peg_nip_lama));
        if($peg_nidn                           !== FALSE)$data['peg_nidn']                           =($peg_nidn == '' ? NULL : trim($peg_nidn));
        if($peg_name                           !== FALSE)$data['peg_name']                           =($peg_name == '' ? NULL : trim($peg_name));
        if($peg_nomor_ktp                      !== FALSE)$data['peg_nomor_ktp']                      =($peg_nomor_ktp == '' ? NULL : trim($peg_nomor_ktp));
        if($peg_gelar_depan   !== FALSE)$data['peg_gelar_depan']   =($peg_gelar_depan == '' ? NULL : trim($peg_gelar_depan));
        if($peg_gelar_belakang!== FALSE)$data['peg_gelar_belakang']=($peg_gelar_belakang == '' ? NULL : trim($peg_gelar_belakang));
        if($peg_tempat_lahir                   !== FALSE)$data['peg_tempat_lahir']                   =($peg_tempat_lahir == '' ? NULL : trim($peg_tempat_lahir));
        if($peg_tanggal_lahir                  !== FALSE)$data['peg_tanggal_lahir']                  =($peg_tanggal_lahir == '' ? NULL : $peg_tanggal_lahir);
        if($peg_alamat                         !== FALSE)$data['peg_alamat']                         =($peg_alamat == '' ? NULL : trim($peg_alamat));
        if($peg_telepon                        !== FALSE)$data['peg_telepon']                        =($peg_telepon == '' ? NULL : trim($peg_telepon));
        if($peg_handphone                      !== FALSE)$data['peg_handphone']                      =($peg_handphone == '' ? NULL : trim($peg_handphone));
        if($peg_email                          !== FALSE)$data['peg_email']                          =($peg_email == '' ? NULL : trim($peg_email));
        if($peg_tanggal_berhenti               !== FALSE)$data['peg_tanggal_berhenti']               =($peg_tanggal_berhenti == '' ? NULL : $peg_tanggal_berhenti);
        if($peg_tanggal_masuk                  !== FALSE)$data['peg_tanggal_masuk']                  =($peg_tanggal_masuk == '' ? NULL : $peg_tanggal_masuk);
        if($peg_nomor_sertifikasi              !== FALSE)$data['peg_nomor_sertifikasi']              =($peg_nomor_sertifikasi == '' ? NULL : trim($peg_nomor_sertifikasi));
        if($peg_tanggal_keluar_sertifikasi     !== FALSE)$data['peg_tanggal_keluar_sertifikasi']     =($peg_tanggal_keluar_sertifikasi == '' ? NULL : trim($peg_tanggal_keluar_sertifikasi));
        if($peg_is_dosen                       !== FALSE)$data['peg_is_dosen']                       =($peg_is_dosen == '' ? NULL : trim($peg_is_dosen));
        if($peg_periode_pelaporan              !== FALSE)$data['peg_periode_pelaporan']              =($peg_periode_pelaporan == '' ? NULL : trim($peg_periode_pelaporan));
        if($peg_google_schoolar                !== FALSE)$data['peg_google_schoolar']                =($peg_google_schoolar == '' ? NULL : trim($peg_google_schoolar));
        if($peg_penelitian                     !== FALSE)$data['peg_penelitian']                     =($peg_penelitian == '' ? NULL : trim($peg_penelitian));
        if($peg_created_at                     !== FALSE)$data['peg_created_at']                     =($peg_created_at == '' ? NULL : $peg_created_at);
        if($peg_updated_at                     !== FALSE)$data['peg_updated_at']                     =($peg_updated_at == '' ? NULL : $peg_updated_at);
        if($peg_deleted_at                     !== FALSE)$data['peg_deleted_at']                     =($peg_deleted_at == '' ? NULL : $peg_deleted_at);
		return $this->db->update('pegawai', $data, "peg_id = '$peg_id'");
	}

	/**
	* @author Doni's Generator
	* Fungsi untuk datatable
	* @param type $where where
	*/
	public function get_datatable($where=''){
		$cols = array(
						array('db' => 'peg_id'                             , 'alias' => 'peg_id'                             , 'searchable' => FALSE),
						array('db' => 'peg_perguruan_tinggi'               , 'alias' => 'peg_perguruan_tinggi'               , 'searchable' => FALSE),
						array('db' => 'fak_perguruan_tinggi'               , 'alias' => 'fak_perguruan_tinggi'               , 'searchable' => FALSE),
						array('db' => 'jur_perguruan_tinggi'               , 'alias' => 'jur_perguruan_tinggi'               , 'searchable' => FALSE),
						array('db' => 'peg_program_studi'                  , 'alias' => 'peg_program_studi'                  , 'searchable' => FALSE),
						array('db' => 'peg_jenjang_pendidikan'             , 'alias' => 'peg_jenjang_pendidikan'             , 'searchable' => FALSE),
						array('db' => 'peg_satuan_kerja'                   , 'alias' => 'peg_satuan_kerja'                   , 'searchable' => FALSE),
						array('db' => 'peg_ikatan_kerja_pegawai'           , 'alias' => 'peg_ikatan_kerja_pegawai'           , 'searchable' => FALSE),
						array('db' => 'peg_status_aktivitas_pegawai'       , 'alias' => 'peg_status_aktivitas_pegawai'       , 'searchable' => FALSE),
						array('db' => 'peg_jenis_pegawai'                  , 'alias' => 'peg_jenis_pegawai'                  , 'searchable' => FALSE),
						array('db' => 'peg_jenis_dosen'                    , 'alias' => 'peg_jenis_dosen'                    , 'searchable' => FALSE),
						array('db' => 'peg_pangkat_pns'                    , 'alias' => 'peg_pangkat_pns'                    , 'searchable' => FALSE),
						array('db' => 'peg_jabatan_fungsional'             , 'alias' => 'peg_jabatan_fungsional'             , 'searchable' => FALSE),
						array('db' => 'peg_jabatan_struktural'             , 'alias' => 'peg_jabatan_struktural'             , 'searchable' => FALSE),
						array('db' => 'peg_jenis_kelamin'                  , 'alias' => 'peg_jenis_kelamin'                  , 'searchable' => FALSE),
						array('db' => 'peg_provinsi'                       , 'alias' => 'peg_provinsi'                       , 'searchable' => FALSE),
						array('db' => 'peg_kota'                           , 'alias' => 'peg_kota'                           , 'searchable' => FALSE),
						array('db' => 'peg_kode_pos'                       , 'alias' => 'peg_kode_pos'                       , 'searchable' => FALSE),
						array('db' => 'peg_kode_validasi'                , 'alias' => 'peg_kode_validasi'                , 'searchable' => FALSE),
						array('db' => 'peg_log_audit'                      , 'alias' => 'peg_log_audit'                      , 'searchable' => FALSE),
						array('db' => 'peg_nip_baru'                       , 'alias' => 'peg_nip_baru'                       , 'searchable' => FALSE),
						array('db' => 'peg_nip_lama'                       , 'alias' => 'peg_nip_lama'                       , 'searchable' => FALSE),
						array('db' => 'peg_nidn'                           , 'alias' => 'peg_nidn'                           , 'searchable' => FALSE),
						array('db' => 'peg_name'                           , 'alias' => 'peg_name'                           , 'searchable' => TRUE),
						array('db' => 'peg_nomor_ktp'                      , 'alias' => 'peg_nomor_ktp'                      , 'searchable' => FALSE),
						array('db' => 'peg_gelar_depan'   , 'alias' => 'peg_gelar_depan'   , 'searchable' => FALSE),
						array('db' => 'peg_gelar_belakang', 'alias' => 'peg_gelar_belakang', 'searchable' => FALSE),
						array('db' => 'peg_tempat_lahir'                   , 'alias' => 'peg_tempat_lahir'                   , 'searchable' => FALSE),
						array('db' => 'peg_tanggal_lahir'                  , 'alias' => 'peg_tanggal_lahir'                  , 'searchable' => FALSE),
						array('db' => 'peg_alamat'                         , 'alias' => 'peg_alamat'                         , 'searchable' => FALSE),
						array('db' => 'peg_telepon'                        , 'alias' => 'peg_telepon'                        , 'searchable' => FALSE),
						array('db' => 'peg_handphone'                      , 'alias' => 'peg_handphone'                      , 'searchable' => FALSE),
						array('db' => 'peg_email'                          , 'alias' => 'peg_email'                          , 'searchable' => FALSE),
						array('db' => 'peg_tanggal_berhenti'               , 'alias' => 'peg_tanggal_berhenti'               , 'searchable' => FALSE),
						array('db' => 'peg_tanggal_masuk'                  , 'alias' => 'peg_tanggal_masuk'                  , 'searchable' => FALSE),
						array('db' => 'peg_nomor_sertifikasi'              , 'alias' => 'peg_nomor_sertifikasi'              , 'searchable' => FALSE),
						array('db' => 'peg_tanggal_keluar_sertifikasi'     , 'alias' => 'peg_tanggal_keluar_sertifikasi'     , 'searchable' => FALSE),
						array('db' => 'peg_is_dosen'                       , 'alias' => 'peg_is_dosen'                       , 'searchable' => FALSE),
						array('db' => 'peg_periode_pelaporan'              , 'alias' => 'peg_periode_pelaporan'              , 'searchable' => FALSE),
						array('db' => 'peg_google_schoolar'                , 'alias' => 'peg_google_schoolar'                , 'searchable' => FALSE),
						array('db' => 'peg_penelitian'                     , 'alias' => 'peg_penelitian'                     , 'searchable' => FALSE),
						array('db' => 'peg_created_at'                     , 'alias' => 'peg_created_at'                     , 'searchable' => FALSE),
						array('db' => 'peg_updated_at'                     , 'alias' => 'peg_updated_at'                     , 'searchable' => FALSE),
						array('db' => 'peg_deleted_at'                     , 'alias' => 'peg_deleted_at'                     , 'searchable' => FALSE),
						array('db' => 'fak_nama_indonesia'                 , 'alias' => 'fak_nama_indonesia'                 , 'searchable' => TRUE),
						array('db' => 'jur_nama_indonesia'                 , 'alias' => 'jur_nama_indonesia'                 , 'searchable' => TRUE)
		);
		parent::parse_datatable($cols, $where);
	}

	public function get_datatable_tarik($where = '') {
		$cols = array(
						array('db' => 'peg_id'              , 'alias' => 'peg_id'              , 'searchable' => FALSE),
						array('db' => 'peg_name', 'alias' => 'peg_name', 'searchable' => TRUE),
						array('db' => 'fak_nama_indonesia', 'alias' => 'fak_nama_indonesia', 'searchable' => TRUE),
						array('db' => 'jur_nama_indonesia', 'alias' => 'jur_nama_indonesia', 'searchable' => TRUE),
						array('db' => 'peg_status_tarik', 'alias' => 'peg_status_tarik', 'searchable' => FALSE),
						array('db' => 'SUM(CASE WHEN pub_status_tarik = 1 THEN 1 END)'            , 'alias' => 'peg_tarik_2_done', 'searchable' => FALSE),
						array('db' => 'count(ang_publikasi)'            , 'alias' => 'peg_tarik_2_all', 'searchable' => FALSE),
						array('db' => 'peg_fakultas', 'alias' => 'peg_fakultas', 'searchable' => FALSE),
						array('db' => 'peg_jurusan', 'alias' => 'peg_jurusan', 'searchable' => FALSE)
		);

		parent::parse_datatable($cols, $where, 1);
	}

	public function get_rekap_tarik_data($fakultas, $jurusan){
		$this->from();
		$this->db->where('peg_is_dosen = 1 and peg_deleted_at is NULL');
		if($fakultas != 0)
			$this->db->where("peg_fakultas", $fakultas);
		else if($jurusan != 0)
			$this->db->where("peg_jurusan", $jurusan);
		$this->db->order_by("peg_tarik_2_done desc");
		$query = $this->db->get();
		return $query->result();
	}

	public function update_status($peg_id = 0, $status = 0){
		$data = array();
        if($status          !== FALSE)$data['peg_status_tarik']          = ($status == 0 ? 0 : $status);
		return $this->db->update('pegawai', $data, "peg_id = '$peg_id'");
	}
	public function reset_status(){
		$query = "UPDATE pegawai SET peg_status_tarik = 0";
		$data = array();
		$data['peg_status_tarik'] = 0;
		return $this->db->update('pegawai', $data);
		
	}
}