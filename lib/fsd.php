<?php
// Fsd Main class
class fsd {
    private static $admin_email = 'QuickApp <info@fsdsolutions.com>';
    private static $admin_email_cc = 'abdul.kundi@gmail.com, haroon@fsdsolutions.com';
        
	private static $initialized = false;
	private static $settings;
	private static  $tabbar_menu = array(
		'Latest' => array('title' => 'Latest', 'link' => 'post/latest', 'icon' => 'bars', 'icon2'=>'images/latest-icon.png' ),
		'Pages' => array('title' => 'Pages', 'link' => 'pages/list', 'icon' => 'info', 'icon2'=>'images/pages.png' ),
		'Tags' => array('title' => 'Tags', 'link' => 'tags/list', 'icon' => 'star', 'icon2'=>'images/tags-icon.png' ),
		'Categories' => array('title' => 'Categories', 'link' => 'categories/list', 'icon' => 'grid', 'icon2'=>'images/categories-icon.png' ),
		'Archives' => array('title' => 'Archives', 'link' => 'archives/list', 'icon' => 'wp-archive', 'icon2'=>'images/archives-icon.png' )
	);
    
    private static function initialize()
    {
    	if (self::$initialized)
    		return;
        
    	self::$initialized = true;	
		self::$settings = array(			
			'app_name' => get_bloginfo('name'), // Blog Title
			'app_icon' => '',
			'splash_screen' => array(
				'tag_line' => get_bloginfo ( 'description' ), // Blog Tag line
				'splash_file' => ''
			),
			'customize_theme' => array(
				'author' => 1,
				'date' => 1,
				'comments' => 1,
				'menu_pages' => 1,
				'thumbnail_overlay' => 1
			),
			'menu_bar' => array(				
				'Latest' => array('title' => 'Latest', 'link' => 'post/latest', 'icon' => 'bars', 'icon2'=>'images/icon_11.png' ),
				'Pages' => array('title' => 'Pages', 'link' => 'pages/list', 'icon' => 'info', 'icon2'=>'images/icon_5.png' ),
				'Tags' => array('title' => 'Tags', 'link' => 'tags/list', 'icon' => 'star', 'icon2'=>'images/icon_7.png' ),
				'Categories' => array('title' => 'Categories', 'link' => 'categories/list', 'icon' => 'grid', 'icon2'=>'images/icon_4.png' ),
				'Archives' => array('title' => 'Archives', 'link' => 'archives/list', 'icon' => 'wp-archive', 'icon2'=>'images/icon_6.png' )				
			),
			'sharing_options' => array(
				'email' => 1,
				'facebook' => 1,
				'twitter' => 1,
				'sms' => 1
			),
			'ad_integrations' => array(
				'analytics_id' => '',
				'adsense_id' => '',
				'adsense_slot' => '',
				'admob_id' => ''
			)
		);
    }
	
    static function install() {
    	self::initialize();
		$obj = self::$settings;
		$data['app_name'] = $obj['app_name'];		
		$data['site_url'] = site_url().'?pages/list';
		$operation = 'plugin_register';
		$value =  self::_api_request($data, $operation);
		
		$name = 'fsd_appid';
		$deprecated = NULL;
		$autoload = 'yes';		
        add_option($name, $value, $deprecated, $autoload);
		
		$name = 'fsd_mobile_settings';
		$deprecated = NULL;
		$autoload = 'yes';
		$value = json_encode(self::$settings);		
        add_option($name, $value, $deprecated, $autoload);		
		self::install_simulator();
		return TRUE;
    }
	
	static function uninstall() {
		$operation = 'plugin_unregister';
		$data['app_id'] = get_option('fsd_appid');
		self::_api_request($data, $operation); // unregister to API Server
		
		//Delete settings from WP
		delete_option('fsd_mobile_settings');
		delete_option('fsd_simulator_settings');
		delete_option('fsd_appid');
		return TRUE;
	}
	
    private function install_simulator() {
    	self::initialize();     	
		$name = 'fsd_simulator_settings';
		$deprecated = NULL;
		$autoload = 'yes';
		$value = json_encode(self::$settings);
        add_option($name, $value, $deprecated, $autoload);
		return TRUE;
    }

