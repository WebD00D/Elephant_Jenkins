<?php
/**
Plugin Name: Widgetize pages Light
Plugin URI: http://otwthemes.com/?utm_source=wp.org&utm_medium=admin&utm_content=site&utm_campaign=wpl
Description: Drop widgets in page or post content area. Widgetize a page. Build your custom page layout in no time. No coding, easy and fun! 
Author: OTWthemes
Version: 2.5
Author URI: https://codecanyon.net/user/otwthemes/portfolio?ref=OTWthemes
Text Domain: widgetize-pages-light
*/

/**
 * Loaded plugin 
 */
function otw_wpl_plugin_loaded(){
	
	global $otw_plugin_options, $otw_wpl_plugin_url, $wp_wpl_int_items, $otw_wpl_grid_manager_component, $otw_wpl_grid_manager_object, $otw_wpl_shortcode_component, $otw_wpl_form_component, $otw_wpl_factory_component, $otw_wpl_factory_object, $otw_wpl_plugin_id;
	
	//load text domain
	load_plugin_textdomain('widgetize-pages-light',false,dirname(plugin_basename(__FILE__)) . '/languages/');
	
	$wp_wpl_int_items = array(
		'page'              => array( array(), __( 'Pages', 'widgetize-pages-light' ), __( 'All pages', 'widgetize-pages-light' ) )
	);
	
	$otw_wpl_plugin_id = '0749d8020bc3f1f46a46c7b2b8be6144';
	
	$otw_plugin_options = get_option( 'otw_plugin_options' );
	
	$otw_wpl_plugin_url = plugin_dir_url( __FILE__);
	
	//otw components
	$otw_wpl_grid_manager_component = false;
	$otw_wpl_grid_manager_object = false;
	$otw_wpl_factory_component = false;
	$otw_wpl_factory_object = false;

	$otw_wpl_shortcode_component = false;
	
	$otw_wpl_form_component = false;
	
	//load core component functions
	@include_once( 'include/otw_components/otw_functions/otw_functions.php' );
	
	if( !function_exists( 'otw_register_component' ) ){
		wp_die( 'Please include otw components' );
	}
	
	//register factory component
	otw_register_component( 'otw_factory', dirname( __FILE__ ).'/include/otw_components/otw_factory/', $otw_wpl_plugin_url.'include/otw_components/otw_factory/' );
	
	//register grid manager component
	otw_register_component( 'otw_grid_manager', dirname( __FILE__ ).'/include/otw_components/otw_grid_manager/', $otw_wpl_plugin_url.'include/otw_components/otw_grid_manager/' );
	
	//register form component
	otw_register_component( 'otw_form', dirname( __FILE__ ).'/include/otw_components/otw_form/', $otw_wpl_plugin_url.'include/otw_components/otw_form/' );
	
	//register shortcode component
	otw_register_component( 'otw_shortcode', dirname( __FILE__ ).'/include/otw_components/otw_shortcode/', $otw_wpl_plugin_url.'include/otw_components/otw_shortcode/' );
}

/** calls list of available sidebars
  *
  */
function otw_wpl_sidebars_list(){
	if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' ){
		require_once( 'include/otw_manage_sidebar.php' );
	}else{
		require_once( 'include/otw_list_sidebars.php' );
	}
}

/** calls page where to create new sidebars
  *
  */
function otw_wpl_sidebars_manage(){;
	require_once( 'include/otw_manage_sidebar.php' );
}
/** plugin options
  *
  */
function otw_wpl_sidebars_options(){
	require_once( 'include/otw_sidebar_options.php' );
}
/** delete sidebar
  *
  */
function otw_wpl_sidebars_action(){
	require_once( 'include/otw_sidebar_action.php' );
}

function otw_wpl_editor_dialog(){
	require_once( 'include/otw_editor_dialog.php' );
	die;
}


/** admin menu actions
  * add the top level menu and register the submenus.
  */ 
function otw_wpl_admin_actions(){
	global $otw_wpl_plugin_url;
	
	add_menu_page( __( 'Widgetize pages', 'otw_wpl'),  __( 'Widgetize pages', 'otw_wpl'), 'manage_options', 'otw-wpl', 'otw_wpl_sidebars_list', $otw_wpl_plugin_url.'images/otw-sbm-icon.png' );
	add_submenu_page( 'otw-wpl', __( 'Sidebars', 'otw_wpl'), __( 'Sidebars', 'otw_wpl'), 'manage_options', 'otw-wpl', 'otw_wpl_sidebars_list' );
	add_submenu_page( 'otw-wpl', __( 'Add Sidebar', 'otw_wpl'), __( 'Add Sidebar', 'otw_wpl'), 'manage_options', 'otw-wpl-add', 'otw_wpl_sidebars_manage' );
	add_submenu_page( 'otw-wpl', __( 'Plugin Options', 'otw_wpl'), __('Plugin Options', 'otw_wpl'), 'manage_options', 'otw-wpl-options', 'otw_wpl_sidebars_options' );
	add_submenu_page( __FILE__,  __( 'Manage widget', 'otw_wpl'),  __( 'Manage widget', 'otw_wpl'), 'manage_options', 'otw-wpl-action', 'otw_wpl_sidebars_action' );
}


function otw_wpl_factory_message( $params ){
	
	global $otw_wpl_plugin_id;
	
	if( isset( $params['plugin'] ) && $otw_wpl_plugin_id == $params['plugin'] ){
		
		//filter out some messages if need it
	}
	if( isset( $params['message'] ) )
	{
		return $params['message'];
	}
	return $params;
}


/** include needed javascript scripts based on current page
  *  @param string
  */
function enqueue_wpl_scripts( $requested_page ){

}

/**
 * include needed styles
 */
function enqueue_wpl_styles( $requested_page ){
	global $otw_wpl_plugin_url;
	wp_enqueue_style( 'otw_wpl_sidebar', $otw_wpl_plugin_url.'css/otw_sbm_admin.css', array( 'thickbox' ), '1.1' );
}

require_once( plugin_dir_path( __FILE__ ).'/include/otw_functions.php' );

/**
 * Loaded plugin
 */
add_action( 'plugins_loaded', 'otw_wpl_plugin_loaded' );
/**
 * register admin menu 
 */
add_action('admin_menu', 'otw_wpl_admin_actions');
add_action('admin_notices', 'otw_wpl_admin_notice');
add_filter('sidebars_widgets', 'otw_sidebars_widgets');
add_filter('otwfcr_notice', 'otw_wpl_factory_message' );

/**
 * include plugin js and css.
 */
add_action('admin_enqueue_scripts', 'enqueue_wpl_scripts');
add_action('admin_print_styles', 'enqueue_wpl_styles' );
add_shortcode('otw_is', 'otw_call_sidebar');

//register some admin actions
if( is_admin() ){
	add_action( 'wp_ajax_otw_wpl_shortcode_editor_dialog', 'otw_wpl_editor_dialog' );
}
/** 
 *call init plugin function
 */
add_action('init', 'otw_wpl_plugin_init', 104 );
?>