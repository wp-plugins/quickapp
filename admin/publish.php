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
					<h1><a href="#TB_inline?a=1&width=800&height=700&inlineId=Request-Quote" style="text-decoration:none;" class="thickbox"><img src="<?php echo plugins_url('images/btn4.png', __FILE__); ?>" alt=""></a>
				<br>
				iOS App</h1></td>
			</tr>
 
		</table>
	</div><!--/main-->

</section><!--/wrap-->

<div id="dialog-paypal" title="QuickApp"></div>
<?php add_thickbox(); ?>
<div id="Request-Quote" style='display:none;'>
  <div id='ocd_content' class='colorbox '>
    <h1>Contact Us Form</h1>
    <p>Fill in to receive a mobile app quote from one of our consultants today.</p>
    <span class="color1">(*) - indicates a required field </span>
    <form class="request-a-quote-form" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post" id="form1">
    <input type="hidden" name="action" value="RequestQuote" />
      <div class="border">
        <div class="col-1"> <span>Name (<strong>*</strong>)</span><br>
          <input type="text" class="validate[required]" name="name" id="name" >
          <br>
          <span>Phone Number </span><br>
          <input type="text" name="phone" id="phone">
          <br>
        </div>
        <div class="col-1"> <span>Email Address (<strong>*</strong>)</span><br>
          <input type="text" class="validate[required]" name="email" id="email" >
          <br>
          <span>Organization</span><br>
          <input type="text" name="organization" id="organization" >
          <br>
        </div>
        <div class="clear"></div>
      </div><!--border-->
      
      <div class="border">
        <h2>Platform</h2>
        <p class="platform">
          <label>
            <input type="checkbox" name="platform[]" id="Platform1" value="iOS (iPhone, iPad)" >
            <span>iOS (iPhone, iPad)</span></label>
          <label>
            <input type="checkbox" name="platform[]" id="Platform2" value="Android" >
            <span>Android</span></label>          
        </p>
        <div class="col-1"> <span>App Budget (<strong>*</strong>)</span>
          <select id="appbudget" name="appbudget" class="validate[required]">
            <option value="Not Sure">Not Sure</option>
            <option value="Under $500">Under $500</option>
            <option value="$500 - $1,000">$500 - $1,000</option>
            <option value="$1,000 - $2,000">$1,000 - $2,000</option>
            <option value="$2,000 - $3,000">$2,000 - $3,000</option>
            <option value="$3,000 - $4,000">$3,000 - $4,000</option>
            <option value="$4,000 - $5,000">$4,000 - $5,000</option>
            <option value="$5,000 - $6,000">$5,000 - $6,000</option>
            <option value="$6,000 - $7,000">$6,000 - $7,000</option>
            <option value="$7,000 - $8,000">$7,000 - $8,000</option>
            <option value="$8,000 - $9,000">$8,000 - $9,000</option>
            <option value="$9,000 - $10,000">$9,000 - $10,000</option>            
            <option value="$10,000 +">$10,000 +</option>
          </select>
        </div>
        <div class="col-1"> <span>App Type</span>
          <select name="apptype" id="apptype">
          	
            <option value="Business Utility">Business Utility</option>
            <option value="General Entertainment">General Entertainment</option>
            <option value="Fun &amp; Games">Fun &amp; Games</option>
            <option value="Education &amp; Reference">Education &amp; Reference</option>
            <option value="Viral Marketing Application">Viral Marketing Application</option>
            <option value="Enterprise Level App">Social Media Sharing</option>
            <option value="Social Media Sharing">Business Utility</option>
            <option value="Mobile Shopping">Mobile Shopping</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="clear"></div>
        <span>Short Summary of Concept (<strong>*</strong>)</span><br>
        <textarea id="summary" name="summary" cols="20" rows="2" class="validate[required]"></textarea>
        <div class="clear"></div>
      </div><!--border-->
      
      <div class="border">
        <div class="col-1"> <span>How did you hear about us?</span><br>
          <select name="howknow" id="howknow" tabindex="12">
          	
            <option value="Google">Google</option>
            <option value="Online/Search Engine">Online/Search Engine</option>
            <option value="Recommendation">Recommendation</option>
            <option value="Magazine/Trade Press/Journal">Magazine/Trade Press/Journal</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="col-1">
          <label class="margin-top">
            <input type="checkbox" name="nda" id="nda" value="Send me your NDA" >
            <span >Send me your NDA</span></label>
        </div>
        <div class="clear"></div>
      </div><!--border-->
      
      <div class="border">
        <input name="submit" value="Get Quote" type="submit">
      </div><!--border-->
      
    </form>
  </div> <!--#ocd_content--> 
  
</div><!--display:none-->
<!--Inquiry Form END-->

<script>
jQuery(document).ready(function(){
    jQuery('#dialog-paypal').dialog({
        autoOpen: false,
        width: 600,
        modal: true,
        resizable: false,
        buttons: {
            "Buy": function() {
                document.paypal_form.submit();
            },
            "Ignore": function() {
                jQuery(this).dialog("close");
            }
        }
    });
});
</script>
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
	//dataType: "json",
	cache: false,
    success: function( str ) {
    	if(jQuery.isNumeric( str ) == true){
    		jQuery('#AppVersion').html('APK File version: '+str);
    	}else{
    		jQuery('#dialog-paypal').html(str);
			jQuery('#AppVersion').html('Tokens Consumed');
			jQuery('#dialog-paypal').dialog('open');
    	}
	},
    error: function(xhr, textStatus, errorThrown){		
		
    	jQuery('#btndownload').fadeTo("fast", .5).removeAttr("href");
    	jQuery('#AppVersion').html('Compilation Queued');
    	alert('We apologize for the inconvenience and happy to see you using Quickapp.\n\r\n\rYou are our valued customer and due to heavy usage by many your App compilation is Queued.\n\r\n\rWe will get back to you with your compiled app in 20 Minutes time.');
    }
});	
</script>
