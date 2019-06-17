<?php 
foreach ($key_data['department'] as $val) {
 $department[$val->id] = $val->name;
}
 ?>
 <div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto w-p50">
            <h3 class="page-title">Manage Lead Status</h3>
        </div>
    </div>
</div>
<section class="content">       
    <div class="row">
    	<div class="col-lg-9 col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Edit Status</h4>
					<?php echo $this->Form->create($key_data['leadStatus'], array('action' => 'changeLeadStatus','controller'=>'Admins','class'=>'form-horizontal form-element','novalidate')); ?>
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
		                	<?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'getImmStatus'],['class'=>'btn btn-danger','escape' => false]); ?>
		                    <?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success btn-primary float-right','escape' => false)); ?>
		                </div>
		            <?php echo $this->Form->end(); ?>
	            </div>
	        </div>
	    </div>
	</div>
</section>