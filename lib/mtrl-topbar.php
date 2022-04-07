<?php
/**
 * @Package: WordPress Plugin
 * @Subpackage: Material - White Label WordPress Admin Theme Theme
 * @Since: Mtrl 1.0
 * @WordPress Version: 4.0 or above
 * This file is part of Material - White Label WordPress Admin Theme Theme Plugin.
 */
?>
<?php

function mtrl_admintopbar(){
    global $mtrladmin;
       $mtrladmin = mtrladmin_network($mtrladmin);       

    if(isset($mtrladmin['enable-topbar']) && $mtrladmin['enable-topbar'] != "1" && $mtrladmin['enable-topbar'] == "0" && !$mtrladmin['enable-topbar']){
        echo "<style type='text/css'>#wpadminbar{display: none !important;} html.wp-toolbar{padding-top:0px !important;} #wpcontent{padding-top: 0px !important;}  #wpcontent:before{height: 70px !important;position:absolute !important;}</style>";
    }
}



function mtrl_wptopbar(){
    global $mtrladmin;
       $mtrladmin = mtrladmin_network($mtrladmin);       

    if(isset($mtrladmin['enable-topbar-wp']) && $mtrladmin['enable-topbar-wp'] != "1" && $mtrladmin['enable-topbar-wp'] == "0" && !$mtrladmin['enable-topbar-wp']){
        remove_action('wp_footer', 'wp_admin_bar_render', 9);
        add_filter('show_admin_bar', '__return_false');
    }

}



function mtrl_admintopbar_links(){
        global $mtrladmin;
       $mtrladmin = mtrladmin_network($mtrladmin);       

        //print_r($mtrladmin);
          
        $str = "";

        $element = 'enable-topbar-links-wp';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $str .= "#wp-admin-bar-wp-logo{display:none;}";
        }
        
        $element = 'enable-topbar-links-site';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $str .= "#wp-admin-bar-site-name{display:none;}";
        }

        $element = 'enable-topbar-links-comments';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $str .= "#wp-admin-bar-comments{display:none;}";
        }

        $element = 'enable-topbar-links-new';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $str .= "#wp-admin-bar-new-content{display:none;}";
        }

        $element = 'enable-topbar-links-mtrladmin';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $str .= "#wp-admin-bar-_mtrloptions{display:none;}";
        }


        $element = 'enable-topbar-links-updates';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $str .= "#wp-admin-bar-updates{display:none;}";
        }

       echo "<style type='text/css'>".$str."</style>";
}





function mtrl_topbar_logout_link() {
       global $mtrladmin;
       $mtrladmin = mtrladmin_network($mtrladmin);       

       $element = 'user-profile-style';
       
       if(isset($mtrladmin[$element]) && trim($mtrladmin[$element]) == "style3"){
   
                global $wp_admin_bar;
                $wp_admin_bar->add_menu( array(
                    'id'    => 'wp-custom-logout',
                    'title' => 'Logout',
                    'parent'=> 'top-secondary',
                    'href'  => wp_logout_url()
                ) );
   }

}



function mtrl_topbar_menuids(){

    global $wp_admin_bar;
    global $mtrladmin;
       $mtrladmin = mtrladmin_network($mtrladmin);       

        $element = 'enable-topbar-links-wp';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $wp_admin_bar->remove_menu('wp-logo');
        }

        $element = 'enable-topbar-links-site';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $wp_admin_bar->remove_menu('site-name');            
        }

        $element = 'enable-topbar-links-comments';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $wp_admin_bar->remove_menu('comments');
        }

        $element = 'enable-topbar-links-updates';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $wp_admin_bar->remove_menu('updates');
        }

        $element = 'enable-topbar-links-new';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $wp_admin_bar->remove_menu('new-content');
        }

        $element = 'enable-topbar-links-mtrladmin';
        if(isset($mtrladmin[$element]) && $mtrladmin[$element] != "1" && $mtrladmin[$element] == "0" && !$mtrladmin[$element]){
            $wp_admin_bar->remove_menu('_mtrloptions');
        }

        $element = 'user-profile-style';
        if(isset($mtrladmin[$element]) && ($mtrladmin[$element] != "style1" && $mtrladmin[$element] != "style2") ){
            $wp_admin_bar->remove_menu('my-account');
        }


        $element = 'topbar-removeids';
        if(isset($mtrladmin[$element]) && trim($mtrladmin[$element]) != ""){
            $exp = explode(",",$mtrladmin[$element]);
            $exp = array_unique(array_filter($exp));

            foreach($exp as $nodeid){
                if(trim($nodeid) != ""){
                    $wp_admin_bar->remove_menu($nodeid);
                }
            }
        }


}





function mtrl_topbar_account_menu( $wp_admin_bar ) {

    global $mtrladmin;
       $mtrladmin = mtrladmin_network($mtrladmin);       
        $greet = 'Howdy';

        $element = 'myaccount_greet';
        if(isset($mtrladmin[$element]) && trim($mtrladmin[$element]) != "Howdy"){

            $greet = $mtrladmin[$element];
            if($greet != ""){ $greet .= ', '; }

            $user_id = get_current_user_id();
            $current_user = wp_get_current_user();
            $profile_url = get_edit_profile_url( $user_id );

            if ( 0 != $user_id ) {
            
                /* Add the "My Account" menu */
                $avatar = get_avatar( $user_id, 28 );
                $howdy = $greet.''.sprintf( __('%1$s','mtrl_framework'), $current_user->display_name );
                $class = empty( $avatar ) ? '' : 'with-avatar';

                $wp_admin_bar->add_menu( array(
                'id' => 'my-account',
                'parent' => 'top-secondary',
                'title' => $howdy . $avatar,
                'href' => $profile_url,
                'meta' => array(
                'class' => $class,
                ),
                ) );

            }
        }
}





?>