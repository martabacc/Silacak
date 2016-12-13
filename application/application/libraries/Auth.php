<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {
	private $CI;

	/*
	 * Auth constant, change this depend on your need
	 * Restriction, session table must have :
	 * session id = varchar 40
	 * session ip = varchar 16
	 * session user agent = varchar 120
	 * session lastactivity = integer unsigned
	 * session content = text
	 * session visible data = varchar 50
	 *
	 * model must have name : m_tablename, if not, modify this file
	 */
	/* set session table name */
	private $_session_model = '';
	/* prefix table session */
	private $_session_prefix = '';

	/* set user table for login query */
	private $_user_model = '';
	/* set visible column in user table for session visible data */
	private $_pk_column = '';
	/* column setting for user username */
	private $_username_column = '';
	/* column setting for user password */
	private $_password_column = '';
	/* column setting for user name / description */
	private $_name_column = '';
	/* column setting for user salt */
	private $_salt_column = '';
	/* default redirect page */
	private $_expired_page = '';
	/* dashboard, if user is login but don't have access */
	private $_dashboard_page = '';

	/*
	 * private object handler
	 */
	private $_current_session;
	/* cookie name */
	private $_cookie_name;
	/* session expiration */
	private $_sess_expiration;
	/* session remember in second */
	private $_sess_remember_length = 0;
	/* access limitation - default module */
	private $_default_module = '';
	/* access limitation - all access */
	private $_access = array();

	/* set if we use root account */
	private $_use_root_account = TRUE;
	/* root account username */
	private $_root_username = '';
	/* root account password */
	private $_root_password = '';
	/* set true di production */
	private $_validate_access = TRUE;

	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->helper('cookie');
		$this->CI->load->library('encrypt');

		$this->_cookie_name     = $this->CI->config->item('sess_cookie_name');
		$this->_sess_expiration = $this->CI->config->item('sess_expiration');
		//load from __framework config
		$this->_session_model        = $this->CI->config->item('auth_session_model');
		$this->_session_prefix       = $this->CI->config->item('auth_session_prefix');
		$this->_user_model           = $this->CI->config->item('auth_user_model');
		$this->_pk_column            = $this->CI->config->item('auth_pk_column');
		$this->_username_column      = $this->CI->config->item('auth_username_column');
		$this->_password_column      = $this->CI->config->item('auth_password_column');
		$this->_name_column          = $this->CI->config->item('auth_name_column');
		$this->_salt_column          = $this->CI->config->item('auth_salt_column');
		$this->_expired_page         = $this->CI->config->item('auth_expired_page');
		$this->_dashboard_page       = $this->CI->config->item('auth_dashboard_page');
		$this->_sess_remember_length = $this->CI->config->item('auth_session_remember');
		//end of load config

		$this->CI->load->model($this->_session_model);
		$this->CI->load->model($this->_user_model);

		//get root account
		if($this->_use_root_account){
			//use this if setting from config file
			$this->_root_username = $this->CI->config->item('root_username');
			$this->_root_password = $this->CI->config->item('root_password');

			//otherwise you can use setting database
			//$this->CI->load->model('m_setting');
			//$this->_root_username = $this->CI->m_setting->get_by_column('root_username', 'stg_name')->stg_value;
			//$this->_root_password = $this->CI->m_setting->get_by_column('root_password', 'stg_name')->stg_value;
		}

		//delete session expire
		$expire_time = time() - $this->_sess_expiration;
		$session_table = $this->_session_model;
		$this->CI->$session_table->permanent_delete_custom($this->_session_prefix . "lastactivity < $expire_time");

		if($this->__decode_user() === FALSE)
			$this->__create_new_session_data();
	}

	public function add_session($session_name, $session_value){
		$this->_current_session->user_session[$session_name] = $session_value;
		//save to session
		if($this->is_login()){
			$this->__set_login($this->_current_session->profile, $this->_current_session->remember, $this->_current_session->is_root);
		}else{
			$this->__set_login();
		}
	}

	public function add_flash_session($session_name, $session_value){
		$this->_current_session->flash_session[$session_name] = $session_value;
		//save to session
		if($this->is_login()){
			$this->__set_login($this->_current_session->profile, $this->_current_session->remember, $this->_current_session->is_root);
		}else{
			$this->__set_login();
		}
	}

	public function get_session($session_name){
		if(isset($this->_current_session->user_session[$session_name]))
			return $this->_current_session->user_session[$session_name];
		else
			return FALSE;
	}

	public function get_flash_session($session_name){
		if(isset($this->_current_session->flash_session[$session_name])){
			$flash_value = $this->_current_session->flash_session[$session_name];
			unset($this->_current_session->flash_session[$session_name]);

			if($this->is_login()){
				$this->__set_login($this->_current_session->profile, $this->_current_session->remember, $this->_current_session->is_root);
			}else{
				$this->__set_login();
			}

			return $flash_value;
		}else
			return FALSE;
	}

	public function get_raw(){
		return $this->_current_session;
	}

	public function get_user(){
		return $this->_current_session->profile;
	}

	public function get_user_id(){
		if(!$this->is_login()) return FALSE;
		if($this->is_root()) return 0;
		$pk_col = $this->_pk_column;
		return $this->_current_session->profile->$pk_col;
	}

	public function get_user_name(){
		if(!$this->is_login()) return FALSE;
		if($this->is_root()) return $this->CI->config->item('root_username');
		$name_col = $this->_name_column;
		return $this->_current_session->profile->$name_col;
	}

	public function is_login(){
		return $this->_current_session->profile !== FALSE || $this->is_root();
	}

	public function is_root(){
		return $this->_current_session->is_root === TRUE;
	}

	public function login($username, $password, $remember=FALSE){
		$user_table = $this->_user_model;

		$login_result = $this->__create_result_template();

		if($this->_use_root_account){
			if($username == $this->_root_username && $password == $this->_root_password){
				//set is root
				$this->__set_login(NULL, FALSE, TRUE);
				return $this->__create_result_template(TRUE, $this->CI->lang->line('auth_login_success'));
			}
		}

		$this->CI->load->model($user_table);
		$user_login = $this->CI->$user_table->get_by_column($username, $this->_username_column);
		if($user_login == NULL){
			/* no user found */
			$login_result = $this->__create_result_template(FALSE, $this->CI->lang->line('auth_login_failed'));
		}else{
			$salt_column = $this->_salt_column;
			$password_column = $this->_password_column;
			$stored_password = md5($password);
			if($user_login->$password_column != $stored_password){
				return $this->__create_result_template(FALSE, $this->CI->lang->line('auth_login_failed'));
			}

			/* user found, you can add manual filter here */
			// example if($user_login->adm_blocked == 1) echo blocked reason

			//set login
			$login_result = $this->__create_result_template(TRUE, $this->CI->lang->line('auth_login_success'));
			$is_sa = $user_login->usr_issa === 1 ? TRUE : FALSE;
			if($this->__set_login($user_login, $remember, $is_sa) === FALSE){
				$login_result = $this->__create_result_template(FALSE, $this->CI->lang->line('auth_login_failed'));
			}
		}

		return $login_result;
	}

	public function logout(){
		$session_table = $this->_session_model;
		$user_table = $this->_user_model;
		$pk_col = $this->_pk_column;

		//delete session from db
		$session_cookie = $this->__get_session_cookie();

		if($session_cookie !== FALSE){
			if($this->is_root())
				$this->CI->$session_table->permanent_delete($session_cookie['session_id']);
			else
				$this->CI->$session_table->permanent_delete($session_cookie['user_id'], $this->_session_prefix . 'user');
		}
		//delete cookie
		delete_cookie($this->_cookie_name);
	}

	public function set_default_module($module_name){
		$this->_default_module = $module_name;
	}

	public function set_access($action, $module=''){
		if($module == '') $module = $this->_default_module;
		$this->_access[] = array($module, $action);
	}

	/*
	 * custom this function, i will provide some commented example
	 */
	public function validate($redirect=FALSE, $just_login=FALSE){
		//if user is root, login as root
		if($this->_current_session->is_root) return TRUE;

		//if not login, redirect to expired page
		if(!$this->is_login()){
			if($redirect){
				redirect($this->_expired_page);
			}else{
				ajax_response('expired', base_url() . $this->_expired_page);
			}
		}

		if($just_login || !$this->_validate_access)
			return TRUE;

		//compare access here, if access found, return true
		/*
			//EXAMPLE ONLY
			$current_user = $this->_current_session->get_user();
			$this->load->model('m_useraccess');
			//example we have function get_all_access with user id as param
			$db_access = $this->m_useraccess->get_all_access($current_user->pk);

			//compare if we have access
			foreach($this->_access as $local_access){
				foreach($db_access as $access){
					if($local_access[0] == $access->acc_module && $local_access[1] == $access->acc_action){
						return true;
					}
				}
			}
		*/
		//temp return true
		return TRUE;
	}

	private function __create_new_session_data(){
		$session_data = new stdClass();
		$session_data->profile = FALSE;
		$session_data->remember = FALSE;
		$session_data->is_root = FALSE;
		$session_data->user_session = array();
		$session_data->flash_session = array();

		$this->_current_session = $session_data;
	}

	private function __create_result_template($success=FALSE, $message='initialization object'){
		$result = new stdClass();
		$result->success = $success;
		$result->message = $message;

		return $result;
	}

	private function __decode_user(){
		$session_cookie = $this->__get_session_cookie();
		if($session_cookie === FALSE) return FALSE;

		/* check decoded cookie expired information */
		if($session_cookie['cookie_expired'] < time()) return FALSE;

		$session_table = $this->_session_model;
		$user_table = $this->_user_model;
		$session_obj = $this->CI->$session_table->get_by_column($session_cookie['session_id']);
		if($session_obj == NULL){
			if($session_cookie['user_id'] != '0'){
				$login_user = $this->CI->$user_table->get_by_column($session_cookie['user_id']);
				if($login_user != NULL){
					$this->__create_new_session_data();
					return $this->__set_login($login_user, $session_cookie['remember'] == '1' ? TRUE : FALSE);
				}else{
					delete_cookie($this->_cookie_name);
					return FALSE;
				}
			}else if($session_cookie['user_id'] == '0'){
				$this->__create_new_session_data();
				return $this->__set_login(NULL, FALSE, TRUE);
			}
		}

		$data_column = $this->_session_prefix . 'content';
		$pk_col = $this->_pk_column;
		$session_data = unserialize($session_obj->$data_column);
		if(empty($session_data)){
			//error in decoding json
			return FALSE;
		}else{
			$session_id = $this->_session_prefix . 'id';
			//if not login
			//update session
			$this->CI->$session_table->update_single_column($this->_session_prefix . 'lastactivity', time(), $session_obj->$session_id);

			$saved_id = NULL;
			if($session_data->is_root){
				$saved_id = '0';
			}else if($session_data->profile !== FALSE){
				$saved_id = $session_data->profile->$pk_col;
			}

			//update cookie
			$expire = time() + ($session_cookie['remember'] == '1' ? $this->_sess_remember_length : $this->_sess_expiration);
			$cookie = array(
						   'name'   => $this->_cookie_name,
						   'value'  => $this->CI->encrypt->encode($session_obj->$session_id . "|" .
																  ($saved_id == NULL ? '' : $saved_id) . "|" .
																  $session_cookie['remember'] . "|" .
																  $expire),
						   'expire' => $session_cookie['remember'] == '1' ? $this->_sess_remember_length : $this->_sess_expiration
					  );
			set_cookie($cookie);

			//set session data
			$this->_current_session = $session_data;
		}

		return TRUE;
	}

	private function __generate_session_id(){
		$session_id = guid() . guid();
		$session_id .= $this->CI->input->ip_address();
		return substr(md5(uniqid($session_id, TRUE)) . guid(), 0, 40);
	}

	private function __get_session_cookie(){
		$cookie = get_cookie($this->_cookie_name);
		if($cookie === FALSE) return FALSE;

		$cookie_encrypted = $this->CI->encrypt->decode($cookie);
		if($cookie_encrypted === FALSE) return FALSE;

		$session_data = explode('|', $cookie_encrypted);
		if(count($session_data) != 4) return FALSE;
		return array('session_id' => $session_data[0], //session id
					 'user_id' => intval($session_data[1]), //pk user
					 'remember' => $session_data[2], //true or false
					 'cookie_expired' => $session_data[3]); //cookie expired
	}

	private function __set_login($user_login=NULL, $remember=FALSE, $is_root=FALSE){
		$session_table = $this->_session_model;
		$session_cookie = $this->__get_session_cookie();

		//if current cookie exist
		if($session_cookie !== FALSE){
			//deleted current session, if exist
			$this->CI->$session_table->permanent_delete($session_cookie['session_id']);

			//delete user in session data == user in cookie
			$this->CI->$session_table->permanent_delete($session_cookie['user_id'], $this->_session_prefix . 'user');
		}
		$user_id = $this->_pk_column;
		if($user_login != NULL){
			//delete same user session with user == login user
			$this->CI->$session_table->permanent_delete($user_login->$user_id, $this->_session_prefix . 'user');
			//resetting session data
			$this->_current_session->profile = $user_login;

			if($session_cookie !== FALSE)
				$remember = $session_cookie['remember'] == '1' ? TRUE : FALSE;
		}
		$this->_current_session->remember = $remember;
		$this->_current_session->is_root = $is_root;
		$session_id = $this->__generate_session_id();

		$current_time = time();

		$saved_id = NULL;
		if($user_login != NULL && !$is_root)
			$saved_id = $user_login->$user_id;
		else if($is_root)
			$saved_id = 0;

		$this->CI->$session_table->insert($session_id,
										  $this->CI->input->ip_address(),
										  substr($this->CI->input->user_agent(), 0, 120),
										  $current_time,
										  serialize($this->_current_session),
										  $saved_id);
		$expire = time() + ($remember ? $this->_sess_remember_length : $this->_sess_expiration);
		$cookie = array(
					   'name'   => $this->_cookie_name,
					   'value'  => $this->CI->encrypt->encode($session_id . "|" .
															  ($saved_id == NULL ? '' : $saved_id) . "|" .
															  ($remember == TRUE ? '1' : '0') . "|" .
															  $expire),
					   'expire' => $remember ? $this->_sess_remember_length : $this->_sess_expiration
				  );
		set_cookie($cookie);
		return TRUE;
	}
}