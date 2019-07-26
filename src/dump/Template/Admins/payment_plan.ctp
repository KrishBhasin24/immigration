<?php
	
//	pr($key_data['leadPaymentDetail']);


?>
<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto w-p50">
            <h3 class="page-title">Lead Payment Plan</h3>
            <div class="d-inline-block align-items-center">
				<nav>
					<ol class="breadcrumb">
						<li class=><?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'getLead'],['class'=>'btn btn-danger','escape' => false]); ?></li>
					</ol>
				</nav>
			</div>
        </div>
	</div>
</div>
<section class="content">		
	<div class="row">
		<div class="col-lg-7 col-12">
		<?php echo $this->Form->create('payment_plan', ['class'=> 'formValidation','novalidate','url' => ['controller'=>'Admins','action'=>'paymentPlan']]); ?>
		<?php echo $this->Form->hidden('lead_id',array('class'=>'form-control','value'=> $key_data['leadDetail']['id'])); ?>
		<?php echo $this->Form->hidden('user_id',array('class'=>'form-control','value'=> $key_data['loggedInUser']['id'])); ?>
		 			
		  	<div class="box">
		  		<div class="box-header with-border">
			  		<h4 class="box-title pt-5">Payment Plan</h4>
			  		<?php 
                    	echo $this->Html->link('Add Installment',[],['data-toggle'=>'modal','id'=>'add_installment','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]);		
                    ?>
		  		
			  		<div class="box-body" id="main_form">
						<?php if(!empty($key_data['leadPaymentDetail'])){ 
						$i= 1;
						foreach ($key_data['leadPaymentDetail'] as $value) { ?>
						<div class="row" id=<?php echo "form_data".$i; ?> >
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->hidden('id',array('class'=>'form-control','value'=> $value['id'])); ?>
										<?php echo $this->Form->control('title[]',array('label'=>'Title','escape'=>false,'class'=>'form-control','value'=>$value['title'])); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('payment[]',array('label'=>'Installment','escape'=>false,'class'=>'form-control','value'=>$value['payment'],'type'=>'number')); ?>
									</div>
								</div>
							</div>
						</div>
						<?php $i++; } } else{ ?>
							<div class="row" id="form_data1">
								<div class="col-md-6">
									<div class="form-group">
										<div class="controls">
											<?php echo $this->Form->control('title[]',array('label'=>'Title','escape'=>false,'class'=>'form-control')); ?>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="controls">
											<?php echo $this->Form->control('payment[]',array('label'=>'Installment','escape'=>false,'class'=>'form-control','type'=>'number')); ?>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="box-footer">
						<?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success pull-right','escape' => false)); ?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
		<div class="col-lg-5 col-12"> 			
		  	<div class="box">
		  		<div class="box-header with-border">
			  		<h4 class="box-title pt-5">Case Detail</h4>
		  		</div>
		  		<div class="box-body">
					<div class="row">						
						<div class="col-12">
							<div class="row bb-1 pb-10 mb-10">
								<div class="col-2">							  
									<div>
										<p class="mb-0"><small>Lead No</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['id']; ?></strong></h5>
									</div>
								</div>
								<div class="col-4 bl-1">							  
									<div>
										<p class="mb-0"><small>Immigration Class</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['category']['name']; ?></strong></h5>
									</div>
								</div>
								<div class="col-4 bl-1">							  
									<div>
										<p class="mb-0"><small>Sub Class</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['sub_category']['name']; ?></strong></h5>
									</div>
								</div>
								<div class="col-2 bl-1">							  
									<div>
										<p class="mb-0"><small>Total Balance</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['leadDetail']['amount_payable']; ?></strong></h5>
									</div>
								</div>
							</div>
							
						</div>		
					</div>
				</div>
			</div>
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
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function() {	
		var i = 2;
		$("#add_installment").click( function () {
			var fields = $('#form_data1').clone().attr("id","form_data"+i); 
			fields.find("input").val("");
			var inputs = fields.find("input");
			inputs.each(function(e) {
				var id_data = $(this).attr("id"); 
				$(this).attr("id",id_data+i);
			});

			var label = fields.find("label");
			label.each(function(e) {
				var label_data = $(this).attr("for"); 
				$(this).attr("for",label_data+i);
			}); 


			fields.appendTo('#main_form');
			
			$("input,select,textarea,checkbox").not("[type=submit]").jqBootstrapValidation();
			i++;
		})
	});

</script>




<?= $this->Html->script('popper.min.js'); ?>
<?= $this->Html->script('custome.js'); ?>

