<?php


/* --------------- Admin Settings ---------------- */
require_once( trailingslashit(dirname( __FILE__ )) . 'mtrl-menu-settings.php' );


function mtrl_panel_settings(){
	global $mtrladmin;
	//print_r($mtrladmin);

	mtrl_add_option( "mtrladmin_plugin_access", "manage_options");
	mtrl_add_option( "mtrladmin_plugin_page", "show");
	mtrl_add_option( "mtrladmin_plugin_userid", "");
	mtrl_add_option( "mtrladmin_menumng_page", "enable");
	mtrl_add_option( "mtrladmin_admin_menumng_page", "enable");
	mtrl_add_option( "mtrladmin_admintheme_page", "enable");
	mtrl_add_option( "mtrladmin_logintheme_page", "enable");
	mtrl_add_option( "mtrladmin_master_theme", "0");

	$get_menumng_page = mtrl_get_option( "mtrladmin_menumng_page","enable");
	$get_admin_menumng_page = mtrl_get_option( "mtrladmin_admin_menumng_page","enable");
	$get_admintheme_page = mtrl_get_option( "mtrladmin_admintheme_page","enable");
	$get_logintheme_page = mtrl_get_option( "mtrladmin_logintheme_page","enable");
	$get_mastertheme_page = mtrl_get_option( "mtrladmin_master_theme","0");


                // manageoptions and super admin
                $mtrladmin_permissions = mtrl_get_option( "mtrladmin_plugin_access","manage_options");
                if($mtrladmin_permissions == "super_admin" && is_super_admin()){
                    $mtrladmin_permissions = 'manage_options';
                }

                // specific user
                $mtrladmin_userid = mtrl_get_option( "mtrladmin_plugin_userid","");
                if($mtrladmin_permissions == "specific_user" && $mtrladmin_userid == get_current_user_id()){
                    $mtrladmin_permissions = 'read';
                }

    $showtabs = true;
	if(is_multisite() && mtrl_network_active()){
		if(!is_main_site()){
			$showtabs = false;			
		}
	}

	if($showtabs){
		    add_menu_page('Material Admin Addon', __('Material Admin Addon', 'mtrl_framework'), $mtrladmin_permissions, 'mtrl_permission_settings', 'mtrl_permission_settings_page');
		    add_submenu_page('mtrl_permission_settings', 'Plugin Settings', __('Plugin Settings', 'mtrl_framework'), $mtrladmin_permissions, 'mtrl_permission_settings', 'mtrl_permission_settings_page');
			if($get_menumng_page != "disable"){
			    add_submenu_page('mtrl_permission_settings', 'Menu Management', __('Menu Management', 'mtrl_framework'), $mtrladmin_permissions, 'mtrl_menumng_settings', 'mtrl_menumng_settings_page');
			}
		}


}



