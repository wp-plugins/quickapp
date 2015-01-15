<?php

/**
* Plugin Name: Quickapp
* Description: Quickapp is a wordpress plugin that converts your blog or website into an HTML5 mobile app for all smartphones platforms including android. We offer a free version for small to medium website as well as custom apps for an affordable price. Our plugin can be used to generate files that you can self-publish as a native app to Apple App Store and Google Play Android market.
* Author: FSD Solutions LLC.
* Version: 1.5b
* Author URI: http://www.fsdsolutions.com/
* Plugin URI: http://www.fsdsolutions.com/quickapp/
*/
/**
* This is the plugin entry script, it checks for compatibility and if compatible
* it will loaded the needed files for the CMS plugin
* @package QuickApp
* @author Muhammad Shariq shariq@fsdsolutions.com
*
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

if( !defined( 'FSD_BASE_FILE' ) )	define( 'FSD_BASE_FILE', __FILE__ );
if( !defined( 'FSD_BASE_DIR' ) ) 	define( 'FSD_BASE_DIR', dirname( FSD_BASE_FILE ) );
if( !defined( 'FSD_PLUGIN_URL' ) ) 	define( 'FSD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
if( !defined( 'FSD_API_URL' ) ) 	define( 'FSD_API_URL', 'http://quickapp.fsdcloud.com/' );

include(FSD_BASE_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'fsd.php');
/*
|--------------------------------------------------------------------------
| FILTERS
|--------------------------------------------------------------------------
*/
register_activation_hook( __FILE__, array( 'fsd', 'install' ) );
register_deactivation_hook(__FILE__, array( 'fsd', 'uninstall' ) );

