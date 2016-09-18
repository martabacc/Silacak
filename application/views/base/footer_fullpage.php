<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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

        $this->asset_library->add_js('plugins/jquery.min.js', 'core-plugin-part-1');
        $this->asset_library->add_js('plugins/jquery-migrate.min.js', 'core-plugin-part-1');
        $this->asset_library->add_js('plugins/jquery-ui/jquery-ui.min.js', 'core-plugin-part-1');
        $this->asset_library->add_js('plugins/bootstrap/js/bootstrap.min.js', 'core-plugin-part-1');
        echo $this->asset_library->get_merged_js('core-plugin-part-1');

       	$this->asset_library->add_js('plugins/jquery.blockui.min.js', 'core-plugin-part-2');
        $this->asset_library->add_js('plugins/jquery.cokie.min.js', 'core-plugin-part-2');
        $this->asset_library->add_js('plugins/uniform/jquery.uniform.min.js', 'core-plugin-part-2');
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
        });
    </script>
    <?php echo $this->asset_library->get_all_js(); ?>
</body>
</html>