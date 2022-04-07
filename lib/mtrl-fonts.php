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

function mtrl_css_fonts() {

    global $mtrladmin;

    $bodyfont = "Roboto, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
    $menufont = "Roboto, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif ";
    $buttonfont = "Roboto, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif ";
    $headingfont = "Roboto, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";

    $body_letter_spacing = $body_word_spacing = "";
    $heading_letter_spacing = $heading_word_spacing = "";
    $menu_letter_spacing = $menu_word_spacing = "";
    $button_letter_spacing = $button_word_spacing = "";

    $body_font_weight = "font-weight:400; ";
    $menu_font_weight = "font-weight:300; ";
    $button_font_weight = "font-weight:300; ";
    $heading_font_weight = "font-weight:300; ";

    $body_font_style = "font-style:normal; ";
    $menu_font_style = "font-style:normal; ";
    $button_font_style = "font-style:normal; ";
    $heading_font_style = "font-style:normal; ";


    $body_font_size = "font-size:15px; ";
    $body_line_height = "line-height:23px; ";

    $menu_font_size = "font-size:15px; ";
    $menu_line_height = "line-height:46px; ";

    $button_font_size = "font-size:15px; ";
    $button_line_height = "line-height:23px; ";


    if (isset($mtrladmin['google_body']) && sizeof($mtrladmin['google_body']) && trim($mtrladmin['google_body']['font-family']) != "") {
        $bodyfont = "'".$mtrladmin['google_body']['font-family']."'";

        if (isset($mtrladmin['google_body']['font-backup'])) {
            $bodyfont .= ", " . $mtrladmin['google_body']['font-backup'].", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
        } else {
            $bodyfont .= ", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
        }
        if (isset($mtrladmin['google_body']['letter-spacing']) && trim(($mtrladmin['google_body']['letter-spacing']) != "")) {
            $body_letter_spacing = "letter-spacing:" . $mtrladmin['google_body']['letter-spacing'] . "; ";
        }
        if (isset($mtrladmin['google_body']['word-spacing']) && trim(($mtrladmin['google_body']['word-spacing']) != "")) {
            $body_word_spacing = "word-spacing:" . $mtrladmin['google_body']['word-spacing'] . "; ";
        }
        if (isset($mtrladmin['google_body']['font-weight']) && trim(($mtrladmin['google_body']['font-weight']) != "")) {
            $body_font_weight = "font-weight:" . $mtrladmin['google_body']['font-weight'] . "; ";
        }
        if (isset($mtrladmin['google_body']['font-style']) && trim(($mtrladmin['google_body']['font-style']) != "")) {
            $body_font_style = "font-style:" . $mtrladmin['google_body']['font-style'] . "; ";
        }
        if (isset($mtrladmin['google_body']['font-size']) && trim(($mtrladmin['google_body']['font-size']) != "")) {
            $body_font_size = "font-size:" . $mtrladmin['google_body']['font-size'] . "; ";
        }
        if (isset($mtrladmin['google_body']['line-height']) && trim(($mtrladmin['google_body']['line-height']) != "")) {
            $body_line_height = "line-height:" . $mtrladmin['google_body']['line-height'] . "; ";
        }
    }




    if (isset($mtrladmin['google_nav']) && sizeof($mtrladmin['google_nav']) && trim($mtrladmin['google_nav']['font-family']) != "") {
        $menufont = "'".$mtrladmin['google_nav']['font-family']."'";

        if (isset($mtrladmin['google_nav']['font-backup'])) {
            $menufont .= ", " . $mtrladmin['google_nav']['font-backup'].", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
        } else {
            $menufont .= ", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
        }
        if (isset($mtrladmin['google_nav']['letter-spacing']) && trim(($mtrladmin['google_nav']['letter-spacing']) != "")) {
            $menu_letter_spacing = "letter-spacing:" . $mtrladmin['google_nav']['letter-spacing'] . "; ";
        }
        if (isset($mtrladmin['google_nav']['word-spacing']) && trim(($mtrladmin['google_nav']['word-spacing']) != "")) {
            $menu_word_spacing = "word-spacing:" . $mtrladmin['google_nav']['word-spacing'] . "; ";
        }
        if (isset($mtrladmin['google_nav']['font-weight']) && trim(($mtrladmin['google_nav']['font-weight']) != "")) {
            $menu_font_weight = "font-weight:" . $mtrladmin['google_nav']['font-weight'] . "; ";
        }
        if (isset($mtrladmin['google_nav']['font-style']) && trim(($mtrladmin['google_nav']['font-style']) != "")) {
            $menu_font_style = "font-style:" . $mtrladmin['google_nav']['font-style'] . "; ";
        }
        if (isset($mtrladmin['google_nav']['font-size']) && trim(($mtrladmin['google_nav']['font-size']) != "")) {
            $menu_font_size = "font-size:" . $mtrladmin['google_nav']['font-size'] . "; ";
        }
        if (isset($mtrladmin['google_nav']['line-height']) && trim(($mtrladmin['google_nav']['line-height']) != "")) {
            $menu_line_height = "line-height:" . $mtrladmin['google_nav']['line-height'] . "; ";
        }
    }




    if (isset($mtrladmin['google_button']) && sizeof($mtrladmin['google_button']) && trim($mtrladmin['google_button']['font-family']) != "") {
        $buttonfont = "'".$mtrladmin['google_button']['font-family']."'";

        if (isset($mtrladmin['google_button']['font-backup'])) {
            $buttonfont .= ", " . $mtrladmin['google_button']['font-backup'].", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
        } else {
            $buttonfont .= ", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
        }
        if (isset($mtrladmin['google_button']['letter-spacing']) && trim(($mtrladmin['google_button']['letter-spacing']) != "")) {
            $button_letter_spacing = "letter-spacing:" . $mtrladmin['google_button']['letter-spacing'] . "; ";
        }
        if (isset($mtrladmin['google_button']['word-spacing']) && trim(($mtrladmin['google_button']['word-spacing']) != "")) {
            $button_word_spacing = "word-spacing:" . $mtrladmin['google_button']['word-spacing'] . "; ";
        }
        if (isset($mtrladmin['google_button']['font-weight']) && trim(($mtrladmin['google_button']['font-weight']) != "")) {
            $button_font_weight = "font-weight:" . $mtrladmin['google_button']['font-weight'] . "; ";
        }
        if (isset($mtrladmin['google_button']['font-style']) && trim(($mtrladmin['google_button']['font-style']) != "")) {
            $button_font_style = "font-style:" . $mtrladmin['google_button']['font-style'] . "; ";
        }
        if (isset($mtrladmin['google_button']['font-size']) && trim(($mtrladmin['google_button']['font-size']) != "")) {
            $button_font_size = "font-size:" . $mtrladmin['google_button']['font-size'] . "; ";
        }
        if (isset($mtrladmin['google_button']['line-height']) && trim(($mtrladmin['google_button']['line-height']) != "")) {
            $button_line_height = "line-height:" . $mtrladmin['google_button']['line-height'] . "; ";
        }
    }




    if (isset($mtrladmin['google_headings']) && sizeof($mtrladmin['google_headings']) && trim($mtrladmin['google_headings']['font-family']) != "") {
        $headingfont = "'".$mtrladmin['google_headings']['font-family']."'";

        if (isset($mtrladmin['google_headings']['font-backup'])) {
            $headingfont .= ", " . $mtrladmin['google_headings']['font-backup'].", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
        } else {
            $headingfont .= ", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
        }
        if (isset($mtrladmin['google_headings']['letter-spacing']) && trim(($mtrladmin['google_headings']['letter-spacing']) != "")) {
            $heading_letter_spacing = "letter-spacing:" . $mtrladmin['google_headings']['letter-spacing'] . "; ";
        }
        if (isset($mtrladmin['google_headings']['word-spacing']) && trim(($mtrladmin['google_headings']['word-spacing']) != "")) {
            $heading_word_spacing = "word-spacing:" . $mtrladmin['google_headings']['word-spacing'] . "; ";
        }
        if (isset($mtrladmin['google_headings']['font-weight']) && trim(($mtrladmin['google_headings']['font-weight']) != "")) {
            $heading_font_weight = "font-weight:" . $mtrladmin['google_headings']['font-weight'] . "; ";
        }
        if (isset($mtrladmin['google_headings']['font-style']) && trim(($mtrladmin['google_headings']['font-style']) != "")) {
            $headings_font_style = "font-style:" . $mtrladmin['google_headings']['font-style'] . "; ";
        }
    }


//    else if(isset($mtrladmin['standard_body']) && trim($mtrladmin['standard_body']) != ""){ $bodyfont = "".$mtrladmin['standard_body']."";}
//    if(isset($mtrladmin['google_nav']) && trim($mtrladmin['google_nav']) != ""){ $menufont = "'".$mtrladmin['google_nav']."', sans-serif"; }
//    else if(isset($mtrladmin['standard_nav']) && trim($mtrladmin['standard_nav']) != ""){ $menufont = "".$mtrladmin['standard_nav']."";}
//    if(isset($mtrladmin['google_headings']) && trim($mtrladmin['google_headings']) != ""){ $headingfont = "'".$mtrladmin['google_headings']."', sans-serif"; }
//    else if(isset($mtrladmin['standard_headings']) && trim($mtrladmin['standard_headings']) != ""){ $headingfont = "".$mtrladmin['standard_headings']."";}


$ret = array();
$ret['body_font_css'] = "font-family: " . $bodyfont . ";" . $body_letter_spacing . " " . $body_word_spacing . " " . $body_font_weight . " " . $body_font_size . " " . $body_line_height . " ".$body_font_style;
$ret['head_font_css'] = "font-family: " . $headingfont . ";" . $heading_letter_spacing . " " . $heading_word_spacing . " " . $heading_font_weight . " ".$heading_font_style;
$ret['menu_font_css'] = " font-family: " . $menufont . ";" . $menu_letter_spacing . " " . $menu_word_spacing . " " . $menu_font_weight . " " . $menu_font_size . " " . $menu_line_height . " ".$menu_font_style;
$ret['button_font_css'] = " font-family: " . $buttonfont . ";" . $button_letter_spacing . " " . $button_word_spacing . " " . $button_font_weight . " " . $button_font_size . " " . $button_line_height . " ".$button_font_style;



return $ret;
}