function mtrl_permission_settings_page(){

    if (isset($_POST['action']) && $_POST['action'] == 'mtrl_save_settings') {
        mtrl_save_permission_settings();
	}

$currentUser = wp_get_current_user();
$isMultisite = is_multisite();
$isSuperAdmin = is_super_admin();

$get_plugin_access = mtrl_get_option( "mtrladmin_plugin_access","manage_options");
$get_plugin_page = mtrl_get_option( "mtrladmin_plugin_page","show");

$get_menumng_page = mtrl_get_option( "mtrladmin_menumng_page","enable");
$get_admin_menumng_page = mtrl_get_option( "mtrladmin_admin_menumng_page","enable");

$get_admintheme_page = mtrl_get_option( "mtrladmin_admintheme_page","enable");
$get_logintheme_page = mtrl_get_option( "mtrladmin_logintheme_page","enable");
$get_mastertheme_page = mtrl_get_option( "mtrladmin_master_theme","0");


global $mtrladmin;
//echo $mtrladmin['dynamic-css-type'];
//echo "jhi";
global $wpdb;
global $blog_id;

//echo "<pre>"; print_r($mtrladmin); echo "</pre>";
	?>

<div class="wrap">

	<h1>Material Admin Settings</h1>

<?php

$mtrl_plugin_settings = true;
if(mtrl_network_active() && $blog_id != 1){
	$mtrl_plugin_settings = false;
}
?>
<?php if($mtrl_plugin_settings) { ?>
	<form method="post" action="<?php echo esc_url(add_query_arg(array())); ?>" id="mtrladmin_settings_form">
		<table class="form-table">
			<tbody>

			<tr>
				<th scope="row">
				<?php _e( 'Plugin Access Rights', 'mtrl_framework' ); ?>
				</th>
				<td>
					<fieldset>
						<p>
							<label>
								<input type="radio" name="plugin_access" value="super_admin"
									<?php checked('super_admin', $get_plugin_access); ?>
									>
									<?php _e( 'Super Admin', 'mtrl_framework' ); ?>
									
								<?php if ( !$isMultisite ) : ?>
									<br><span class="description">
									<?php _e( 'On a single site installation this is usually the same as the Administrator role.', 'mtrl_framework' ); ?>
									</span>
								<?php endif; ?>
							</label>
						</p>

						<p>
							<label>
								<input type="radio" name="plugin_access" value="manage_options"
									<?php checked('manage_options', $get_plugin_access); ?>
									>
									<?php _e( 'User the "manage_options" capability', 'mtrl_framework' ); ?>

									<br><span class="description">
									<?php _e( 'Only Administrators have this capability by default.', 'mtrl_framework' ); ?>
										
									</span>
									</label>
						</p>

						<p>
							<label>
								<input type="radio" name="plugin_access" value="specific_user"
									<?php checked('specific_user', $get_plugin_access); ?>
									<?php disabled( $isMultisite && !$isSuperAdmin ); ?>>
									<?php _e( 'Only the current user', 'mtrl_framework' ); ?>

								<br>
								<span class="description">
								<?php _e( 'Login: ', 'mtrl_framework' ); ?>
									<?php echo $currentUser->user_login; ?>,
									<?php _e( 'user ID: ', 'mtrl_framework' ); ?>
								 	<?php echo get_current_user_id(); ?>
								</span>
							</label>
						</p>
					</fieldset>

					<p>
						<label>
							<input type="checkbox" name="hide_plugin_from_others" value="1"
								<?php checked( $get_plugin_page == "hide" ); ?>
								<?php disabled( $isMultisite && !is_super_admin() ); ?>
							>
							<?php _e( 'Hide the "Material Admin" entry on the "Plugins" page from other users.', 'mtrl_framework' ); ?>
							
							<br><span class="description">
							<?php _e( '(Other users are all users expect selected user type or user above.)', 'mtrl_framework' ); ?>
							</span>
						</label>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
				<?php _e( 'Menu Management', 'mtrl_framework' ); ?>
				</th>
				<td>
					<p>
						<label>
							<input type="checkbox" name="mtrl_disable_menumng" value="1"
								<?php checked( $get_menumng_page == "disable" ); ?>
								<?php disabled( $isMultisite && !is_super_admin() ); ?>
							>
							<?php _e( 'Check to DISABLE Material Admin MENU MANAGEMENT Addon.', 'mtrl_framework' ); ?>
							<br><span class="description">
							<?php _e( 'Generally disabled when the admin menu management is managed by some other premium plugins (providing similar functionality).', 'mtrl_framework' ); ?>
							</span>
						</label>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
				<?php _e( 'User Based Menu Management', 'mtrl_framework' ); ?>
				</th>
				<td>
					<p>
						<label>
							<input type="checkbox" name="mtrl_disable_admin_menumng" value="1"
								<?php checked( $get_admin_menumng_page == "disable" ); ?>
								<?php disabled( $isMultisite && !is_super_admin() ); ?>
							>
							<?php _e( 'Check to show Original Admin menu to administrator or super admin user.', 'mtrl_framework' ); ?>
							 <br><span class="description">
							 <?php _e( 'Means the edited menu (from Menu Management Addon) will be shown to all users except administrator or super admin users.', 'mtrl_framework' ); ?>
								</span>
						</label>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
				<?php _e( 'Material Theme on Admin Pages', 'mtrl_framework' ); ?>
				</th>
				<td>
					<p>
						<label>
							<input type="checkbox" name="mtrl_disable_admintheme" value="1"
								<?php checked( $get_admintheme_page == "disable" ); ?>
								<?php disabled( $isMultisite && !is_super_admin() ); ?>
							>
							<?php _e( 'Check to DISABLE Material Admin Theme on ADMIN PAGES after successful user login.', 'mtrl_framework' ); ?>
						</label>
					</p>
				</td>
			</tr>


			<tr>
				<th scope="row">
				<?php _e( 'Material Theme on Login Page', 'mtrl_framework' ); ?>
				</th>
				<td>
					<p>
						<label>
							<input type="checkbox" name="mtrl_disable_logintheme" value="1"
								<?php checked( $get_logintheme_page == "disable" ); ?>
								<?php disabled( $isMultisite && !is_super_admin() ); ?>
							>
							<?php _e( 'Check to DISABLE Material Admin Theme on LOGIN PAGE.', 'mtrl_framework' ); ?>
						</label>
					</p>
				</td>
			</tr>


<?php /* if($isMultisite && $isSuperAdmin){ ?>

			<tr>
				<th scope="row">
					Material Admin Theme (on all network)
				</th>
				<td>
					<p>
						<select name='mtrl_multisite_options' id='mtrl_multisite_options'>
						<option value='0'>Individual Site Settings</option>
						<?php 
						$blogarr = mtrl_multisite_allsites();
							foreach ($blogarr as $blogid => $blogname) {

								if($get_mastertheme_page == $blogid){ $mastersel = "selected"; } else { $mastersel = "";}
						        echo '<option value="'.$blogid.'" '.$mastersel.'>'.$blogname.'</option>';
							} 
						?>
						</select>

						<br>Selected site &quot;Material Admin theme options&quot; will be applied to all the sites on network. All the sites on network will have same look and feel. &quot;Individual site settings&quot; means all the sites will have their own individual settings.

					</p>
				</td>
			</tr>
<?php  } */ ?>





<?php /*			<tr>
				<th scope="row">
					Multisite settings
				</th>
				<td>
					<fieldset id="ame-menu-scope-settings">
						<p>
							<label>
								<input type="radio" name="menu_config_scope" value="global"
								       id="ame-menu-config-scope-global"
									<?php checked('global', $settings['menu_config_scope']); ?>
									<?php disabled(!$isMultisite || !$isSuperAdmin); ?>>
								Global &mdash;
								Use the same admin menu settings for all network sites.
							</label><br>
						</p>


						<label>
							<input type="radio" name="menu_config_scope" value="site"
								<?php checked('site', $settings['menu_config_scope']); ?>
								<?php disabled(!$isMultisite || !$isSuperAdmin); ?>>
							Per-site &mdash;
							Use different admin menu settings for each site.
						</label>
					</fieldset>
				</td>
			</tr> */ 
?>
			</tbody>
		</table>
		<input type="hidden" name="plugin_userid" value="<?php echo get_current_user_id(); ?>">
		<input type="hidden" name="action" value="mtrl_save_settings">
		<?php
		wp_nonce_field('save_settings');
		submit_button();
		?>
	</form>
<?php } ?>

</div>


<?php



}



