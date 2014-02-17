<!DOCTYPE html> 
<html>

<head>
	<title><?php echo $obj_menu->app_name; ?></title>
<?php fsd_get_head(); ?>	
</head> 

<body> 

<div data-role="page">

	<div data-role="header">		
<?php 
    $url = get_next_posts_link();
    preg_match("/href=\"(.*?)\"/i", $url, $next);    
    $url = get_previous_posts_link();
    preg_match("/href=\"(.*?)\"/i", $url, $previous);
        if(isset($previous[1])):    
?>            
            <a href="<?php echo $previous[1]; ?>" data-role="button" data-icon="arrow-l" data-iconpos="notext" data-theme="b" data-inline="true" data-transition="slide" data-direction="reverse">Previous</a>
<?php   else: ?>
            <a data-role="button" data-direction="reverse" data-rel="back" data-transition="slide" href="#" data-icon="back" data-iconpos="left" data-theme="b" class="ui-btn-left">Back</a>    
<?php   endif; ?>                        
            <h1><?php printf( __( '%s'), single_tag_title( '', false ) ); ?></h1>
<?php   if(isset($next[1])):   ?>
            <a href="<?php echo $next[1]; ?>" data-role="button" data-icon="arrow-r" data-iconpos="notext" data-theme="b" data-inline="true" data-transition="slide">Next</a>
<?php   endif;    ?>		
	</div><!-- /header -->

	<div data-role="content">
		<?php fsd_get_adsense(); ?>			
		<ul data-role="listview" id="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 		
			<li><a href="<?php the_permalink() ?>" data-transition="slide" ><?php the_title(); ?></a></li>
<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
		</ul>
	</div><!-- /content -->
<?php fsd_get_footer(); ?>
</div><!-- /page -->

</body>
</html>