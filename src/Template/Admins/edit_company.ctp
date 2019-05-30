<?php //pr($key_data['company']);
foreach ($key_data['all_company_data'] as $value) {
  $parent[$value->id] = $value->name;
}

foreach ($key_data['Countries'] as $val){
    $Countries[$val->name] = $val->name;
}

$main_parent = array(0=>'No Parent');
$parent = $main_parent+$parent;

 ?>


<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto w-p50">
            <h3 class="page-title">Company Section</h3>
        </div>
    </div>
</div>
<section class="content">       
    <div class="row">
    	<div class="col-lg-9 col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Edit Company Detail</h4>	
					<?php 
					echo $this->Form->create($key_data['Company_data'], ['class'=> 'formValidation','novalidate','url' => ['controller'=>'Admins','action'=>'editCompany']]); ?>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="controls">
										<div class="input text">
											<label>Parent Company<span class="text-danger">*</span></label>
											<?php echo $this->Form->select('parent_id',$parent,['empty' => ' ','class'=>'form-control','required']);?>
	                                   	</div>
                               		</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
								   		<?php echo $this->Form->input('name',array('label'=>'Company Name<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
							   		</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
								 		<?php echo $this->Form->input('telephone',array('label'=>'Contact Number<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control','id'=>'phone','type'=>'text')); ?>
								 	</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								   <?php echo $this->Form->input('email',array('class'=>'form-control','type'=>'text')); ?>
								</div>
						  	</div>
						  	<div class="col-md-6">
								<div class="form-group">
								 	<?php echo $this->Form->input('website',array('class'=>'form-control')); ?>
								</div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								   <?php echo $this->Form->input('address',array('class'=>'form-control')); ?>
								</div>
						  	</div>
						  	<div class="col-md-6">
								<div class="form-group">
								 	<?php echo $this->Form->input('city',array('class'=>'form-control')); ?>
								</div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								    <?php echo $this->Form->input('province',array('class'=>'form-control')); ?>
								</div>
						  	</div>
						  	<div class="col-md-6">
								<div class="form-group">
								  <?php echo $this->Form->input('postal_code',array('class'=>'form-control')); ?>
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
						</div>
					</div>
					<div class="box-footer">
						  
					  	<?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'getAllCompanies'],['class'=>'btn btn-danger','escape' => false]); ?>
						<?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success pull-right','escape' => false)); ?>
					</div>
					<?php echo $this->Form->end(); ?>
			    </div>
			</div>
	  	</div>
	</div>
</section>
<?php //pr($key_data); ?>