<?php
//echo "<pre>";print_r($user);
?>

<nav class="mainNav">
    <ul class="unstyled-list">
      <li class=""><?php echo $this->Html->link('Dashboard',['controller' => 'Admins', 'action' => 'dashboard']); ?></li>
      <li class=""><?php echo $this->Html->link('Add Staff',['controller' => 'Admins', 'action' => 'addStaff']); ?> </li>
      <li class=""><?php echo $this->Html->link('Permission',['controller' => 'Admins', 'action' => 'setPermission']); ?></li>
      <li class=""><?php echo $this->Html->link('Useful Link',['controller' => 'Admins', 'action' => 'setPermission']); ?></li>
      <li class=""><?php echo $this->Html->link('Manage Client',['controller' => 'Admins', 'action' => 'manageClient']); ?></li>
    </ul>
</nav>