<?php
function mtrl_floating_menu_settings()
{

    global $mtrladmin;
    $mtrladmin = mtrladmin_network($mtrladmin);   
    $element = "floatingmenu-enable";
    if(isset($mtrladmin[$element]) && trim($mtrladmin[$element]) == "1"){

/*        $url = plugins_url('/', __FILE__).'assets/mtrlfm.min.js';
        wp_deregister_script('mtrl-floatingmenu-js');
        wp_register_script('mtrl-floatingmenu-js', $url);
        wp_enqueue_script('mtrl-floatingmenu-js','jquery');*/

/*        $url = plugins_url('/', __FILE__).'assets/mtrlfm.css';
        wp_deregister_style('mtrl-floatingmenu-css');
        wp_register_style('mtrl-floatingmenu-css', $url);
        wp_enqueue_style('mtrl-floatingmenu-css');*/

        $floatstyle = "slidein";
        /*if(isset($mtrladmin['floatingmenu-style']) && trim($mtrladmin['floatingmenu-style']) != ""){
        	$floatstyle = $mtrladmin['floatingmenu-style'];
        }*/

        $floatpos = "br";
        if(isset($mtrladmin['floatingmenu-pos']) && trim($mtrladmin['floatingmenu-pos']) != ""){
        	$floatpos = $mtrladmin['floatingmenu-pos'];
        }

        $floatopen = "hover";
        if(isset($mtrladmin['floatingmenu-open']) && trim($mtrladmin['floatingmenu-open']) != ""){
        	$floatopen = $mtrladmin['floatingmenu-open'];
        }


?>



<ul id="mtrl-floatingmenu" class="fmenu--<?php echo $floatpos; ?> mtrlfm-<?php echo $floatstyle; ?>" data-mtrlfm-toggle="<?php echo $floatopen; ?>">
      <li class="fmenu__wrap">
        <a href="#" class="fmenu__button--main">
          <i class="fmenu__main-icon--resting dashicons-before dashicons-menu"></i>
          <i class="fmenu__main-icon--active dashicons-before dashicons-no"></i>
        </a>
        <ul class="fmenu__list">
		<?php
    $floating_links_arr = array();
    $floating_links_arr[] = $mtrladmin['floatingmenu-links-1'];
    $floating_links_arr[] = $mtrladmin['floatingmenu-links-2'];
    $floating_links_arr[] = $mtrladmin['floatingmenu-links-3'];
    $floating_links_arr[] = $mtrladmin['floatingmenu-links-4'];
    $floating_links_arr[] = $mtrladmin['floatingmenu-links-5'];

    foreach ($floating_links_arr as $key => $value) {
      if(trim($value) != ""){
        $exp = explode("|", $value);
          if(sizeof($exp) == 3){
            $title = trim($exp[0]);
            $icon = trim($exp[1]);
            $link = trim($exp[2]);
            $link = str_replace("ADMINURL/", admin_url(), $link);
            echo "<li><a href='".$link."' class='fmenu__button--child'><i class='fmenu__child-icon ".$icon."'></i></a><span data-mtrlfm-label='".$title."'></span></li>";
          }
      }
		}
		?>
 	 </ul>
      </li>
    </ul>

<?php



   }

}
?>
