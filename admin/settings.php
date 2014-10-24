<?php 
global $obj_fsd_settings;
$tabbar_menu = array(
	'Latest' => array('title' => 'Latest', 'link' => 'post/latest', 'icon' => 'bars', 'icon2'=>'images/latest-icon.png' ),
	'Pages' => array('title' => 'Pages', 'link' => 'pages/list', 'icon' => 'info', 'icon2'=>'images/pages.png' ),
	'Tags' => array('title' => 'Tags', 'link' => 'tags/list', 'icon' => 'star', 'icon2'=>'images/tags-icon.png' ),
	'Categories' => array('title' => 'Categories', 'link' => 'categories/list', 'icon' => 'grid', 'icon2'=>'images/categories-icon.png' ),
	'Archives' => array('title' => 'Archives', 'link' => 'archives/list', 'icon' => 'wp-archive', 'icon2'=>'images/archives-icon.png' )
);

$menu_list = array_merge(obj2Array($obj_fsd_settings->menu_bar), $tabbar_menu);

function searchForTitle($search, $array) {
   foreach ($array as $val) {
       if ($search === $val->title) {
           return TRUE;
       }
   }
   return FALSE;
}

function obj2Array($d) {
	if (is_object($d)) {
		// Gets the properties of the given object
		// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return array_map(__FUNCTION__, $d);
	}
	else {
		// Return array
		return $d;
	}
}
//This is to show index page of the app
$index_page = reset ($menu_list);
$index_page = $index_page['link'];
?>
<section class="mainwrap">
<?php fsd_get_admin_head(); ?>
	<div class="main">
		<div class="greyBox">
			<div class="col1">				
    			<form name="form1" id="form1" class="form settinsMenu" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>"  enctype="multipart/form-data">
    				<input type="hidden" name="app_icon_hidden" value="<?php echo(isset($obj_fsd_settings->app_icon)?$obj_fsd_settings->app_icon:plugins_url('images/image.png', __FILE__)); ?>" />
    				<input type="hidden" id="splashscreen_hidden" name="splashscreen_hidden" value="<?php echo(isset($obj_fsd_settings->splash_screen->splash_file) && !empty($obj_fsd_settings->splash_screen->splash_file)?$obj_fsd_settings->splash_screen->splash_file:'SS-01.png'); ?>" />
					<input type="hidden" id="menu_bar" name="menu_bar" value="<?php echo(''); ?>" />    				  
					<div class="vmenu active" id="0">
						<h2>Enter your app name</h2>
						<div class="vmenubody">
							<div class="label">
								<span>App Name:</span><img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="The App name is used for the App page's header. You will be able fix a different name for the App title on the mobile stores." alt="" class="ques tTip">
							</div>
							<input type="text" placeholder="Wordpress plug-in development" name="app_name" id="app_name" value="<?php echo $obj_fsd_settings->app_name; ?>" >
						</div>
					</div><!--/vmenu-->

					<div class="vmenu" id="1">
						<h2>Design your splash screen</h2>
						<div class="vmenubody" style="display:none;">
							<label class="w80 fl pad6">
								<input type="checkbox" id="chktagline" name="chktagline" value="1" <?php echo($obj_fsd_settings->splash_screen->tag_line==""?'':'checked="checked"'); ?> >
								Tag line</label>
							<input class="w220" type="text" placeholder="" id="tagline" name="tagline" value="<?php echo $obj_fsd_settings->splash_screen->tag_line; ?>" <?php echo($obj_fsd_settings->splash_screen->tag_line==""?'disabled="disabled"':''); ?>>
							<label class="w100 fl">Choose&nbsp;a&nbsp;design:</label>
							<div id="slides" class="w360 fl" style="margin-left:50px;">
								<div class="slides_container">
									<div class="splashSelect">
                                        <a href="SS-01.png"><img src="<?php echo plugins_url('images/splashscreen/SS-01.png', __FILE__); ?>" alt=""></a>
										<a href="SS-02.png"><img src="<?php echo plugins_url('images/splashscreen/SS-02.png', __FILE__); ?>" alt=""></a>
										<a href="SS-03.png"><img src="<?php echo plugins_url('images/splashscreen/SS-03.png', __FILE__); ?>" alt=""></a>
										<a href="SS-04.png"><img src="<?php echo plugins_url('images/splashscreen/SS-04.png', __FILE__); ?>" alt=""></a>
										<a href="SS-05.png"><img src="<?php echo plugins_url('images/splashscreen/SS-05.png', __FILE__); ?>" alt=""></a>
										<a href="SS-06.png"><img src="<?php echo plugins_url('images/splashscreen/SS-06.png', __FILE__); ?>" alt=""></a>
										<a href="SS-07.png"><img src="<?php echo plugins_url('images/splashscreen/SS-07.png', __FILE__); ?>" alt=""></a>
										<a href="SS-08.png"><img src="<?php echo plugins_url('images/splashscreen/SS-08.png', __FILE__); ?>" alt=""></a>
										<a href="SS-09.png"><img src="<?php echo plugins_url('images/splashscreen/SS-09.png', __FILE__); ?>" alt=""></a>
										<a href="SS-10.png"><img src="<?php echo plugins_url('images/splashscreen/SS-10.png', __FILE__); ?>" alt=""></a>
										<a href="SS-11.png"><img src="<?php echo plugins_url('images/splashscreen/SS-11.png', __FILE__); ?>" alt=""></a>
										<a href="SS-12.png"><img src="<?php echo plugins_url('images/splashscreen/SS-12.png', __FILE__); ?>" alt=""></a>
										<a href="SS-13.png"><img src="<?php echo plugins_url('images/splashscreen/SS-13.png', __FILE__); ?>" alt=""></a>
										<a href="SS-14.png"><img src="<?php echo plugins_url('images/splashscreen/SS-14.png', __FILE__); ?>" alt=""></a>
									</div>

									<div class="splashSelect">
										<a href="SS-01.png"><img src="<?php echo plugins_url('images/splashscreen/SS-15.png', __FILE__); ?>" alt=""></a>
										<a href="SS-02.png"><img src="<?php echo plugins_url('images/splashscreen/SS-02.png', __FILE__); ?>" alt=""></a>
										<a href="SS-03.png"><img src="<?php echo plugins_url('images/splashscreen/SS-03.png', __FILE__); ?>" alt=""></a>
										<a href="SS-04.png"><img src="<?php echo plugins_url('images/splashscreen/SS-04.png', __FILE__); ?>" alt=""></a>
										<a href="SS-05.png"><img src="<?php echo plugins_url('images/splashscreen/SS-05.png', __FILE__); ?>" alt=""></a>
										<a href="SS-06.png"><img src="<?php echo plugins_url('images/splashscreen/SS-06.png', __FILE__); ?>" alt=""></a>
										<a href="SS-07.png"><img src="<?php echo plugins_url('images/splashscreen/SS-07.png', __FILE__); ?>" alt=""></a>
										<a href="SS-08.png"><img src="<?php echo plugins_url('images/splashscreen/SS-08.png', __FILE__); ?>" alt=""></a>
										<a href="SS-09.png"><img src="<?php echo plugins_url('images/splashscreen/SS-09.png', __FILE__); ?>" alt=""></a>
										<a href="SS-10.png"><img src="<?php echo plugins_url('images/splashscreen/SS-10.png', __FILE__); ?>" alt=""></a>
										<a href="SS-11.png"><img src="<?php echo plugins_url('images/splashscreen/SS-11.png', __FILE__); ?>" alt=""></a>
										<a href="SS-12.png"><img src="<?php echo plugins_url('images/splashscreen/SS-12.png', __FILE__); ?>" alt=""></a>
										<a href="SS-13.png"><img src="<?php echo plugins_url('images/splashscreen/SS-13.png', __FILE__); ?>" alt=""></a>
										<a href="SS-14.png"><img src="<?php echo plugins_url('images/splashscreen/SS-14.png', __FILE__); ?>" alt=""></a>
									</div>
								</div>

							</div><!--/slider-->
							<div class="clear"></div>
						</div><!--/vmenubody-->
					</div><!--/vmenu-->

					<div class="vmenu" id="2">
						<h2>Customize your theme</h2>
						<div class="vmenubody" style="padding-bottom:40px; display:none;">
							<ul>
								<li>
									<label>
										<input type="checkbox" class="marg5" name="author" value="1" <?php echo($obj_fsd_settings->customize_theme->author==1?'checked="checked"':''); ?>>
										Display author</label><img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="Select this option if you want the name of the post's author to be displayed" alt="" class="ques tTip">
								</li>
								<li>
									<label>
										<input type="checkbox" class="marg5" name="date" value="1" <?php echo($obj_fsd_settings->customize_theme->date==1?'checked="checked"':''); ?>>
										Display date</label><img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="Select this option if you want the post's publishing date to be displayed" alt="" class="ques tTip">
								</li>
								<li>
									<label>
										<input type="checkbox" class="marg5" name="comments" value="1" <?php echo($obj_fsd_settings->customize_theme->comments==1?'checked="checked"':''); ?>>
										Display comments</label><img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="Select this option if you want the post to have a comment counter bubble" alt="" class="ques tTip">
								</li>
							</ul>
							<div class="clear"></div>
						</div><!--/vmenubody-->
					</div><!--/vmenu-->

					<div class="vmenu" id="3">
						<h2>Customize your Tab Bar Menu</h2>
						<div class="vmenubody" style="display:none;">
							<label class="label w230 radio"> Main Tab bar items<img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="Your app menu, in the native iOS style, appears as a Tab Bar at the bottom of your app. You can preview it in the simulator. Each Tab Bar item has an icon & text name.
