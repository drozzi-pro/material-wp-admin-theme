<?php
$get_menumng_page = mtrl_get_option("mtrladmin_menumng_page","enable");


function mtrl_menumng_settings_page(){


	global $mtrl_css_ver;
    
    $url = plugins_url('/', __FILE__).'../'.$mtrl_css_ver.'/mtrl-admin-menu-management.min.css';
    wp_deregister_style('mtrl-admin-menu-management', $url);
    wp_register_style('mtrl-admin-menu-management', $url);
    wp_enqueue_style('mtrl-admin-menu-management');


    global $wp_version;
    $plug = trim(get_current_screen()->id);

    if (isset($plug) && $plug == "material-admin-addon_page_mtrl_menumng_settings"){

        $url = plugins_url('/', __FILE__).'../js/mtrl-scripts-menu-management.js';
        wp_deregister_script('mtrl-scripts-menu-management-js');
        wp_register_script('mtrl-scripts-menu-management-js', $url);
        wp_enqueue_script('mtrl-scripts-menu-management-js');

        $url = plugins_url('/', __FILE__).'../css/jquery-ui/minified/jquery-ui.min.css';
        wp_deregister_style('mtrl-jqueryui');
        wp_register_style('mtrl-jqueryui', $url);
        wp_enqueue_style('mtrl-jqueryui');

        $url = plugins_url('/', __FILE__).'../js/mtrl-jquery.ui.elements.js';
        wp_deregister_script('mtrl-jqueryui');
        wp_register_script('mtrl-jqueryui', $url);
        wp_enqueue_script('mtrl-jqueryui');

        wp_localize_script('mtrl-scripts-menu-management-js', 'mtrl_vars', array(
            'mtrl_nonce' => wp_create_nonce('mtrl-nonce')
                )
        );

    }



	global $menu;
	global $submenu;
	global $mtrlmenu;
	global $mtrlsubmenu;


	if(!is_array($mtrlmenu) || sizeof($mtrlmenu) == 0){
		$mtrlmenu = $menu;
	}

	if(!is_array($mtrlsubmenu) || sizeof($mtrlsubmenu) == 0){
		$mtrlsubmenu = $submenu;
	}

	//mtrlprint('menu',$menu);
	//mtrlprint('submenu',$submenu);
	//mtrlprint('mtrlmenu',$mtrlmenu);
	//mtrlprint('mtrlsubmenu',$mtrlsubmenu);


	echo '<div class="wrap"><h1>'.__( 'Admin Menu Management', 'mtrl_framework' ).'</h1><div id="mtrl-enabled" class="mtrl-connectedSortable">';
	    	$menudisable = mtrl_get_option("mtrladmin_menudisable","");
	    $menudisablearr = array_unique(array_filter(explode("|", $menudisable)));

		    $submenudisable = mtrl_get_option("mtrladmin_submenudisable","");

	    $submenudisablearr = array_unique(array_filter(explode("|", $submenudisable)));

		foreach ($mtrlmenu as $menuid => $menuarr) {

			/*---------------- 
				menu tab 
			----------------*/
			// echo $menuid."<br>";
			// print_r($menuarr);

			//if($menuarr[4] == "wp-menu-separator"){
			if(strpos($menuarr[4], "wp-menu-separator") !== false){
				// separator
				//echo "<div class='mtrlmenusep' data-id='".$menuid."'><span class='mtrltext'>".$menuarr[0]."</span></div>";
			} else {
				// menu item

				$tabid = $menuid;
				if(isset($menuarr['original'])){ $tabid = $menuarr['original'];}

				$sid = $tabid;
				if(isset($menuarr[5])){
					$sid = $menuarr[5];
				}

				$menupage = $tabid;
				if(isset($menuarr[2])){
					$menupage = $menuarr[2];
				}				

				//print_r($menuarr);
				$expstr = explode("<", $menuarr[0]);
				$menuarr[0] = $expstr[0];

				$originalname = $menuarr[0];
				//echo $originalname;
				if(isset($menuarr['originalname'])){
					$originalname = $menuarr['originalname'];
				}

				$expstr = explode("<", $originalname);
				$originalname = $expstr[0];

				$originalicon = "";
				if(isset($menuarr[6])){
				$originalicon = $menuarr[6];
				if(isset($menuarr['originalicon'])){
					$originalicon = $menuarr['originalicon'];
				}}

				$disabled = " enabled ";
				$disablebutclass = "disable";
				$disablebuttext = "hide";
				if(isset($menuarr[5]) && in_array($menuarr[5],$menudisablearr)){ 
					$disabled = " disabled "; 
					$disablebutclass = " enable ";
					$disablebuttext = "show";
				}


				echo "<div class='mtrlmenu ".$disabled."' data-id='".$tabid."' data-menu-id='".$sid."'>

						<div class='mtrlmenu-wrap'>
							<span class='mtrlicon wp-menu-image dashicons-before ".$menuarr[6]."'></span>
							<span class='mtrltext'>".strip_tags($menuarr[0])."</span>
							<span class='mtrltoggle plus wp-menu-image dashicons-before dashicons-plus'></span>
							<span class='mtrldisplay wp-menu-image dashicons-before dashicons-visibility ".$disablebutclass."'></span>
							<span class='mtrlmove wp-menu-image dashicons-before dashicons-editor-expand'></span>
						</div>
						<div class='clearboth'></div>

						<span class='mtrleditpanel mtrlmenupanel closed'>
							<div>
							<span class='ufield'>".__( 'Original', 'mtrl_framework' ).":</span>
							<span class='uvalue'>".$originalname."</span>
								<div class='clearboth'></div>
								<span class='ufield'>".__( 'Rename to', 'mtrl_framework' ).":</span>
								<span class='uvalue'><input type='text' data-id='".$tabid."' data-menu-id='".$sid."' class='mtrl-menurename' value='".mtrl_reformatstring($menuarr[0])."'></span>
								<div class='clearboth'></div>
								<span class='ufield'>".__( 'Menu Icon', 'mtrl_framework' ).":</span>
								<span class='uvalue'>
									<input type='hidden' data-id='".$tabid."' data-menu-id='".$sid."' class='mtrl-menuicon' value='".$menuarr[6]."'>
									<span data-class='".$menuarr[6]."' class='mtrlicon mtrlmenuicon wp-menu-image dashicons-before ".$menuarr[6]."'></span>
									<span class='mtrliconpanel'></span>
								</span>
								<div class='clearboth'></div>
							</div>
						</span>";

				echo "<div class='clearboth'></div>";
				
				/*--------------------
					submenu tabs 
				----------------------*/
				echo "<div class='mtrlsubmenu-wrap'>";
				if(isset($mtrlsubmenu[$menuarr[2]])){

					$parentpage = "";
					if(isset($menuarr[2])){
						$parentpage = $menuarr[2];
					}
						
					foreach($mtrlsubmenu[$menuarr[2]] as $submenuid => $submenuarr){
						// print_r($submenuarr);
						//$submenuarr[0] = mtrl_reformatstring($submenuarr[0]);

						$expstr = explode("<", $submenuarr[0]);
						$submenuarr[0] = $expstr[0];
						
						$subtabid = $submenuid;
						if(isset($submenuarr['original'])){
							$subtabid = $submenuarr['original'];
						}

						$originalsubname = $submenuarr[0];
						if(isset($submenuarr['originalsubname'])){
							$originalsubname = $submenuarr['originalsubname'];
						}

						$expstr = explode("<", $originalsubname);
						$originalsubname = $expstr[0];

						$subdisabled = " enabled ";
						$subdisablebutclass = "disable";
						$subdisablebuttext = "hide";
						if(in_array($menupage.":".$subtabid,$submenudisablearr)){ 
							$subdisabled = " disabled "; 
							$subdisablebutclass = " enable ";
							$subdisablebuttext = "show";
						}

						//print_r($submenuarr);
						echo "<div class='mtrlsubmenu ".$subdisabled."' data-id='".$subtabid."' data-parent-id='".$tabid."' data-parent-page='".$parentpage."'>
								
								<div>
									<span class='mtrltext'>".$submenuarr[0]."</span>
									<span class='mtrlsubtoggle plus wp-menu-image dashicons-before dashicons-plus'></span>
									<span class='mtrlsubdisplay wp-menu-image dashicons-before dashicons-visibility ".$subdisablebutclass."'></span>
									<span class='mtrlmove wp-menu-image dashicons-before dashicons-editor-expand'></span>
								</div>
								
								<div class='clearboth'></div>

								<span class='mtrleditpanel mtrlsubmenupanel closed'>
									<div>
									<span class='ufield'>".__( 'Original', 'mtrl_framework' ).":</span>
									<span class='uvalue'>".$originalsubname."</span>
										<div class='clearboth'></div>
										<span class='ufield'>".__( 'Rename to', 'mtrl_framework' ).":</span>
										<span class='uvalue'><input type='text' data-parent-page='".$parentpage."'  data-id='".$subtabid."' data-parent-id='".$tabid."' class='mtrl-submenurename' value='".mtrl_reformatstring($submenuarr[0])."'></span>
										<div class='clearboth'></div>
									</div>
								</span>		

								<div class='clearboth'></div>

							</div>";
					}

					//print_r($submenu[$menuarr[2]]);
				}
			echo "</div>"; // submenu end
			echo "</div>"; // menu end
			}
		}

		//echo "</pre>";

	echo '</div>';

	echo "<div class='mtrl-savearea'><span style='display:block;margin-bottom:12px;'>".__( 'Instructions', 'mtrl_framework' ).":<br></span><ul style='list-style:square;padding-left:18px;'>";
	echo "<li>".__( 'Drag and Drop', 'mtrl_framework' )." <span class='wp-menu-image dashicons-before dashicons-editor-expand'></span> ".__( 'menu and sub menu items to rearrange.', 'mtrl_framework' )."</li>";
	echo "<li>".__( 'Click on', 'mtrl_framework' )." <span class='wp-menu-image dashicons-before dashicons-visibility'></span> ".__( 'icon to show or hide the menu or submenu item.', 'mtrl_framework' )."</li>";
	echo "<li>".__( 'Click on', 'mtrl_framework' )." <span class='wp-menu-image dashicons-before dashicons-plus'></span> ".__( 'icon to edit menu and submenu link text', 'mtrl_framework' )."</li>";
	echo "<li>".__( 'Click on', 'mtrl_framework' )." <span class='wp-menu-image dashicons-before dashicons-plus'></span> ".__( 'icon, click on the menu icon to open the available icons panel and pick your icon.', 'mtrl_framework' )."</li>";
	echo "<li>".__( 'Click on save menu button after editing.', 'mtrl_framework' )."</li></ul>";

	echo '<p class="submit" style="padding-left:0px;margin-top:0px;padding-top:0px;"><input type="button" name="mtrl-savemenu" id="mtrl-savemenu" class="button button-primary" value="'.__( 'Save Menu', 'mtrl_framework' ).'"> <input type="button" name="mtrl-resetmenu" id="mtrl-resetmenu" class="button button-primary" value="'.__( 'Reset to Original', 'mtrl_framework' ).'"></p>';

	echo mtrl_menuicons_list();
	echo "</div>";

	echo "</div>"; // .wrap

}

