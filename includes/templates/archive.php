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
            <h3>
                <?php
                    if ( is_day() ) :
                        printf( __( '%s'), get_the_date() );
                    elseif ( is_month() ) :
                        printf( __( '%s'), get_the_date( _x( 'F Y', 'monthly archives date format') ) );
                    elseif ( is_year() ) :
                        printf( __( '%s'), get_the_date( _x( 'Y', 'yearly archives date format') ) );
                    elseif ( is_category() ):
                        $category = get_the_category();                        
                       printf( __( '%s'), $category[0]->cat_name);
                    else :
                        _e( 'Archives');
                    endif;
                ?>          
            </h3>
<?php   if(isset($next[1])):   ?>
            <a href="<?php echo $next[1]; ?>" data-role="button" data-icon="arrow-r" data-iconpos="notext" data-theme="b" data-inline="true" data-transition="slide">Next</a>
<?php   endif;    ?>
        </div>
        <!--Header [END]-->
        
        <!--Content [Start]-->
        <div data-role="content">
			<?php fsd_get_adsense(); ?>        	
            <ul data-role="listview" data-inset="false" class="thumbList">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 		
                <li><a href="<?php the_permalink() ?>" data-transition="flip">
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