// Add hook for admin <head></head>
add_action('admin_head', 'fsd_header_files');
add_filter( 'template_include', 'fsd_template_chooser');
add_action( 'admin_init', 'fsd_admin_init' );
add_action( 'admin_menu', 'register_fsd_menu_page' );
add_action( 'wp_ajax_update_settings', array( 'fsd', 'ajax_update_settings') );
add_action( 'wp_ajax_compile_app', array( 'fsd', 'compile_app') );
/*
|--------------------------------------------------------------------------
| PLUGIN FUNCTIONS
|--------------------------------------------------------------------------
*/
function fsd_header_files() {	
	echo '<!--[if lt IE 9]><script type="text/javascript" src="'.plugins_url( 'admin/scripts/html5shiv.js',  __FILE__ ).'"></script><![endif]-->'."\n";
	echo '<!--[if lt IE 10]><script type="text/javascript">
		jQuery(document).ready(function(e){
			jQuery(\'[placeholder]\').focus(function() {
			  var input = jQuery(this);
			  if (input.val() == input.attr(\'placeholder\')) {
				input.val(\'\');
				input.removeClass(\'placeholder\');
			  }
			}).blur(function() {
			  var input = jQuery(this);
			  if (input.val() == \'\' || input.val() == input.attr(\'placeholder\')) {
				input.addClass(\'placeholder\');
				input.val(input.attr(\'placeholder\'));
			  }
			}).blur();
			
			jQuery(\'[placeholder]\').parents(\'form\').submit(function() {
			  jQuery(this).find(\'[placeholder]\').each(function() {
				var input = jQuery(this);
				if (input.val() == input.attr(\'placeholder\')) {
				  input.val(\'\');
				}
			  })
			});
		});
		</script><![endif]-->'."\n"; 
}

function my_enqueue($hook) {
    if( !strstr($hook, 'fsd' )){    	
        return;
    }
	
    wp_enqueue_style( 'fsd-style', plugins_url( 'admin/styles/style.css',  __FILE__ ) );
	wp_enqueue_style( 'fsd-slider', plugins_url( 'admin/styles/slider.css',  __FILE__ ) );	
	
	if( strstr($hook, 'fsdapp-plans' ) !== FALSE){	    
		//Validation Engine
		wp_enqueue_script( 'fsd-validationEngine-en', plugins_url( 'admin/scripts/languages/jquery.validationEngine-en.js',  __FILE__ ), array('jquery'));
		wp_enqueue_script( 'fsd-validationEngine', plugins_url( 'admin/scripts/jquery.validationEngine.js',  __FILE__ ), array('jquery'));
		wp_enqueue_style( 'fsd-validationEngine-css', plugins_url( 'admin/styles/validationEngine.jquery.css',  __FILE__ ) );
        wp_enqueue_style( 'fsd-jquery-ui-css', plugins_url( 'admin/styles/ui-lightness/jquery-ui-1.10.4.custom.min.css',  __FILE__ ) );
        wp_enqueue_script( 'jquery-ui-dialog', FALSE, array('jquery'));
	}    
	wp_enqueue_script( 'jquery-ui-core', FALSE, array('jquery'));
    wp_enqueue_script( 'jquery-ui-sortable', FALSE, array('jquery')); 
    wp_enqueue_script( 'thickbox' );
	
	wp_enqueue_script( 'fsd-jquery-tinytips', plugins_url( 'admin/scripts/jquery.tinyTips.js',  __FILE__ ), array('jquery'));
	wp_enqueue_script( 'fsd-jquery-slides', plugins_url( 'admin/scripts/slides.min.jquery.js',  __FILE__ ), array('jquery'));
	wp_enqueue_script( 'fsd-jquery-cookie', plugins_url( 'admin/scripts/jquery.cookie.js',  __FILE__ ), array('jquery'));
	wp_enqueue_script( 'fsd-settings', plugins_url( 'admin/scripts/settings.js',  __FILE__ ), array('jquery'));
	wp_enqueue_script( 'fsd-browser', plugins_url( 'admin/scripts/css_browser_selector.js',  __FILE__ ), array('jquery'));
}
add_action( 'admin_enqueue_scripts', 'my_enqueue' );

function fsd_admin_init() {
	
}

function register_fsd_menu_page(){	
    add_menu_page( 'Quickapp', 'Quickapp', 'administrator', 'fsdapp-plans', 'fsd_plans', plugins_url( 'admin/icon.png',  __FILE__  ) );
	/* remove duplicate menu hack */
	add_submenu_page('fsdapp-plans', '', '', 'administrator', 'fsdapp-plans', 'fsd_plans');	
   /* Register our plugin page */
	add_submenu_page( 'fsdapp-plans', 'WP Create your Mobile App', 'Settings', 'administrator', 'fsdapp-settings', 'fsd_settings');
	add_submenu_page( 'fsdapp-plans', 'WP Create your Mobile App', 'Publish', 'administrator', 'fsd_publish', 'fsd_publish');
	add_submenu_page( 'fsdapp-plans', 'WP Create your Mobile App', 'More Options', 'administrator', 'fsdapp-plans', 'fsd_plans' ); 
}

function fsd_support() {
       /* Output our admin page */
	load_template( FSD_BASE_DIR . '/admin/support.php');
}

function fsd_plans() {
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])){
		switch ($_POST['action']) {
			case 'RequestQuote':
				fsd::send_quote();				
				break;
			case 'InquiryForm':
				fsd::send_inquiry();
				break;
		}
	}
     /* Output our admin page */
	load_template( FSD_BASE_DIR . '/admin/plans.php');
}

function fsd_publish() {	
       /* Output our admin page */
	load_template( FSD_BASE_DIR . '/admin/publish.php');
}

function fsd_settings() {	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		fsd::update_settings();
	}
		
	global $obj_fsd_settings;
	$obj_fsd_settings = json_decode(get_option('fsd_mobile_settings'));	
       /* Output our admin page */	   
	load_template( FSD_BASE_DIR . '/admin/settings.php');
}   


/**
 * Returns template file
 *
 * @since       1.0
*/

function fsd_template_chooser($template) {    
	require_once(dirname (__FILE__) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Mobile_Detect.php');	 
	$detect = new Mobile_Detect;
    if (strpos($_SERVER['QUERY_STRING'], 'register-device') !== FALSE && !empty($_POST['device_id'])){
            GCM::register_device($_POST['device_id']);
            return;
     }    
	
	// Any mobile device (phones or tablets).
	if( $detect->isMobile()) {
	    				
		$menu = get_option( 'fsd_mobile_settings' );
		global $obj_menu;
		$obj_menu = json_decode($menu);
		if (strpos($_SERVER['QUERY_STRING'], 'tags/list') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('tags-list');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'post/latest') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('post-latest');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'post/comments/') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('comments');			
		}elseif (strpos($_SERVER['QUERY_STRING'], 'pages/list') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('pages-list');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'categories/list') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('categories-list');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'archives/list') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('archives-list');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'share') !== FALSE){			
			return fsd_get_template('share');
		}else{
			if($template == 'home')
				$template = 'index';		
			$arr = explode('/', $template);
			$arr = explode('.', end($arr));
			$template = $arr[0];			
			return fsd_get_template($template);
		}
	}elseif(is_super_admin()) {	    

		$menu = get_option( 'fsd_simulator_settings' );
		global $obj_menu;
		$obj_menu = json_decode($menu);
		
		if(isset($_SERVER['HTTP_REFERER']) && (strpos($_SERVER['HTTP_REFERER'], 'customize.php') === FALSE)){
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {				
			}elseif(strpos($_SERVER['HTTP_REFERER'], 'fsdapp-settings') === FALSE){
				return $template;				
			}			
		}else{			
			return $template;
		}				
		
		//Continue to here 
		if (strpos($_SERVER['QUERY_STRING'], 'tags/list') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('tags-list');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'post/latest') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('post-latest');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'post/comments/') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('comments');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'pages/list') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('pages-list');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'categories/list') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('categories-list');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'archives/list') !== FALSE){
			// Start the request handler so it will register it's events.
			return fsd_get_template('archives-list');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'share') !== FALSE){			
			return fsd_get_template('share');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'comment_id') !== FALSE){			
			return fsd_get_template('comment');
		}elseif (strpos($_SERVER['QUERY_STRING'], 'splashscreen') !== FALSE){			
			return fsd_get_template('splashscreen');
		}else{
			$arr = explode('/', $template);
			$arr = explode('.', end($arr));
			$template = $arr[0];
			return fsd_get_template($template);
		}
	}else{		
		return $template;
	}
}

