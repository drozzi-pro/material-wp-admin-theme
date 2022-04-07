<?php
/**
 * @Package: WordPress Plugin
 * @Subpackage: Material - White Label WordPress Admin Theme Theme
 * @Since: Mtrl 1.0
 * @WordPress Version: 4.0 or above
 * This file is part of Material - White Label WordPress Admin Theme Theme Plugin.
 */

//Activation Code
function mtrl_admin_activation() {
    
    global $wpdb;
    //add_option("mtrl_admin_version", "1.0");
    
        $sql = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "mtrlwid"
                 ."( UNIQUE KEY id (id),
          id int(100) NOT NULL AUTO_INCREMENT,
          session_id  VARCHAR( 255 )  NOT NULL,
          knp_date  DATE NOT NULL,
          knp_time  TIME NOT NULL,
          knp_ts  VARCHAR (50) NOT NULL,
          duration  TIME NOT NULL,
          userid  VARCHAR( 50 ) NOT NULL,
          event VARCHAR( 50 ) NOT NULL,
          browser VARCHAR( 50 ) NOT NULL,
          platform  VARCHAR( 50 ) NOT NULL,
          ip  VARCHAR( 20 ) NOT NULL,
          city  VARCHAR( 50 ) NOT NULL,
          region  VARCHAR( 50 ) NOT NULL,
          countryName VARCHAR( 50 ) NOT NULL,
          url_id  VARCHAR( 255 )  NOT NULL,
          url_term  VARCHAR( 255 )  NOT NULL,
          referer_doamin  VARCHAR( 255 )  NOT NULL,
          referer_url TEXT NOT NULL,
          screensize  VARCHAR( 50 ) NOT NULL,
          isunique  VARCHAR( 50 ) NOT NULL,
          landing VARCHAR( 10 ) NOT NULL

          )";
    //$wpdb->query($sql);
//  $wpdb->query($req);
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);

    
        $sql2 = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "mtrlwid_online"
                 ."( UNIQUE KEY id (id),
          id int(100) NOT NULL AUTO_INCREMENT,
          session_id VARCHAR( 255 ) NOT NULL,
          knp_time  DATETIME NOT NULL,
          knp_ts  VARCHAR (50) NOT NULL,
          userid  VARCHAR( 50 ) NOT NULL,
          url_id  VARCHAR( 255 )  NOT NULL,
          url_term  VARCHAR( 255 )  NOT NULL,
          city  VARCHAR( 50 ) NOT NULL,
          region  VARCHAR( 50 ) NOT NULL,
          countryName VARCHAR( 50 ) NOT NULL,
          browser VARCHAR( 50 ) NOT NULL,
          platform  VARCHAR( 50 ) NOT NULL,
          referer_doamin  VARCHAR( 255 )  NOT NULL,
          referer_url TEXT NOT NULL
          )";
    //$wpdb->query($sql2);
    dbDelta($sql2);
    


}

//Deactivation Code
function mtrl_admin_deactivation() {

	delete_option( "mtrladmin_plugin_access");
	delete_option( "mtrladmin_plugin_page");
	delete_option( "mtrladmin_plugin_userid");
	delete_option( "mtrladmin_menumng_page");
	delete_option( "mtrladmin_admin_menumng_page");
	delete_option( "mtrladmin_admintheme_page");
	delete_option( "mtrladmin_logintheme_page");
	delete_option( "mtrladmin_master_theme");

       delete_option("mtrladmin_menuorder");
       delete_option("mtrladmin_submenuorder");
       delete_option("mtrladmin_menurename");
       delete_option("mtrladmin_submenurename");
       delete_option("mtrladmin_menudisable");
       delete_option("mtrladmin_submenudisable");


  delete_site_option( "mtrladmin_plugin_access");
  delete_site_option( "mtrladmin_plugin_page");
  delete_site_option( "mtrladmin_plugin_userid");
  delete_site_option( "mtrladmin_menumng_page");
  delete_site_option( "mtrladmin_admin_menumng_page");
  delete_site_option( "mtrladmin_admintheme_page");
  delete_site_option( "mtrladmin_logintheme_page");
  delete_site_option( "mtrladmin_master_theme");

       delete_site_option("mtrladmin_menuorder");
       delete_site_option("mtrladmin_submenuorder");
       delete_site_option("mtrladmin_menurename");
       delete_site_option("mtrladmin_submenurename");
       delete_site_option("mtrladmin_menudisable");
       delete_site_option("mtrladmin_submenudisable");

}

?>