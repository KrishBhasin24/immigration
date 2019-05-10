<?php //pr($user); ?>

<nav class="mainNav">
    <ul class="unstyled-list">
    	 <li class=""><?php echo $this->Html->link('Dashboard',['controller' => 'Admins', 'action' => 'dashboard']); ?></li>
		<?php
		//echo "<pre>";print_r($user['permissions']);
		if(!empty($user['permissions'])){
			foreach ($user['permissions'] as $pages) { ?>
		      	<li class="">
		      		<?php echo $this->Html->link($pages['page_name'],['controller' => 'Admins', 'action' => $pages['handle']]); ?>
	      		</li>
		<?php } }
		else{ ?>
		      <li class=""><?php echo $this->Html->link('Task Managment',['controller' => 'Admins', 'action' => 'addTask']); ?> </li>
		      <li class=""><?php echo $this->Html->link('Leads Management',['controller' => 'Admins', 'action' => 'addLead']); ?></li>
		      <li class=""><?php echo $this->Html->link('Account',['controller' => 'Admins', 'action' => 'viewAccount']); ?></li>
		      <li class=""><?php echo $this->Html->link('Customer Care',['controller' => 'Admins', 'action' => 'manageClient']); ?></li>
		<?php }?>
		<li class=""><?php echo $this->Html->link('Logout',['controller' => 'Users', 'action' => 'logout']); ?></li>
	</ul>
</nav>