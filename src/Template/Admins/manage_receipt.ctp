<?php
//pr($key_data['leadDetail']);
 ?>
<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto w-p50">
            <h3 class="page-title">Manage Lead Status</h3>
            <div class="d-inline-block align-items-center">
				<nav>
					<ol class="breadcrumb">
						<li class=><?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'accountLead'],['class'=>'btn btn-danger','escape' => false]); ?></li>
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
						<span id="logged_user_department" style="display:none"><?php echo $key_data['loggedInUser']['department']['id'];  ?></span>
						<div><p><span class="text-light">Lead No:</span> <h5 class="text-black mb-0"><strong ><?php echo $key_data['leadDetail']['id']; ?></strong></h5></p></div>
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
										<h5 class="text-success mb-0"><strong><?php echo $key_data['leadDetail']['amount_payable']; ?></strong></h5>
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
		<div class="col-lg-6 col-12">
		 	<div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Payment Received</h3>
                    <?php 
                    	if($key_data['balance'] !== 0){
                    		echo $this->Html->link('Add Receipt',['controller' => 'Admins', 'action' => 'addReceipt'],['data-toggle'=>'modal','data-target'=>'#receipt','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]);		
                    	}
                     ?>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                		<table id="tickets" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Receipt No.</th>
                                    <th>Receipt Date</th>
                                    <th>Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach ( $key_data['leadPayment'] as $payment) { ?>
                                    <tr>
                                  		<td><?php echo $payment['id']; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($payment['payment_date'])); ?></td>
                                        <td><?php echo $payment['current_payment']; ?></td>
                                        <td><?php echo $payment['payment_mode']; ?></td>
                                        <td> 
                                            <div class="btn-group mb-5">
                                                <?php echo $this->Html->link('<i class="fa fa-edit"></i> Edit',['controller' => 'Admins', 'action' => 'changeReceipt',$payment['id']],['class'=>'btn btn-rounded btn-info mb-5','escape' => false]);?>
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
		<div class="col-lg-6 col-12">
		 	<div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Payment Refund</h3>
                    <?php 
                    	if($key_data['balance'] !== 0){
                    		echo $this->Html->link('Add Refund',['controller' => 'Admins', 'action' => 'addRefund'],['data-toggle'=>'modal','data-target'=>'#refund','id'=>'refund_btn','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]);		
                    	}
                     ?>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                		<table id="tickets" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Receipt No.</th>
                                    <th>Receipt Date</th>
                                    <th>Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach ( $key_data['leadRefund'] as $payment) { ?>
                                    <tr>
                                  		<td><?php echo $payment['id']; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($payment['payment_date'])); ?></td>
                                        <td><?php echo $payment['refund_payment']; ?></td>
                                        <td><?php echo $payment['payment_mode']; ?></td>
                                        <td> 
                                            <div class="btn-group mb-5">
                                                <?php echo $this->Html->link('<i class="fa fa-edit"></i> Edit',['controller' => 'Admins', 'action' => 'changeRefund',$payment['id']],['class'=>'btn btn-rounded btn-info mb-5','escape' => false]);?>
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
	</div>
</section>
<!-- content-wrpper div close -->
</div>

<!-- content-wrpper div close -->
<?php

	$payment_mode = array('Cheque'=>'Cheque','Cash'=>'Cash','Credit'=>'Credit','Debit'=>'Debit','Cashier Cheque'=>'Cashier Cheque','Draft'=>'Draft','Other'=>'Other');
 ?>

<div class="modal center-modal fade" id="receipt" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Receipt</h5>
                <a type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <?php echo $this->Form->create('Receipt', array('action' => 'changeReceipt','controller'=>'Admins','class'=>'form-horizontal form-element','novalidate')); ?>
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                	<div class="controls">
												<?php echo $this->Form->hidden('lead_id',array('class'=>'form-control','value'=> $key_data['leadDetail']['id'])); ?>
												<?php echo $this->Form->hidden('account_lead_id',array('class'=>'form-control','value'=> $key_data['leadDetail']['account_lead']['id'])); ?>
												<?php echo $this->Form->control('current_payment',array('label'=>'Payment Amount<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
											</div>
		                                </div>
		                            </div>
                                  	<div class="col-md-6">
                                    	<div class="form-group">
                                    		<div class="controls">
	                                        	<div class="input text">
			                                        <label>Payment Mode<span class="text-danger">*</span></label>
													<?php echo $this->Form->select('payment_mode',$payment_mode,['empty' => ' ','required','class'=>'form-control']); ?>
												</div>
											</div>
                                    	</div>
                                  	</div>
                                </div>
                                <div class="row">
                                	<div class="col-md-6">
	                                    <div class="form-group">
	                                    	 <?php echo $this->Form->control('authorization_number',array('class'=>'form-control')); ?>
	                                    </div>
                                  	</div>
                                  	<div class="col-md-6">
	                                    <div class="form-group">
	                                    	<div class="controls">
	                                    	 	<?php echo $this->Form->control('issued_by',array('label'=>'Payment Received By<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
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

<div class="modal center-modal fade" id="refund" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Refund</h5>
                <a type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <?php echo $this->Form->create('Refund', array('action' => 'changeRefund','controller'=>'Admins','class'=>'form-horizontal form-element','novalidate')); ?>
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                	<div class="controls">
												<?php echo $this->Form->hidden('lead_id',array('class'=>'form-control','value'=> $key_data['leadDetail']['id'])); ?>
												<?php echo $this->Form->hidden('account_lead_id',array('class'=>'form-control','value'=> $key_data['leadDetail']['account_lead']['id'])); ?>
												<?php echo $this->Form->control('refund_payment',array('label'=>'Refund Amount<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
											</div>
		                                </div>
		                            </div>
                                  	<div class="col-md-6">
                                    	<div class="form-group">
                                    		<div class="controls">
	                                        	<div class="input text">
			                                        <label>Payment Mode<span class="text-danger">*</span></label>
													<?php echo $this->Form->select('payment_mode',$payment_mode,['empty' => ' ','class'=>'form-control','required']); ?>
												</div>
											</div>
                                    	</div>
                                  	</div>
                                </div>
                                <div class="row">
                                	<div class="col-md-6">
	                                    <div class="form-group">
	                                    	 <?php echo $this->Form->control('authorization_number',array('class'=>'form-control')); ?>
	                                    </div>
                                  	</div>
                                  	<div class="col-md-6">
	                                    <div class="form-group">
	                                    	<div class="controls">
	                                    	 	<?php echo $this->Form->control('issued_by',array('label'=>'Payment Refunded By<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
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

<script type="text/javascript">
	$(document).ready(function() {	

	var user_department = $('#logged_user_department').html();
	//alert(user_department);
	if(user_department == 6){
		
		$("#refund_btn").hide();
		

		
	}
});
</script>



<?= $this->Html->script('popper.min.js'); ?>

<?= $this->Html->script('datatables.min.js'); ?>
<?= $this->Html->script('data-table.js'); ?>
<?= $this->Html->script('custome.js'); ?>



