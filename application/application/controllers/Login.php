<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controller for login
 * @author : Doni Setio Pambudi (donisp06@gmail.com)
 */
class Login extends CI_Controller {

	public function index(){
		$this->load->library('auth');
		if($this->auth->is_login())
		{
			redirect("dashboard");
		}
		else
		{
			$this->asset_library->add_css('css/pages/login.css');
		$this->asset_library->add_js('plugins/jquery-validation/jquery.validate.min.js');
		$this->asset_library->add_js('js/pages/login.js');

		$this->asset_library->set_body_class('login');

		$data = array('error' => $this->auth->get_flash_session('error'));

		$this->load->view('base/header_fullpage');
		$this->load->view('login/index', $data);
		$this->load->view('base/footer_fullpage');
		}
		
	}

	public function authenticate(){
		if (!$this->input->is_ajax_request()) show_404();

		//hapus ini, enable otomatis di autoload
		$this->load->library('auth');

		//set validation form input
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[30]');
		$this->form_validation->set_rules('remember', 'Remember', 'integer');

		//validarion form run ok..
		if ($this->form_validation->run()) {
			$login_result = $this->auth->login(
												$this->input->post('username'),
												$this->input->post('password'),
												$this->input->post('remember') == '1' ? TRUE : FALSE);
			if($login_result->success){
				//sukses
				ajax_response();
			}else{
				ajax_response('error', $login_result->message);
			}
		}else{
			ajax_response('error', validation_errors());
		}

	}

	public function logout(){
		$this->auth->logout();
		redirect(base_url());
	}
}