<div class="mtrl-wid-admin">

<script>		
	jQuery(document).ready(function(){
		function page_registrations_by_year(){
			jQuery.ajax(
						{
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_pagestats"},
					success: function(data)
							{
								jQuery(".mtrl_pagestats").html(data);
							}
						});
		}
		page_registrations_by_year();
			setInterval(function(){
				page_registrations_by_year();	
			}, 300000)
			
	        jQuery(document).on('click', "#pagestats_wp_dashboard .ui-sortable-handle", function () {
	                            if(!jQuery(this).parent().hasClass("closed")){
						jQuery(".mtrl_pagestats").html("Loading...");
						page_registrations_by_year();
						//console.log("recall");
	                            }
	        });
	});
			
</script>


<div class="mtrl_pagestats">
	
</div>


</div>