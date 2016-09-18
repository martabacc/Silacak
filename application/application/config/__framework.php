<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * dont add config here, add in __custom.php
 * if you want preload __custom, add to config/autoload.php
 */

$config['site_creator'] = 'Optima IT Solution';
$config['site_year'] = '2015';
$config['creator_website'] = 'http://optimasolution.co.id';

$config['root_username'] = 'root';
$config['root_password'] = 'Rahasia123!';


/* config for auth library */
/*
 * sess_cookie_name dan sess_expiration ubah di config.php
 */
$config['auth_session_model']   = 'm_usersession';
$config['auth_session_prefix']  = 'uss_';
$config['auth_user_model']      = 'm_pengguna';
$config['auth_pk_column']       = 'usr_id';
$config['auth_username_column'] = 'usr_username';
$config['auth_password_column'] = 'usr_password';
$config['auth_name_column']     = 'usr_name';
$config['auth_salt_column']     = 'usr_salt';
$config['auth_error_page']      = 'error/view';
$config['auth_expired_page']    = 'error/expired';
$config['auth_dashboard_page']  = 'dashboard';
$config['auth_session_remember']= 1209600; /* 2 week in second */
/* end of config for auth library */

/* config for helper write_log */
$config['log_model'] = 'm_pelacakanlog';
$config['log_prefix'] = 'plg_';
/* end of config for helper write_log */

/* config for helper load dan update settingsetting */
$config['setting_model'] = 'm_pelacakansetting';
$config['setting_prefix'] = 'pst_';
/* end of config for helper load dan update settingsetting */