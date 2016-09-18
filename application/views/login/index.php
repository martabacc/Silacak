<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if($error !== false){ ?>
<script type="text/javascript">
	var error_message = '<?php echo $error; ?>';
</script>
<?php } ?>
<div class="logo" style="margin-top: 20px;">
	<a href="<?php echo base_url(); ?>">
	<img src="<?php echo base_url(); ?>assets/img/logo3.png" alt="<?php echo $this->site_info->get_site_creator(); ?>"/>
	</a>
</div>
<div id="login-container" class="content" style="margin-top: 10px;">
	<form id="login-form" class="login-form" action="<?php echo base_url(); ?>login/authenticate" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"/>
		<h3 class="form-title">Login ke SI Pelacakan</h3>
		<div id="main-alert" class="alert alert-danger" style="display:none;">
			<button class="close" data-close="alert"></button>
			<div class="alert-wrapper"><strong class="alert-title">Sample Title</strong> <span class="alert-content"> Some Content</span></div>
		</div>
		<div class="form-group input-placement">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username" maxlength="50" />
		</div>
		<div class="form-group input-placement">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password" maxlength="30" />
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase pull-right">Login <i class="fa fa-arrow-circle-o-right"></i></button>
			<label class="rememberme check pull-right margin-right-10  input-placement">
				<input type="checkbox" id="remember" name="remember" value="1"/>Remember
			</label>
			<div class="clearfix"></div>
		</div>
		<div class="create-account">
			<p><a href="<?php echo $this->site_info->get_creator_website(); ?>" target="_blank">&copy; <?php echo $this->site_info->get_site_creator(); ?></a></p>
		</div>
	</form>
</div>
