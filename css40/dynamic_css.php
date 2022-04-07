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

/*---------------------------------------------
  Typography
 ---------------------------------------------*/

/* -------------------- Fonts -------------------- */
$mtrl_fonts = mtrl_css_fonts();

$mtrlstr = " h1,h2,h3,h4,h5,h6,.wrap h2, .wrap h1, "
			.".postbox .hndle, .stuffbox .hndle, "
			."#delete-action, "
			."#dashboard-widgets #dashboard_activity h4, "
			.".welcome-panel .about-description,"
			."#titlediv #title,"
			.".widefat tfoot tr th, .widefat thead tr th, th.manage-column a, th.sortable a, .widefat tfoot tr td, .widefat thead tr td,"
			.".form-wrap label,"
			.".theme-browser .theme .theme-name, .theme-browser .theme .more-details,"
			.".no-plugin-results , .no-plugin-results a, "
			.".form-table th, #ws_menu_editor .ws_item_title,"
			."#ws_menu_editor .ws_edit_field, .settings_page_menu_editor .ui-dialog-title";
echo $mtrlstr."{".$mtrl_fonts['head_font_css']."}";


$mtrlstr = " body, p, "
		   ."#activity-widget #the-comment-list .comment-item h4,"
		   ."#wpadminbar, .ws_edit_field-colors .ws_color_scheme_display, "
		   ."#ws_menu_editor .ws_main_container .ws_edit_field input, #ws_menu_editor .ws_main_container .ws_edit_field select, #ws_menu_editor .ws_main_container .ws_edit_field textarea";
echo $mtrlstr."{".$mtrl_fonts['body_font_css']."}";

$mtrlstr = " #adminmenu .wp-submenu-head, #adminmenu a.menu-top, "
			."#adminmenu .wp-has-current-submenu ul>li>a, .folded #adminmenu li.menu-top .wp-submenu>li>a, "
			."#adminmenu .wp-not-current-submenu li>a, .folded #adminmenu .wp-has-current-submenu li>a,"
			."#collapse-menu";
echo $mtrlstr."{".$mtrl_fonts['menu_font_css']."}";


$mtrlstr = " .wp-core-ui .button, .wp-core-ui .button-secondary,"
			.".wp-core-ui .button-primary, i.mtrlwaves-effect input, "
			.".upload-plugin .install-help, .upload-theme .install-help,"
			.".wordfenceWrap input[type='button'], .wordfenceWrap input[type='submit']";
echo $mtrlstr."{".$mtrl_fonts['button_font_css']."}";











/*---------------------------------------------
  Layout & Typography Section
 ---------------------------------------------*/
// screen settings tabs for transparent style
if($mtrladmin["topbar-menu-bg"]['background-color'] == "transparent"){
	echo " #screen-meta-links .show-settings, #screen-meta-links .show-settings:active, #screen-meta-links .show-settings:focus, #screen-meta-links .show-settings:hover, #screen-meta-links .show-settings:after{color: ".$mtrladmin['topbar-menu-color']."; background: transparent;} #screen-meta-links .screen-meta-toggle{background:transparent;}";
} else {
	$mtrlstr = "#screen-meta-links .show-settings,#screen-meta-links .show-settings:after";
	echo mtrl_css_color($mtrlstr, "body-text-color", "1.0") . "\n";
}

echo " \n/* -- Page BG -- */\n";
echo mtrl_css_background("html, body, #wp-content-editor-tools, #ws_menu_editor .ws_editbox", "page-bg", "1.0") . "\n";
echo mtrl_css_background("#wpcontent:before", "page-heading-bg", "1.0") . "\n";


echo " \n/* -- Heading -- */\n";
$mtrlstr = " h1,h2,h3,h4,h5,h6, .wrap h2, .wrap h1 , .welcome-panel .about-description, .theme-browser .theme.active .theme-name, #dashboard-widgets h3, #dashboard-widgets h4, #dashboard_quick_press .drafts h2";
echo mtrl_css_color($mtrlstr, "heading-color", "1.0") . "\n";




echo " \n/* -- body text -- */\n";
$mtrlstr = " body, p, #screen-meta-links.opened .screen-meta-toggle .show-settings,#screen-meta-links.opened .show-settings:after, .widefat p, #submitted-on, .submitted-on,.widefat td, .widefat th,.tablenav .tablenav-pages, .form-table th, .form-wrap label, "
			."#dashboard_right_now li a:before, #dashboard_right_now li span:before, .welcome-panel .welcome-icon:before,"
			."#misc-publishing-actions label[for=post_status]:before, #post-body #visibility:before, #post-body .misc-pub-revisions:before, .curtime #timestamp:before, span.wp-media-buttons-icon:before,"
			.".misc-pub-section, input[type=radio]:checked+label:before, .view-switch>a:before,"
			.".no-plugin-results , .no-plugin-results a,"
			.".upload-plugin .install-help, .upload-theme .install-help,"
			.".form-wrap p, p.description,"
			."#screen-meta-links a, .contextual-help-tabs .active a, .widget-title h3";
