<html>
	<head>
		<title>Framework Index</title>
		<style type="text/css">
			li{
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<h1>Selamat Datang di Home Framework</h1>
		<ol>
			<li>
				<?php if($this->auth->is_login()){ ?>
				<b>Logut here :</b> <a href="<?php echo base_url(); ?>login/logout">Logout</a>
				<?php }else{ ?>
				<b>Login here :</b> <a href="<?php echo base_url(); ?>login">Login</a>
				<?php } ?>
			</li>
			<li>
				<b>Raw session data :</b>
				<div><?php var_dump($this->auth->get_raw()); ?></div>
			</li>
			<li>
				<b>Session data auth method raw output</b>
				<ul>
					<li>
						get_user :
						<div><?php var_dump($this->auth->get_user()); ?></div>
					</li>
					<li>
						get_user_id :
						<div><?php var_dump($this->auth->get_user_id()); ?></div>
					</li>
					<li>
						get_user_name :
						<div><?php var_dump($this->auth->get_user_name()); ?></div>
					</li>
					<li>
						is_login :
						<div><?php var_dump($this->auth->is_login()); ?></div>
					</li>
					<li>
						is_root :
						<div><?php var_dump($this->auth->is_root()); ?></div>
					</li>
				</ul>
			</li>
			<li>Sample Modul : <a href="<?php echo base_url(); ?>sampletable">Sample Table</a></li>
			<li>Module Log : <a href="<?php echo base_url(); ?>frameworklog">Framework Log</a></li>
			<li>Module Setting : <a href="<?php echo base_url(); ?>frameworksetting">Framework Setting</a></li>
			<li>Module User Session : <a href="<?php echo base_url(); ?>usersession">User Session</a></li>
		</ol>
	</body>
</html>