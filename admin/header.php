	<header style="position: relative;">
		<div class="logo">
			<a href="#"><img style="position: absolute; top:29px; left:0px;"  src="<?php echo plugins_url('images/logo-2-sml.png', __FILE__); ?>" alt="WP Create Your Mobile App"></a>
		</div>
		<nav class="mainMenu">
			<ul>
				<li>
					<a href="admin.php?page=fsdapp-settings" <?php echo ($_GET['page']=='fsdapp-settings'?'class="current"':''); ?>>Settings</a>
				</li>				
				<li>
					<a href="admin.php?page=fsd_publish" <?php echo ($_GET['page']=='fsd_publish'?'class="current"':''); ?>>Publish</a>
				</li>
				<li>
					<a href="admin.php?page=fsdapp-plans" <?php echo ($_GET['page']=='fsdapp-plans'?'class="current"':''); ?>>More Options</a>
				</li>
			</ul>
		</nav>
		<div class="clear"></div>
	</header><!--/header-->