echo mtrl_css_color($mtrlstr, "body-text-color", "1.0") . "\n";


echo " \n/* -- link color -- */\n";
echo mtrl_link_color("a, .no-plugin-results a", "link-color") . "\n";
 


/*---------------------------------------------
  Form Section
 ---------------------------------------------*/

echo " \n/* -- Form element -- */\n";
$mtrlstr = " #adduser .form-table input, #createuser .form-table input, .form-table input[type=text], .form-table input[type=password], .form-table input[type=email], .form-table input[type=number], .form-table input[type=search], .form-table input[type=tel], .form-table input[type=url], .form-table textarea, .form-table select, input[type=checkbox], input[type=color], input[type=date], input[type=datetime-local], input[type=datetime], input[type=email], input[type=month], input[type=number], input[type=password], input[type=radio], input[type=search], input[type=tel], input[type=text], input[type=time], input[type=url], input[type=week], select, textarea, #createuser .form-table input[type='checkbox'],".
	"body .components-modal__content input[type=checkbox], body .components-modal__content input[type=radio], body .components-popover input[type=checkbox], body .components-popover input[type=radio], body .edit-post-sidebar input[type=checkbox], body .edit-post-sidebar input[type=radio], body .editor-block-list__block input[type=checkbox], body .editor-block-list__block input[type=radio], body .editor-post-permalink input[type=checkbox], body .editor-post-permalink input[type=radio], body .editor-post-publish-panel input[type=checkbox], body .editor-post-publish-panel input[type=radio],body .components-modal__content input[type='checkbox']:checked,body .components-modal__content input[type='radio']:checked,body .components-popover input[type='checkbox']:checked,body .components-popover input[type='radio']:checked,body .edit-post-sidebar input[type='checkbox']:checked,body .edit-post-sidebar input[type='radio']:checked,body .editor-block-list__block input[type='checkbox']:checked,body .editor-block-list__block input[type='radio']:checked,body .editor-post-permalink input[type='checkbox']:checked,body .editor-post-permalink input[type='radio']:checked,body .editor-post-publish-panel input[type='checkbox']:checked,body .editor-post-publish-panel input[type='radio']:checked, .components-modal__content input[type=checkbox]:checked, .components-modal__content input[type=radio]:checked, .components-popover input[type=checkbox]:checked, .components-popover input[type=radio]:checked, .edit-post-sidebar input[type=checkbox]:checked, .edit-post-sidebar input[type=radio]:checked, .editor-block-list__block input[type=checkbox]:checked, .editor-block-list__block input[type=radio]:checked, .editor-post-permalink input[type=checkbox]:checked, .editor-post-permalink input[type=radio]:checked, .editor-post-publish-panel input[type=checkbox]:checked, .editor-post-publish-panel input[type=radio]:checked, .components-modal__content input[type=checkbox]:focus, .components-modal__content input[type=radio]:focus, .components-popover input[type=checkbox]:focus, .components-popover input[type=radio]:focus, .edit-post-sidebar input[type=checkbox]:focus, .edit-post-sidebar input[type=radio]:focus, .editor-block-list__block input[type=checkbox]:focus, .editor-block-list__block input[type=radio]:focus, .editor-post-permalink input[type=checkbox]:focus, .editor-post-permalink input[type=radio]:focus, .editor-post-publish-panel input[type=checkbox]:focus, .editor-post-publish-panel input[type=radio]:focus, .components-form-token-field__input-container, .components-form-token-field__input-container.is-active, .edit-post-sidebar input[type=text]:focus";

echo mtrl_css_bgcolor($mtrlstr, "form-bg", "1.0") . "\n";
echo mtrl_css_border_color($mtrlstr, "form-border-color", "", "all") . "\n";
echo mtrl_css_color($mtrlstr, "form-text-color", "1.0") . "\n";

echo " \n/* -- Post Title -- */\n";
$mtrlstr = " #titlediv #title";
echo mtrl_css_border_color($mtrlstr, "form-border-color", "", "all") . "\n";



/*---------------------------------------------
  Primary Color - Pick theme
 ---------------------------------------------*/

echo " \n/* -- primary -- */\n";