add_action('wp_ajax_mtrl_savemenu', 'mtrl_savemenu');

function mtrl_savemenu() {
    if (!isset($_POST['mtrl_nonce']) || !wp_verify_nonce($_POST['mtrl_nonce'], 'mtrl-nonce')) {
        die('Permissions check failed. Please login or refresh (if already logged in) the page, then try Again.');
    }

    $neworder = $_POST['neworder'];
    $newsuborder = $_POST['newsuborder'];
    $menurename = $_POST['menurename'];
    $submenurename = $_POST['submenurename'];
    $menudisable = $_POST['menudisable'];
    $submenudisable = $_POST['submenudisable'];

		// print_r($menurename); 

	mtrl_update_option("mtrladmin_menuorder", $neworder);
	mtrl_update_option("mtrladmin_submenuorder", $newsuborder);
	mtrl_update_option("mtrladmin_menurename", $menurename);
	mtrl_update_option("mtrladmin_submenurename", $submenurename);
	mtrl_update_option("mtrladmin_menudisable", $menudisable);
	mtrl_update_option("mtrladmin_submenudisable", $submenudisable);
    //echo "success";
    die();
}

add_action('wp_ajax_mtrl_resetmenu', 'mtrl_resetmenu');

function mtrl_resetmenu() {
    if (!isset($_POST['mtrl_nonce']) || !wp_verify_nonce($_POST['mtrl_nonce'], 'mtrl-nonce')) {
        die('Permissions check failed. Please login or refresh (if already logged in) the page, then try Again.');
    }

    $neworder = "";
    $newsuborder = "";
    $menurename = "";
    $submenurename = "";
    $menudisable = "";
    $submenudisable = "";

    //print_r($_POST);
	mtrl_update_option("mtrladmin_menuorder", $neworder);
	mtrl_update_option("mtrladmin_submenuorder", $newsuborder);
	mtrl_update_option("mtrladmin_menurename", $menurename);
	mtrl_update_option("mtrladmin_submenurename", $submenurename);
	mtrl_update_option("mtrladmin_menudisable", $menudisable);
	mtrl_update_option("mtrladmin_submenudisable", $submenudisable);
    //echo "success";
    die();
}

