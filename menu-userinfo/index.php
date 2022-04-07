<?php

function mtrl_userinfo_menu_settings()
{

	echo "<style type='text/css'>#wp-admin-bar-my-account{visibility:hidden;}</style>";

    global $mtrladmin;
    $mtrladmin = mtrladmin_network($mtrladmin);   
    $element = "user-profile-style";
        if(isset($mtrladmin[$element]) && trim($mtrladmin[$element]) == "style1"){
		wp_enqueue_script('mtrl-wp-stats-js', plugins_url( '/ajaxcall.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'mtrl-wp-stats-js', 'mtrl_wp_stats_ajax', array( 'mtrl_wp_stats_ajaxurl' => admin_url( 'admin-ajax.php')));

        } else {

	echo "<style type='text/css'>#wp-admin-bar-my-account{visibility:visible;}</style>";

        }

}

//add_action("init","mtrl_userinfo_menu_settings");

function mtrl_wp_stats_ajax_online_total(){
	global $mtrladmin;
	$current_user = wp_get_current_user();
	$args = array();
	$display_name = $current_user->data->display_name;
	$user_id = $current_user->data->ID;
	$avatar_url = get_avatar_url ($user_id,$args);
	//echo $avatar_url;
	$roles = "";

	if ( !empty( $current_user->roles ) && is_array( $current_user->roles ) ) {
		foreach ( $current_user->roles as $role )
			$roles .= $role.", ";
	}

       $roles = substr($roles,0,-2);

		$element = 'myaccount_greet';
		$greetwith = "Hi";
		if(isset($mtrladmin[$element]) && trim($mtrladmin[$element]) != ""){
			$greetwith = $mtrladmin[$element];
		}

		$str = "<div class='menu-userinfo'>";
		$str .= "<div class='dispavatar'><a href='".get_edit_user_link($user_id)."'><img src='".$avatar_url."'></a></div>";
		$str .= "<div class='dispname'><a href='javascript:;'>".$greetwith." ".$display_name."</a><a href='javascript:;' class='mtrl-menu-profile-links'><i class='open-links'></i><ul class='all-links'></ul></a></span></div>";
		$str .= "<div class='disproles'>".$role."</div>";

		$str .= "</div>";

		echo $str;

	die();
}
add_action('wp_ajax_mtrl_wp_stats_ajax_online_total', 'mtrl_wp_stats_ajax_online_total');
add_action('wp_ajax_nopriv_mtrl_wp_stats_ajax_online_total', 'mtrl_wp_stats_ajax_online_total');

function mtrl_display_userinfo_in_menu(){ }

?>