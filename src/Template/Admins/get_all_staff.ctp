<?php //pr($key_data['department']); ?>


<script type="text/javascript">
  /*  $(document).ready(function() { 
        
        $('#search').on('keyup', function(e){
            var command = $(this).val();
            if(command.length > 5 ){
                
            }
            
        });
    });  */
</script>
<!-- <input type="text" name="test" id="search"> -->

<section class="content">       
    <div class="row">
        <!-- Head Content -->
        <div class="col-xl-5 col-md-6 col-12">
            <div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
              <div class="no-shrink py-30">
                <span class="mdi mdi-account font-size-50"></span>
              </div>

              <div class="py-30 bg-white text-dark">
                <div class="font-size-30 countnm"><?php echo $key_data['staff_count']; ?></div>
                <span>Total Employee</span>
              </div>
            </div>
        </div>
        
<!-- Main Content -->
        
        <div class="col-12 col-lg-9">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Employee List</h3>
                   <?php echo $this->Html->link('Add Staff',['controller' => 'Admins', 'action' => 'getAllStaff'],['data-toggle'=>'modal','data-target'=>'#staff','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]); ?>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="tickets" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Branch</th>
                                    <th>Country</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($key_data['staff'] as $staff) { ?>
                                    <tr>
                                        <td><?php echo $staff->first_name."  ".$staff->last_name; ?></td>
                                        <td><?php echo $staff->company->name; ?></td>
                                        <td><?php echo $staff->country; ?></td>
                                        <td><?php echo $staff->email; ?></td>
                                        <td><?php echo $staff->department->name; ?></td>
                                        <td> 
                                            <div class="btn-group mb-5">
                                                <span  class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</span>
                                                <div class="dropdown-menu">
                                                    <?php echo $this->Html->link('Set Permission',['controller' => 'Admins', 'action' => 'setPermission',$staff->id],['class'=>'dropdown-item','escape' => false]); ?>
                                                    <div class="dropdown-divider"></div>
                                                    <?php echo $this->Html->link('Edit',['controller' => 'Admins', 'action' => 'editStaff',$staff->id],['class'=>'dropdown-item','escape' => false]); ?>
                                                    <div class="dropdown-divider"></div>
                                                    <?php echo $this->Html->link('Delete',['controller' => 'Admins', 'action' => 'deleteStaff',$staff->id],['class'=>'dropdown-item','escape' => false]); ?>
                                                </div>
                                            </div>
                                        </td> 
                                    </tr>   
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Department List</h3>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="tickets" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($key_data['department'] as $dep) { ?>
                                    <tr>
                                        <td><?php echo $dep['id']; ?></td>
                                        <td><?php echo $dep['name']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- content-wrpper div close -->
</div>

<!-- content-wrpper div close -->
<?php 
foreach ($key_data['companies'] as $val){
    $companies[$val->id] = $val->name;
}

foreach ($key_data['department'] as $val) {
 $department[$val->id] = $val->name;
}
foreach ($key_data['Countries'] as $val){
    $Countries[$val->name] = $val->name;
}
 ?>


<div class="modal center-modal fade" id="staff" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Staff</h5>
                <a type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <?php echo $this->Form->create('User', array('url' =>'/admins/addStaff','class'=>'form-horizontal form-element','novalidate')); ?>
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <div class="input text">
                                                    <label>Department<span class="text-danger">*</span></label>
                                                    <?php echo $this->Form->select('department_id',$department,['empty' => ' ','class'=>'form-control','required']);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <div class="input text">
                                                    <label>Company<span class="text-danger">*</span></label>
                                                    <?php echo $this->Form->select('company_id',$companies,['empty' => ' ','class'=>'form-control','required']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                
                                                <?php echo $this->Form->control('first_name',array('label'=>'First Name<span class="text-danger">*</span>','escape'=>false,'class'=>'form-control','required','autocomplete'=>'off')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <?php echo $this->Form->control('last_name',array('label'=>'Last Name<span class="text-danger">*</span>','escape'=>false,'class'=>'form-control','type'=>'text','required')); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <?php echo $this->Form->control('email',array('label'=>'Email<span class="text-danger">*</span>','escape'=>false,'class'=>'form-control','type'=>'email','required','autocomplete'=>'off')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <?php echo $this->Form->control('password',array('label'=>'Password<span class="text-danger">*</span>','escape'=>false,'class'=>'form-control','required','autocomplete'=>'off')); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <?php echo $this->Form->control('address',array('class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('city',array('class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('province',array('class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <?php echo $this->Form->control('postal_code',array('class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <?php echo $this->Form->control('phone',array('class'=>'form-control','type'=>'text')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <div class="input text">
                                                <label>Country</label>
                                                <?php echo $this->Form->select('country',$Countries,['empty' => ' ','class'=>'form-control']);?>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <?php echo $this->Form->control('in_time',array('class'=>'form-control','type'=>'text')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('out_time',array('class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="c-inputs-stacked">
                                                <?php echo $this->Form->checkbox('saturday', ['value' => 1,'id'=>'sat']); ?>
                                                <label for="sat" class="block">Saturday</label>
                                                <?php  echo $this->Form->checkbox('sunday', ['value' => 1,'id'=>'sun']);  ?>
                                                <label for="sun" class="block">Sunday</label>
                                            </div>
                                        </div>
                                      
                                    </div>
                                  
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-uniform">
                    <?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success btn-primary float-right','escape' => false)); ?>
                </div>
            <?php echo $this->Form->end(); ?>
        </div>
      </div>
</div>




<?= $this->Html->script('popper.min.js'); ?>

<?= $this->Html->script('datatables.min.js'); ?>
<?= $this->Html->script('data-table.js'); ?>
<?= $this->Html->script('custome.js'); ?>


<?php

//pr($key_data);


 ?>

