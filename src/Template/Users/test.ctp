<h1>Test Form</h1>

<?php
  echo $this->Form->create('User', array('action' => 'test'));
  echo $this->Form->input('username');
  echo $this->Form->input('password', array('type' => 'text'));
  echo $this->Form->input('first_name', array('type' => 'text'));
  echo $this->Form->input('last_name', array('type' => 'text'));
  echo $this->Form->input('email', array('type' => 'text'));
  echo $this->Form->input('phone', array('type' => 'text'));
  echo $this->Form->input('address', array('type' => 'text'));
  echo $this->Form->submit();
  echo $this->Form->end();
?>