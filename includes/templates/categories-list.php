<?php
$per_page = get_option('posts_per_page');
$page_num = is_numeric(end(explode('/', $_SERVER['QUERY_STRING'])))?end(explode('/', $_SERVER['QUERY_STRING'])):1; 
$args = array(
    'orderby' => 'name',
    'order' => 'ASC'
    );
$categories = get_categories($args);
$categories = paganation($categories, $per_page, $page_num);
$total_pages = ceil(count($categories)/$per_page);
?>
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
<?php if($page_num > 1): ?>            
            <a href="?categories/list/<?php echo $page_num-1; ?>" data-role="button" data-icon="arrow-l" data-iconpos="notext" data-theme="b" data-inline="true" data-transition="slide" data-direction="reverse">Previous</a>
<?php else: ?>
            <a style="display: none;" ></a>    
<?php endif; ?>            
            <h3>Categories</h3>
<?php if($page_num < $total_pages):  ?>     
        <a href="?categories/list/<?php echo $page_num+1; ?>" data-role="button" data-icon="arrow-r" data-iconpos="notext" data-theme="b" data-inline="true" data-transition="slide">Next</a>
<?php endif;   ?>            
        </div>
        <!--Header [END]-->
    <!--Content [Start]-->
    <div data-role="content" data-theme="c">
    	<?php fsd_get_adsense(); ?>
        <ul data-role="listview" data-inset="false">
<?php
foreach( $categories as $category ) {
    echo '<li><a href="'.get_category_link( $category->term_id ).'" title="'.sprintf( __( "View all posts in %s" ), $category->name ).'" data-transition="slide">'.$category->name.' <span class="ui-li-count">'.$category->count.' Posts</span></a></li>';
}    
?>	
        </ul>
    </div>
    <!--Content [END]-->	        
        
    <!--Navigation Bar [Start]-->
	<?php fsd_get_footer(); ?>
	<!--Navigation Bar [END]-->
    </div>
</body>
</html>