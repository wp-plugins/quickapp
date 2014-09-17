<!DOCTYPE html> 
<html>

<head>
<title><?php echo $obj_menu->app_name; ?></title> 
<?php fsd_get_head(); ?>	
</head> 

<body> 
   <!-- Categories -->
   <div data-role="page" id="pgCategories" class="mPage">
    	<!--Header [Start]-->
        <div id="header" data-theme="a" data-role="header" data-position="fixed">
        	<a data-role="button" data-direction="reverse" data-rel="back" data-transition="slide" href="#" data-icon="back" data-iconpos="left" 
            data-theme="b" class="ui-btn-left">Back</a>
            <h3><?php echo $obj_menu->app_name; ?></h3>
        </div>        
        <!--Header [END]-->
        
        <!--Content [Start]-->               
        <div data-role="content" class="innerpage">
            <?php fsd_get_adsense(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>       
            <ul data-role="listview" data-inset="false" class="thumbList">
                <li>
			<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			  the_post_thumbnail();
			} 
			?>
                    <h2><?php the_title(); ?></h2>
                    <span class="ico-comments"><?php echo get_comments_number(); ?></span>
                    <p><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> ago | <?php echo get_the_author(); ?></p>
                    
                </li>
            </ul>
            <div class="cnt">
	<?php the_content(__('(more...)')); ?>
		<script type="text/javascript">
	//Font Enchancer
	function gettextSizes(){
		getFontSize = jQuery('.innerpage .cnt p').css('font-size').replace('px','');
		getHDs = jQuery('.innerpage .cnt').find('h1, h2, h3, h4, h5, h6');
	}
	jQuery('.fontExpander').on('click','.plus',function(e){
		gettextSizes();		
		var newSize = parseInt(getFontSize)+7;
		var newSizeforHDs = parseInt(newSize)+10;
		
		if (getFontSize < 50){
			;
			jQuery('.innerpage .cnt *').css('font-size' , newSize+'px');
			jQuery(getHDs).css('font-size' , newSizeforHDs+'px');
		}
	});
	
	jQuery('.fontExpander').on('click','.minus',function(e){
		gettextSizes();
		var newSize = parseInt(getFontSize)-7;
		var newSizeforHDs = parseInt(newSize)+16;
		
		if (getFontSize > 18){
			jQuery('.innerpage .cnt *').css('font-size' , newSize+'px');
			jQuery(getHDs).css('font-size' , newSizeforHDs+'px');
		}
	});
	</script>
	
    		</div>
    <?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
	            
        </div>
        <!--Content [END]--> 
        <!--Navigation Bar [Start]-->
        <div data-role="footer" class="mFooter" data-position="fixed">
        	<div class="pageOptions" data-role="navbar">
                <ul>
                    <li>
                    	<a href="<?php echo esc_url( home_url( '/' ).'?share' ); ?>" data-rel="dialog" data-transition="flip"><img src="<?php echo plugins_url('images/share.png', dirname(__FILE__)); ?>" alt=""></a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( home_url( '/' ).'?post/comments/&id='.get_the_ID() ); ?>" data-direction="reverse" data-transition="flow" ><img src="<?php echo plugins_url('images/comments.png', dirname(__FILE__)); ?>" alt=""></a>
                    </li>
                    <li>
                        <a href="#" data-transition="flow" id="lnkPages" class="fontChanger">
                            <span class="fontExpander">
                            	<span class="plus">
                                	<img src="<?php echo plugins_url('images/zoon-in.png', dirname(__FILE__)); ?>" alt="plus">
                                </span>
                        	</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#" data-transition="flow" id="lnkPages" class="fontChanger">
                            <span class="fontExpander">
                                <span class="minus">
                                	<img src="<?php echo plugins_url('images/zoom-out.png', dirname(__FILE__)); ?>" alt="minus">
                                </span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div><!--Navigation Bar [END]-->       
    </div>         
</body>
</html>
