<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script type="text/javascript">
	$(document).ready(function() {	
		$( "#success" ).click(function(event)
		{
			$("#success").fadeOut('slow');  
		});
	}); 
</script>
<div id="success" class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success alerttop" ><?= $message ?></div>
