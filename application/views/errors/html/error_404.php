<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$config =& get_config();
	$base_url = $config['base_url'];
 ?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/pages/error.css">
  </head>
  <body>
    <div class="wrapper row2">
      <div id="container" class="clear">
        <section id="fof" class="clear">
          <div class="hgroup clear">
            <h1>404</h1>
            <h2>Error ! <span>Page Not Found</span></h2>
          </div>
          <?php if(ENVIRONMENT == 'development'){ ?>
          <p><?php echo $message; ?></p>
          <?php }else{ ?>
          <p>For Some Reason The Page You Requested Could Not Be Found On Our Server</p>
          <?php } ?>
          <p><a href="javascript:history.go(-1)">&laquo; Go Back</a> / <a href="<?php echo $base_url; ?>">Go Home &raquo;</a></p>
        </section>
      </div>
    </div>
  </body>
</html>