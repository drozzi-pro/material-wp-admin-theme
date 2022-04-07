<?php
// Security: Considered blocking direct access to PHP files by adding the following line. 
defined('ABSPATH') or die("Silence is golden :)");

/*Dashboard Widget Page Stats*/

function mtrl_pagestats_add_dashboard() {
  wp_add_dashboard_widget( 'pagestats_wp_dashboard',  __('Pages Count & Type', 'mtrl_framework'), 'mtrl_pagestats_dashboard_output' );
}

function mtrl_pagestats_dashboard_output() {
  include('includes/pagestats-ajaxcall.php');
}

function mtrlwid_pagestats(){  
  include('includes/mtrl-stats-pages.php');
  wp_show_stats_pages();
  die();
}

add_action('wp_ajax_mtrlwid_pagestats', 'mtrlwid_pagestats');
add_action('wp_ajax_nopriv_mtrlwid_pagestats', 'mtrlwid_pagestats');


/*Dashboard Widget Post Stats*/

function mtrl_poststats_add_dashboard() {
  wp_add_dashboard_widget( 'poststats_wp_dashboard', __('Posts Statistics', 'mtrl_framework') , 'mtrl_poststats_dashboard_output' );
}

function mtrl_poststats_dashboard_output() {
  include('includes/poststats-ajaxcall.php');
}

function mtrlwid_poststats(){  
  include('includes/mtrl-stats-posts.php');
  wp_show_stats_posts();
  die();
}

add_action('wp_ajax_mtrlwid_poststats', 'mtrlwid_poststats');
add_action('wp_ajax_nopriv_mtrlwid_poststats', 'mtrlwid_poststats');


/*Dashboard Widget Comment Stats*/

function mtrl_commentstats_add_dashboard() {
  wp_add_dashboard_widget( 'commentstats_wp_dashboard', __('User Comments', 'mtrl_framework') , 'mtrl_commentstats_dashboard_output' );
}

function mtrl_commentstats_dashboard_output() {
  include('includes/commentstats-ajaxcall.php');
}

function mtrlwid_commentstats(){  
  include('includes/mtrl-stats-comments.php');
  wp_show_stats_comments();
  die();
}

add_action('wp_ajax_mtrlwid_commentstats', 'mtrlwid_commentstats');
add_action('wp_ajax_nopriv_mtrlwid_commentstats', 'mtrlwid_commentstats');






/*Dashboard Widget Category Stats*/

function mtrl_catstats_add_dashboard() {
  wp_add_dashboard_widget( 'catstats_wp_dashboard', __('Category Statistics', 'mtrl_framework') , 'mtrl_catstats_dashboard_output' );
}

function mtrl_catstats_dashboard_output() {
  include('includes/catstats-ajaxcall.php');
}

function mtrlwid_catstats(){
  include('includes/mtrl-stats-categories.php');
  wp_show_stats_categories();
  die();
}

add_action('wp_ajax_mtrlwid_catstats', 'mtrlwid_catstats');
add_action('wp_ajax_nopriv_mtrlwid_catstats', 'mtrlwid_catstats');



/*Dashboard Widget User Stats*/

function mtrl_userstats_add_dashboard() {
  wp_add_dashboard_widget( 'userstats_wp_dashboard', __('User Statistics', 'mtrl_framework') , 'mtrl_userstats_dashboard_output' );
}


function mtrl_userstats_dashboard_output() {
  include('includes/userstats-ajaxcall.php');
}

function mtrlwid_userstats(){  
  include('includes/mtrl-stats-users.php');
  wp_show_stats_users();
  die();
}

add_action('wp_ajax_mtrlwid_userstats', 'mtrlwid_userstats');
add_action('wp_ajax_nopriv_mtrlwid_userstats', 'mtrlwid_userstats');


?>
