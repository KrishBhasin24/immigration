 <?php
 //pr($key_data);die;
$payment_mode = array('Cheque'=>'Cheque','Cash'=>'Cash','Credit'=>'Credit','Debit'=>'Debit','Cashier Cheque'=>'Cashier Cheque','Draft'=>'Draft','Other'=>'Other');

?>

<section class="content">       
    <div class="row">
    	<div class="col-lg-9 col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Edit Refund</h4>
					<?php echo $this->Form->create($key_data['refund'], array('action' => 'changeRefund','controller'=>'Admins','class'=>'form-horizontal form-element')); ?>
		                <div class="modal-body">
		                    <div class="col-xl-12 col-lg-12">
		                        <div class="box">
		                            <div class="box-body">
		                                <div class="row">
				                            <div class="col-md-6">
				                                <div class="form-group">
													<?php echo $this->Form->hidden('lead_id',array('class'=>'form-control','value'=> $key_data['refund']['lead_id'])); ?>
													<?php echo $this->Form->hidden('account_lead_id',array('class'=>'form-control','value'=> $key_data['refund']['account_lead_id'])); ?>
													<?php echo $this->Form->input('refund_payment',array('class'=>'form-control','label'=>'Amount')); ?>
				                                </div>
				                            </div>
		                                  	<div class="col-md-6">
		                                    	<div class="form-group">
		                                        	<div class="input text">
				                                        <label>Payment Mode</label>
														<?php echo $this->Form->select('payment_mode',$payment_mode,['empty' => ' ','class'=>'form-control']); ?>
													</div>
		                                    	</div>
		                                  	</div>
		                                </div>
		                                <div class="row">
		                                	<div class="col-md-6">
			                                    <div class="form-group">
			                                    	 <?php echo $this->Form->input('authorization_number',array('class'=>'form-control')); ?>
			                                    </div>
		                                  	</div>
		                                  	<div class="col-md-6">
			                                    <div class="form-group">
			                                    	 <?php echo $this->Form->input('issued_by',array('class'=>'form-control','label'=>'Issued By (Name)')); ?>
			                                    </div>
		                                  	</div>
		                                </div>
									</div>
		                        </div>
		                    </div>
		                </div>
		                <div class="modal-footer modal-footer-uniform">
		                	<?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'manageReceipt',$key_data['refund']['lead_id']],['class'=>'btn btn-danger','escape' => false]); ?>
		                    <?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success btn-primary float-right','escape' => false)); ?>
		                </div>
		            <?php echo $this->Form->end(); ?>
	            </div>
	        </div>
	    </div>
	</div>
</section>