if($get_menumng_page != "disable" && !is_network_admin()){

		add_action('admin_menu', 'mtrl_adminmenu_rearrange',999999999);
}

function mtrl_adminmenu_rearrange() {


	$enablemenumng = mtrl_get_user_type(); 


	global $menu;
	global $submenu;

if($enablemenumng){

	//mtrlprint("menu",$menu);

	$renamemenu = mtrl_rename_menu();
	$menu = $renamemenu;
	//mtrlprint("menu",$menu);
	//return $menu;

	$neworder = mtrl_adminmenu_neworder();
	//mtrlprint("neworder",$neworder);

	$ret = mtrl_adminmenu_newmenu($neworder,$menu);
	$menu = $ret;

	$GLOBALS['mtrlmenu'] = $menu;

	$menu = mtrl_adminmenu_disable($menu);
	
}
	//mtrlprint("menu",$menu);
	return $menu;

}


function mtrl_adminmenu_neworder() {

    $new = array();
    $subnew = array();
    $ret = array();

    $neworder = mtrl_get_option("mtrladmin_menuorder","");
    $newsuborder = mtrl_get_option("mtrladmin_submenuorder","");
    //echo $neworder; echo "<br>"; echo $newsuborder;

    $exp = explode("|",$neworder);
    $subexp = explode("|",$newsuborder);

    // set menu in new array
    foreach ($exp as $id) {
    	if(trim($id) != "") {
    		$new[] = $id;
    	}
    }

    // set submenu in new array with menu id
    foreach ($subexp as $id) {
    	if(trim($id) != "") {
    		$subid = explode(":",$id);
    		$subnew[$subid[0]][] = $subid[1];
    	}
    }

	//mtrlprint("new",$new);
	//mtrlprint("subnew",$subnew);

    $ret['menu'] = $new;
    $ret['submenu'] = $subnew;

    return $ret;

}


