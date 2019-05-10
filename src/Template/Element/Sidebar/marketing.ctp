<?php
//echo "<pre>";print_r($user);
?>

<nav class="mainNav">
    <ul class="unstyled-list">
      <li class=""><?php echo $this->Html->link('Dashboard',['controller' => 'Admins', 'action' => 'dashboard']); ?></li>
      <li class=""><?php echo $this->Html->link('Lead Managment',['controller' => 'Admins', 'action' => 'addStaff']); ?> </li>
      <li class=""><?php echo $this->Html->link('Customer',['controller' => 'Admins', 'action' => 'setPermission']); ?></li>
      <li class=""><?php echo $this->Html->link('Case Processing',['controller' => 'Admins', 'action' => 'setPermission']); ?></li>
      <li class=""><?php echo $this->Html->link('Logout',['controller' => 'Users', 'action' => 'logout']); ?></li>
     
    </ul>
</nav>