$primary_color_str = ".nav-tab.nav-tab-active, .nav-tab-active, .nav-tab-active:hover , .nav-tab:hover, input[type=checkbox]:checked:before,"
					."a.post-format-icon:hover:before, a.post-state-format:hover:before,"
					.".view-switch a.current:before,"
					.".theme-browser .theme.add-new-theme:focus span:after, .theme-browser .theme.add-new-theme:hover span:after,"
					.".theme-browser .theme.add-new-theme span:after,"
					.".nav-tab-active, .nav-tab-active:hover,"
					.".filter-links .current,"
					.".filter-links li>a:focus, .filter-links li>a:hover, .show-filters .filter-links a.current:focus, .show-filters .filter-links a.current:hover,"
					.".upload-plugin .wp-upload-form .button,"
					.".upload-plugin .wp-upload-form .button:disabled,"
					.".components-modal__content input[type=checkbox]:checked::before, .components-popover input[type=checkbox]:checked::before, .edit-post-sidebar input[type=checkbox]:checked::before, .editor-block-list__block input[type=checkbox]:checked::before, .editor-post-permalink input[type=checkbox]:checked::before, .editor-post-publish-panel input[type=checkbox]:checked::before";
echo mtrl_css_color($primary_color_str, "primary-color", "1.0") . "\n";



$primary_bgcolor_str = ".highlight, .highlight a, input[type=radio]:checked:before,"
					  ."#edit-slug-box .edit-slug.button, #edit-slug-box #view-post-btn .button,"
					  .".post-com-count:hover:after,"
					  .".tablenav .tablenav-pages a:focus, .tablenav .tablenav-pages a:hover,"
					  .".media-item .bar,"
					  .".theme-browser .theme .more-details,"
					  .".theme-browser .theme.add-new-theme a:focus:after, .theme-browser .theme.add-new-theme a:hover:after, "
					  .".widgets-chooser li.widgets-chooser-selected,"
					  .".plugin-card .plugin-card-bottom,"
					  ." #ws_menu_editor a.ws_button:hover,"
					  ."#ws_menu_editor .ws_main_container .ws_container,"
					  .".components-button.is-primary:enabled";
echo mtrl_css_bgcolor($primary_bgcolor_str, "primary-color", "1.0") . "\n";

$pace_bgcolor_str = ".pace .pace-progress";
echo mtrl_css_bgcolor($pace_bgcolor_str, "pace-color", "1.0") . "\n";



$primary_border_str = "input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime-local]:focus, input[type=datetime]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, input[type=password]:focus, input[type=radio]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=text]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, select:focus, textarea:focus,"
					 ."input[type=checkbox]:hover, input[type=color]:hover, input[type=date]:hover, input[type=datetime-local]:hover, input[type=datetime]:hover, input[type=email]:hover, input[type=month]:hover, input[type=number]:hover, input[type=password]:hover, input[type=radio]:hover, input[type=search]:hover, input[type=tel]:hover, input[type=text]:hover, input[type=time]:hover, input[type=url]:hover, input[type=week]:hover, select:hover, textarea:hover,"
					 ."#titlediv #title:focus, #titlediv #title:hover,"
					 .".attachment-preview .thumbnail:hover,"
					 .".media-frame.mode-grid .attachment.details:focus .attachment-preview,"
					 .".media-frame.mode-grid .attachment:focus .attachment-preview,"
					 .".media-frame.mode-grid .selected.attachment:focus .attachment-preview,"
					 .".drag-drop.drag-over #drag-drop-area,"
					 .".theme-browser .theme:focus,"
					 ."#available-widgets .widget-top:hover, #widgets-left .widget-in-question .widget-top, #widgets-left .widget-top:hover, .widgets-chooser ul, div#widgets-right .widget-top:hover,"
					 .".widget-inside, .widget.open .widget-top, div#widgets-right .widgets-holder-wrap.widget-hover,"
					 .".filter-links .current,"
					 .".plugin-card:hover, #update-nag, .update-nag,"
					 .".contextual-help-tabs .active, .wp-tab-active, ul.add-menu-item-tabs li.tabs, ul.category-tabs li.tabs, .categorydiv div.tabs-panel, .customlinkdiv div.tabs-panel, .posttypediv div.tabs-panel, .taxonomydiv div.tabs-panel, .wp-tab-panel";
echo mtrl_css_border_color($primary_border_str, "primary-color", "1.0","all") . "\n";
echo ".has-dfw .quicktags-toolbar{border-color:".$mtrladmin['primary-color']." !important;}";


$primary_border_bottom = "div.mce-toolbar-grp>div, .plugin-install-php .wp-filter, #ws_menu_editor .ws_main_container .ws_toolbar, .wrap h2.nav-tab-wrapper, .nav-tab-active, h1.nav-tab-wrapper, h3.nav-tab-wrapper";
echo mtrl_css_border_color($primary_border_bottom, "primary-color", "1.0","bottom") . "\n";

$primary_border_top = ".post-com-count:hover:after, .media-frame.mode-grid .attachments-browser .attachments";
echo mtrl_css_border_color($primary_border_top, "primary-color", "1.0","top") . "\n";