function mtrl_save_permission_settings(){

    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'save_settings')) {
        die('Save Permissions check failed.');
    }

    global $wpdb;
	
	$plugin_access = "manage_options";
	//echo "<br><br><br><br><pre>"; print_r($_POST); echo "</pre>";
    //die();
    if ($_POST['action'] == 'mtrl_save_settings') 
    {

    	// plugin access
        $plugin_access = $_POST['plugin_access'];
		mtrl_update_option( "mtrladmin_plugin_access", $plugin_access);
	
		// show on plugin page
		$plugin_page = "show";
	    if (isset($_POST['hide_plugin_from_others'])) {
	    	$plugin_page = "hide";
	    }
		mtrl_update_option( "mtrladmin_plugin_page", $plugin_page);

		// user specific
		$onlyuser = "";
	    if ($plugin_access == "specific_user") {
	    	$onlyuser = $_POST['plugin_userid'];
	    }
		mtrl_update_option( "mtrladmin_plugin_userid", $onlyuser);


		// show on menu mngmnt page
		$menumng_page = "enable";
	    if (isset($_POST['mtrl_disable_menumng'])) {
	    	$menumng_page = "disable";
	    }
		mtrl_update_option( "mtrladmin_menumng_page", $menumng_page);

		// show on menu mngmnt page for admin users
		$admin_menumng_page = "enable";
	    if (isset($_POST['mtrl_disable_admin_menumng'])) {
	    	$admin_menumng_page = "disable";
	    }
		mtrl_update_option( "mtrladmin_admin_menumng_page", $admin_menumng_page);

		// show on admin theme
		$admintheme_page = "enable";
	    if (isset($_POST['mtrl_disable_admintheme'])) {
	    	$admintheme_page = "disable";
	    }
		mtrl_update_option( "mtrladmin_admintheme_page", $admintheme_page);


		// show on login theme
		$logintheme_page = "enable";
	    if (isset($_POST['mtrl_disable_logintheme'])) {
	    	$logintheme_page = "disable";
	    }
		mtrl_update_option( "mtrladmin_logintheme_page", $logintheme_page);


//mtrl_multisite_allsites();
//die();

		/*Update multisite in one click settings*/
		$master_theme = 0;
		$master_options = "";
	    if (isset($_POST['mtrl_multisite_options']) && $_POST['mtrl_multisite_options'] != "0" && is_numeric($_POST['mtrl_multisite_options'])) {
	    	$master_theme = $_POST['mtrl_multisite_options'];
			update_option( "mtrladmin_master_theme", $master_theme);

		    if($master_theme != "0"){
		    	$master_options = get_blog_option( $master_theme, 'mtrl_demo' );

					$blogarr = mtrl_multisite_allsites();
					foreach ($blogarr as $blogid => $blogname) {
						update_blog_option($blogid, 'mtrl_demo', $master_options);
					}
			}
	    }

    }



}