    public static function ajax_update_settings() {    	
    	$data = array();		
		foreach ($_POST['data'] as $v) {
			if(strstr($v['name'], '[]') === FALSE)
				$data[$v['name']] = $v['value'];
			else{
				$value = str_replace('[]','',$v['name']);
				$data[$value][] = $v['value']; 
			}				
		}
		
		$settings = array(
			'app_name' => $data['app_name'],
			'app_icon' => $data['app_icon_hidden'],
			'splash_screen' => array(
				'tag_line' => isset($data['tagline'])?$data['tagline']:NULL,
				'splash_file' => isset($data['splashscreen_hidden'])?$data['splashscreen_hidden']:'SS-01.png',
			),
			'customize_theme' => array(
				'author' => (isset($data['author'])?1:0),
				'date' => (isset($data['date'])?1:0),
				'comments' => (isset($data['comments'])?1:0),
				'menu_pages' => (isset($data['menu_pages'])?1:0),
				'thumbnail_overlay' => (isset($data['thumbnail_overlay'])?1:0)
			),
			'menu_bar' => array(),
			'sharing_options' => array(
				'email' => (isset($data['email'])?1:0),
				'facebook' => (isset($data['facebook'])?1:0),
				'twitter' => (isset($data['twitter'])?1:0),
				'sms' => (isset($data['sms'])?1:0)
			),
			'ad_integrations' => array(
				'analytics_id' => $data['analytics_id'],
				'adsense_id' => $data['adsense_id'],
				'adsense_slot' => $data['adsense_slot'],
				'admob_id' => $data['admob_id']
			)
		);

		foreach ($data['chkTabMenu'] as $v) {
			$settings['menu_bar'][$v] = self::$tabbar_menu[$v];
		} 

		$name = 'fsd_simulator_settings';
		$value = json_encode($settings);
		update_option($name, $value);		
    }
	
	public static function update_settings() {
		
		if(isset($_FILES['app_icon']) && $_FILES["app_icon"]["name"] != ""){			
			if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );		
			$uploadedfile = $_FILES['app_icon'];
			$upload_overrides = array( 'test_form' => false );
			$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
			if ( $movefile ) {				
			    $app_icon = $movefile['url'];
			}
		}
		
		if(!isset($app_icon)){
			if(isset($_POST['app_icon_del'])){
				$app_icon = '';
			}else{
				$app_icon = $_POST['app_icon_hidden'];
			}
		}
		
		$settings = array(
			'app_name' => $_POST['app_name'],
			'app_icon' => $app_icon,
			'splash_screen' => array(
				'tag_line' => isset($_POST['tagline'])?$_POST['tagline']:NULL,
				'splash_file' => $_POST['splashscreen_hidden']
			),
			'customize_theme' => array(
				'author' => (isset($_POST['author'])?1:0),
				'date' => (isset($_POST['date'])?1:0),
				'comments' => (isset($_POST['comments'])?1:0),
				'menu_pages' => (isset($_POST['menu_pages'])?1:0),
				'thumbnail_overlay' => (isset($_POST['thumbnail_overlay'])?1:0)
			),
			'menu_bar' => array(),
			'sharing_options' => array(
				'email' => (isset($_POST['email'])?1:0),
				'facebook' => (isset($_POST['facebook'])?1:0),
				'twitter' => (isset($_POST['twitter'])?1:0),
				'sms' => (isset($_POST['sms'])?1:0)
			),
			'ad_integrations' => array(
				'analytics_id' => $_POST['analytics_id'],
				'adsense_id' => $_POST['adsense_id'],
				'adsense_slot' => $_POST['adsense_slot'],				
				'admob_id' => $_POST['admob_id']
			)
		);
		
		
		foreach ($_POST['chkTabMenu'] as $v) {
			$settings['menu_bar'][$v] = self::$tabbar_menu[$v];
		}		
		
        foreach ($_POST['chkTabMenu'] as $v) {
            $site_url = self::$tabbar_menu[$v];
            break;
        }
		//Update settings to API Server
		$data['site_url'] = site_url().'?'.$site_url['link'];        
		$data['app_id'] = get_option('fsd_appid');
		$data['app_name'] = $settings['app_name'];
		$data['tagline'] = $settings['splash_screen']['tag_line'];
		$data['splash_file'] = plugins_url('admin/images/splashscreen/'.$settings['splash_screen']['splash_file'], dirname(__FILE__));
		$data['admob_id'] = $settings['ad_integrations']['admob_id'];
		$data['app_icon'] = $settings['app_icon'];
		
