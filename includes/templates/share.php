<!DOCTYPE html> 
<html>

<head>
<title><?php echo $obj_menu->app_name; ?></title> 
<?php fsd_get_head(); ?>	
</head> 

<body> 
	<div data-theme="b" data-role="content" role="main">
		<h3>Share with friends</h3>
<?php	if($obj_menu->sharing_options->facebook){	?>		
        <a data-theme="b" data-role="button" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo(urlencode($_SERVER['HTTP_REFERER'])); ?>">Facebook</a>
<?php	}
		if($obj_menu->sharing_options->twitter){	?>        
        <a data-theme="b" data-role="button" href="https://twitter.com/share?url=<?php echo(urlencode($_SERVER['HTTP_REFERER'])); ?>">Twitter</a>
<?php	}
		if($obj_menu->sharing_options->email){	?>        
        <a data-theme="b" data-role="button" href="mailto:?&subject=Shared you a link&body=<?php echo(urlencode($_SERVER['HTTP_REFERER'])); ?>">Email</a>
<?php	}
		if($obj_menu->sharing_options->sms){	?>        
        <a data-theme="b" data-role="button" href="sms:?body=<?php echo(urlencode($_SERVER['HTTP_REFERER'])); ?>">SMS</a>
<?php	} ?>        
		<a data-theme="a" data-rel="back" data-role="button">Cancel</a>    
	</div>
</body>
</html>
