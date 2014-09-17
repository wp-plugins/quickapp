<?php
global $obj_menu;
?>
<!DOCTYPE html> 
<html>

<head>
<title><?php echo $obj_menu->app_name; ?></title> 
<?php fsd_get_head(); ?>	
</head> 

<body> 

<div data-role="page">

    	<!--Header [Start]-->
        <div id="header" data-theme="a" data-role="header" data-position="fixed">
        	<a data-role="button" data-direction="reverse" data-rel="back" data-transition="slide" href="#" data-icon="back" data-iconpos="left" 
            data-theme="b" class="ui-btn-left">
            Back</a>
            <h3><?php echo $obj_menu->app_name; ?></h3>
        </div>
        <!--Header [END]-->

	<div data-role="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>			
	<?php the_content(__('(more...)')); ?>
	<?php endwhile; // end of the loop. ?>
	</div><!-- /content -->
<?php fsd_get_footer(); ?>
</div><!-- /page -->

</body>
</html>
			