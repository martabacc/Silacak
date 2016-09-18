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
    <meta content="<?php echo $this->site_info->get_page_author(); ?>" name="author" />
    <meta content="<?php echo $this->site_info->get_page_keyword(); ?>" name="keyword" />

    <link href='https://fonts.googleapis.com/css?family=Maven+Pro:500' rel='stylesheet' type='text/css'>
    <?php
        $this->asset_library->add_css('plugins/font-awesome/css/font-awesome.min.css', 'core-style');
        $this->asset_library->add_css('plugins/simple-line-icons/simple-line-icons.min.css', 'core-style');
        $this->asset_library->add_css('plugins/bootstrap/css/bootstrap.min.css', 'core-style');
        $this->asset_library->add_css('plugins/uniform/css/uniform.default.min.css', 'core-style');
        $this->asset_library->add_css('plugins/bootstrap-switch/css/bootstrap-switch.min.css', 'core-style');
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
<body class="page-header-fixed page-sidebar-fixed page-footer-fixed <?php echo $this->asset_library->get_body_class(); ?>">
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner">
            <div class="page-logo">
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" class="logo-default" />
                </a>
                <div class="menu-toggler sidebar-toggler"></div>
            </div>
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/img/avatar.png" />
                            <span class="username username-hide-on-mobile">
                                <?php echo $this->auth->get_user_name(); ?>
                            </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="<?php echo base_url(); ?>login/logout">
                                    <i class="fa fa-sign-out"></i> Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="sidebar-search-wrapper">
                        <form class="sidebar-search sidebar-search-bordered sidebar-search-solid" method="POST">
                            <a href="javascript:;" class="remove">
                            <i class="icon-close"></i>
                            </a>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                                </span>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item ">
                        <a href="<?php echo base_url(); ?>publikasi_dosen" module="publikasi_dosen">
                            <i class="icon-notebook"></i>
                            <span class="title">Publikasi</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?php echo base_url(); ?>anggota" module="anggota">
                            <i class="icon-users"></i>
                            <span class="title">Anggota Publikasi</span>
                        </a>
                    </li>
					<li class="nav-item ">
                        <a href="<?php echo base_url(); ?>pegawai" module="pegawai">
                            <i class="icon-envelope"></i>
                            <span class="title">Tambah Email Dosen</span>
                        </a>
                    </li>
					<li class="nav-item ">
                        <a href="<?php echo base_url(); ?>log_sistem" module="log_sistem">
                            <i class="icon-docs"></i>
                            <span class="title">Log Tarik Data</span>
                        </a>
                    </li>
<<<<<<< HEAD
					<li class="start">
                        <a href="<?php echo base_url(); ?>/report/penarikan_data" module="dashboard">
                            
                            <span class="title">Laporan Tarik Data Bulanan</span>
                        </a>
                    </li>
					<li class="start">
                        <a href="<?php echo base_url(); ?>/report/penarikan_data_tahunan" module="dashboard">
                            
                            <span class="title">Laporan Tarik Data Tahunan</span>
                        </a>
                    </li>
					<li class="start">
                        <a href="<?php echo base_url(); ?>/report/jurnal" module="dashboard">
                            
                            <span class="title">Laporan Data Jurnal</span>
                        </a>
                    </li>
					<li class="start">
                        <a href="<?php echo base_url(); ?>/report/unit" module="dashboard">
                            
                            <span class="title">Laporan Data Unit</span>
=======
                    <li class="nav-item ">
                        <a href="javascript:;" class="nav-link nav-toggle" module="report">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Laporan</span>
                            <span class="arrow"></span>
>>>>>>> fe294204726156bb22fe31a67ff838a9649b2e6a
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>report/penarikan_data" class="nav-link " module="report_penarikan_data">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Rekap Tarik Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php if($this->auth->is_root()){ $this->load->view('base/sidebar_root'); } ?>
                    <!-- <li class="last">
                        <a href="<?php echo base_url(); ?>login/logout">
                            <i class="fa fa-sign-out"></i>
                            <span class="title">Logout</span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="page-content-wrapper">
            <div class="page-content">
                <h3 class="page-title">
                    <?php echo $this->site_info->get_page_title(); ?>
                    <small><?php echo $this->site_info->get_page_subtitle(); ?></small>
                </h3>
                <div class="page-bar">
                    <?php
                        $_breadcrumb = $this->site_info->get_breadcrumb_data();
                     ?>
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="<?php echo base_url(); ?>" title="<?php echo $this->lang->line('breadcrumb_home'); ?>"><i class="fa fa-home"></i></a>
                            <?php if(count($_breadcrumb) > 0){ ?>
                            <i class="fa fa-angle-right"></i>
                            <?php } ?>
                        </li>
                        <?php
                            $_max_breadcrumb = count($_breadcrumb);
                            foreach($_breadcrumb as $_br){ ?>
                        <li>
                            <a href="<?php echo $_br->url; ?>"><?php echo $_br->label; ?></a>
                            <?php if($_max_breadcrumb > 1){ ?>
                            <i class="fa fa-angle-right"></i>
                            <?php } ?>
                        </li>
                        <?php
                                $_max_breadcrumb--;
                            } ?>
                    </ul>
                </div>
                <div id="main-alert" class="alert alert-danger" style="display:none;">
                    <button class="close" data-close="alert"></button>
                    <div class="alert-wrapper"><strong class="alert-title">Sample Title</strong> <span class="alert-content"> Some Content</span></div>
                </div>