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


function mtrl_css_element_color($type) {
    global $mtrladmin;
    return ".btn-" . $type . ", .btn-" . $type . ".inverted:hover { background-color: " . $mtrladmin[$type . "-color"] . "; border-color: transparent;}
.btn-" . $type . ":hover, .btn-" . $type . ":focus, .btn-" . $type . ".inverted { border-color: " . $mtrladmin[$type . "-color"] . "; background-color:transparent; color: " . $mtrladmin[$type . "-color"] . ";}
.btn-" . $type . ":hover .fa, .btn-" . $type . ":focus .fa, .btn-" . $type . ".inverted .fa { color: " . $mtrladmin[$type . "-color"] . ";}
.btn-" . $type . ".inverted:hover, .btn-" . $type . ".inverted:hover .fa {color: #ffffff;} 
.alert-" . $type . "{ background-color: " . $mtrladmin[$type . "-color"] . "; color: white;}
.alert-" . $type . " .close .fa{color:white;}
.progress-bar-" . $type . " { background-color: " . $mtrladmin[$type . "-color"] . ";}

";
}

function mtrl_css_color($selector, $id, $opacity = "", $valuetype = "") {
    global $mtrladmin;
    if ($valuetype == "string") {
        $value = $id;
    } else {
        $value = $mtrladmin[$id];
        if (is_array($value) && sizeof($value) == 0) {
            return;
        } else if (is_array($value) && sizeof($value) > 0) {
            $value = $mtrladmin[$id]['regular'];
        }
        if ($value == "") {
            return;
        }
    }
    return " ".$selector . "{color:" . mtrl_hextorgba($value, $opacity) . " /*".$value."*/;} ";
}

function mtrl_css_shadow($selector, $id, $opacity = "", $side, $width, $string = "",$valuetype = "") {
    if ($width == "") {
        $width = "1px";
    }
    
    if ($side == "") {
        $side = "bottom";
    }

if ($side == "top") {
        $side_css = "0px ".$width." 0px 0px color inset, 
	0px 0px 0px 0px color inset, 
	0px 0px 0px 0px color inset, 
	0px 0px 0px 0px color inset";
    }
    if ($side == "right") {
        $side_css = "0px 0px 0px 0px color inset, 
	0px 0px 0px 0px color inset, 
	0px 0px 0px 0px color inset, 
	-".$width." 0px 0px 0px color inset";
    }
    if ($side == "bottom") {
        $side_css = "0px 0px 0px 0px color inset, 
	0px -".$width." 0px 0px color inset, 
	0px 0px 0px 0px color inset, 
	0px 0px 0px 0px color inset";

    }
    if ($side == "left") {
        $side_css = "0px 0px 0px 0px color inset, 
	0px 0px 0px 0px color inset, 
	".$width." 0px 0px 0px color inset, 
	0px 0px 0px 0px color inset";
    }
    
    if ($side == "left-right" || $side == "right-left") {
        $side_css = "0px 0px 0px 0px color inset, 
	0px 0px 0px 0px color inset, 
	".$width." 0px 0px 0px color inset, 
	-".$width." 0px 0px 0px color inset";
    }
    
    if ($side == "top-bottom" || $side == "bottom-top") {
        $side_css = "0px ".$width." 0px 0px color inset, 
	0px -".$width." 0px 0px color inset, 
	0px 0px 0px 0px color inset, 
	0px 0px 0px 0px color inset";
    }
    
    if ($side == "all" || $side == "top-right-bottom-left") {
        $side_css = "0px ".$width." 0px 0px color inset, 
	0px -".$width." 0px 0px color inset, 
	".$width." 0px 0px 0px color inset, 
	-".$width." 0px 0px 0px color inset";
    }
    
    
    if($side == "multiple"){
        $side_css = $string;
    }

    global $mtrladmin;
    
    if($string == "string"){
        $value = $id;
    } else if($valuetype == "string"){
        $value = $id;
    } else {
        $value = $mtrladmin[$id];
        if (is_array($value) && sizeof($value) == 0) {
            return;
        } else if (is_array($value) && sizeof($value) > 0) {
            $value = $mtrladmin[$id]['regular'];
        }
    }
    
    if ($value == "") {
        return;
    }
    
    
    /* Relative color code */ 
    /*    * * Darken Color - In box shadow the original color gets lighter ** */
    //    echo $value;
    $hex = $value;
    /*    
    //    echo "0. ".$hex . "[HEX]\n";
    $rgb = HTMLToRGB($hex);
    //    echo "1. ".$rgb . "[HEX to RGB]\n";
    $new_color = ChangeLuminosity($rgb, 63);
    //    echo "2. ".$new_color . "[Dark RGB (rgb-hsl-dark hsl-rgb)]\n";
    $new_hex = RGBToHTML($new_color);
    //    echo "3. ".$new_hex . "[HEX]\n";
    $value = $new_hex;
    //    echo "===========\n";
    */
    
    
        if($hex != "transparent"){ $color = mtrl_hextorgba($hex, $opacity);} else { $color = "transparent";} // same color as separator - no darker version
        $side_css = str_replace("color",$color,$side_css);
        return " ".$selector . "{box-shadow: " . $side_css . " ;\n"
            . "-webkit-box-shadow: " . $side_css . " ;\n"
            . "-o-box-shadow: " . $side_css . " ;\n"
            . "-moz-box-shadow: " . $side_css . " ;\n"
            . "-ms-box-shadow: " . $side_css . " /*".$hex."*/;} \n";
}

function mtrl_link_color($selector, $id, $opacity = "", $type = "", $valuetype = "") {
    global $mtrladmin;
    if($valuetype == "array"){
        $value = $id;
    } else {
        $value = $mtrladmin[$id];
    }

    if (sizeof($value) == 0) {
        return;
    }
    
    $selector_visited = $selector_hover = $selector_focus = "";
    $exp = explode(",", $selector);
    foreach ($exp as $single) {
        $selector_visited .= trim($single) . ":visited, ";
        $selector_hover .= trim($single) . ":hover, ";
        $selector_focus .= trim($single) . ":focus, ";
    }

    $selector_visited = substr($selector_visited, 0, -2);
    $selector_hover = substr($selector_hover, 0, -2);
    $selector_focus = substr($selector_focus, 0, -2);

    $regular = (isset($value['regular']) && $value['regular'] != "") ? $value['regular'] : $mtrladmin['primary-color'];
    $hover = (isset($value['hover']) && $value['hover'] != "") ? $value['hover'] : $regular;
    $active = (isset($value['active']) && $value['active'] != "") ? $value['active'] : $hover;
    $visited = (isset($value['visited']) && $value['visited'] != "") ? $value['visited'] : $regular;

    if (isset($type) && $type == "hover") {
        return $selector . "{color:" . mtrl_hextorgba($value['hover'], $opacity) . " /*".$value['hover']."*/;} ";
    } else {
        return $selector . "{color:" . mtrl_hextorgba($regular, $opacity) ." /*".$regular."*/;} " .
//                $selector_visited . " {color:" . mtrl_hextorgba($visited, $opacity) . ";} " .
                $selector_hover . " {color:" . mtrl_hextorgba($hover, $opacity) ." /*".$hover."*/;} " .
                $selector_focus . " {color:" . mtrl_hextorgba($hover, $opacity) ." /*".$hover."*/;} \n";
    }
}

function mtrl_css_bgcolor($selector, $id, $opacity = "", $valuetype = "",$important = "") {
    global $mtrladmin;

    $imp = "";
    if($important == "imp"){
        $imp = "!important";
    }
    
    if ($valuetype == "string") {
        $value = $id;
    } else if($valuetype == "luminosity"){
        $value = $mtrladmin[$id];
        $hex = $value;  /*HEX*/
        $rgb = mtrl_HTMLToRGB($hex); /*HEX to RGB*/
        $new_color = mtrl_ChangeLuminosity($rgb, $opacity); /*rgb-hsl-new hsl-rgb*/
        $new_hex = mtrl_RGBToHTML($new_color); /*HEX*/
        $value = $new_hex;
    }else {
        $value = $mtrladmin[$id];
        if (is_array($value) && sizeof($value) == 0) {
            return;
        } else if (is_array($value) && sizeof($value) > 0) {
            $value = $mtrladmin[$id]['regular'];
        }
        if ($value == "") {
            return;
        }
    }
    $color = "";
    if($value == "transparent"){ $color = "transparent"; } 
    else if(strpos($value,"rgba") !== false){ $color = $value;}
    else {$color = mtrl_hextorgba($value, $opacity);}
    return " ".$selector . "{background-color:" . $color .$imp." /*".$value."*/;} ";
}

function mtrl_css_border_color($selector, $id, $opacity = "", $bordertype, $valuetype = "") {
    global $mtrladmin;
    
    if ($valuetype == "string") {
        $value = $id;
    } else {
        $value = $mtrladmin[$id];
        if (is_array($value) && sizeof($value) == 0) {
            return;
        } else if (is_array($value) && sizeof($value) > 0) {
            if (isset($mtrladmin[$id]['regular'])) {
                $value = $mtrladmin[$id]['regular'];
            }
        }
    }
    if ($value == "") {
        return;
    }
    
    
    if ($bordertype == "all") {
        $css_property = "border-color";
    } else if ($bordertype == "top") {
        $css_property = "border-top-color";
    } else if ($bordertype == "right") {
        $css_property = "border-right-color";
    } else if ($bordertype == "bottom") {
        $css_property = "border-bottom-color";
    } else if ($bordertype == "left") {
        $css_property = "border-left-color";
    }
    
    $color = "";
    if($value != "transparent"){ $color = mtrl_hextorgba($value, $opacity);} else { $color = "transparent";}
    
    return " ".$selector . "{" . $css_property . ":" . $color ." /*".$value."*/;}\n ";
}

function mtrl_css_background($selector, $id, $opacity = "",$type = "",$important = "") {
    global $mtrladmin;
    if($type == "array"){
        $value = $id;
    } else {
        $value = $mtrladmin[$id];
    }

    $imp = "";
    if($important == "imp"){
        $imp = "!important";
    }

    if(!isset($value['background-image'])){$value['background-image'] = "";}
    if(!isset($value['background-repeat'])){$value['background-repeat'] = "";}
    if(!isset($value['background-color'])){$value['background-color'] = "";}
    if(!isset($value['background-size'])){$value['background-size'] = "";}
    if(!isset($value['background-attachment'])){$value['background-attachment'] = "";}
    if(!isset($value['background-position'])){$value['background-position'] = "";}


    $bg_image = "";
    $mtrladminID = $value['background-image'];
    if (isset($mtrladminID) && trim($mtrladminID) != "") {
        $bg_image = "background-image:url(" . $mtrladminID . ")".$imp."; ";
    }

    $bg_color = "";
    $mtrladminID = $value['background-color'];
    $colorcode = mtrl_colorcode($mtrladminID,$opacity,$imp);
    $bg_color = "background-color: ".$colorcode."; ";
    
    $bg_repeat = "";
    $mtrladminID = $value['background-repeat'];
    if (isset($mtrladminID) && trim($mtrladminID) != "") {
        $bg_repeat = "background-repeat:" . $mtrladminID . "".$imp."; ";
    }

    $bg_size = "";
    $mtrladminID = $value['background-size'];
    if (isset($mtrladminID) && trim($mtrladminID) != "") {
        $bg_size = "-webkit-background-size:" . $mtrladminID . "".$imp."; "
                . "-moz-background-size:" . $mtrladminID . "".$imp."; "
                . "-o-background-size:" . $mtrladminID . "".$imp."; "
                . "background-size:" . $mtrladminID . "".$imp."; ";
    }

    $bg_attach = "";
    $mtrladminID = $value['background-attachment'];
    if (isset($mtrladminID) && trim($mtrladminID) != "") {
        $bg_attach = "background-attachment:" . $mtrladminID . "".$imp."; ";
    }

    $bg_pos = "";
    $mtrladminID = $value['background-position'];
    if (isset($mtrladminID) && trim($mtrladminID) != "") {
        $bg_pos = "background-position:" . $mtrladminID . "".$imp."; ";
    }


    return " ".$selector . "{" . $bg_color . $bg_image . $bg_pos . $bg_attach . $bg_size . $bg_repeat . "} ";
}

function mtrl_hextorgba($value, $opacity) {
    if ($opacity == "" || !isset($opacity)) {
        $opacity = 1;
    }
    $rgb = mtrl_hex2rgb($value);
    return "rgba(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . ",$opacity)";
}






