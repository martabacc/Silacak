<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Author: Doni Setio Pambudi (donisp06@gmail.com)
 * Base Helper v0.0.4
 * This is base helper, don't add, edit, or delete function in this file
 * if you want to do something in this helper, create your own helper,
 * ex: custom_helper
 */


/*
 * Helper buat send response dalam bentuk json
 */
if (!function_exists('ajax_response'))
{
	function ajax_response($status='ok', $message="", $data=null, $terminate=true){
		$CI =& get_instance();

		$CI->output->set_content_type('application/json');

		$output = new stdClass();
		$output->status = $status;
		$output->message = $message;
		$output->data = $data;

		if($terminate){
			echo json_encode($output);
			exit(0);
		}else{
			return json_encode($output);
		}
	}
}

/*
 * convert back string from base64 but
 */
if (!function_exists('base64_safedecode'))
{
	function base64_safedecode($data){
		return base64_decode(str_replace(array('-', '_', '.'), array('=', '/', '+'), $data));
	}
}

/*
 * convert string to base64 but safe for url
 */
if (!function_exists('base64_safeencode'))
{
	function base64_safeencode($data){
		return str_replace(array('=', '/', '+'), array('-', '_', '.'), base64_encode($data));
	}
}

/*
 * build masterpage filter
 */
if (!function_exists('build_masterpage_filter'))
{
	function build_masterpage_filter($column_data, $additional_query='', $concat_syntax = 'and'){
		$filter = array();
		foreach($column_data as $col_name => $col_value){
			if(empty_or_null($col_value)) continue;
			$filter[] = "$col_name=" . escape_query($col_value);
		}
		$masterpage_filter = implode(" and ", $filter);
		if(!empty_or_null($additional_query)){
			$masterpage_filter .= $masterpage_filter == '' ? $additional_query : " $concat_syntax $additional_query";
		}
		return $masterpage_filter;
	}
}

/*
 * Change dangerous character from string
 */
if (!function_exists('clean_string'))
{
	function clean_string($str){
        return str_replace(array("'", '"', '<', '>'), array('&#39;', '&quot;', '&lt;', '&gt;'), stripslashes($str));
	}
}

/*
 * Helper cek untuk deny root, jika root redirect ke error
 */
if (!function_exists('deny_root'))
{
	function deny_root(){
		$CI =& get_instance();
		if($CI->auth->is_root()){
			$CI->auth->add_flash_session('error', $CI->lang->line('deny_root'));
			redirect($CI->config->item('auth_error_page'));
		}
	}
}

/*
 * helper for check if string is empty or null
 */
if (!function_exists('empty_or_null'))
{
	function empty_or_null($str){
        return (!isset($str) || trim($str) === '');
	}
}

/*
 * helper untuk escape string query, contoh penggunaannya :
 * $this->model->get("acc_name = " . escape_query($this->input->post('halo')));
 */
if (!function_exists('escape_query'))
{
	function escape_query($str, $like_query = FALSE, $like_before = TRUE, $like_after = TRUE){
		$model = new CI_Model();
		if($like_query){
			$like_before = $like_before ? '%' : '';
			$like_after = $like_after ? '%' : '';
			return "'$like_before".$model->db->escape_str($str,TRUE)."$like_after'";
		}
		else
			return $model->db->escape($str);
	}
}

/*
 * Helper buat print error
 */
if (!function_exists('framework_error'))
{
	function framework_error($msg = '')
	{
		echo '<div style="border: solid 1px red; padding: 10px; color: red;">[Framework Error] : ' . $msg . '</div>';
	}
}

/*
 * helper for create guid
 */
if (!function_exists('guid'))
{
	function guid($pad_left = '', $pad_right = ''){
		mt_srand((double)microtime()*10000);
        return md5($pad_left . uniqid(mt_rand(), true) . $pad_right);
	}
}

/*
 * make combobox from array
 */
