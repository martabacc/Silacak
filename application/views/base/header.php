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
                    <img src="<?php echo base_url(); ?>assets/img/silacak1.png" alt="logo" class="logo-default" style="margin-top:0px" />
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
                        <a href="<?php echo base_url(); ?>dashboard" module="dashboard">
                            <i class="icon-notebook"></i>
                            <span class="title">Dashboard</span>
                        </a>
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
                            <span class="title">Sunting Data Pengarang</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?php echo base_url(); ?>pegawai/tarik_data" module="pegawai_tarik_data">
                            <i class="icon-magnet"></i>
                            <span class="title">Unduh Data Manual</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="javascript:;" class="nav-link nav-toggle" module="log_pdt">
                            <i class="icon-docs"></i>
                            <span class="title">PDT</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>log_sinkron" module="log_sinkron">
                                    <i class="icon-refresh"></i>
                                    <span class="title">Sinkronisasi PDT</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>pdt/log_clean" class="nav-link " module="log_clean">
                                    <i class="icon-docs"></i>
                                    <span class="title">Log Bersihkan PDT</span>
                                </a>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item ">
                        <a href="javascript:;" class="nav-link nav-toggle" module="log">
                            <i class="icon-docs"></i>
                            <span class="title">Log</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>log_admin" class="nav-link " module="log_admin">
                                    <i class="icon-docs"></i>
                                    <span class="title">Log Kegiatan</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>log_sistem" class="nav-link " module="log_sistem">
                                    <i class="icon-docs"></i>
                                    <span class="title">Log Pengunduhan Data</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>log_tarik" class="nav-link " module="log_tarik">
                                    <i class="icon-docs"></i>
                                    <span class="title">Log Periode Pengunduhan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item ">
                        <a href="javascript:;" class="nav-link nav-toggle" module="report">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Laporan</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>report/peneliti" class="nav-link " module="report_peneliti">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Laporan Pengunduhan</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>report/penarikan_data" class="nav-link " module="report_penarikan_data">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Laporan Bulanan</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>report/jurnal" class="nav-link " module="report_jurnal">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Laporan Data Jurnal</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>report/seminar" class="nav-link " module="report_seminar">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Laporan Data Seminar</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>report/tahun_publikasi" class="nav-link " module="tahun_publikasi">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Laporan Publikasi</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>report/penarikan_data_tahunan" class="nav-link " module="report_penarikan_data_tahunan">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Laporan Tahunan</span>
                                </a>
                            </li>
                            
							<li class="nav-item ">
                                <a href="<?php echo base_url(); ?>report/unit" class="nav-link " module="report_unit">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Laporan Unit</span>
                                </a>
                            </li>
							

                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="<?php echo base_url(); ?>setting" module="setting">
                            <i class="icon-settings"></i>
                            <span class="title">Konfigurasi</span>
                        </a>
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