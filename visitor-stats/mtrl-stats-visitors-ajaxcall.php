<div class="mtrl-stats">

<script>		
	jQuery(document).ready(function(){
			setInterval(function(){
				jQuery.ajax(
						{
					type: 'POST',
					url: mtrlwid_ajax.mtrlwid_ajaxurl,
					data: {"action": "mtrlwid_visitors2"},
					success: function(data)
							{
								jQuery(".visitors2").html(data);
							}
						});	
			}, 300000)
	});
			
</script>


<div class="visitors2"></div>


</div>