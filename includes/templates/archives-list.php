<?php
$per_page = get_option('posts_per_page');
$page_num = is_numeric(end(explode('/', $_SERVER['QUERY_STRING'])))?end(explode('/', $_SERVER['QUERY_STRING'])):1; 
$args = array(
    'type'            => 'monthly',
    'limit'           => '',
    'format'          => 'html', 
    'before'          => '',
    'after'           => '',
    'show_post_count' => 1,
    'echo'            => 0,
    'order'           => 'DESC'
); 
$html = wp_get_archives( $args );
$archi = explode( '</li>' , $html );
$archi = paganation($archi, $per_page, $page_num);
$total_pages = ceil(count($archi)/$per_page);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $obj_menu->app_name; ?></title>
<?php fsd_get_head(); ?>	
</head>
<body>

<div data-role="page">

	<div data-theme="a" data-role="header" data-position="fixed">
<?php if($page_num > 1): ?>            
            <a href="?archives/list/<?php echo $page_num-1; ?>" data-role="button" data-icon="arrow-l" data-iconpos="notext" data-theme="b" data-inline="true" data-transition="slide" data-direction="reverse">Previous</a>
<?php else: ?>
            <a style="display: none;" ></a>    
<?php endif; ?>	    	    
		<h1>Monthly Archives</h1>
<?php if($page_num < $total_pages):  ?>		
		<a href="?archives/list/<?php echo $page_num+1; ?>" data-role="button" data-icon="arrow-r" data-iconpos="notext" data-theme="b" data-inline="true" data-transition="slide">Next</a>
<?php endif;   ?>		
	</div><!-- /header -->

	<div data-role="content">
		<?php fsd_get_adsense(); ?>
		<ul data-role="listview" id="pages">
<?php
foreach( $archi as $link ) {
    $link = str_replace( array( '<li>' , "\n" , "\t" , "\s" ), '' , $link );
    if( '' != $link )
        echo '<li>'.preg_replace( '~(&nbsp;)(\(\d++\))~', '$1<span class="ui-li-count">$2</span>', $link ).'</li>';
}    
?>		</ul>
	</div><!-- /content -->
<?php fsd_get_footer(); ?>
</div><!-- /page -->
</body>
</html>