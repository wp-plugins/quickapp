<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $obj_menu->app_name; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href="<?php echo plugins_url('styles/front-style.css', dirname(__FILE__)); ?>" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--SuperDiv [Start]-->
		<div id="superDiv">

			<!--Header [Start]-->
			<div class="header">
<?php	if(!empty($obj_menu->app_icon)){	?>				
				<div class="thumb fl">
					<img src="<?php echo $obj_menu->app_icon; ?>" height="160" width="160" alt="">
				</div>
<?php	}	?>				
				<div class="heading fl">
					<?php echo $obj_menu->app_name; ?>
				</div>
				<div class="clear-all"></div>
			</div>
			<!--Header [END]-->

			<div class="content">
				<p>
					Get the ultimate Android experience<br>with our new App! 
				</p>

				<!--Download App-->
				<a href="<?php echo FSD_API_URL; ?>api/download/<?php echo get_option('fsd_appid'); ?>.apk" class="btn-andriod">Download Android App</a>
				<br>
				<p>No thanks. Continue to: </p>
				<a href="<?php echo site_url(); ?>?post/latest" class="btn-continue">Mobile Site</a>
			</div>

			<div class="footer">
				&copy; <?php echo date("Y"); ?>. All Rights reserved
			</div>
		</div><!--SuperDiv [END]-->
	</body>
</html>