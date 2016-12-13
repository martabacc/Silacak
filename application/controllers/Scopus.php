<?php defined('BASEPATH') OR exit('No direct script access allowed');
   
/*
 * Controller for handling anggota module
 * @author : Doni Setio Pambudi (donisp06@gmail.com)
 */
class Scopus extends CI_Controller {

	/*
	 * constructor class
	 */
	public function __construct() {
		parent::__construct();

		//set module, enable for authentication
		//$this->auth->set_default_module('publikasi_dosen');
		//enable dibawah ini jika divalidasi semua
		//$this->auth->validate(TRUE);
		//enable dibawah ini jika divalidasi user telah login saja
		//$this->auth->validate(TRUE, TRUE);

		//load this page model
		$this->load->model('m_publikasi_dosen');
		$this->load->model('m_log_sistem');

		//load foregin lang if exist
		$this->lang->load('module/detil_kode_publikasi');
		$this->lang->load('module/anggota');
		$this->lang->load('module/pegawai');
		$this->lang->load('module/report');

		//load lang, place this module after foreign lang, so module_ not overriden by foreign lang
		$this->lang->load('module/publikasi_dosen');

  	}


	public function index() 
	{
		//set informasi halaman
		$this->site_info->set_page_title('Manajemen Data Scopus');
		//set breadcrumb
		$this->site_info->add_breadcrumb('Manajemen Data Scopus');
		//add menu highlight
		$this->site_info->set_current_module('klasifikasi');
		$this->site_info->set_current_submodule('upload_scopus');

		$this->auth->validate(TRUE, TRUE);

		// $this->asset_library->add_masterpage_script();
		$this->asset_library->add_js('js/pages/scopus.js');

		$dir = '/var/www/silacak/assets/scopus';
		$dir2 ='D:\Kuliah\TugasAkhir';
		$data['result'] = scandir($dir);

		$this->load->view('base/header');
		$this->load->view('scopus/index', $data);
		$this->load->view('base/footer');
	}

    public function tambahscopus() 
	{
		//set informasi halaman
		$this->site_info->set_page_title('Tambah Data Scopus');
		//set breadcrumb
		$this->site_info->add_breadcrumb('Tambah Data Scopus');
		//add menu highlight
		$this->site_info->set_current_module('klasifikasi');
		$this->site_info->set_current_submodule('upload_scopus');

		$this->auth->validate(TRUE, TRUE);

		// $this->asset_library->add_masterpage_script();
		$this->asset_library->add_js('js/pages/scopus.js');
		$dir = '/var/www/silacak/assets/scopus';
		$dir2 ='D:\Kuliah\TugasAkhir';
		$data['result'] = scandir($dir);

		$this->load->view('base/header');
		$this->load->view('scopus/tambah', $data);
		$this->load->view('base/footer');
	}

	public function klasifikasiscopus() 
	{
		//set informasi halaman
		$this->site_info->set_page_title('Klasifikasi Scopus');
		//set breadcrumb
		$this->site_info->add_breadcrumb('Klasifikasi Scopus');
		//add menu highlight
		$this->site_info->set_current_module('klasifikasi');
		$this->site_info->set_current_submodule('klas_scopus');

		$this->auth->validate(TRUE, TRUE);

		// $this->asset_library->add_masterpage_script();
		$this->asset_library->add_js('js/pages/scopus.js');
		$dir = '/var/www/silacak/assets/scopus';

		$dir2 ='D:\Kuliah\TugasAkhir';
		$data['result'] = scandir($dir);

		$this->load->view('base/header');
		$this->load->view('scopus/klasifikasi', $data);
		$this->load->view('base/footer');
	}

}