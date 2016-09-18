<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Site_info {
	private $_site_title = '';
	private $_page_title = '';
	private $_page_subtitle = '';
	private $_page_description = '';
	private $_page_author = '';
	private $_page_keyword = '';

	private $_site_creator = '';
	private $_site_year = '';
	private $_creator_website = '';

	private $_breadcrumb = [];

	private $_current_module = '';
	private $_current_submodule = '';

	public function __construct(){
		$this->CI =& get_instance();
		$this->_site_title = $this->CI->lang->line('site_title');

		$this->_site_creator = $this->CI->config->item('site_creator');
		$this->_site_year = $this->CI->config->item('site_year');
		$this->_creator_website = $this->CI->config->item('creator_website');
	}

	public function add_breadcrumb($label, $url='javascript:void(0);'){
		if(substr($url, 0, 4) != 'http' && $url != 'javascript:void(0);')
			$url = base_url() . $url;

		$new_breadcrumb = new stdClass();
		$new_breadcrumb->label = $label;
		$new_breadcrumb->url = $url;
		$this->_breadcrumb[] = $new_breadcrumb;
	}

	public function get_breadcrumb_data(){
		return $this->_breadcrumb;
	}

	public function get_current_module(){
		return $this->_current_module;
	}

	public function set_current_module($module_name){
		$this->_current_module = $module_name;
	}

	public function get_current_submodule(){
		return $this->_current_submodule;
	}

	public function set_current_submodule($module_name){
		$this->_current_submodule = $module_name;
	}

	public function set_page_title($title, $subtitle=''){
		$this->_page_title = $title;
		$this->_page_subtitle = $subtitle;
	}

	public function get_page_title($padding_default = FALSE){
		if($this->_page_title == '') return $this->_site_title;
		return $this->_page_title . ($padding_default ? ' - ' . $this->_site_title : '');
	}

	public function get_page_subtitle(){
		return $this->_page_subtitle;
	}

	public function get_page_description(){
		return $this->_page_description;
	}

	public function get_page_author(){
		return $this->_page_author == '' ? $this->_site_creator : $this->_page_author;
	}

	public function get_page_keyword(){
		return $this->_page_keyword;
	}

	public function get_site_creator(){
		return $this->_site_creator;
	}

	public function get_site_year(){
		return $this->_site_year;
	}

	public function get_creator_website(){
		return $this->_creator_website;
	}

	public function get_page_info_title(){
		return $this->_page_info_title;
	}
}