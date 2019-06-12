<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- <link rel="icon" href="../images/favicon.ico"> -->

	    <title>IMMDESK - Dashboard</title>
		<?= $this->Html->css('print.css'); ?>
		<?= $this->Html->script('jquery-3.3.1.min.js'); ?>
	</head>
  	  	<body>
  		<div class="wrapper">
  			<div class="">
				<?= $this->Flash->render() ?>
			<?= $this->fetch('content') ?>
			</div>			
		</div>
	</body>