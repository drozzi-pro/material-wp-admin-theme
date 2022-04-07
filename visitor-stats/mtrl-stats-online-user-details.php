<script>		
	jQuery(document).ready(function()
		{

			function mtrl_find_online_user_details(){
				jQuery.ajax({
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_visitors_page"},
					success: function(data)
							{
								jQuery(".mtrl_visitors_details").html(data);
							}
				});	
			}

			mtrl_find_online_user_details();
			
			setInterval(function(){
				mtrl_find_online_user_details();
			}, 300000)
	});
			
</script>

	<div class="mtrl_visitors_details"></div>