The main Tab Bar items are the primary 4 items in the menu bar and they will be seen on the Default view of your app. The rest will be shown under the More tab.
You can use the cross and drag & drop to reorder the Tab Bars items." alt="" class="ques tTip"> </label>
							<ul id="sortable1" class="connectedSortable">
<?php	foreach ($menu_list as $key => $value) { ?>								
								<li id='<?php echo $key; ?>'>
								<label class="label radio">
									<input type="checkbox" name="chkTabMenu[]" <?php echo(searchForTitle($key, $obj_fsd_settings->menu_bar)?'checked="checked"':''); ?> class="marg5" value="<?php echo $key; ?>">
									<img src="<?php echo plugins_url($value['icon2'], __FILE__); ?>" alt="" class="ques"><span><?php echo $key; ?></span> </label>
								</li>
<?php	}	?>				
							</ul>
							<div class="clear"></div>							
						</div><!--/vmenubody-->
					</div><!--/vmenu-->

					<div class="vmenu" id="4">
						<h2>Set sharing options</h2>
						<div class="vmenubody" style="padding:10px 0; display:none;">
							<label class="label" style="padding-left:10px;"> Enable users to share via:<img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="Enable your audience to share links to posts, pages, and images from your app via email, Facebook, SMS and Twitter." alt="" class="ques tTip"> </label>

							<div class="sharingOpt fl">
								<div class="fl  brd-left">
									<label class="label fl">
										<input type="checkbox" name="email" value="1" <?php echo($obj_fsd_settings->sharing_options->email==1?'checked="checked"':''); ?>>
										Email </label>
									<img src="<?php echo plugins_url('images/email.png', __FILE__); ?>" alt="" class="sms">
								</div>

								<div  class="fr brd-right " style="margin-left:81px;">
									<label class="label fl">
										<input type="checkbox" name="sms" value="1" <?php echo($obj_fsd_settings->sharing_options->sms==1?'checked="checked"':''); ?>>
										SMS </label>
									<img src="<?php echo plugins_url('images/sms.png', __FILE__); ?>" alt="" class="sms">
								</div>

								<div class="fl  brd-left">
									<label class="label fl">
										<input type="checkbox" name="twitter" value="1" <?php echo($obj_fsd_settings->sharing_options->twitter==1?'checked="checked"':''); ?>>
										Twitter </label>
									<img src="<?php echo plugins_url('images/twittter.png', __FILE__); ?>" alt="" class="sms">
								</div>

								<div  class="fr brd-right " style="margin-left:81px;">
									<label class="label fl">
										<input type="checkbox" name="facebook" value="1" <?php echo($obj_fsd_settings->sharing_options->facebook==1?'checked="checked"':''); ?>>
										Facebook </label>
									<img src="<?php echo plugins_url('images/facebook.png', __FILE__); ?>" alt="" class="sms">
								</div>
							</div><!--sharingOpt-->
							<div class="clear"></div>
						</div><!--/vmenubody-->
					</div><!--/vmenu-->

					<div class="vmenu" id="5">
						<h2>Choose your application icon</h2>
						<div class="vmenubody" style="padding-bottom:40px; display:none;">
							<ul>
								<li>
									1024x1024 pixels, PNG format.
								</li>
								<li>
                                <table>
                                <tr><td>
									<img src="<?php echo(isset($obj_fsd_settings->app_icon) && $obj_fsd_settings->app_icon!=""?$obj_fsd_settings->app_icon:plugins_url('images/image.png', __FILE__)); ?>" alt="" class="fl" style="width: 65px; height: 65px;">
								</td><td>
									<label><input type="checkbox" name="app_icon_del" value="1"> Delete</label>
									<?php /*
									<a href="#" style="margin:20px 0 0 10px; float:left; color:#5f5f5f; text-decoration:none;"> 
									<img src="<?php echo plugins_url('images/icon_12.png', __FILE__); ?>" alt="" class="fl" ></a> */?>
                                </td></tr></table>
								</li>
								<br>

								<li class="clear">
									<input type="file" name="app_icon" style="background:none;">
                                    
									<?php /*?><input type="text" readonly class="txt-browse w210 fl" style="margin-right:-10px; padding:6px 15px 5px 5px;"> 
									<a href="#" class="fl btn-browse"><img src="<?php echo plugins_url('images/btn8.png', __FILE__); ?>" alt=""></a>
									<input type="file" name="app_icon" class="orgBrowse" style="display:none"><?php */?>
								</li>
							</ul>
							<div class="clear"></div>
						</div><!--/vmenubody-->
					</div><!--/vmenu-->

					<div class="vmenu" id="6">
						<h2>Ad Integrations</h2>
						<div class="vmenubody" style="padding-bottom:40px; display:none;">
							<ul>
								<li>
									Enter your Google Analytics ID:
								</li>
								<li>
									UA-
									<input type="text" class=" w220" name="analytics_id" value="<?php echo $obj_fsd_settings->ad_integrations->analytics_id; ?>">
									<img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="To get the Google Analytics Tracking ID, please login to your Google Analytics account and check the “My Account” section, please enter the full ID (after the UA-) here." alt="" class="ques tTip">
								</li>
								<li><img src="<?php echo plugins_url('images/line.jpg', __FILE__); ?>" alt=""></li>
								<li>
									Enter your Google Admob ID for Android Native App:
								</li>
								<li>
									<input type="text" class="w220 marg20" name="admob_id" value="<?php echo $obj_fsd_settings->ad_integrations->admob_id; ?>">
									<img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="Please see a guide for creating your Admob publisher ID at: Admob on Android." alt="" class="ques tTip">
								</li>
								
								<li><img src="<?php echo plugins_url('images/line.jpg', __FILE__); ?>" alt="">
								</li>
								
								<li>
									Enter your Google AdSense ID:
								</li>
								<li>
									ca-mb-pub-
									<input type="text" name="adsense_id" class=" w220" value="<?php echo $obj_fsd_settings->ad_integrations->adsense_id; ?>">
									<img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="You will find the Adsense publisher ID on your Google Adsense account<br>- Account settings tab<br>- Account information section.<br>Don't have an Adsense account?<br><br>Please click below in order to open one: <a href='https://www.google.com/adsense'>https://www.google.com/adsense</a>" alt="" class="ques tTip">
								</li>
								<li>
									Enter your Google AdSense slot:
								</li>
								<li>
									<input type="text" name="adsense_slot" class=" w220 marg20" value="<?php echo $obj_fsd_settings->ad_integrations->adsense_slot; ?>">
									<img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="Each ad unit in Google ad sense is given a unique ad slot number. You can find the ad slot by using one of the two options:<br><br>Option I: Create a new ad unit in Google Adsense of 320x50 and copy the ad slot number from the code generated.<br><br>Option II: get ad slot number from an existing ad unit. Click on Get code button in your adsense account and copy the ad slot number from the code." alt="" class="ques tTip">
								</li>
