<?php //pr($key_data['userData']); ?>

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

<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto w-p50">
            <h3 class="page-title">Staff Section</h3>
        </div>
    </div>
</div>
<section class="content">       
    <div class="row">
    	<div class="col-lg-9 col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Edit Staff User</h4>	

					<?php 
					echo $this->Form->create($key_data['userData'], ['class'=> 'formValidation','novalidate','url' => ['controller'=>'Admins','action'=>'editStaff']]); ?>
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
											<label>Companies<span class="text-danger">*</span></label>
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
										<?php echo $this->Form->input('first_name',array('label'=>'First Name<span class="text-danger">*</span>','escape'=>false,'class'=>'form-control','placeholder'=>'First name','required')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->input('last_name',array('label'=>'Last Name<span class="text-danger">*</span>','escape'=>false,'class'=>'form-control','placeholder'=>'Last name','required')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->input('email',array('label'=>'Email<span class="text-danger">*</span>','escape'=>false,'class'=>'form-control','placeholder'=>'Email','required')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->input('phone',array('class'=>'form-control','placeholder'=>'Phone')); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->input('address',array('class'=>'form-control','placeholder'=>'Address')); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->input('city',array('class'=>'form-control','placeholder'=>'City')); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->input('province',array('class'=>'form-control','placeholder'=>'Province')); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->input('postal_code',array('class'=>'form-control','placeholder'=>'PostalCode')); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="input text">
										<label>Country</label>
										<?php echo $this->Form->select('country',$Countries,['empty' => ' ','class'=>'form-control']);?>	
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->input('in_time',array('class'=>'form-control','placeholder'=>'Intime')); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->input('out_time',array('class'=>'form-control','placeholder'=>'Outtime')); ?>
								</div>
							</div>
						</div>
						
					</div>
					<div class="box-footer">
						  
					  	<?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'getAllStaff'],['class'=>'btn btn-danger','escape' => false]); ?>
						<?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success pull-right','escape' => false)); ?>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

