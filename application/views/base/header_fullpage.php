<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
    <title><?php echo $this->site_info->get_page_title(true); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="<?php echo $this->site_info->get_page_description(); ?>" name="description" />
    <meta content="<?php echo $this->site_info->get_creator_website(); ?>" name="author" />
    <meta content="<?php echo $this->site_info->get_page_keyword(); ?>" name="keyword" />

	<link href='https://fonts.googleapis.com/css?family=Maven+Pro:500' rel='stylesheet' type='text/css'>
	<?php
        $this->asset_library->add_css('plugins/font-awesome/css/font-awesome.min.css', 'core-style');
        $this->asset_library->add_css('plugins/bootstrap/css/bootstrap.min.css', 'core-style');
        $this->asset_library->add_css('plugins/uniform/css/uniform.default.min.css', 'core-style');

        $this->asset_library->add_css('css/components-rounded.css', 'core-style');
        $this->asset_library->add_css('css/plugins.css', 'core-style');
        $this->asset_library->add_css('css/layout.css', 'core-style');
        $this->asset_library->add_css('css/themes/light2.css', 'core-style');

        echo $this->asset_library->get_all_css(false);
     ?>
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico"/>

    <?php echo $this->asset_library->get_header_js(); ?>
</head>
<body class="<?php echo $this->asset_library->get_body_class(); ?>">