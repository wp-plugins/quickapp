<!DOCTYPE html> 
<html>

<head>
<title><?php echo $obj_menu->app_name; ?></title> 
<?php fsd_get_head(); ?>	
</head> 

<body>
	<div data-role="page" id="pgCategories" class="mPage">
    	<!--Header [Start]-->
        <div id="header" data-theme="a" data-role="header" data-position="fixed">
        	<a data-role="button" data-direction="reverse" data-rel="back" data-transition="slide" href="#" data-icon="back" data-iconpos="left" 
            data-theme="b" class="ui-btn-left">Back</a>
            <h3>Comments</h3>
        </div>        
        <!--Header [END]-->
        
        <!--Content [Start]-->
        <div data-role="content" class="innerpage">	       
            <ul data-role="listview" data-inset="false" class="urCmtList">
                
		<?php
		$id = $_GET['id'];
		$args = array(
				'post_id' => $id // use post_id, not post_ID
		);
		$comments = get_comments($args);
		if(count($comments)>0):
			foreach($comments as $comment) :
		?>	
				<li>
                    <div class="cmtHeader">
                    	<?php echo get_avatar( $comment,  32); ?>
                    	<!--<img src="http://shariq/wordpress-plugin/wp-content/uploads/2013/09/album-ws.jpg" alt="image" class="urAvatar">-->
                    	<div class="urName"><?php echo (ucfirst($comment->comment_author)); ?> says:</div>
                    	<span class="metaInfo"><?php $date = date_create($comment->comment_date); echo date_format($date, 'M d, Y'); ?></span>
                    	<div class="clear-all"></div>
                    </div>              
                    <div class="urComment">
                    	<?php echo $comment->comment_content; ?>
                   	</div>
                </li>
		<?php	
			endforeach;
		else:
		?>
				<li>No comments given.</li>
		<?php
		endif;
		?>                    
                
            </ul>	            
        </div>
        <!--Content [END]-->              
    </div>	
	         
</body>
</html>