$primary_border_left = ".plugins .active th.check-column";
echo mtrl_css_border_color($primary_border_left, "primary-color", "1.0","left") . "\n";


echo "#wp-fullscreen-buttons .mce-btn:focus, #wp-fullscreen-buttons .mce-btn:hover, .mce-toolbar .mce-btn-group .mce-btn:focus, .mce-toolbar .mce-btn-group .mce-btn:hover, .qt-fullscreen:focus, .qt-fullscreen:hover,"
	.".wrap .add-new-h2:hover, .wrap .page-title-action:hover { "
	."background: ".$mtrladmin['primary-color']." !important;"
	."border-color: ".$mtrladmin['primary-color']." !important;"
	."color: ".$mtrladmin['button-text-color']." !important;"
	."}";

echo ".wrap .add-new-h2, .wrap .page-title-action{"
	."background: ".$mtrladmin['button-secondary-bg']." !important;"
	."color: ".$mtrladmin['button-text-color']." !important;"
	."}";


echo ".toplevel_page__mtrloptions #reduk-header{border-color:".$mtrladmin['primary-color']." !important;background-color:".$mtrladmin['primary-color']." !important;}";


/*----------Media library - bug fix ------------*/
echo "

.media-progress-bar div{
	background-color: ".$mtrladmin['primary-color'].";
}

.media-modal-content .attachment.details {
	-webkit-box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
	box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
	-moz-box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
	-ms-box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
	-o-box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
}
/*
.media-modal-content .attachments .attachment:focus{
	-webkit-box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
	box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
	-ms-box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
	-moz-box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
	-o-box-shadow: inset 0 0 0 3px #fff,inset 0 0 0 7px ".$mtrladmin['primary-color'].";
}*/

.wp-core-ui .attachment.details .check, .wp-core-ui .attachment.selected .check:focus, .wp-core-ui .media-frame.mode-grid .attachment.selected .check,
.attachment.details .check, .attachment.selected .check:focus, .media-frame.mode-grid .attachment.selected .check {
	background-color: ".$mtrladmin['primary-color'].";
	-webkit-box-shadow: 0 0 0 1px #fff,0 0 0 2px ".$mtrladmin['primary-color'].";
	box-shadow: 0 0 0 1px #fff,0 0 0 2px ".$mtrladmin['primary-color'].";
	-moz-box-shadow: 0 0 0 1px #fff,0 0 0 2px ".$mtrladmin['primary-color'].";
	-ms-box-shadow: 0 0 0 1px #fff,0 0 0 2px ".$mtrladmin['primary-color'].";
	-o-box-shadow: 0 0 0 1px #fff,0 0 0 2px ".$mtrladmin['primary-color'].";
}";


/*------------------ RTL ----------------------*/

echo ".rtl .folded #adminmenu li.menu-top .wp-submenu>li>a:hover, 
.rtl #adminmenu .wp-submenu a:focus, 
.rtl #adminmenu .wp-submenu a:hover, 
.rtl #adminmenu .wp-submenu li.current a, 
.rtl #adminmenu .wp-submenu li.current a:hover,
.rtl .folded #adminmenu li.menu-top .wp-submenu>li>a:hover, 
.rtl #adminmenu .wp-submenu a:focus, 
.rtl #adminmenu .wp-submenu a:hover, 
.rtl #adminmenu .wp-submenu li.current a, 
.rtl #adminmenu .wp-submenu li.current a:hover,
.rtl .plugins .active th.check-column,
.rtl #wpadminbar .quicklinks .menupop.hover ul li a:hover,
.rtl .contextual-help-tabs .active
{
	border-right-color: ".$mtrladmin['primary-color'].";
}

";


echo " #ws_menu_editor.ws_is_actor_view .ws_is_hidden_for_actor{background-color: ".$mtrladmin['primary-color']." !important;}";
echo " #ws_menu_editor.ws_is_actor_view .ws_is_hidden_for_actor.ws_active{background-color: ".$mtrladmin['box-head-bg']['background-color']." !important;}";


/*---------------------------------------------
  Menu Section
 ---------------------------------------------*/

echo " \n/* -- Menu BG -- */\n";
$mtrlstr = " #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap,"
		   ."#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu,"
		   ."#adminmenu .wp-submenu, .folded #adminmenu .wp-has-current-submenu .wp-submenu";
echo mtrl_css_background($mtrlstr, "menu-bg", "1.0") . "\n";

