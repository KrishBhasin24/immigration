<?php

//pr($key_data);

 ?>

<!--  <div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto w-p50">
            <h3 class="page-title">Manage Lead Status</h3>
        </div>
    </div>
</div> -->
<section class="content">       
    <div class="row">
        <!-- Head Content -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
              <div class="no-shrink py-30">
                <span class="mdi mdi-clipboard-text font-size-50"></span>
              </div>

              <div class="py-30 bg-white text-dark">
                <div class="font-size-30 countnm"><?php echo $key_data['status_count']; ?></div>
                <span>Total Lead Status</span>
              </div>
            </div>
        </div>
        <div class="col-12 col-lg-9">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Lead Status</h3>
                   <?php echo $this->Html->link('Add Status',['controller' => 'Admins', 'action' => 'getAllStaff'],['data-toggle'=>'modal','data-target'=>'#status','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]); ?>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="lead" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <!-- <th>Department</th>
                                    <th>Status Message</th>
                                    <th>Next Step Message</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($key_data['status_data'] as $status) { ?>
                                    <tr>
                                        <td><?php echo $status->lead_status; ?></td>
                                        <!-- <td><?php echo $status->department->name; ?></td>
                                        <td><?php echo $status->status_message; ?></td>
                                        <td><?php echo $status->next_step_message; ?></td> -->
                                        <td><?php echo $this->Html->link('<i class="fa fa-edit"></i>Edit',['controller' => 'Admins', 'action' => 'changeLeadStatus',$status->id],['class'=>'btn btn-rounded btn-info mb-5','escape' => false]); ?></td>	
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
foreach ($key_data['department'] as $val) {
 $department[$val->id] = $val->name;
}
 ?>

<div class="modal center-modal fade" id="status" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Status</h5>
                <a type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <?php echo $this->Form->create('Status', array('action' => 'changeLeadStatus','controller'=>'Admins','class'=>'form-horizontal form-element','novalidate')); ?>
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
		                            <div class="col-md-12">
		                                <div class="form-group">
                                            <div class="controls">
		                                      <?php echo $this->Form->control('lead_status',array('label'=>'Lead Status<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
                                            </div>
		                                </div>
		                            </div>
                                  	<!-- <div class="col-md-6">
                                    	<div class="form-group">
                                        	<div class="input text">
                                        		<label>Department</label>
                                       			<?php echo $this->Form->select('department_id',$department,['empty' => ' ','class'=>'form-control']); ?>
                                    		</div>
                                    	</div>
                                  	</div> -->
                                </div>
                                <!-- <div class="row">
                                	<div class="col-md-6">
	                                    <div class="form-group">
	                                        <?php echo $this->Form->control('status_message',array('class'=>'form-control','type'=>'textarea')); ?>
	                                    </div>
                                  	</div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <?php echo $this->Form->control('next_step_message',array('class'=>'form-control','type'=>'textarea')); ?>
                                        </div>
                                    </div>
                                </div> -->
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
