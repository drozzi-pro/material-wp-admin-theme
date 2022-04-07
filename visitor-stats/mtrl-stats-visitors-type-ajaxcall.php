<div class="mtrl-stats">

<script>		
	jQuery(document).ready(function(){
		function online_today_visitors(){
			jQuery.ajax({
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_visitors_type"},
					success: function(data)
							{
								jQuery(".mtrl_visitors_type").html(data);
							}
				});
		}
			online_today_visitors();
	
			setInterval(function(){
					online_today_visitors();
			}, 300000)


	        jQuery(document).on('click', "#mtrl_visitors_type_wp_dashboard .ui-sortable-handle", function () {
	                            if(!jQuery(this).parent().hasClass("closed")){
						jQuery(".mtrl_visitors_type").html("Loading...");
						online_today_visitors();
						//console.log("recall");
	                            }
	        });			
	});
			
</script>

<div class="mtrl_visitors_type">Loading...</div>


</div>