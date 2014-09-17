<section class="mainwrap">
	<?php fsd_get_admin_head(); ?>
	<div class="main">
		<div class="congrats">
			<h1><strong>Congrats!</strong> You website has been successfully mobilized.</h1>
			<p>
				 Next step for you is to download the native app files from the link below in Android App area. Your visitors will get a message on their smartphones to download the app or visit the HTML5 version of it. For installation errors check our support page.
			</p>
			<p>
			    <a href="http://wordpress.org/support/view/plugin-reviews/quickapp#postform" target="wordpress">Thanks for using our plugin. Please help us improve and encourage others to download it by writing a review.</a>
			</p>
			<div class="clear"></div>
		</div><!--/Congrats-->

		<table class="gTable">
			<tr>
				<td class="thumb"><h1>Web App
				<br>
				<img src="<?php echo plugins_url('images/icon_1.png', __FILE__); ?>" alt="Html5"></h1></td>
				<td>
				<p>
					Your free HTML5 mobile WebApp is successfully created and can now be accessed from the mobile device's browser.
				</p></td>
				<td class="otherInfo">
					<h2>CREATED</h2> 
				<?php /*				
				<p>
					<input type="checkbox"  >
					Activate the HTML5 WebApp to users that access your website from a smartphone's browser.
				</p>
				 */	?>
				 </td>
			</tr>
			<tr>
				<td class="thumb"><h1>Android App
				<br>
				<img src="<?php echo plugins_url('images/icon_2.png', __FILE__); ?>" alt="Android App"></h1></td>
				<td>
				<p>
					Your free Android App is available for download.
					The Android App download link will be displayed to readers that visits your website from their Android device’s browser, unless you have unchecked this option.
					<br>
					It is highly recommended to publish your App on the Google Play store:
				</p>
				<ul>
					<li>
						Gain Exposure to more than One billion Android users.
					</li>
					<li>
						Notify your readers about new content in real time, using Push Notification service.
					</li>
					<li>
						Lifetime support and upgrades.
					</li>
				</ul></td>
				<td align="center" class="otherInfo">
					<h2>CREATED</h2>
					<a href="admin.php?page=fsdapp-plans"><img src="<?php echo plugins_url('images/btn1.png', __FILE__); ?>" alt="Publish to Google Play"></a>
					<a href="admin.php?page=fsdapp-plans"><img src="<?php echo plugins_url('images/btn2.png', __FILE__); ?>" alt="Set Push Notifications"></a>
					<a id="btndownload" href="#" target="_blank">
						<div style="position:relative;">
							<div class="button-apk">
                                <span class="fl" id="AppVersion">APK Generating...</span>
                                <img src="<?php echo plugins_url('images/button-apk-arrow.png', __FILE__); ?>"  alt="Download Apk File"/>
                        	</div>
						<img id="ajax-loader" src="<?php echo plugins_url('images/ajax-loader.gif', __FILE__); ?>" alt="Loading..." style="display: none; position:absolute; right:25px; top: 20px; " >
						</div>
					</a>
				</td>
			</tr>
			
			<tr>
				<td class="thumb"><h1>iOS App
				<br>
				<img src="<?php echo plugins_url('images/icon_3.png', __FILE__); ?>" alt="iOS App"></h1></td>
				<td>
				<p>
					Publish your App to the Apple Appstore:
				</p>
				<ul>
					<li>
						Gain Exposure to more than 600 million iOS users.
					</li>
					<li>
						Notify your readers about new content in real time, using Push Notification service.
					</li>
					<li>
						Lifetime support and upgrades.
					</li>
				</ul></td>
				<td class="otherInfo" style=" text-align:center;">
					<h1><a href="admin.php?page=fsdapp-plans"><img src="<?php echo plugins_url('images/btn4.png', __FILE__); ?>" alt=""></a>
				<br>
				iOS App</h1></td>
			</tr>
 
		</table>
	</div><!--/main-->

</section><!--/wrap-->
<script>
jQuery.ajax({
	type: "POST",
	beforeSend: function(){ /* show the loading thing */
		jQuery('#btndownload').fadeTo("fast", .5).removeAttr("href"); 
		jQuery('#ajax-loader').show();
	},
	complete: function(){ /* hide the loader */  
		jQuery('#ajax-loader').hide();
		jQuery('#btndownload').fadeTo("fast", 1).attr("href", "<?php echo FSD_API_URL; ?>api/download/<?php echo get_option('fsd_appid'); ?>.apk"); 
	},
	data: {'action': 'compile_app'},
	url: ajaxurl,
	dataType: "json",
	cache: false,
    success: function( str ) {
    	jQuery('#AppVersion').html('APK File version: '+str);
	},
    error: function(xhr, textStatus, errorThrown){
    	jQuery('#btndownload').fadeTo("fast", .5).removeAttr("href");
    	jQuery('#AppVersion').html('Compilation Queued');
    	alert('We apologize for the inconvenience and happy to see you using Quickapp.\n\r\n\rYou are our valued customer and due to heavy usage by many your App compilation is Queued.\n\r\n\rWe will get back to you with your compiled app in 20 Minutes time.');
    }
});	
</script>
