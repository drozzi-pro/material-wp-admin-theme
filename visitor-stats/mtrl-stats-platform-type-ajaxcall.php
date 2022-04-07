<div class="mtrl-stats">

<script>		
	jQuery(document).ready(function(){
		function platforms_used_by_visitors(){
			jQuery.ajax({
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_platform_type"},
					success: function(data)
							{
								jQuery(".mtrl_platform_type").html(data);
							}
				});
		}
			platforms_used_by_visitors();
	
			setInterval(function(){
					platforms_used_by_visitors();
			}, 300000)

			
	        jQuery(document).on('click', "#mtrl_platform_type_wp_dashboard .ui-sortable-handle", function () {
	                            if(!jQuery(this).parent().hasClass("closed")){
						jQuery(".mtrl_platform_type").html("Loading...");
						platforms_used_by_visitors();
						//console.log("recall");
	                            }
	        });

	});
			
</script>

<div class="mtrl_platform_type">Loading...</div>


</div>