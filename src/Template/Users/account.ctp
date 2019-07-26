
<?php //pr($key_data['loggedInUser']);die; ?>
<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'dashboard'],['class'=>'btn btn-danger','escape' => false]); ?>
		</div>
	</div>
</div>
<section class="content">       
    <div class="row">
    	<div class="col-lg-12 col-12">
			<div class="box">
				<div class="box-header with-border">
					<?php echo $this->Form->create($key_data['user'], ['class'=> 'formValidation','url' => ['controller'=>'Users','action'=>'account'],'novalidate']); ?>
					<?php echo $this->Form->control('id',array('type'=>'hidden','value'=>$key_data['loggedInUser']['id'])); ?>
					<div class="box-body">
						<h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Info</h4>
						<hr class="my-15">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('first_name',array('label'=>'First Name<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control','placeholder'=>'First name')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('last_name',array('label'=>'Last Name<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control','placeholder'=>'Last name')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('email',array('label'=>'Email<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control','autocomplete'=>'off','placeholder'=>'Email')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('password',array('label'=>'New Password<span class="text-danger">*</span>','autocomplete'=>'new-password','escape'=>false,'required','class'=>'form-control','placeholder'=>'Password')); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer modal-footer-uniform centre">
	                	<?php echo $this->Form->button('Submit', array('type' => 'submit','class' => 'btn btn-success btn-primary btn-lg btn-centre','escape' => false)); ?>
	                </div>
					<?php echo $this->Form->end(); ?>	
				</div>
			</div>
		</div>
	</div>
</section>