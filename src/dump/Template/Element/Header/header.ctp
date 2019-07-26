<?php //pr($user);die; ?>

<header class="main-header">

	  <?php echo $this->Html->link("<div class='logo-lg'><span class='light-logo'>".$this->Html->image("logo.gif")."</span></div>","/dashboard",['escape' => false,'class'=>'logo']); ?>


    <nav class="navbar navbar-static-top">
    	<div>
			  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			  </a>
		  </div>
		<div class="navbar-custom-menu">
        	<ul class="nav navbar-nav">
        		<li class="dropdown user user-menu">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		               <?php echo $this->Html->image("4.png",['class'=>'user-image rounded-circle']); ?>
		            </a>
		            <ul class="dropdown-menu animated flipInY">
		              <!-- User image -->
			            <li class="user-header bg-img" style="background-image: url(../img/user-info.jpg)" data-overlay="3">
							<div class="flexbox align-self-center">		
								<?php echo $this->Html->image("4.png",['class'=>'float-left rounded-circle']); ?>					  
								<h4 class="user-name align-self-center">
									<!-- <span>Samuel Brus</span>
									<small>samuel@gmail.com</small> -->
									<span><?php echo $user['first_name']." ".$user['last_name']; ?></span>
									<small><?php echo $user['email']; ?></small>
								</h4>
							</div>
			            </li>
		              	<li class="user-body">
						    <div class="dropdown-divider"></div>
							
							<?php echo $this->Html->link('<i class="ion ion-settings"></i> Account Settings',['controller' => 'Users', 'action' => 'account'],['class'=>'dropdown-item','escape' => false]); ?>
							<div class="dropdown-divider"></div>
							
							<?php echo $this->Html->link('<i class="ion-log-out"></i>Logout',['controller' => 'Users', 'action' => 'logout'],['escape' => false],['class'=>'dropdown-item']); ?>
							<div class="dropdown-divider"></div>
							
		             	</li>
		            </ul>
		        </li>	
        		<li class="dropdown notifications-menu">
		            
	            </li>
        	</ul>
    	</div>
    </nav>
</header>