if (!function_exists('make_combobox'))
{
	function make_combobox($arr_data=array(),
									   $attributes=array(),
									   $show_all=true,
									   $all_first=true,
									   $all_label='master_all'){
		$CI =& get_instance();
		if(!is_array($arr_data)){
			framework_error ('Lengkapi parameter fungsinya [Fungsi : build_combobox_from_array]');
			return;
		}

		$label_all = $CI->lang->line($all_label);

		$all_attribute = array();
		foreach($attributes as $k => $v){
			$all_attribute[] = "$k=\"$v\"";
		}
		$result = '<select ' . implode(" ", $all_attribute) . '>';
		if($show_all && $all_first) $result .= "<option value=\"\">" . $label_all . "</option>";
		foreach($arr_data as $k => $v){
			$result .= "<option value=\"" . $k . "\">" . $v . "</option>";
		}
		if($show_all && !$all_first) $result .= "<option value=\"\">" . $label_all . "</option>";
		$result .= '</select>';
		echo $result;
	}
}

/*
 * make combobox from object array
 */
if (!function_exists('make_object_combobox'))
{
	function make_object_combobox($arr_data=array(),
										$key_column='',
										$val_column='',
										$attributes=array(),
										$show_all=true,
										$all_first=true,
										$all_label='master_all'){
		if(!is_array($arr_data) || $key_column == '' || $val_column == ''){
			framework_error ('Lengkapi parameter fungsinya [Fungsi : build_combobox_from_object]');
			return '';
		}

		$pass_array = array();
		foreach($arr_data as $v){
			$pass_array[$v->$key_column] = $v->$val_column;
		}

		make_combobox($pass_array, $attributes, $show_all, $all_first, $all_label);
	}
}

/*
 * Helper buat print tanggal
 */
if (!function_exists('now'))
{
	function now($format = 'Y-m-d H:i:s')
	{ return date($format); }
}

/* load setting dari db */
if (!function_exists('setting_load'))
{
	function setting_load($setting_name)
	{
		if(trim($setting_name == '')) return false;

		$CI =& get_instance();
		$setting_model = $CI->config->item('setting_model');
		$setting_prefix = $CI->config->item('setting_prefix');
		$setting_value = $setting_prefix . "value";

		$CI->load->model($setting_model);
		$loaded_setting = $CI->$setting_model->get_by_column($setting_name, $setting_prefix . "name");

		if($loaded_setting == null) return false;
		return $loaded_setting->$setting_value;
	}
}

/* update setting */
if (!function_exists('setting_update'))
{
	function setting_update($setting_name, $setting_value)
	{
		if(trim($setting_name == '')) return false;

		$CI =& get_instance();
		$setting_model = $CI->config->item('setting_model');
		$setting_prefix = $CI->config->item('setting_prefix');

		$CI->load->model($setting_model);
		$CI->$setting_model->update_single_column($setting_prefix . "value", $setting_value, $setting_name, $setting_prefix . "name");
	}
}

/*
 * Helper buat mendapatkan angka unsigned integer
 */
if (!function_exists('uintval'))
{
	function uintval($num='', $return_empty=FALSE){
		$num = trim($num);
		if($return_empty && $num === '')
			return $num;
		if(ctype_digit($num))
			return $num;
		$num = preg_replace('/[^\d]/', '', $num);
		if($return_empty && $num === '')
			return $num;
		if(ctype_digit($num))
			return $num;
		return 0;
	}
}

/*
 * Helper buat write log
 */
if (!function_exists('write_log'))
{
	function write_log($table='', $action='',$info='')
	{
		$CI =& get_instance();

		if($CI->auth->is_login()){
			$log_model = $CI->config->item('log_model');
			$log_prefix = $CI->config->item('log_prefix');

			$CI->load->model($log_model);
			$CI->$log_model->insert($table, $action, $CI->auth->get_user_id(), now(), $info);
		}
	}
}