echo " \n/* -- Menu Text color -- */\n";
$mtrlstr = " #adminmenu a, #adminmenu li.menu-top:hover, "
			."#adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus, "
			."#adminmenu div.wp-menu-image:before, #ws_menu_editor .ws_item_title, "
			."#adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, "
		." #adminmenu .current div.wp-menu-image:before, 
		#adminmenu .wp-has-current-submenu div.wp-menu-image:before, 
		#adminmenu a.current:hover div.wp-menu-image:before,
		#adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before, 
		#adminmenu li.wp-has-current-submenu a:focus div.wp-menu-image:before, 
		#adminmenu li.wp-has-current-submenu.opensub div.wp-menu-image:before, 
		#adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before,"
		."#adminmenuwrap .menu-userinfo .disproles, #adminmenuwrap .menu-userinfo .dispname a, #adminmenuwrap .mtrl-menu-profile-links:after,#collapse-button .collapse-button-icon:after,.collapse-button-label";

echo mtrl_css_color($mtrlstr, "menu-color", "1.0") . "\n";

$mtrlstr = " #adminmenu li:hover div.wp-menu-image:before, #adminmenu a:hover, #adminmenu li.menu-top>a:focus,  #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus, "
			."#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu,"
			."#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu .wp-menu-image:before,#adminmenu li.wp-has-current-submenu a:focus div.wp-menu-image:before,"
			."#adminmenuwrap .mtrl-menu-profile-links .all-links li a,#collapse-menu:hover #collapse-button .collapse-button-icon:after,#collapse-button:hover .collapse-button-label";
echo mtrl_css_color($mtrlstr, "menu-hover-color", "1.0") . "\n";



echo " \n/* -- Menu primary bg -- */\n";
$mtrlstr = " #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus, "
			."#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu, "
			."#adminmenuwrap .mtrl-menu-profile-links .all-links,#collapse-button:hover";
echo mtrl_css_bgcolor($mtrlstr, "menu-primary-bg", "1.0") . "\n";

echo " \n/* -- Menu primary border left -- */\n";

$mtrlstr = "#adminmenu li a.menu-top:hover, 
			#adminmenu li.opensub>a.menu-top, 
			#adminmenu li>a.menu-top:focus, "
			."#adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, 
			#adminmenu li.current a.menu-top, 
			#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, 
			.folded #adminmenu li.current.menu-top, 
			.folded #adminmenu li.wp-has-current-submenu,#collapse-menu:hover #collapse-button ";
echo mtrl_css_border_color($mtrlstr, "primary-color", "1.0","left") . "\n";


echo " \n/* -- SubMenu -- */\n";
$mtrlstr = " .folded #adminmenu li.menu-top .wp-submenu>li>a:hover, #adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu .wp-submenu li.current a, #adminmenu .wp-submenu li.current a:hover";
echo mtrl_css_bgcolor($mtrlstr, "menu-secondary-bg", "1.0") . "\n";
echo mtrl_css_color($mtrlstr, "submenu-color", "1.0") . "\n";
echo mtrl_css_border_color($mtrlstr, "primary-color", "", "left") . "\n";

$mtrlstr = " #adminmenu .opensub .wp-submenu li.current a, #adminmenu .wp-submenu li.current, #adminmenu .wp-submenu li.current a, #adminmenu .wp-submenu li.current a:focus, #adminmenu .wp-submenu li.current a:hover, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu li.current a,"
			."#adminmenu .wp-submenu a";
echo mtrl_css_color($mtrlstr, "submenu-color", "1.0") . "\n";


echo " \n/* -- Floating SubMenu -- */\n";
$mtrlstr = " #adminmenu .wp-not-current-submenu li>a:hover, .folded #adminmenu .wp-has-current-submenu li>a:hover";
echo mtrl_css_color($mtrlstr, "submenu-color", "1.0") . "\n";
echo mtrl_css_bgcolor($mtrlstr, "menu-secondary-bg", "1.0") . "\n";
echo mtrl_css_border_color($mtrlstr, "primary-color", "", "left") . "\n";


echo " \n/* -- Floating SubMenu arrow -- */\n";
$mtrlstr = " #adminmenu li.wp-has-submenu.wp-not-current-submenu.opensub:hover:after";
echo mtrl_css_border_color($mtrlstr, $mtrladmin['menu-bg']['background-color'],"","right","string");


echo " \n/* -- Collapsed Submenu - Menu Text color -- */\n";
echo mtrl_css_color(".folded #adminmenu .wp-submenu .wp-submenu-head, .auto-fold #adminmenu .wp-submenu .wp-submenu-head", "menu-color", "1.0") . "\n";


echo " \n/* -- Collapsed Submenu - SubMenu Text color -- */\n";
$mtrlstr = " #collapse-menu, #collapse-menu:hover, #collapse-menu:hover #collapse-button div:after, #collapse-button div:after";
echo mtrl_css_color($mtrlstr, "submenu-color", "1.0") . "\n";


