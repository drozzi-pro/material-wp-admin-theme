<div class="mtrl-wid-admin">

<script>		
	jQuery(document).ready(function(){
		function post_registrations_by_year(){
			jQuery.ajax(
						{
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_poststats"},
					success: function(data)
							{
								jQuery(".mtrl_poststats").html(data);
							}
						});
		}
		post_registrations_by_year();
			setInterval(function(){
					post_registrations_by_year();
			}, 300000)
			
	        jQuery(document).on('click', "#poststats_wp_dashboard .ui-sortable-handle", function () {
	                            if(!jQuery(this).parent().hasClass("closed")){
						jQuery(".mtrl_poststats").html("Loading...");
						post_registrations_by_year();
						//console.log("recall");
	                            }
	        });
	});
			
</script>


<div class="mtrl_poststats">
	
</div>


</div>