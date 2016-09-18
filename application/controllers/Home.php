<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controller for Home
 * @author : Doni Setio Pambudi (donisp06@gmail.com)
 */
class Home extends CI_Controller {

	public function index(){
		if($this->auth->is_login()){
			redirect('dashboard');
		}
		$this->load->view('home/index');
	}
}