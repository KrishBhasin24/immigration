<?php 
foreach ($user['permissions'] as $first) {
     $tmp[$first['menu']['name']][] = array('page_name'=>$first['page_name'],'handle'=>$first['handle']);
}


//pr($tmp);

//pr($user['permissions'] );
//die; ?>


<aside class="main-sidebar">
    <section class="sidebar">
    	<ul class="sidebar-menu" data-widget="tree">
    		
    		<li class="header nav-small-cap"></li>
    		<li class=""><?php echo $this->Html->link('<i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span>',['controller' => 'Admins', 'action' => 'dashboard'],['escape' => false]); ?></li>
    		
    		<?php if(empty($user['permissions'])){ ?>
	        <li class="treeview">
	         	<a href="#">
	         		<i class="mdi mdi-notification-clear-all"></i>
					    <span>Company Setup</span>
            	<span class="pull-right-container">
          			<i class="fa fa-angle-right pull-right"></i>
          		</span>
        		</a>
        		<ul class="treeview-menu">
        			<li ><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Companies',['controller' => 'Admins', 'action' => 'getAllCompanies'],['escape' => false]); ?> </li>
    					<li ><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Staff',['controller' => 'Admins', 'action' => 'getAllStaff'],['escape' => false]); ?></li>
    					<!-- <li ><?php //echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Department',['controller' => 'Admins', 'action' => 'getAllDepartment'],['escape' => false]); ?></li> -->
					   <!-- <li class=""><?php //echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Manage Client',['controller' => 'Admins', 'action' => 'manageClient'],['escape' => false]); ?></li> -->
					
        		</ul>
      		</li>
      		<li class="treeview">
	         	<a href="#">
	         		<i class="mdi mdi-notification-clear-all "></i>
					    <span>General Setup</span>
          		<span class="pull-right-container">
          			<i class="fa fa-angle-right pull-right"></i>
          		</span>
        		</a>
        		<ul class="treeview-menu">
        			<li><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Manage Status',['controller' => 'Admins', 'action' => 'getLeadStatus'],['escape' => false]); ?> </li>
    					<li><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Immigration Category',['controller' => 'Admins', 'action' => 'getCategory'],['escape' => false]);?></li>
    					<li><?php echo $this->Html->link('<i class="mdi mdi-link-variant"></i><span>Links Setup</span>',['controller' => 'Admins', 'action' => 'getLink'],['escape' => false]); ?></li>
      			<!-- 	<li><?php //echo $this->Html->link('<i class="mdi mdi-account"></i><span>Client Setup</span>',['controller' => 'Admins', 'action' => 'getClient'],['escape' => false]); ?></li> -->
				    </ul>
      		</li>
      		<li class="treeview">
	         	<a href="#">
	         		<i class="mdi mdi-notification-clear-all "></i>
					    <span>Lead Managment</span>
          		<span class="pull-right-container">
          			<i class="fa fa-angle-right pull-right"></i>
          		</span>
        		</a>
        		<ul class="treeview-menu">
        		<!-- 	<li><?php //echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Agents',['controller' => 'Admins', 'action' => 'getAgent'],['escape' => false]); ?> </li> -->
    					<li><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Add New Leads',['controller' => 'Admins', 'action' => 'addLead'],['escape' => false]);?></li>
    					<!-- <li><?php //echo $this->Html->link('<i class="mdi mdi-link-variant"></i><span>Assignment of leads</span>',['controller' => 'Admins', 'action' => 'assignLead'],['escape' => false]); ?></li> -->
      				<li><?php echo $this->Html->link('<i class="mdi mdi-account"></i><span>View Leads</span>',['controller' => 'Admins', 'action' => 'getLead'],['escape' => false]); ?></li>
      				<li><?php echo $this->Html->link('<i class="mdi mdi-account"></i><span>View All Leads</span>',['controller' => 'Admins', 'action' => 'getAllLead'],['escape' => false]); ?></li>
      				
				    </ul>
      		</li>
      		<li class="treeview">
	         	<a href="#">
	         		<i class="mdi mdi-notification-clear-all "></i>
					    <span>Account</span>
          		<span class="pull-right-container">
          			<i class="fa fa-angle-right pull-right"></i>
          		</span>
        		</a>
        		<ul class="treeview-menu">
        			<li><?php echo $this->Html->link('<i class="mdi mdi-toggle-switch-off"></i>Manage Lead',['controller' => 'Admins', 'action' => 'accountLead'],['escape' => false]); ?> </li>
				    </ul>
      		</li>
      		<li class="treeview">
	         	<a href="#">
	         		<i class="mdi mdi-notification-clear-all "></i>
					    <span>Case Processing</span>
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
      		
      		<li><?php echo $this->Html->link('<i class="mdi mdi-directions"></i><span>Logout</span>',['controller' => 'Users', 'action' => 'logout'],['escape' => false]); ?></li>
      		

    	</ul>
	</section>
</aside>

