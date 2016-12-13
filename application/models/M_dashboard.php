<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends MY_Model {

	function __construct()
	{ parent::__construct(); }

	public function get_status_tarik_tahunan()
	{
		$this->db->select('pub_tahun');
		$this->db->select('SUM(Case when pub_status_tarik = 1 then 1 end) as sudah');
		$this->db->select('count(pub_id) as total');

		$this->db->from('publikasi_dosen');
		$this->db->where('pub_deleted_at is NULL');
		$this->db->group_by('pub_tahun');
		$this->db->order_by('pub_tahun desc');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_num_publication_all()
	{
		$this->db->select('count(pub_id) as total');

		$this->db->from('publikasi_dosen');
		$this->db->where('pub_deleted_at is NULL');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_num_publication_done()
	{
		$this->db->select('count(pub_id) as total');

		$this->db->from('publikasi_dosen');
		$this->db->where('pub_deleted_at is NULL AND pub_status_tarik = 1');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_num_dosen()
	{
		$this->db->select('SUM(Case when peg_status_tarik = 1 then 1 end) as sudah');
		$this->db->select('COUNT(peg_id) as total');

		$this->db->from('pegawai');
		$this->db->where("peg_status_aktivitas_pegawai in ('A','DP','TB','TI','DK','DT','MP') and peg_is_dosen=1 and peg_ikatan_kerja_pegawai in (1,2,3) and peg_deleted_at is NULL");

		$query = $this->db->get();
		return $query->result();
	}

	public function get_masuk_pdt() 
	{
		$this->db->select('count(distinct(snk_publikasi)) as jumlah');

		$this->db->from('log_sinkron');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_max_pub_tahun()
	{
		$this->db->select('MAX(pub_tahun) as tahun');
		$this->db->from('publikasi_dosen');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_pub_fakultas_tahun()
	{
		$year = $this->get_max_pub_tahun();
		$maxyear = $year[0]->tahun;
		$minyear = $maxyear - 5;

		$this->db->select('COUNT(pub_id) as jumlah');
		$this->db->select('peg_fakultas');
		$this->db->select('pub_tahun');

		$this->db->from('publikasi_dosen');
		$this->db->join('anggota','ang_publikasi = pub_id');
		$this->db->join('pegawai','ang_pegawai = peg_id');

		$this->db->where('pub_deleted_at is NULL AND ' . $minyear . ' <= pub_tahun AND pub_tahun <= ' . $maxyear);
		$this->db->group_by(array('peg_fakultas', 'pub_tahun'));
		$this->db->order_by('peg_fakultas');
		$this->db->order_by('pub_tahun');

		$query = $this->db->get();
		return $query->result();
	}
}
