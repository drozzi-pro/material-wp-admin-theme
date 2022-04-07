	<script>		
		jQuery(document).ready(function()
			{

				function mtrl_find_online_users(){
					jQuery.ajax({
						type: 'POST',
						url: mtrlwid_ajax.mtrlwid_ajaxurl,
						data: {"action": "mtrlwid_ajax_online_total"},
						success: function(data)
								{
									jQuery(".onlinecount .count").html(data);
								}
					});
				}
				
				mtrl_find_online_users();
				
				setInterval(function(){
					mtrl_find_online_users();	
				}, 60000)
			});
				
	</script>
	<div class="onlinecount">
		<span class="count">...</span>
		<span class='onlinelabel'>Users<br>Online</span>
	</div>