echo " \n/* -- Collapsed SubMenu -- */\n";
$mtrlstr = " .folded #adminmenu li.menu-top .wp-submenu>li>a.current";
echo mtrl_css_border_color($mtrlstr, "primary-color", "", "left") . "\n";



echo " \n/* -- Logo BG -- */\n";
$mtrlstr = " #adminmenuwrap:before, .folded #adminmenuwrap:before";
echo mtrl_css_bgcolor($mtrlstr, "logo-bg", "1.0") . "\n";

/*---------------------------------------------
  Boxes Section
 ---------------------------------------------*/

echo " \n/* -- Box BG -- */\n";
$mtrlstr = " .postbox, "
			."#screen-meta, #screen-meta-links.opened .screen-meta-toggle, #contextual-help-link-wrap, #screen-options-link-wrap, #ws_menu_editor .ws_main_container";
echo mtrl_css_background($mtrlstr, "box-bg", "1.0") . "\n";

$mtrlstr = " .welcome-panel";
// echo mtrl_css_background($mtrlstr, "box-bg", "1.0") . "\n";
echo mtrl_css_bgcolor($mtrlstr, "primary-color", "1.0") . "\n";



echo " \n/* -- Box Head -- */\n";
$mtrlstr = " .postbox .hndle, .stuffbox .hndle, 
h2.hndle.ui-sortable-handle, #poststuff h2, .metabox-holder h2.hndle, .postbox .hndle, .stuffbox .hndle,
.settings_page_menu_editor .ui-dialog-titlebar, .postbox .postbox-header";
echo mtrl_css_background($mtrlstr, "box-head-bg", "1.0") . "\n";
echo mtrl_css_color($mtrlstr, "box-head-color", "1.0") . "\n";

$mtrlstr = " .welcome-panel h2";
echo mtrl_css_color($mtrlstr, "#ffffff", "1.0","string") . "\n";



$mtrlstr = " #ws_menu_editor .ws_main_container .ws_container.ws_active";
echo mtrl_css_background($mtrlstr, "box-head-bg", "1.0") . "\n";
$mtrlstr = " #ws_menu_editor .ws_item_title";
echo mtrl_css_color($mtrlstr, "box-head-color", "1.0") . "\n";



echo " \n/* -- Data Tables Head -- */\n";
$mtrlstr = " table.widefat thead tr, table.widefat tfoot tr";
echo mtrl_css_background($mtrlstr, "box-head-bg", "1.0") . "\n";

$mtrlstr = " table.widefat thead tr, table.widefat tfoot tr,"
		   ."th .comment-grey-bubble:before, th .sorting-indicator:before, .widefat tfoot tr th, .widefat thead tr th, .widefat tfoot tr td, .widefat thead tr td, th.manage-column a, th.sortable a:active, th.sortable a:focus, th.sortable a:hover";
echo mtrl_css_color($mtrlstr, "box-head-color", "1.0") . "\n";


echo " \n/* --Admin Panel -> Menu section accordion title -- */\n";
$mtrlstr = " .js .control-section .accordion-section-title:focus, .js .control-section .accordion-section-title:hover, .js .control-section.open .accordion-section-title, .js .control-section:hover .accordion-section-title";
echo mtrl_css_background($mtrlstr, "box-head-bg", "1.0") . "\n";
echo mtrl_css_color($mtrlstr, "box-head-color", "1.0") . "\n";


echo " \n/* --Plugin Upload -- */\n";
$mtrlstr = " .upload-plugin .wp-upload-form, .upload-theme .wp-upload-form";
echo mtrl_css_background($mtrlstr, "box-head-bg", "1.0") . "\n";
echo mtrl_css_color($mtrlstr, "box-head-color", "1.0") . "\n";


echo " \n/* -- Box Head toggle arrow - Using opacity-- */\n";
$mtrlstr = " .js .meta-box-sortables .postbox .handlediv:before, .js .sidebar-name .sidebar-name-arrow:before, "
			.".welcome-panel .welcome-panel-close, #welcome-panel.welcome-panel .welcome-panel-close:before,"
			.".accordion-section-title:after, .handlediv, .item-edit, .sidebar-name-arrow, .widget-action,"
			.".accordion-section-title:focus:after, .accordion-section-title:hover:after, "
			."#ws_menu_editor a.ws_edit_link:before";
echo mtrl_css_color($mtrlstr, "box-head-color", "0.7") . "\n";
    
echo " \n/* -- Box Head toggle arrow - Using opacity-- !important */\n";
echo "#bulk-titles div a:before, #welcome-panel.welcome-panel .welcome-panel-close:before, .tagchecklist span a:before{color: ".mtrl_colorcode($mtrladmin['box-head-color'],"0.7","!important")."} ";
echo ".accordion-section-title:focus:after, .accordion-section-title:hover:after{border-color: ".mtrl_colorcode($mtrladmin['box-head-color'],"0.7"," transparent")."}";