add_filter('all_plugins', 'mtrl_filter_plugin_list');

function mtrl_filter_plugin_list(){

	if ( ! function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$plugins = get_plugins();

	//print_r($plugins);

		$currentUser = wp_get_current_user();
		$uaccess = mtrl_get_option( "mtrladmin_plugin_access","manage_options");
		$upage = mtrl_get_option( "mtrladmin_plugin_page","show");
		$uid = mtrl_get_option( "mtrladmin_plugin_userid","");

		if($upage == "hide"){

			if($uaccess == "super_admin" && !is_super_admin()){
				unset($plugins['material-admin/mtrl-core.php']);
			}

			if($uaccess == "specific_user" && $uid != get_current_user_id()){
				unset($plugins['material-admin/mtrl-core.php']);
			}

			if($uaccess == "manage_options" && !current_user_can('manage_options')){
				unset($plugins['material-admin/mtrl-core.php']);
			}

		}


	return $plugins;

/*


		if($get_plugin_access == "specific_user" && $get_plugin_page == "hide"){

		}

		$get_plugin_userid == get_current_user_id()
		$allowed_user_id = $this->wp_menu_editor->get_plugin_option('plugins_page_allowed_user_id');
		if ( get_current_user_id() != $allowed_user_id ) {
			unset($plugins[$this->wp_menu_editor->plugin_basename]);
		}
		return $plugins;*/
}
   

?>