		$operation = 'plugin_update_settings';
		$value =  self::_api_request($data, $operation); 

		$name = 'fsd_simulator_settings';
		$value = json_encode($settings);
		update_option($name, $value);
		
		$name = 'fsd_mobile_settings';
		return update_option($name, $value);
    }

	
	static function compile_app(){
		$data['app_id'] = get_option('fsd_appid');
		$operation = 'generate_app';		
		echo fsd::_api_request($data, $operation);
	}
	
	static function send_quote(){		
		$email = (isset($_POST['email'])?$_POST['email']:'');
        $name = $_POST['name'];		
		$message = 'Dear Admin,'."\n\r";
		$message .= 'You have received a request for a quote.,'."\n\r";
		$message .= "\n\r";
		$message .= 'Name: '.(isset($_POST['name'])?$_POST['name']:'')." \n\r";
		$message .= 'Email: '.(isset($_POST['email'])?$_POST['email']:'')." \n\r";
		$message .= 'Phone: '.(isset($_POST['phone'])?$_POST['phone']:'')." \n\r";
		$message .= 'Orgnization: '.(isset($_POST['organization'])?$_POST['organization']:'')." \n\r";
		$message .= 'Platforms: '." \n\r";
		if(isset($_POST['platform'])){
			foreach ($_POST['platform'] as $value) {
				$message .= '- '.$value." \n\r";	
			}
		}		
		$message .= 'App Budget: '.(isset($_POST['appbudget'])?$_POST['appbudget']:'')." \n\r";
		$message .= 'App Type: '.(isset($_POST['apptype'])?$_POST['apptype']:'')." \n\r";
		$message .= 'Short Summary of Concept: '.(isset($_POST['summary'])?$_POST['summary']:'')." \n\r";
		$message .= 'How did you hear about?'." \n\r";
		$message .= (isset($_POST['howknow'])?$_POST['howknow']:'')." \n\r";
		$message .= 'Send me your NDA:'.(isset($_POST['nda'])?'Yes':'No')." \n\r";
        $message .= "\n\r";
        $message .= 'Regards,'."\n\r";
        $message .= 'Quickapp Team.' . "\n\r";
        $message .= 'Tel: +1-214-295-8184 -- +1-214-257-7895' . "\n\r";
        $message .= 'Email : info@fsdsolutions.com' . "\n\r";
		
   		$headers[] = 'From: '.$name.' <'.$email.'>';
        $headers[] = 'Cc: ' . self::$admin_email_cc;
        $to = self::$admin_email;
   		wp_mail($to, 'QuickApp: Contact Us Form.', $message, $headers);
		
		//sent to client
		$message = 'Dear '.$_POST['name'].", \n\r";
		$message .= 'We appreciate your interest, we\'ll respond shortly.';
        $message .= "\n\r";
        $message .= 'Regards,'."\n\r";
        $message .= 'Quickapp Team.' . "\n\r";
        $message .= 'Tel: +1-214-295-8184 -- +1-214-257-7895' . "\n\r";
        $message .= 'Email : info@fsdsolutions.com' . "\n\r";


		$headers = 'From: '.self::$admin_email. " \r\n";
		$to = $_POST['email'];
   		wp_mail($to, 'QuickApp: Thank you for contacting us.', $message, $headers);
		echo '<script>alert("Thank You,\n\rWe appreciate your interest, we\'ll respond shortly.");</script>';
	}
	
	private static function _api_request($data, $operation, $blocking = true){
	   //set POST variables
	   $url = FSD_API_URL.'api/'.$operation;	   
		$response = wp_remote_post( $url, array(
			'method' => 'POST',
			'timeout' => 10000000,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => $blocking,
			'headers' => array(),
			'body' => $data,
			'cookies' => array()
		    )
		);		
		if ( is_wp_error( $response ) ) {		   
		   return $response->get_error_message();
		} else {									
			return $response['body'];
		}
	}	 
}