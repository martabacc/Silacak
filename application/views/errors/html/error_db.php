<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$config =& get_config();
	$base_url = $config['base_url'];
 ?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<title>500 Server Error</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/pages/error.css">
  </head>
  <body>
    <div class="wrapper row2">
      <div id="container" class="clear">
        <section id="fof" class="clear">
          <?php if(ENVIRONMENT != 'development'){ ?>
          <div class="hgroup clear">
            <h1>500</h1>
            <h2>Error ! <span>Database error</span></h2>
          </div>
          <p>Sorry, database error has been occurred</p>
          <?php }else{ ?>
          <div class="hgroup clear">
            <h1>500</h1>
            <h2>Error ! <span>Database Error</span></h2>
          </div>
          <p><?php echo $message; ?></p>
          <?php } ?>
          <p><a href="javascript:history.go(-1)">&laquo; Go Back</a> / <a href="<?php echo $base_url; ?>">Go Home &raquo;</a></p>
        </section>
      </div>
    </div>
  </body>
</html>