/*---------------------------------------------
  Button Section
 ---------------------------------------------*/

echo " \n/* -- Button text color -- */\n";
$mtrlstr = " .wp-core-ui .button, .wp-core-ui .button-secondary, "
		   .".wp-media-buttons .add_media span.wp-media-buttons-icon:before, "
 		   .".wp-core-ui .button-secondary:focus, .wp-core-ui .button-secondary:hover, .wp-core-ui .button.focus, .wp-core-ui .button.hover, .wp-core-ui .button:focus, .wp-core-ui .button:hover,"
 		   .".wp-core-ui .button-primary, i.mtrlwaves-effect input,"
 		   .".wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover,"
 		   ."#wp-fullscreen-buttons .mce-btn:focus .mce-ico, #wp-fullscreen-buttons .mce-btn:hover .mce-ico, .mce-toolbar .mce-btn-group .mce-btn:focus .mce-ico, .mce-toolbar .mce-btn-group .mce-btn:hover .mce-ico, .qt-fullscreen:focus .mce-ico, .qt-fullscreen:hover .mce-ico,"
 		   .".media-frame a.button, .media-frame a.button:hover,"
 		   .".wordfenceWrap input[type='button'], .wordfenceWrap input[type='submit'], .wordfenceWrap input[type='button']:hover, .wordfenceWrap input[type='submit']:hover, .wordfenceWrap input[type='button']:focus, .wordfenceWrap input[type='submit']:focus";
echo mtrl_css_color($mtrlstr, "button-text-color", "1.0") . "\n";


echo " \n/* -- Button secondary bg color -- */\n";
$mtrlstr = " .wp-core-ui .button, .wp-core-ui .button-secondary, .wordfenceWrap input[type='button'], .wordfenceWrap input[type='submit'],i.button.mtrlwaves-effect";
echo mtrl_css_bgcolor($mtrlstr, "button-secondary-bg", "1.0") . "\n";


echo " \n/* -- Button secondary hover bg color -- */\n";
$mtrlstr = " .wp-core-ui .button-secondary:focus, .wp-core-ui .button-secondary:hover, .wp-core-ui .button.focus, .wp-core-ui .button.hover, .wp-core-ui .button:focus, .wp-core-ui .button:hover,"
		   ."#edit-slug-box .edit-slug.button:hover, #edit-slug-box #view-post-btn .button:hover";
echo mtrl_css_bgcolor($mtrlstr, "button-secondary-hover-bg", "1.0") . "\n";


echo " \n/* -- Button primary bg color -- */\n";
$mtrlstr = " .wp-core-ui .button-primary,"
		   .".row-actions span a:hover,.row-actions span button.button-link:hover,"
		   .".plugin-card .install-now.button, .plugin-card .button,"
		   .".wordfenceWrap input[type='button'], .wordfenceWrap input[type='submit'],i.button.mtrlwaves-effect.button-primary";
echo mtrl_css_bgcolor($mtrlstr, "button-primary-bg", "1.0") . "\n";


echo " \n/* -- Button primary hover bg color -- */\n";
$mtrlstr = " .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover,i.button.mtrlwaves-effect.button-primary:hover,i.button.mtrlwaves-effect.button-primary:focus,"
		   ."#adminmenu .awaiting-mod, #adminmenu .update-plugins, #sidemenu li a span.update-plugins,"
		   .".wordfenceWrap input[type='button']:hover, .wordfenceWrap input[type='submit']:hover, .wordfenceWrap input[type='button']:focus, .wordfenceWrap input[type='submit']:focus,
			#adminmenu li a.wp-has-current-submenu .update-plugins, #adminmenu li.current a .awaiting-mod";
echo mtrl_css_bgcolor($mtrlstr, "button-primary-hover-bg", "1.0") . "\n";

echo " \n/* ---- disabled button - !important ----- */\n";
$mtrlstr = " .wp-core-ui .button-primary-disabled, .wp-core-ui .button-primary.disabled, .wp-core-ui .button-primary:disabled, .wp-core-ui .button-primary[disabled]";
echo $mtrlstr." {color: ".mtrl_colorcode($mtrladmin['button-text-color'],"1.0","!important")."}";
echo $mtrlstr." {background-color: ".mtrl_colorcode($mtrladmin['button-primary-bg'],"1.0","!important")."}";


/*----------------------------------
 Admin Top bar
-----------------------------------*/

echo " \n/* -- Top bar BG - like menu bg-- */\n";
$mtrlstr = " #wpadminbar";
echo mtrl_css_background($mtrlstr, "topbar-menu-bg", "1.0") . "\n";


