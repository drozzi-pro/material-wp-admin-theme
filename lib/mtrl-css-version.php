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

function mtrl_css_version(){
	global $wp_version;

	$version = $wp_version;
	if(strlen($version) == 3){$version = $version.".0";}

	if(version_compare($version, '4.0.0', '>=')){
    	return 'css40';
	} else {
    	return '';
    }
}

$GLOBALS['mtrl_css_ver'] = mtrl_css_version();

?>