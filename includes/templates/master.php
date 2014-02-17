<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php echo FSD_PLUGIN_URL.'styles/'; ?>jquery.mobile-1.3.2.min.css" />
	<script src="<?php echo FSD_PLUGIN_URL.'js/'; ?>jquery-1.9.1.min.js"></script>
	<script src="<?php echo FSD_PLUGIN_URL.'js/'; ?>jquery.mobile-1.3.2.min.js"></script>
</head>
<body>

<div data-role="page">

	<div data-role="header">
		<h1>My Wordpress Layout</h1>
	</div><!-- /header -->

	<div data-role="content">
		<ul data-role="listview">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 		
			<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?> 			
		</ul>
	</div><!-- /content -->

	<div data-role="footer" data-id="foo1" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a href="#" data-icon="grid">Lastst</a></li>
                <li><a href="#" data-icon="star" class="ui-btn-active">Favs</a></li>
                <li><a href="#" data-icon="gear">Setup</a></li>
            </ul>
        </div><!-- /navbar -->
	</div><!-- /footer -->	
</div><!-- /page -->

</body>
</html>