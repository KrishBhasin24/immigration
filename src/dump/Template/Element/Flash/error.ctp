<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<script type="text/javascript">
	$(document).ready(function() {	
		$( "#error" ).click(function(event)
		{
			$("#error").fadeOut('slow');  
		});
	}); 
</script>

<div id="error" class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger alerttop" ><?= $message ?></div>