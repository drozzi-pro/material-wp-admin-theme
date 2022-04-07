<div class="mtrl-stats">

<script>		
	jQuery(document).ready(function(){
		function mtrl_user_type_guest_or_registered(){
			jQuery.ajax({
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_user_type"},
					success: function(data)
							{
								jQuery(".mtrl_user_type").html(data);
							}
				});
		}
			mtrl_user_type_guest_or_registered();
	
			setInterval(function(){
					mtrl_user_type_guest_or_registered();
			}, 300000)
			
	        jQuery(document).on('click', "#mtrl_user_type_wp_dashboard .ui-sortable-handle", function () {
	                            if(!jQuery(this).parent().hasClass("closed")){
						jQuery(".mtrl_user_type").html("Loading...");
						mtrl_user_type_guest_or_registered();
						//console.log("recall");
	                            }
	        });
	});
			
</script>

<div class="mtrl_user_type">Loading...</div>


</div>