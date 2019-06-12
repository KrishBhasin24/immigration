<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>IMMDESK - Dashboard</title>
		<?= $this->Html->css('bootstrap.css'); ?>
		<?= $this->Html->css('bootstrap-extend.css'); ?>
		<?= $this->Html->css('master_style.css'); ?>
		<?= $this->Html->css('_all-skins.css'); ?>
		<?= $this->Html->script('jquery-3.3.1.min.js'); ?>
		<?= $this->Html->script('jquery-ui.min.js'); ?>
	</head>
	<body class="hold-transition bg-img" style="background-image: url(./img/login_back.jpg)" data-overlay="4">
		<div class="container h-p100">
			<?= $this->Flash->render() ?>
			<?= $this->fetch('content') ?>
		</div>
	</body>
</html>