function mtrl_colorcode($color,$opacity = "",$addstr = ""){
        $ret = $color;
        $code = "";
        if($opacity == ""){$opacity = "1.0";}
        global $mtrladmin;
        //$mtrladmin = mtrl_color();
        
        if (isset($color) &&  trim($color) != "" &&  trim($color) != "#") {
        if ($color == "transparent") {
            $ret = "transparent".$addstr."; ";
        } else if ($color == "primary") {
            $ret = $mtrladmin['primary-color'].$addstr."; ";
        } else if ($color == "primary2") {
            $ret = $mtrladmin['primary2-color'].$addstr."; ";
        } else if ($color == "secondary") {
            $ret = $mtrladmin['secondary-color'].$addstr."; ";
        } else if(strpos($color,"rgb") !== false){
            $ret = $color.$addstr."; ";
        } else if(strpos($color,"/") !== false){
            $colorexp = explode("/",$color);
            if(trim($colorexp[0]) == "primary"){ $code = $mtrladmin['primary-color'];}
            else if(trim($colorexp[0]) == "primary2"){ $code = $mtrladmin['primary2-color'];}
            else if(trim($colorexp[0]) == "secondary"){ $code = $mtrladmin['secondary-color'];}
            else {$code = trim($colorexp[0]);}
            if(trim($colorexp[1]) != ""){$opacity = trim($colorexp[1]);}
            $ret = mtrl_hextorgba($code, $opacity).$addstr ." /*".$code."*/; ";
        } else {
            $ret = mtrl_hextorgba($color, $opacity).$addstr ." /*".$color."*/; ";
//            $ret = $color ." /*".$color."*/; ";
        }
    }
    
return $ret;
    
}


?>