<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controller for Error
 * @author : Doni Setio Pambudi (donisp06@gmail.com)
 */
class Error extends CI_Controller {

	public function view(){
		//set informasi halaman
		$this->site_info->set_page_title($this->lang->line('error_title'), $this->lang->line('error_subtitle'));
		//set breadcrumb
		$this->site_info->add_breadcrumb($this->lang->line('error_title'));

		$data = array('error' => $this->auth->get_flash_session('error'));

		if($data['error'] === FALSE){
			$this->auth->logout();
			redirect('error/expired');
		}

		$is_login = $this->auth->is_login() ? '' : '_fullpage';

		$this->load->view("base/header$is_login");
		$this->load->view('errors/page_error', $data);
		$this->load->view("base/footer$is_login");
	}

	public function expired(){
		$this->auth->add_flash_session('error', $this->lang->line('error_expired'));
		redirect('login');
	}
}