$mtrlstr = " #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus,"
			."#wpadminbar .menupop .ab-sub-wrapper .ab-submenu, #wpadminbar .shortlink-input, #wpadminbar .quicklinks .menupop ul.ab-sub-secondary, #wpadminbar .quicklinks .menupop ul.ab-submenu,"
			."#wp-admin-bar-my-account .ab-sub-wrapper .ab-submenu li,"
			."#wpadminbar .quicklinks .menupop.hover ul li .ab-item,"
			."#wpadminbar .quicklinks .ab-empty-item:hover, #wpadminbar .shortlink-input:hover, body #wpadminbar .quicklinks .menupop ul.ab-sub-secondary, body #wpadminbar .quicklinks .menupop ul.ab-sub-secondary .ab-submenu";
echo mtrl_css_bgcolor($mtrlstr, "topbar-submenu-bg", "1.0") . "\n";


$mtrlstr = " #wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar .ab-top-menu>li:hover>.ab-item, #wpadminbar .ab-top-menu>li>.ab-item:focus, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, "
			."#wpadminbar .ab-submenu .ab-item, #wpadminbar .quicklinks .menupop ul li a, #wpadminbar .quicklinks .menupop ul li a strong, #wpadminbar .quicklinks .menupop.hover ul li a, #wpadminbar.nojs .quicklinks .menupop:hover ul li a,"
			."#wpadminbar .quicklinks .ab-empty-item, #wpadminbar .quicklinks a, #wpadminbar .shortlink-input,"
			."#wpadminbar .quicklinks .menupop ul li a:focus, #wpadminbar .quicklinks .menupop ul li a:focus strong, #wpadminbar .quicklinks .menupop ul li a:hover, #wpadminbar .quicklinks .menupop ul li a:hover strong, #wpadminbar .quicklinks .menupop.hover ul li a:focus, #wpadminbar .quicklinks .menupop.hover ul li a:hover, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover,"
			."#wpadminbar>#wp-toolbar a:focus span.ab-label, #wpadminbar>#wp-toolbar li.hover span.ab-label, #wpadminbar>#wp-toolbar li:hover span.ab-label";
echo mtrl_css_color($mtrlstr, "topbar-submenu-color", "1.0") . "\n";


$mtrlstr = " #wpadminbar .quicklinks .menupop.hover ul li a:hover";
echo mtrl_css_border_color($mtrlstr, "primary-color", "", "left") . "\n";
 
$mtrlstr = " #wpadminbar a.ab-item, #wpadminbar>#wp-toolbar span.ab-label, #wpadminbar>#wp-toolbar span.noticon,"
			."#wpadminbar #adminbarsearch:before, #wpadminbar .ab-icon:before, #wpadminbar .ab-item:before, "
			."#wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus, "
			."#wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label, #wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label, #wpadminbar>#wp-toolbar li.hover span.ab-label, body #wpadminbar .quicklinks .ab-item:hover .ab-icon:before, #wpadminbar li .ab-item:focus:before, #wpadminbar li a:focus .ab-icon:before, 
#wpadminbar li.hover .ab-icon:before, #wpadminbar li.hover .ab-item:before, 
#wpadminbar li:hover #adminbarsearch:before, 
#wpadminbar li:hover .ab-icon:before, #wpadminbar li:hover .ab-item:before,
#wpadminbar.mobile .quicklinks .hover .ab-icon:before, #wpadminbar.mobile .quicklinks .hover .ab-item:before";
echo mtrl_css_color($mtrlstr, "topbar-menu-color", "1.0") . "\n";

$mtrlstr = " body #wpadminbar #wp-admin-bar-user-info:hover a,"
			."body #wpadminbar .quicklinks .menupop.hover ul li a:hover"
			."";
echo mtrl_css_bgcolor($mtrlstr, "topbar-submenu-hover-bg", "1.0") . "\n";
echo mtrl_css_color($mtrlstr, "topbar-submenu-hover-color", "1.0") . "\n";


/*----------------------------------
 Floating Menu
-----------------------------------*/

echo " \n/* -- Floating menu -- */\n";
$mtrlstr = "body .fmenu__button--main, body .fmenu__button--child";
echo mtrl_css_background($mtrlstr, "floatingmenu-bg", "1.0") . "\n";

$mtrlstr = "body .fmenu__list .fmenu__child-icon, body .fmenu__list .fmenu__child-icon:before,body .fmenu__button--main, body .fmenu__button--child,body #mtrl-floatingmenu .fmenu__main-icon--resting, body #mtrl-floatingmenu .fmenu__main-icon--resting.dashicons-before:before, body #mtrl-floatingmenu .fmenu__main-icon--active, body #mtrl-floatingmenu .fmenu__main-icon--active.dashicons-before:before";
echo mtrl_css_color($mtrlstr, "floatingmenu-color", "1.0") . "\n";

?>