function mtrl_adminmenu_newmenu($neworder,$menu){
	//mtrlprint("menu",$menu);
	//mtrlprint("neworder",$neworder);

	$relation = array();

	foreach($menu as $id=>$valarr){
		if(isset($valarr[5])){
		$relation[$valarr[5]] = $id;
	}}

	//print_r($relation);
	//mtrlprint("relation",$relation);

	$ret = array();
	$allids = $menu;

		$k = 100000;
		foreach($neworder['menu'] as $newmenuid) {
			if(isset($relation[$newmenuid])){	
				$k++;
				$ret[$k] = $menu[$relation[$newmenuid]];
				$ret[$k]['original'] = $relation[$newmenuid];
				unset($allids[$relation[$newmenuid]]);
			}
		}

		foreach($allids as $itemid => $item) {
			$k++;
			$ret[$k] = $item;
			$ret[$k]['original'] = $itemid;
		}

		//$ret = array_merge($ret,$allids);
	
	//mtrlprint("ret",$ret);

	return $ret;

}



function mtrl_adminmenu_newsubmenu($newsuborder,$submenu,$menu){

	// rearrange submenu to new ids

	$allids = $menu;
	$allsubids = $submenu;

	
	$ret = array();
		foreach($newsuborder['submenu'] as $submenuid => $arr) {
			$k = 1100000;
			$k = 0;
			foreach($arr as $linkid) {
				$submenu[$submenuid][$linkid]['original'] = $linkid;
				$ret[$submenuid][$k] = $submenu[$submenuid][$linkid];
				unset($allsubids[$submenuid][$linkid]);
				//$ret[$menumap[$submenuid]][]['original'] = $linkid;
				$k++;
			}
		}
		//mtrlprint("allsubids",$allsubids);

		foreach($allsubids as $itemid => $item) {
			$k = 1100000;
			$k = 0;
			//if(sizeof($item) > 0){
			foreach($item as $a => $b) {
				$allsubids[$itemid][$a]['original'] = $a;
				$ret[$itemid][$k] = $allsubids[$itemid][$a];
				//$ret[$k] = $item;
				//$ret[$k]['original'] = $itemid;
				$k++;
			}
			//}
		}

	return $ret;

}




