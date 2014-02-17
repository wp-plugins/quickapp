<?php
global $obj_menu;
?>
    <!--Navigation Bar [Start]-->
    <div data-role="footer" data-position="fixed" data-theme="a">
        <div class="navigation" data-role="navbar" data-iconpos="top">
            <ul>
<?php	foreach($obj_menu->menu_bar as $v):	?>            	
                <li>
                    <a href="<?php echo esc_url( home_url( '/' ).'?'.$v->link ); ?>" data-direction="reverse" data-transition="flow" data-icon="<?php echo $v->icon; ?>" <?php echo(($_SERVER['QUERY_STRING'] == $v->link)?'class="ui-btn-active ui-state-persist"':'');?>>
                        <?php echo $v->title; ?>
                    </a>
                </li>
<?php	endforeach; ?>
            </ul>
        </div><!-- /navbar -->
    </div><!-- /footer -->
<?php if($obj_menu->ad_integrations->analytics_id != ""){ ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-<?php echo($obj_menu->ad_integrations->analytics_id); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php	}	?>
    	