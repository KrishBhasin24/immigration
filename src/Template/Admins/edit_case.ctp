<?php //pr($key_data['leadDetail']); 

	foreach ($key_data['leadStatus'] as $val){
		if($val->lead_status != 'L' && $val->lead_status != 'R'){
			$leadStatus[$val->id] = $val->lead_status;	
		}
	}

?>
<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto w-p50">
            <h3 class="page-title">Manage Case</h3>
            <div class="d-inline-block align-items-center">
				<nav>
					<ol class="breadcrumb">
						<li><?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'manageCase'],['class'=>'btn btn-danger','escape' => false]); ?></li>
					</ol>
				</nav>
			</div>
        </div>
	</div>
</div>
<section class="content">		
	<div class="row">
		<div class="col-lg-6 col-12"> 			
		  	<div class="box">
		  		<div class="box-header with-border">
			  		<h4 class="box-title pt-5">Case Detail</h4>
		  		</div>
		  		<div class="box-body">
					<div class="flexbox bb-1 mb-10">
						<div><p><span class="text-light">Lead No:</span> 
							<?php echo $this->Html->link('<h5 id="lead_id" class="text-black mb-0"><strong>'.$key_data['leadDetail']['id'].'</strong></h5>',['controller' => 'Admins', 'action' => 'editLead',$key_data['leadDetail']['id']],['class'=>'bb-3 border-success text-success','escape' => false]); ?>
							<!-- <h5 id="lead_id" class="text-black mb-0"><strong ><?php //echo $key_data['leadDetail']['id']; ?></strong></h5> -->
						</p></div>
						<div><p><span class="text-light">File No:</span> <h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['account_lead']['id']; ?></strong></h5></p></div>
					</div>
					<div class="row">						
						<div class="col-12">
							<div class="row bb-1 pb-10 mb-10">
								<div class="col-6">							  
									<div>
										<p class="mb-0"><small>Immigration Class</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['category']['name']; ?></strong></h5>
									</div>
								</div>
								<div class="col-6 bl-1">							  
									<div>
										<p class="mb-0"><small>Sub Class</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['sub_category']['name']; ?></strong></h5>
									</div>
								</div>
							</div>
							<div class="row bb-1 pb-10">
								<div class="col-5">							  
									<div>
										<p class="mb-0"><small>Retained By</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['retain']['first_name']." ".$key_data['leadDetail']['retain']['last_name']; ?></strong></h5>
									</div>
								</div>
								<div class="col-3 bl-1 br-1">							  
									<div>
										<p class="mb-0"><small>Submission Deadline</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['submission_deadline']; ?></strong></h5>
									</div>
								</div>
								<div class="col-2 bl-1 ">							  
									<div>
										<p class="mb-0 text-success"><small>Total Payment</small></p> 
										<h5 class="mb-0 text-success"><strong><?php echo $key_data['leadDetail']['amount_payable']; ?></strong></h5>
									</div>
								</div>
								<div class="col-2 bl-1 ">							  
									<div>
										<p class="mb-0 text-danger"><small>Balance Remains</small></p> 
										<h5 class="mb-0 text-danger"><strong><?php echo $key_data['balance']; ?></strong></h5>
									</div>
								</div>
							</div>
						</div>		
					</div>
				</div>
		  	</div>
	  	</div>
	  	<div class="col-lg-6 col-12"> 			
		  	<div class="box">
		  		<div class="box-header with-border">
			  		<h4 class="box-title pt-5">Personal Detail</h4>
		  		</div>
		  		<div class="box-body">
					<div class="flexbox bb-1 mb-10">
						<div><p><span class="text-light">Full Name:</span> <h5 class="text-black mb-0"><strong ><?php echo $key_data['leadDetail']['first_name']." ".$key_data['leadDetail']['last_name']; ?></strong></h5></p></div>
						<div><p><span class="text-light">Date Of Birth:</span> <h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['dob']; ?></strong></h5></p></div>
					</div>
					<div class="row">						
						<div class="col-12">
							<div class="row bb-1 pb-10 mb-10">
								<div class="col-6">							  
									<div>
										<p class="mb-0"><small>Address</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['address']; ?></strong></h5>
									</div>
								</div>
								<div class="col-6 bl-1">							  
									<div>
										<p class="mb-0"><small>Residence Of</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['country']; ?></strong></h5>
									</div>
								</div>
								
							</div>
							<div class="row bb-1 pb-10">
								<div class="col-6">							  
									<div>
										<p class="mb-0"><small>Telephone</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['telephone']; ?></strong></h5>
									</div>
								</div>	
								<div class="col-6 bl-1">							  
									<div>
										<p class="mb-0"><small>Email</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['email']; ?></strong></h5>
									</div>
								</div>	
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="box">
				<div class="box-body p-0 ">
					<div class="card-body">
						<?php echo $this->Form->create($key_data['leadDetail'], ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'newdata']]); ?>
						<div class="form-group row">
							<div class="col-12">
								<div class="input text">
									<label>Lead Status</label>
									<?php echo $this->Form->select('lead_status_id',$leadStatus,['empty' => ' ','class'=>'form-control']);?>	
								</div>
							</div>

						</div>
						<div class="form-group row mb-0">
							<div class="col-12">
								<?php echo $this->Form->button('<i class="fa fa-check-square-o mr-5"></i>Update', array('type' => 'button','class' => 'btn bg-success-gradient btn-sm text-white','id'=>'remarks','escape' => false)); ?>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="box">
				<div class="box-body p-0 ">
					<div class="card-body">
						<?php echo $this->Form->create($key_data['leadDetail']['account_lead'], ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'newdata']]); ?>
						<div class="form-group row">
							<div class="col-md-6">
								<?php echo $this->Form->input('cic_file_id',array('class'=>'form-control','type'=>'text','label'=>'Cic File No.')); ?>
							</div>
							<div class="col-md-6">
								<div class="input text">
									<label>Date of cic file no. received</label>
									<input class="form-control" type="date" name="cic_file_date" value=<?php echo $key_data['leadDetail']['account_lead']['cic_file_date'];  ?> >
								</div>
							</div>
						</div>
						
						<div class="form-group row mb-0">
							<div class="col-12">
								<?php echo $this->Form->button('<i class="fa fa-check-square-o mr-5"></i>Update', array('type' => 'button','class' => 'btn bg-success-gradient btn-sm text-white','id'=>'remarks','escape' => false)); ?>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="box">
				<div class="box-body p-0 ">
					<div class="card-body">
						<?php echo $this->Form->create($key_data['leadDetail']['lead_document'], ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'newdata']]); ?>
						<div class="form-group row">
							<div class="col-md-12">
								<?php echo $this->Form->input('document_need',array('class'=>'form-control','type'=>'textarea','label'=>'Document Required From Client')); ?>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-12">
								<?php echo $this->Form->button('<i class="fa fa-check-square-o mr-5"></i>Update', array('type' => 'button','class' => 'btn bg-success-gradient btn-sm text-white','id'=>'remarks','escape' => false)); ?>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="box-header with-border">
              		<h5 class="box-title">Recent Remarks For Client</h5>
				</div>
				<div class="box-body p-0 client_remarks_box">
				  	<div id="remarks_list" class="media-list media-list-hover">
						<?php if(!empty($key_data['Remarks'])){
							foreach ($key_data['Remarks'] as $remarks) { ?>
								<span class="media media-single" >
								  <h4 class="w-100 text-gray font-weight-500"><?php echo date("d-m-Y", strtotime($remarks['remarks_date'])); ?></h4>
								  <div class="media-body pl-15 bl-5 rounded border-success">
									<p><?php echo $remarks['remarks']; ?></p>
									<span class="text-fade"><?php echo "By ".$remarks['user']['first_name']." ".$remarks['user']['last_name']; ?></span>
								  </div>
								</span>		
						<?php }	} else{ ?>
								<span class="media media-single">No Remarks Available</span>
						<?php } ?>
					</div>
				</div>
				<div class="box-header with-border">
              		<h5 class="box-title">Add Remarks</h5>
				</div>
				<div class="box-body p-0 ">
					<div class="card-body">
						<?php echo $this->Form->create('remarks', ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'newdata']]); ?>
						<div class="form-group row">
							<div class="col-12">
								<?php echo $this->Form->input('remarks',array('class'=>'form-control','id'=>'remarks_box','placeholder'=>'Please Enter Here','type'=>'textarea','label'=>false)); ?>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-12">
								<?php echo $this->Form->button('<i class="fa fa-arrow-right mr-5"></i>Submit', array('type' => 'button','class' => 'btn btn-danger btn-sm','id'=>'remarks','escape' => false)); ?>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-6">
            <div class="box">
				<div class="box-header with-border">
              		<h5 class="box-title">Recent Remarks For Office</h5>
				</div>
				<div class="box-body p-0 remarks_box	">
				  	<div id="remarks_list" class="media-list media-list-hover">
						<?php if(!empty($key_data['Remarks'])){
							foreach ($key_data['Remarks'] as $remarks) { ?>
								<span class="media media-single" >
								  <h4 class="w-100 text-gray font-weight-500"><?php echo date("d-m-Y", strtotime($remarks['remarks_date'])); ?></h4>
								  <div class="media-body pl-15 bl-5 rounded border-success">
									<p><?php echo $remarks['remarks']; ?></p>
									<span class="text-fade"><?php echo "By ".$remarks['user']['first_name']." ".$remarks['user']['last_name']; ?></span>
								  </div>
								</span>		
						<?php }	} else{ ?>
								<span class="media media-single">No Remarks Available</span>
						<?php } ?>
					</div>
				</div>
				<div class="box-header with-border">
              		<h5 class="box-title">Add Remarks</h5>
				</div>
				<div class="box-body p-0 ">
					<div class="card-body">
						<?php echo $this->Form->create('remarks', ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'newdata']]); ?>
						<div class="form-group row">
							<div class="col-12">
								<?php echo $this->Form->input('remarks',array('class'=>'form-control','id'=>'remarks_box','placeholder'=>'Please Enter Here','type'=>'textarea','label'=>false)); ?>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-12">
								<?php echo $this->Form->button('<i class="fa fa-arrow-right mr-5"></i>Submit', array('type' => 'button','class' => 'btn btn-danger btn-sm','id'=>'remarks','escape' => false)); ?>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>

			
	</div>
</section>