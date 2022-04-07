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

function mtrl_page_loader()
{
    global $mtrl_css_ver;

    global $mtrladmin;
       $mtrladmin = mtrladmin_network($mtrladmin);       


    //print_r($mtrladmin);


    if(isset($mtrladmin['enable-pageloader']) && $mtrladmin['enable-pageloader'] == "1" && $mtrladmin['enable-pageloader'] != "0" && $mtrladmin['enable-pageloader']){

        $url = plugins_url('/', __FILE__).'../js/mtrl-pace.min.js';
        wp_deregister_script('mtrl-pace-js');
        wp_register_script('mtrl-pace-js', $url);
        wp_enqueue_script('mtrl-pace-js');


        $url = plugins_url('/', __FILE__).'../css/mtrl-pace.min.css';
        wp_deregister_style('mtrl-pace-css', $url);
        wp_register_style('mtrl-pace-css', $url);
        wp_enqueue_style('mtrl-pace-css');
    }

}

?>