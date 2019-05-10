<?php 

foreach ($user['permissions'] as $first) {
     $tmp[$first['menu']['name']][] = array('page_name'=>$first['page_name'],'handle'=>$first['handle']);
}




//pr($user);  die;?>


<aside class="main-sidebar">
    <section class="sidebar">
	    <ul class="sidebar-menu" data-widget="tree">
	    	<li class="header nav-small-cap"></li>
	    	<li class=""><?php echo $this->Html->link('Dashboard',['controller' => 'Admins', 'action' => 'dashboard']); ?></li>

	    	<?php if(empty($user['permissions'])){ ?>
				<li class="treeview">
		         	<a href="#">
		         		<i class="mdi mdi-notification-clear-all "></i>
						    <span>Lead Managment</span>
	          		<span class="pull-right-container">
	          			<i class="fa fa-angle-right pull-right"></i>
	          		</span>
	        		</a>
	        		<ul class="treeview-menu">
	        			<li><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Agents',['controller' => 'Admins', 'action' => 'getAgent'],['escape' => false]); ?> </li>
						<li><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Add New Leads',['controller' => 'Admins', 'action' => 'addLead'],['escape' => false]);?></li>
						<li><?php echo $this->Html->link('<i class="mdi mdi-link-variant"></i><span>Assignment of leads</span>',['controller' => 'Admins', 'action' => 'assignLead'],['escape' => false]); ?></li>
	      				<li><?php echo $this->Html->link('<i class="mdi mdi-account"></i><span>View Leads</span>',['controller' => 'Admins', 'action' => 'getLead'],['escape' => false]); ?></li>
	      				<li><?php echo $this->Html->link('<i class="mdi mdi-account"></i><span>Today Followup</span>',['controller' => 'Admins', 'action' => 'todayFollow'],['escape' => false]); ?></li>
	      				<li><?php echo $this->Html->link('<i class="mdi mdi-account"></i><span>Retained Cases</span>',['controller' => 'Admins', 'action' => 'retainedCase'],['escape' => false]); ?></li>
				    </ul>
	      		</li>
	      		<li class="treeview">
		         	<a href="#">
		         		<i class="mdi mdi-notification-clear-all "></i>
					    <span>CustomerCare</span>
	          			<span class="pull-right-container">
	          				<i class="fa fa-angle-right pull-right"></i>
	          			</span>
	        		</a>
	        		<ul class="treeview-menu">
	        			<li><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Manage Case',['controller' => 'Admins', 'action' => 'manageCase'],['escape' => false]); ?> </li>
					</ul>
	      		</li>
			<?php }else{
				foreach ($tmp as $key => $value) { ?>
	          	<li class="treeview">
				  	<a href="#">
		         		<i class="mdi mdi-notification-clear-all"></i>
				  		<span><?php echo $key; ?></span>
		          		<span class="pull-right-container">
		          			<i class="fa fa-angle-right pull-right"></i>
		          		</span>
	        		</a>
	          		<ul class="treeview-menu">
	          			<?php foreach ($value as $data) { ?>
	          				<li ><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>'.$data['page_name'],['controller' => 'Admins', 'action' => $data['handle']],['escape' => false]); ?> 
		          			</li>
	          			<?php } ?>
	          		</ul>
				</li>
			<?php } } ?>
			<li class=""><?php echo $this->Html->link('Logout',['controller' => 'Users', 'action' => 'logout']); ?></li>
		</ul>
	</section>
</aside>