<?php /*											
								<li>
									<label>
										<input type="checkbox" class="marg5 ">
										Display 320X50 Ad below the post title</label><img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="Look at me, I'm a Woo Mobile App!" alt="" class="ques tTip">
								</li>
								<li>
									<label>
										<input type="checkbox" title="Look at me, I'm a Woo Mobile App!" class="marg5 tTip">
										Display 320X50 Ad at the post footer </label><img src="<?php echo plugins_url('images/questmark.jpg', __FILE__); ?>" title="Look at me, I'm a Woo Mobile App!" alt="" class="ques tTip">
								</li>
 
 */?>								
							</ul>
							<div class="clear"></div>
						</div><!--/vmenubody-->
					</div><!--/vmenu-->
					<button type="submit" value="live" id="btnsubmit"><img src="<?php echo plugins_url('images/save-changes.png', __FILE__); ?>" alt="Save Changes"></button>
					<button type="button" value="next" onclick="window.location='admin.php?page=fsd_publish'" ><img src="<?php echo plugins_url('images/next.png', __FILE__); ?>" alt="Compile & Download"></button>
					<p>&nbsp;</p>
					<p style="color:red">Note: Each time settings are changed new .apk file will be generated and users will need to update their app on smartphones.</p>
				</form>
			</div><!--/col1-->
			<div class="mobile_emulator" >			
				
				<iframe allowtransparency="yes" name="mobile_frame" id="mobile_frame" src="<?php echo site_url(); ?>?<?php echo $index_page; ?>" frameborder="0" scrolling="no"></iframe>				
			</div><!--/col2-->

			<div class="clear"></div>
		</div><!--/setting-->

	</div><!--/main-->