/**
 * Get the custom template if is set
 *
 * @since       1.0
*/

function fsd_get_template( $template ) {

    // Get the template slug
	if (strpos($template, '.php') !== FALSE)
		$template = rtrim($template, '.php');
    $template      = $template . '.php';	
    $file = FSD_BASE_DIR . DIRECTORY_SEPARATOR .'includes'.DIRECTORY_SEPARATOR.'templates' .DIRECTORY_SEPARATOR. $template;	
    return apply_filters( 'fsd_repl_template_'.$template, $file);
}

function fsd_get_adsense() {	
	load_template( FSD_BASE_DIR . '/includes/templates/adsense.php');
}

function fsd_get_footer() {	
	load_template( FSD_BASE_DIR . '/includes/templates/footer.php');
}

function fsd_get_head() {	
	load_template( FSD_BASE_DIR . '/includes/templates/head.php');
}

function fsd_get_admin_head() {	
	load_template( FSD_BASE_DIR . '/admin/header.php');
}
//Array pagination
function paganation($display_array, $show_per_page, $page) {   

    $page = $page < 1 ? 1 : $page;

    // start position in the $display_array
    // +1 is to account for total values.
    $start = ($page - 1) * ($show_per_page + 1);
    $offset = $show_per_page + 1;

    $outArray = array_slice($display_array, $start, $offset);

    return $outArray;
}