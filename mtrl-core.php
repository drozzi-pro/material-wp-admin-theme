<?php
/*
Plugin Name: Material - White Label WordPress Admin Theme
Plugin URI: http://codecanyon.net/user/themepassion/portfolio
Description: Advanced Admin Theme with White Label Branding for WordPress.
Author: themepassion
Version: 8.3
Text Domain: mtrl-framework
Author URI: http://codecanyon.net/user/themepassion/portfolio
*/

/* --------------- Load Redux Vendor Support ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'redux-vendor-support.php' );

/* --------------- Load Custom functions ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-functions.php' );

/* --------------- Mtrl CSS based on WP Version ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-css-version.php' );

/* --------------- Custom colors ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-custom-colors.php' );

/* --------------- Color Library ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-color-lib.php' );

/* --------------- Mtrl Fonts ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-fonts.php' );

/* --------------- CSS Library ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-css-lib.php' );

/* --------------- Logo and Favicon Settings ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-logo.php' );

/* --------------- Login  ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-login.php' );

/* --------------- Top Bar ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-topbar.php' );

/* --------------- Page Loader ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-pageloader.php' );

/* --------------- Admin Settings ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/mtrl-settings.php' );

/* --------------- Visitor Stats ---------------- */
// Disabled - In case of ajax call disable visitor script
//if (defined('DOING_AJAX') && DOING_AJAX) { //} else {
require_once( trailingslashit(dirname( __FILE__ )) . 'visitor-stats/index.php' );
//}
/* --------------- Site Stats ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'site-stats/index.php' );

/* --------------- Menu User Info ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'menu-userinfo/index.php' );

/* --------------- Floating Menu ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'floating-menu/index.php' );

/* --------------- Load  framework ---------------- */

function mtrl_load_framework(){
    

	if ( !class_exists( 'RedukFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/core/framework.php' ) ) {
	    require_once( dirname( __FILE__ ) . '/framework/core/framework.php' );
	}
	if (!isset( $mtrl_demo ) && file_exists( dirname( __FILE__ ) . '/framework/options/mtrl-config.php')) {
	    require_once( dirname( __FILE__ ) . '/framework/options/mtrl-config.php' );
	}
}

add_action('plugins_loaded', 'mtrl_load_framework', 11);

//mtrl_load_framework();


/* ---------------- Dynamic CSS - after plugins loaded ------------------ */
add_action('plugins_loaded', 'mtrl_core', 12);
add_action('admin_menu', 'mtrl_panel_settings', 12);


/* ---------------- On Options saved hook ------------------ */
add_action ('reduk/options/mtrl_demo/saved', 'mtrl_framework_settings_saved');

/* ------------------------------------------------
Regenerate All Color Files again - 
------------------------------------------------- */
$mtrl_regenerate_css = false;
if($mtrl_regenerate_css){
  add_action('plugins_loaded', 'mtrl_regenerate_all_dynamic_css_file', 12);
}


/* ------------------------------------------------
Load Settings Panel only if demo_settings is present.
------------------------------------------------- */

$mtrl_demo_settings = false;
if($mtrl_demo_settings){
  add_action('admin_footer', 'mtrl_admin_footer_function');
}

/* ------------------------------------------------
Regenerate All Inbuilt Theme import Files - 
------------------------------------------------- */

$mtrl_generate_import = false;
if($mtrl_generate_import){
  add_action('plugins_loaded', 'mtrl_generate_inbuilt_theme_import_file', 12);
}


/* ------------------------------------------------
      Auto Update Envato Plugins using Envato WordPress toolkit and 
      Envato Automatic Plugin Update
  ------------------------------------------------- */
add_action( 'plugins_loaded', 'mtrl_my_envato_updates_init' );

function mtrl_my_envato_updates_init() {

    include plugin_dir_path( __FILE__ ) . 'lib/envato-plugin-update.php';

    PresetoPluginUpdateEnvato::instance()->add_item( array(
            'id' => 18155767,
            'basename' => plugin_basename( __FILE__ )
        ) );

}


/* --------------- Registration Hook Library---------------- */
require_once( trailingslashit(dirname(__FILE__)) . 'lib/mtrl-register-hook.php' );
register_activation_hook(__FILE__, 'mtrl_admin_activation');
register_deactivation_hook(__FILE__, 'mtrl_admin_deactivation');

?>