function mtrl_fonts() {
    global $mtrladmin;
    $gfont = array();

    if (isset($mtrladmin['google_body']) && sizeof($mtrladmin['google_body']) && trim($mtrladmin['google_body']['font-family']) != "") {
        $font = $mtrladmin['google_body']['font-family'];
        $font = str_replace(", " . $mtrladmin['google_body']['font-backup'], "", $font);
        $gfont[urlencode($font)] = '"' . urlencode($font) . ':400,300,600,700:latin"';
    }

    if (isset($mtrladmin['google_nav']) && sizeof($mtrladmin['google_nav']) && trim($mtrladmin['google_nav']['font-family']) != "" 
        && $mtrladmin['google_nav']['font-family'] != $mtrladmin['google_body']['font-family']) {
        $font = $mtrladmin['google_nav']['font-family'];
        $font = str_replace(", " . $mtrladmin['google_nav']['font-backup'], "", $font);
        $gfont[urlencode($font)] = '"' . urlencode($font) . ':400,300,600,700:latin"';
    }

    if (isset($mtrladmin['google_headings']) && sizeof($mtrladmin['google_headings']) && trim($mtrladmin['google_headings']['font-family']) != "" 
        && $mtrladmin['google_headings']['font-family'] != $mtrladmin['google_body']['font-family'] 
        && $mtrladmin['google_headings']['font-family'] != $mtrladmin['google_nav']['font-family']) {
        $font = $mtrladmin['google_headings']['font-family'];
        $font = str_replace(", " . $mtrladmin['google_headings']['font-backup'], "", $font);
        $gfont[urlencode($font)] = '"' . urlencode($font) . ':400,300,600,700:latin"';
    }

    if (isset($mtrladmin['google_button']) && sizeof($mtrladmin['google_button']) && trim($mtrladmin['google_button']['font-family']) != "" 
        && $mtrladmin['google_button']['font-family'] != $mtrladmin['google_body']['font-family'] 
        && $mtrladmin['google_button']['font-family'] != $mtrladmin['google_headings']['font-family'] 
        && $mtrladmin['google_button']['font-family'] != $mtrladmin['google_nav']['font-family']) {
        $font = $mtrladmin['google_button']['font-family'];
        $font = str_replace(", " . $mtrladmin['google_button']['font-backup'], "", $font);
        $gfont[urlencode($font)] = '"' . urlencode($font) . ':400,300,600,700:latin"';
    }

    $gfonts = "";
    if ($gfont) {
        if (is_array($gfont) && !empty($gfont)) {
            $gfonts = implode(', ',$gfont);
        }
    }
    ?>

    <!-- Fonts - Start -->        
    <script type="text/javascript">
        WebFontConfig = {
    <?php if (!empty($gfonts)): ?>google: {families: [<?php echo $gfonts; ?>]},<?php endif; ?>
            custom: {}
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
    <!-- Fonts - End -->        

    <?php
}
?>