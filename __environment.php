<?php
	//default setting is production
	$_env_setting = 'development';

	switch($_SERVER['HTTP_HOST']){
		case 'localhost':
		case 'localhost:82':
		case '127.0.0.1':
			$_env_setting = 'development';
			break;
	}

	define('ENVIRONMENT', $_env_setting);
?>
