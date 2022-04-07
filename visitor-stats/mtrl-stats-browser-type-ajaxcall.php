<div class="mtrl-stats">

<script>		
	jQuery(document).ready(function(){
		function browsers_used_by_visitors(){

			jQuery.ajax({
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_browser_type"},
					success: function(data)
							{
								jQuery(".mtrl_browser_type").html(data);
							}
				});
		}
			browsers_used_by_visitors();
	
			setInterval(function(){
					browsers_used_by_visitors();
			}, 300000)
	

	        jQuery(document).on('click', "#mtrl_browser_type_wp_dashboard .ui-sortable-handle", function () {
	                            if(!jQuery(this).parent().hasClass("closed")){
						jQuery(".mtrl_browser_type").html("Loading...");
						browsers_used_by_visitors();
						//console.log("recall");
	                            }
	        });

	});




			
</script>

<div class="mtrl_browser_type">Loading...</div>


</div>