if($get_menumng_page != "disable" && !is_network_admin()){
	add_filter( 'custom_menu_order', 'mtrl_admin_submenu_rearrange', 9999999999);
}

function mtrl_admin_submenu_rearrange() 
{

	global $mtrlmenu;
	global $submenu;


	$enablemenumng = mtrl_get_user_type(); 
	if($enablemenumng){
		//mtrlprint('menu',$menu);
		//mtrlprint('submenu',$submenu);
		//return $submenu;

		$renamesubmenu = mtrl_rename_submenu();
		$submenu = $renamesubmenu;
		//mtrlprint('submenu',$submenu);


		$newsuborder = mtrl_adminmenu_neworder();
		//echo "<pre>"; print_r($newsuborder); echo "</pre>";

		$ret = mtrl_adminmenu_newsubmenu($newsuborder,$submenu,$mtrlmenu);

		$submenu = $ret;
		//return $submenu;

		$GLOBALS['mtrlsubmenu'] = $submenu;

		$submenu = mtrl_adminsubmenu_disable($submenu);

	}
	return $submenu;


}




function mtrl_rename_menu(){
	global $menu;

		$menurename = mtrl_get_option("mtrladmin_menurename","");

	// mtrlprint("menu",$menu);

	if(trim($menurename) != ""){

		$exp = explode("|#$%*|", $menurename);

		// mtrlprint("exp",$exp);
		foreach($exp as $str){

			if(trim($str) != ""){

				$id = $val = $icon = $original = "";

				$arr = explode("@!@%@", $str);
				if(isset($arr[0])){ $id = $arr[0]; }
				if(isset($arr[1])){ $str = $arr[1]; }
				$expstr = explode("[$!&!$]", $str);
				if(isset($expstr[0])){ $val = $expstr[0]; }
				if(isset($expstr[1])){ $icon = $expstr[1]; }

				if($id != ""){
					$expid = explode(":", $id);
					$id = $expid[0];
					$sid = $expid[1];
				}

				if(isset($menu[$id][0]) && isset($menu[$id][5]) && $menu[$id][5] == $sid){
					//print_r($original);
					$original = $menu[$id][0];
					$menu[$id][0] = $val;
					$menu[$id]['originalname'] = $original;
				}

				if(isset($menu[$id][6]) && isset($menu[$id][5]) && $menu[$id][5] == $sid){
					$originalicon = $menu[$id][6];
					$menu[$id][6] = $icon;
					$menu[$id]['originalicon'] = $originalicon;
				}
				//echo $id. " : ". $val."<br>";
			}
		}
	}
	//mtrlprint("menu",$menu);

	return $menu;
}
  


function mtrl_rename_submenu(){

	global $submenu;
		$submenurename = mtrl_get_option("mtrladmin_submenurename","");

	if(trim($submenurename) != ""){

		$exp = explode("|#$%*|", $submenurename);
		foreach($exp as $str){

			$idstr = $page = $parentid = $id = $val = $original = "";

			$arr = explode("@!@%@", $str);
			if(isset($arr[0])){ $idstr = $arr[0]; }
			$idexp = explode("[($&)]", $idstr);
			if(isset($idexp[0])){ $page = $idexp[0]; }
			if(isset($idexp[1])){ $idexp2 = explode(":",$idexp[1]); }
			if(isset($idexp2[0])){ $parentid = $idexp2[0]; }
			if(isset($idexp2[1])){ $id = $idexp2[1]; }
			if(isset($arr[1])){ $val = $arr[1]; }

			//echo $page." - ". $parentid. " - ". $id." - ". $val."<br>";

			if(isset($submenu[$page][$id][0])){
				$original = $submenu[$page][$id][0];
				$submenu[$page][$id][0] = $val;
				$submenu[$page][$id]['originalsubname'] = $original;
			}
			//echo $id. " : ". $val."<br>";
		}
	}
	//echo "<pre>"; print_r($submenu); echo "</pre>"; 
	return $submenu;
}


