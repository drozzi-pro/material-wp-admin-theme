<div class="mtrl-stats">

<script>		
	jQuery(document).ready(function(){
		function countrys_used_by_visitors(){
			jQuery.ajax({
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_country_type"},
					success: function(data)
							{
								jQuery(".mtrl_country_type").html(data);
							}
				});
		}
			countrys_used_by_visitors();
	
			setInterval(function(){
					countrys_used_by_visitors();
			}, 300000)


	        jQuery(document).on('click', "#mtrl_country_type_wp_dashboard .ui-sortable-handle", function () {
	                            if(!jQuery(this).parent().hasClass("closed")){
						jQuery(".mtrl_country_type").html("Loading...");
						countrys_used_by_visitors();
						//console.log("recall");
	                            }
	        });


	});
			
</script>

<div class="mtrl_country_type">Loading...</div>


</div>