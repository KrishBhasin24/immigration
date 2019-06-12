<?php 
foreach ($user['permissions'] as $first) {
     $tmp[$first['menu']['name']][] = array('page_name'=>$first['page_name'],'handle'=>$first['handle']);
}

$actual_link = "$_SERVER[REQUEST_URI]";
$link =  str_replace("/immigration/admins/", "",$actual_link);
?>


<aside class="main-sidebar">
    <section class="sidebar">
	    <ul class="sidebar-menu" data-widget="tree">
	    	<li class="header nav-small-cap"></li>
	    	<?php if(strpos($link, 'dashboard') !== false ){ $Dashboardclass = "active"; } else{$Dashboardclass = "";} ?>
	    	<li class="<?php echo $Dashboardclass; ?>"><?php echo $this->Html->link('<i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span>',['controller' => 'Admins', 'action' => 'dashboard'],['escape' => false]); ?></li>

	    	<?php if(empty($user['permissions'])){ ?>
	    		<?php
		          if(strpos($link, 'add-lead') !== false || strpos($link, 'get-lead') !== false || strpos($link, 'edit-lead') !== false || strpos($link, 'manage-charges') !== false || strpos($link, 'payment-plan') !== false  || strpos($link, 'case-assign') !== false || strpos($link, 'get-all-lead') !== false  ){ $Leadclass = "active menu-open"; }
		          else{$Leadclass = "";}
		        ?>
				<li class="treeview <?php echo $Leadclass; ?>">
		         	<a href="#">
		         		<i class="mdi mdi-notification-clear-all "></i>
					    <span>Lead Managment</span>
		          		<span class="pull-right-container">
		          			<i class="fa fa-angle-right pull-right"></i>
		          		</span>
	        		</a>
	        		<ul class="treeview-menu">
	        			<?php
			                if(strpos($link, 'add-lead') !== false   ){ $AddLeadclass = "active"; }
			                else{$AddLeadclass = "";}
			              ?>
	        			<li class="<?php echo $AddLeadclass; ?>"><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Add New Leads',['controller' => 'Admins', 'action' => 'addLead'],['escape' => false]);?></li>
	        			<?php
			                if(strpos($link, 'get-lead') !== false || strpos($link, 'edit-lead') !== false || strpos($link, 'manage-charges') !== false || strpos($link, 'payment-plan') !== false  || strpos($link, 'case-assign') !== false ){ $ViewLeadclass = "active"; }
			                else{$ViewLeadclass = "";}
		              	?>
						<li class="<?php echo $ViewLeadclass; ?>"><?php echo $this->Html->link('<i class="mdi mdi-account"></i><span>View Leads</span>',['controller' => 'Admins', 'action' => 'getLead'],['escape' => false]); ?></li>
	      			</ul>
	      		</li>
	      		<?php
		          if(strpos($link, 'account-lead') !== false || strpos($link, 'manage-receipt') !== false || strpos($link, 'change-receipt') !== false || strpos($link, 'change-refund') !== false  ){ $Accountclass = "active menu-open"; }
		          else{$Accountclass = "";}
		        ?>
	      		<li class="treeview <?php echo $Accountclass; ?>">
		         	<a href="#">
		         		<i class="mdi mdi-notification-clear-all "></i>
						    <span>Account</span>
	          		<span class="pull-right-container">
	          			<i class="fa fa-angle-right pull-right"></i>
	          		</span>
	        		</a>
	        		<ul class="treeview-menu">
	        			<li class="<?php echo $Accountclass; ?>"><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Manage Lead',['controller' => 'Admins', 'action' => 'accountLead'],['escape' => false]); ?> </li>
					    </ul>
	      		</li>
	      		<?php
		          if(strpos($link, 'manage-case') !== false || strpos($link, 'edit-case') !== false  ){ $Caseclass = "active menu-open"; }
		          else{$Caseclass = "";}
		        ?>
	      		<li class="treeview <?php echo $Caseclass; ?>">
		         	<a href="#">
		         		<i class="mdi mdi-notification-clear-all "></i>
					    <span>Case Processing</span>
	          			<span class="pull-right-container">
	          				<i class="fa fa-angle-right pull-right"></i>
	          			</span>
	        		</a>
	        		<ul class="treeview-menu">
	        			<li class="<?php echo $Caseclass; ?>"><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Manage Case',['controller' => 'Admins', 'action' => 'manageCase'],['escape' => false]); ?> </li>
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
			<li><?php echo $this->Html->link('<i class="mdi mdi-directions"></i><span>Logout</span>',['controller' => 'Users', 'action' => 'logout'],['escape' => false]); ?></li>
		</ul>
	</section>
</aside>