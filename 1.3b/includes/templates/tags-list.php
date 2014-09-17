<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>
<?php fsd_get_head(); ?>	
</head>
<body>

<div data-role="page">

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
            <h3>Tags</h3>
<?php   if(isset($next[1])):   ?>
            <a href="<?php echo $next[1]; ?>" data-role="button" data-icon="arrow-r" data-iconpos="notext" data-theme="b" data-inline="true" data-transition="slide">Next</a>
<?php   endif;    ?>
        </div>
	<!-- /header -->

	<div data-role="content">
		<?php fsd_get_adsense(); ?>
		<ul data-role="listview" id="pages">

<?php 
$tags = get_tags();
foreach ( $tags as $tag ) {
	$tag_link = get_tag_link( $tag->term_id );			
	echo '<li><a href="'.$tag_link.'" title="'.$tag->name.'" class="'.$tag->slug.'" data-transition="slide">'.$tag->name.'</a></li>';
}
?>
		</ul>
	</div><!-- /content -->
<?php fsd_get_footer(); ?>
</div><!-- /page -->

</body>
</html>