<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controller for handling pengguna module
 * @author : Doni Setio Pambudi (donisp06@gmail.com)
 */
class Notification extends CI_Controller {

	/*
	 * constructor class
	 */
	public function __construct() {
		parent::__construct();

		//set module, enable for authentication
		//$this->auth->set_default_module('pengguna');
		//enable dibawah ini jika divalidasi semua
		//$this->auth->validate(TRUE);
		//enable dibawah ini jika divalidasi user telah login saja
		//$this->auth->validate(TRUE, TRUE);

		//load this page model
		$this->load->model('m_pengguna');

		//load foregin lang if exist


		//load lang, place this module after foreign lang, so module_ not overriden by foreign lang
		$this->lang->load('module/pengguna');
  	}

	/*
	 * method index controller pengguna
     * generated by Doni's Framework Generator
	 *
	 * this method act as module entry point
	 *
	 * @author: Doni Setio Pambudi
	 * @access: public
	 * @return: no return, view a page
	 */
	public function index(){
		//$this->auth->set_access('view');
		$this->auth->validate(TRUE);

		//set informasi halaman
		$this->site_info->set_page_title("Pemberitahuan Perubahan dalam Aplikasi");
		//set breadcrumb
		$this->site_info->add_breadcrumb($this->lang->line('module_title'));

		//add masterpage script
		$this->asset_library->add_masterpage_script();

		$data = array();

		//load view
		$this->load->view('base/header');
		$this->load->view('notification/index', $data);
		$this->load->view('base/footer');
	}

	/*
	 * get_datamaster method
     * generated by Doni's Framework Generator
	 *
	 * this method handle get datamaster request from datatables
	 *
	 * @author	Doni Setio Pambudi
	 * @access	public
	 * @return	json string
	 */
	
}