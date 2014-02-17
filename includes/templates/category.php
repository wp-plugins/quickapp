<!DOCTYPE html>
<html>
<head>
	<title><?php echo $obj_menu->app_name; ?></title>
<?php fsd_get_head(); ?>	
</head>
<body>
 <!-- Categories -->
    <div data-role="page" id="pgCategories">
    	<!--Header [Start]-->
        <div id="header" data-theme="a" data-role="header" data-position="fixed">
        	<a data-role="button" data-direction="reverse" data-rel="back" data-transition="slide" href="#" data-icon="back" data-iconpos="left" 
            data-theme="b" class="ui-btn-left">
            Back</a>		
            <h3><?php the_title(); ?></h3>
        </div>
        <!--Header [END]-->
        
        <!--Content [Start]-->
        <div data-role="content">
			<?php fsd_get_adsense(); ?>        	
            <ul data-role="listview" data-inset="false" class="thumbList">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 		
                <li><a href="<?php the_permalink() ?>" data-transition="slide">
<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail();
} 
?>
                        <h2><?php the_title(); ?></h2>
                        <span class="ico-comments"><?php echo get_comments_number(); ?></span>
                        <span class="authorInfo"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> ago | <?php echo get_the_author(); ?></span>
                    </a>
                </li>			
<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>				
            </ul>
        </div>
        <!--Content [END]-->
        
    <!--Navigation Bar [Start]-->
	<?php fsd_get_footer(); ?>
	<!--Navigation Bar [END]-->
    </div>
</body>
</html>