<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- <link rel="icon" href="../images/favicon.ico"> -->

	    <title>IMMDESK - Dashboard</title>

			<?= $this->Html->css('bootstrap.css'); ?>
			<?= $this->Html->css('bootstrap-extend.css'); ?>
			<?= $this->Html->css('all-skins.css'); ?>
			<?= $this->Html->css('master_style.css'); ?>
			
			<?= $this->Html->css('morris.css'); ?>
			<?= $this->Html->css('datatables.min.css'); ?>

		<?= $this->Html->script('jquery-3.3.1.min.js'); ?>
		<?= $this->Html->script('jquery-ui.min.js'); ?>
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		
			
  	</head>
  	
  	<!-- hold-transition skin-blue sidebar-mini -->
  	<body class="skin-info fixed sidebar-mini sidebar-mini">
  		<div class="wrapper">
  			<?php echo $this->element('Header/header', array('user' => $key_data['loggedInUser']));  ?>
			<?php
				if($key_data['loggedInUser']['department_id'] == 1 ){
					echo $this->element('Sidebar/admin', array('user' => $key_data['loggedInUser'])); 
				}
				else if($key_data['loggedInUser']['department_id'] == 2 ){
					echo $this->element('Sidebar/caseProcessing', array('user' => $key_data['loggedInUser'])); 
				}
				else if($key_data['loggedInUser']['department_id'] == 3 ){
					echo $this->element('Sidebar/customerCare', array('user' => $key_data['loggedInUser'])); 
				}
				else if($key_data['loggedInUser']['department_id'] == 4 ){
					echo $this->element('Sidebar/account', array('user' => $key_data['loggedInUser'])); 
				}
				else if($key_data['loggedInUser']['department_id'] == 6 ){
					echo $this->element('Sidebar/marketing', array('user' => $key_data['loggedInUser'])); 
				}	
			?>
			<div class="content-wrapper">
				<?= $this->Flash->render() ?>
			<?= $this->fetch('content') ?>
			</div>			
		</div>

		<?= $this->Html->script('formatter.min.js'); ?>
		<?= $this->Html->script('jquery.formatter.min.js'); ?>

		<?= $this->Html->script('formatter.js'); ?>

		<?= $this->Html->script('bootstrap.js'); ?>
		<?= $this->Html->script('jquery.slimscroll.min.js'); ?>
		<?= $this->Html->script('template.js'); ?>
		<?= $this->Html->script('validation.js'); ?>
		<?= $this->Html->script('form-validation.js'); ?>

  	</body>
