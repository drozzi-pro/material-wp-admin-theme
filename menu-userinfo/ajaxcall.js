jQuery(document).ready(function(){
		function mtrl_menu_userinfo_ajax(){
			jQuery.ajax({
					type: 'POST',
					url: mtrl_wp_stats_ajax.mtrl_wp_stats_ajaxurl,
					data: {"action": "mtrl_wp_stats_ajax_online_total"},
					success: function(data)
							{
								//console.log("Hello world"+data);
								//jQuery("#adminmenuback").append(data);
								jQuery("#adminmenuwrap").prepend(data);
								//jQuery(".mtrl_online_total").html(data);
								//console.log(window.innerHeight);
								jQuery("#adminmenu").height(window.innerHeight - 100);
								var links = jQuery("#wp-admin-bar-user-actions").html();
								//console.log(links);
								jQuery(".mtrl-menu-profile-links .all-links").html(links);
								jQuery("#wp-admin-bar-my-account").remove();
							}
				});
		}
			mtrl_menu_userinfo_ajax();
	});