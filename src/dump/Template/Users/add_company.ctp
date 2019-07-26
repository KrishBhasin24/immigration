<h1>Test Form</h1>

<?php


foreach ($data as $value) {
  $parent[$value->id] = $value->name;
}
$main_parent = array(0=>'No Parent');
$parent = $main_parent+$parent;

  echo $this->Form->create('User', array('action' => 'addCompany'));
  echo $this->Form->select(
      'parent_id',
      $parent,
      ['empty' => 'Select one']
  );
  echo $this->Form->input('name');
  echo $this->Form->input('telephone');
  echo $this->Form->input('email', array('type' => 'text'));
  echo $this->Form->input('website', array('type' => 'text'));
  echo $this->Form->input('address', array('type' => 'text'));
  echo $this->Form->input('city', array('type' => 'text'));
  echo $this->Form->input('province', array('type' => 'text'));
  echo $this->Form->input('postal_code', array('type' => 'text'));
  echo $this->Form->input('country', array('type' => 'text'));
  

  echo $this->Form->submit();
  echo $this->Form->end();
?>