function mtrl_adminmenu_disable($menu){

	//echo "<pre>"; print_r($menu); echo "</pre>"; 
    $menudisable = mtrl_get_option("mtrladmin_menudisable","");
    $exp = array_unique(array_filter(explode("|", $menudisable)));

    foreach($menu as $id => $arr){
    	if(isset($arr[5]) && in_array($arr[5],$exp)){
			unset($menu[$id]);
    	}
    }

	return $menu;
}


function mtrl_adminsubmenu_disable($submenu){
	//echo "<pre>"; print_r($submenu); echo "</pre>"; 
	//mtrlprint("submenu",$submenu);
	global $menu;
	//mtrlprint("menu",$menu);
	
	//enabled menu items 

	$enabledmenu = array();
	foreach ($menu as $key => $value) {
		$enabledmenu[] = $value[2];
	}

	//mtrlprint("enabledmenu",$enabledmenu);


	// map array of id and .php page of menu first
	$menumap = array();
	foreach($menu as $v){
		//$menumap[$v[2]] = $v[5];//$v['original'];
	}

	//mtrlprint("menumap",$menumap);
    	$submenudisable = mtrl_get_option("mtrladmin_submenudisable","");

    $exp = array_unique(array_filter(explode("|", $submenudisable)));

    foreach ($submenu as $key => $value) {

    	// check if parent menu is enabled. if not then unset it from submenu
    	if(!in_array($key,$enabledmenu)){
    		unset($submenu[$key]);
    	} else {

	    $parentid = "";
    	//if(isset($parentid)){$parentid = $menumap[$key];}

    	foreach($value as $k => $v){
    		$subid = "";
    		if(isset($v['original'])){
    			$subid = $v['original']; 
    		}
    		if(in_array($key.":".$subid,$exp)){
    			unset($submenu[$key][$k]);
    		}
    	}
      }
    }

    //mtrlprint("submenu",$submenu);
return $submenu;

}

function mtrl_menuicons_list(){
	$ret = "";
	$ret .= "<div class='mtrlicons'>";

	$str = mtrl_dashiconscsv();
	$exp = explode(",", $str);
	foreach ($exp as $key => $value) {
		$valexp = explode(":", $value);
		$class = trim($valexp[0]);
		$code = trim($valexp[1]);
		$ret .= "<span data-class = 'dashicons-".$class."' class='mtrlicon pickicon wp-menu-image dashicons-before dashicons-".$class."'></span>";
	}

	$ret .= "</div>";
	return $ret;
}


function mtrl_removeslashes($string)
{
    $string=implode("",explode("\\",$string));
    return stripslashes(trim($string));
}

function mtrl_reformatstring($str){
	$str = htmlspecialchars($str, ENT_QUOTES);
	$str = mtrl_removeslashes($str);
	return $str;
}


