<!DOCTYPE html>
<html>
<head>
	<title><?php echo $obj_menu->app_name; ?></title>
<style>
@font-face {
    font-family: 'opensans-light';
    src: url('<?php echo plugins_url('../admin/font/opensans-light-webfont.eot',  dirname(__FILE__)); ?>');
    src: url('<?php echo plugins_url('../admin/font/opensans-light-webfont.eot?#iefix',  dirname(__FILE__)); ?>') format('embedded-opentype'),
         url('<?php echo plugins_url('../admin/font/opensans-light-webfont.woff',  dirname(__FILE__)); ?>') format('woff'),
         url('<?php echo plugins_url('../admin/font/opensans-light-webfont.ttf',  dirname(__FILE__)); ?>') format('truetype'),
         url('<?php echo plugins_url('../admin/font/opensans-light-webfont.svg#open_sansregular',  dirname(__FILE__)); ?>') format('svg');
    font-weight: normal;
    font-style: normal;
}
* {
   margin: 0px;
   padding: 0px;
}

.splashScreen{background: url('<?php echo plugins_url('../admin/images/splashscreen/',  dirname(__FILE__)).$_GET['screen']; ?>') no-repeat center top; background-size: 295px 450px; height:450px; width:295px; position:relative;}
.splashScreen .appTitle{background: url('<?php echo plugins_url('../admin/images/splashscreen/splash-box.png',  dirname(__FILE__)); ?>') repeat-y center; padding:30px 0; color: #fff; font:normal 25px 'opensans-light'; text-shadow:2px 0 0 #404040; text-align: center; position: absolute; top:100px; left:0px; width: 100%;}

</style>	
</head>
<body>
<div class="splashScreen" >
<?php 	if($_GET['chktagline'] == 'true'){ ?>	
<div class="appTitle">
	<?php echo $_GET['tagline']; ?>
	</div>
<?php	}	?>
</div>	
</body>
</html>