</section><!--/wrap-->
 <script> 
jQuery(function() {
	//Highlite the splashscreen
	jQuery('a[href="<?php echo(isset($obj_fsd_settings->splash_screen->splash_file)?$obj_fsd_settings->splash_screen->splash_file:''); ?>"]').addClass('selected');
	
	jQuery( "#sortable1" ).sortable({
	    update: function(event, ui) {
	       jQuery('#menu_bar').val(JSON.stringify(jQuery(this).sortable('toArray')));
	       ajaxupdate();
	    }
	}); 
	
	jQuery('#chktagline').click(function(){
		var tagline = jQuery('#tagline').val();
		var screen = jQuery('#splashscreen_hidden').val();
		var chktagline = jQuery(this).is(':checked');
		if(chktagline){
			jQuery("#tagline").removeAttr('disabled');
		}else{
			jQuery('#tagline').attr('disabled','disabled');
		}
			
		jQuery( '#mobile_frame' ).attr( 'src', '<?php echo site_url(); ?>?splashscreen&screen='+screen+'&tagline='+tagline+'&chktagline='+chktagline); // refesh iFrame				
	});	
	jQuery('.slides_container a').click(function( event ){
		var tagline = jQuery('#tagline').val();
		var screen = jQuery(this).attr( 'href');
		var chktagline = jQuery('form #chktagline').is(':checked');
		jQuery( '#mobile_frame' ).attr( 'src', '<?php echo site_url(); ?>?splashscreen&screen='+screen+'&tagline='+tagline+'&chktagline='+chktagline); // refesh iFrame
		jQuery('#splashscreen_hidden').val(screen);
		event.preventDefault();
	});
	jQuery('.vmenu h2').click(function(){
		//Refresh ifame with id
		var index = jQuery(this).closest('.vmenu').attr('id');
		var tagline = jQuery('#tagline').val();
		var chktagline = jQuery('form #chktagline').is(':checked');
		var screen = jQuery('#splashscreen_hidden').val();
		
		//Update Settings to simulator with Ajax Call
		ajaxupdate();
		
		switch(index){
			case '0':
				jQuery( '#mobile_frame' ).attr( 'src', '<?php echo site_url(); ?>?pages/list'); // refesh iFrame
				break;			
			case '1':
				jQuery( '#mobile_frame' ).attr( 'src', '<?php echo site_url(); ?>?splashscreen&screen='+screen+'&tagline='+tagline+'&chktagline='+chktagline); // refesh iFrame
				break;
			case '4':
				jQuery( '#mobile_frame' ).attr( 'src', '<?php echo site_url(); ?>?share'); // refesh iFrame
				break;				
			default:
				jQuery( '#mobile_frame' ).attr( 'src', '<?php echo site_url(); ?>?<?php echo $index_page; ?>'); // refesh iFrame
		}
	});
});
</script>