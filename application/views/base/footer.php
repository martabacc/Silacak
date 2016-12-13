<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
            </div>
        </div>
    </div>
    <div class="page-footer" style="height:50px">
        <div class="page-footer-inner" style="text-align:center;float: none;display: block;">
            Sistem Informasi Pelacakan ITS<br />
            <a href="<?php echo $this->site_info->get_creator_website(); ?>"><?php echo $this->site_info->get_site_creator(); ?></a> | &copy; <?php echo $this->site_info->get_site_year(); ?>
        </div>
        <div class="scroll-to-top">
            <i class="fa fa-arrow-circle-o-up" style="font-size: 36px;"></i>
        </div>
    </div>
    <script type="text/javascript">
        var template_config = {
            assetsPath: "<?php echo base_url(); ?>assets/",
            globalImgPath: "img/",
            globalPluginsPath: "plugins/",
            globalCssPath: "css/"
        };
        var base_url = "<?php echo base_url(); ?>";
        var csrf_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
    </script>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
    <![endif]-->
    <?php

        $this->asset_library->add_js('plugins/jquery-migrate.min.js', 'core-plugin-part-1');
        $this->asset_library->add_js('plugins/jquery-ui/jquery-ui.min.js', 'core-plugin-part-1');
        $this->asset_library->add_js('plugins/bootstrap/js/bootstrap.min.js', 'core-plugin-part-1');
        echo $this->asset_library->get_merged_js('core-plugin-part-1');

        $this->asset_library->add_js('plugins/bootstrap-hover-dropdown.min.js', 'core-plugin-part-2');
        $this->asset_library->add_js('plugins/jquery.slimscroll.min.js', 'core-plugin-part-2');
        $this->asset_library->add_js('plugins/jquery.blockui.min.js', 'core-plugin-part-2');
        $this->asset_library->add_js('plugins/jquery.cokie.min.js', 'core-plugin-part-2');
        $this->asset_library->add_js('plugins/uniform/jquery.uniform.min.js', 'core-plugin-part-2');
        $this->asset_library->add_js('plugins/bootstrap-switch/js/bootstrap-switch.min.js', 'core-plugin-part-2');
        $this->asset_library->add_js('plugins/bootbox/bootbox.min.js', 'core-plugin-part-2');

        $this->asset_library->add_js('plugins/webtemplate.js', 'core-plugin-part-2');
        $this->asset_library->add_js('plugins/layout.js', 'core-plugin-part-2');
        $this->asset_library->add_js('js/site.js', 'core-plugin-part-2');
        echo $this->asset_library->get_merged_js('core-plugin-part-2');
     ?>
    <script type="text/javascript">
        $(document).ready(function () {
            WebTemplate.init();
            Layout.init();

            <?php
                $current_module = $this->site_info->get_current_module();
                if($current_module != ''){ ?>
                    var selected_menu = $('.page-sidebar-menu li a[module="<?php echo $current_module; ?>"]');
                    if(selected_menu.length > 0){
                        selected_menu.parent().addClass('active');
                        selected_menu.append('<span class="selected"></span>');
                    }
             <?php } ?>

            <?php
                $sub_module = $this->site_info->get_current_submodule();
                if($sub_module != ''){ ?>
                    var selected_menu = $('.page-sidebar-menu li a[module="<?php echo $sub_module; ?>"]');
                    if(selected_menu.length > 0){
                        selected_menu.parent().addClass('active');
                        selected_menu.append('<span class="selected"></span>');
                    }
             <?php } ?>
        });
    </script>
    <?php echo $this->asset_library->get_all_js(); ?>
</body>
</html>