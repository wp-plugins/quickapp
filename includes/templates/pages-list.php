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
            <h3>Pages</h3>
        </div>    
        <!--Header [END]-->

	<div data-role="content">
            <?php fsd_get_adsense(); ?>		
		<ul data-role="listview" id="pages">

<?php $args = array(
	'sort_order' => 'ASC',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'exclude' => '',
	'include' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 
$objPages = get_pages($args);
foreach($objPages as $value){
	echo '<li><a href="'.$value->guid.'" data-transition="slide" >'.$value->post_title.'</a></li>';
}
?>
		</ul>
	</div><!-- /content -->
    <!--Navigation Bar [Start]-->
	<?php fsd_get_footer(); ?>
	<!--Navigation Bar [END]-->
</div>    
</body>
</html>