function mtrl_dashiconscsv(){

	$str = "menu:f333,
	admin-site:f319,
	dashboard:f226,
	admin-media:f104,
	admin-page:f105,
	admin-comments:f101,
	admin-appearance:f100,
	admin-plugins:f106,
	admin-users:f110,
	admin-tools:f107,
	admin-settings:f108,
	admin-network:f112,
	admin-generic:f111,
	admin-home:f102,
	admin-collapse:f148,
	format-links:f103,
	format-standard:f109,
	format-image:f128,
	format-gallery:f161,
	format-audio:f127,
	format-video:f126,
	format-chat:f125,
	format-status:f130,
	format-aside:f123,
	format-quote:f122,
	welcome-edit-page:f119,
	welcome-add-page:f133,
	welcome-view-site:f115,
	welcome-widgets-menus:f116,
	welcome-comments:f117,
	welcome-learn-more:f118,
	image-crop:f165,
	image-rotate-left:f166,
	image-rotate-right:f167,
	image-flip-vertical:f168,
	image-flip-horizontal:f169,
	undo:f171,
	redo:f172,
	editor-bold:f200,
	editor-italic:f201,
	editor-ul:f203,
	editor-ol:f204,
	editor-quote:f205,
	editor-alignleft:f206,
	editor-aligncenter:f207,
	editor-alignright:f208,
	editor-insertmore:f209,
	editor-spellcheck:f210,
	editor-expand:f211,
	editor-contract:f506,
	editor-kitchensink:f212,
	editor-underline:f213,
	editor-justify:f214,
	editor-textcolor:f215,
	editor-paste-word:f216,
	editor-paste-text:f217,
	editor-removeformatting:f218,
	editor-video:f219,
	editor-customchar:f220,
	editor-outdent:f221,
	editor-indent:f222,
	editor-help:f223,
	editor-strikethrough:f224,
	editor-unlink:f225,
	editor-rtl:f320,
	editor-break:f474,
	editor-code:f475,
	editor-paragraph:f476,
	align-left:f135,
	align-right:f136,
	align-center:f134,
	align-none:f138,
	lock:f160,
	calendar:f145,
	calendar-alt:f508,
	visibility:f177,
	post-status:f173,
	edit:f464,
	trash:f182,
	external:f504,
	arrow-up:f142,
	arrow-down:f140,
	arrow-left:f141,
	arrow-right:f139,
	arrow-up-alt:f342,
	arrow-down-alt:f346,
	arrow-left-alt:f340,
	arrow-right-alt:f344,
	arrow-up-alt2:f343,
	arrow-down-alt2:f347,
	arrow-left-alt2:f341,
	arrow-right-alt2:f345,
	leftright:f229,
	sort:f156,
	randomize:f503,
	list-view:f163,
	exerpt-view:f164,
	grid-view:f509,
	hammer:f308,
	art:f309,
	migrate:f310,
	performance:f311,
	universal-access:f483,
	universal-access-alt:f507,
	tickets:f486,
	nametag:f484,
	clipboard:f481,
	heart:f487,
	megaphone:f488,
	schedule:f489,
	wordpress:f120,
	wordpress-alt:f324,
	pressthis:f157,
	update:f463,
	screenoptions:f180,
	info:f348,
	cart:f174,
	feedback:f175,
	cloud:f176,
	translation:f326,
	tag:f323,
	category:f318,
	archive:f480,
	tagcloud:f479,
	text:f478,
	media-archive:f501,
	media-audio:f500,
	media-code:f499,
	media-default:f498,
	media-document:f497,
	media-interactive:f496,
	media-spreadsheet:f495,
	media-text:f491,
	media-video:f490,
	playlist-audio:f492,
	playlist-video:f493,
	yes:f147,
	no:f158,
	no-alt:f335,
	plus:f132,
	plus-alt:f502,
	minus:f460,
	dismiss:f153,
	marker:f159,
	star-filled:f155,
	star-half:f459,
	star-empty:f154,
	flag:f227,
	share:f237,
	share1:f237,
	share-alt:f240,
	share-alt2:f242,
	twitter:f301,
	rss:f303,
	email:f465,
	email-alt:f466,
	facebook:f304,
	facebook-alt:f305,
	networking:f325,
	googleplus:f462,
	location:f230,
	location-alt:f231,
	camera:f306,
	images-alt:f232,
	images-alt2:f233,
	video-alt:f234,
	video-alt2:f235,
	video-alt3:f236,
	vault:f178,
	shield:f332,
	shield-alt:f334,
	sos:f468,
	search:f179,
	slides:f181,
	analytics:f183,
	chart-pie:f184,
	chart-bar:f185,
	chart-line:f238,
	chart-area:f239,
	groups:f307,
	businessman:f338,
	id:f336,
	id-alt:f337,
	products:f312,
	awards:f313,
	forms:f314,
	testimonial:f473,
	portfolio:f322,
	book:f330,
	book-alt:f331,
	download:f316,
	upload:f317,
	backup:f321,
	clock:f469,
	lightbulb:f339,
	microphone:f482,
	desktop:f472,
	tablet:f471,
	smartphone:f470,
	smiley:f328,
	index-card:f510,
	carrot:f511";

	return $str;
}

?>