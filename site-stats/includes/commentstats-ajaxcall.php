<div class="mtrl-wid-admin">

<script>		
	jQuery(document).ready(function(){

			function comment_stats_by_year(){
				jQuery.ajax(
						{
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_commentstats"},
					success: function(data)
							{
								jQuery(".mtrl_commentstats").html(data);
							}
						});	
			}
			comment_stats_by_year();
			setInterval(function(){
				comment_stats_by_year();
			}, 300000)
			
	        jQuery(document).on('click', "#commentstats_wp_dashboard .ui-sortable-handle", function () {
	                            if(!jQuery(this).parent().hasClass("closed")){
						jQuery(".mtrl_commentstats").html("Loading...");
						comment_stats_by_year();
						//console.log("recall");
	                            }
	        });
	});
			
</script>


<div class="mtrl_commentstats">
	
</div>


</div>