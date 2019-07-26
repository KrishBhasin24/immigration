<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto w-p50">
            <h2 class="page-title">Add Company</h2>
        </div>
    </div>
</div>
<section class="content">       
  <div class="row">
    <div class="col-xl-6 col-lg-12">
          <!-- Horizontal Form -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Horizontal Form</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal form-element">
              <div class="box-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="ml-auto col-sm-10">
                    <div class="checkbox">
            <input type="checkbox" id="Remember">
            <label for="Remember">Remember me</label> 
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
  </div>
</section>



<?php

//pr($key_data);die;

 ?>




<?php

/*
foreach ($data as $value) {
  $parent[$value->id] = $value->name;
}
$main_parent = array(0=>'No Parent');
$parent = $main_parent+$parent;
*/
  /*echo $this->Form->create('User', array('action' => 'addCompany'));
  echo $this->Form->select(
      'parent_id',
      $parent,
      ['empty' => 'Select one']
  );
  echo $this->Form->control('name');
  echo $this->Form->control('telephone');
  echo $this->Form->control('email', array('type' => 'text'));
  echo $this->Form->control('website', array('type' => 'text'));
  echo $this->Form->control('address', array('type' => 'text'));
  echo $this->Form->control('city', array('type' => 'text'));
  echo $this->Form->control('province', array('type' => 'text'));
  echo $this->Form->control('postal_code', array('type' => 'text'));
  echo $this->Form->control('country', array('type' => 'text'));
  

  echo $this->Form->submit();
  echo $this->Form->end();*/
?>