<?php //pr($key_data); die; 
use Cake\Routing\Router;
	foreach ($key_data['leadStatus'] as $val){
		if($val->lead_status != 'L' && $val->lead_status != 'R'){
			$leadStatus[$val->id] = $val->lead_status;	
		}
	}


$portal_used = array('sanjay'=>'Sanjay','manjit'=>'Manjit','client'=>'Client');

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
						<span id="logged_user_department" style="display:none"><?php echo $key_data['loggedInUser']['department']['id'];  ?></span>
						<div><p><span class="text-light">Lead No:</span> 
							<?php //echo $this->Html->link('<h5  class="text-black mb-0"><strong id="lead_id">'.$key_data['leadDetail']['id'].'</strong></h5>',['controller' => 'Admins', 'action' => 'editLead',$key_data['leadDetail']['id']],['class'=>'bb-3 border-success text-success','escape' => false]); ?>
						 	<h5  class="text-black mb-0"><strong id="lead_id"><?php echo $key_data['leadDetail']['id']; ?></strong></h5> 

						</p></div>
						<div><p><span class="text-light">File No:</span> <h5 class="text-black mb-0"><strong id="file_id"><?php echo $key_data['leadDetail']['account_lead']['id']; ?></strong></h5></p></div>
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
										<h5 class="text-black mb-0"><strong class="text-danger"><?php echo $key_data['leadDetail']['submission_deadline']; ?></strong></h5>
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
										<h5 class="mb-0 text-danger"><strong id="balance"><?php echo $key_data['balance']; ?></strong></h5>
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
						<div class="form-group row" id="lead_status_box">
							<div class="col-8">
								<div class="input text">
									<label>Lead Status</label>
									<?php echo $this->Form->select('lead_status_id',$leadStatus,['empty' => ' ','class'=>'form-control','id'=>'lead_status_id' ]);?>	
								</div>
							</div>
							<div class="col-4">
								<div class="input text">
									<label>Last Status Update Date</label>
									<span class="media media-single custom_date">
										<h4 class="w-100 text-gray font-weight-500">
											<?php if( $key_data['leadDetail']['status_changed_date'] != null){ echo date_format($key_data['leadDetail']['status_changed_date'],"Y-m-d"); }  ?></h4>
									</span>
								</div>
							</div>

						</div>
						<div class="form-group row mb-0">
							<div class="col-12">
								<?php echo $this->Form->button('<i class="fa fa-check-square-o mr-5"></i>Update', array('type' => 'button','class' => 'btn bg-success-gradient btn-sm text-white','id'=>'lead_status_submit','escape' => false)); ?>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="box-body p-0 ">
					<div class="card-body" id="cic_box">
						<?php echo $this->Form->create($key_data['leadDetail']['account_lead'], ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'newdata']]); ?>
						<div class="form-group row">
							<div class="col-md-4">
								<?php echo $this->Form->control('cic_file_id',array('class'=>'form-control','type'=>'text','label'=>'Cic File No.','id'=>'cic_file_id')); ?>
								<?php echo $this->Form->hidden('user_id',array('class'=>'form-control','id'=>'user_id','value'=> $key_data['loggedInUser']['id'])); ?>
							</div>
							<div class="col-md-4">
								<div class="input text">
									<label>Receiving Date</label>
									<input class="form-control" type="date" name="cic_file_date" id="cic_file_date" value=<?php echo $key_data['leadDetail']['account_lead']['cic_file_date'];  ?> >
								</div>
							</div>
							<div class="col-md-4">
								<div class="input text">
									<label>Portal Used</label>
									<?php echo $this->Form->select('portal_used',$portal_used,['empty' => ' ','class'=>'form-control','id'=>'cic_portal' ]);?>	
								</div>
							</div>
						</div>
						
						<div class="form-group row mb-0">
							<div class="col-12">
								<?php echo $this->Form->button('<i class="fa fa-check-square-o mr-5"></i>Update', array('type' => 'button','class' => 'btn bg-success-gradient btn-sm text-white','id'=>'cic_file_button','escape' => false)); ?>
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
			  		<h4 class="box-title pt-5">Specification Detail</h4>
		  		</div>
		  		<div class="box-body">
					<div class="flexbox bb-1 mb-10 pb-20">
						<div>
							<p>
								<span class="text-dark font-weight-bold">Reason Of Qualify:</span> 
								
							</p>
							
							<h5 class="text-black mb-0"><strong ><?php echo $key_data['leadDetail']['reason_of_qualify']; ?></strong></h5>
						</div>
						
					</div>
					<div class="flexbox bb-1 mb-10 pt-20 pb-20">
						<div>
							<p>
								<span class="text-dark font-weight-bold">Special Instruction:</span> 
							</p>
							<h5 class="text-black mb-0"><strong ><?php echo $key_data['leadDetail']['special_instruction']; ?></strong></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="box">
				<div class="box-body p-0 ">
					<div class="card-body" id="doc_box">
						<?php echo $this->Form->create($key_data['leadDetail']['lead_document'], ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'newdata']]); ?>
						<div class="form-group row">
							<div class="col-md-12">
								<?php echo $this->Form->control('document_need',array('class'=>'form-control','id'=>'document_need','type'=>'textarea','label'=>'Document Required From Client')); ?>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-12">
								
								<?php echo $this->Form->button('<i class="fa fa-check-square-o mr-5"></i>Update', array('type' => 'button','class' => 'btn bg-success-gradient btn-sm text-white','id'=>'document_button','escape' => false)); ?>
								<?php
									if(!empty($key_data['leadDetail']['lead_document']['document_need'])){
								 		echo $this->Form->button('<i class="fa fa-times mr-5"></i>Delete', array('type' => 'button','class' => 'btn bg-danger btn-sm text-white','id'=>'document_button_delete','escape' => false)); 
							 		}
						 		?>
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
				  	<div id="client_remarks_list" class="media-list media-list-hover">
						<?php if(!empty($key_data['ClientRemarks'])){
							foreach ($key_data['ClientRemarks'] as $remarks) { ?>
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
								<?php echo $this->Form->control('remarks',array('class'=>'form-control','id'=>'client_remarks_box','placeholder'=>'Please Enter Here','type'=>'textarea','label'=>false)); ?>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-12">
								<?php echo $this->Form->button('<i class="fa fa-arrow-right mr-5"></i>Submit', array('type' => 'button','class' => 'btn btn-danger btn-sm','id'=>'client_remarks_button','escape' => false)); ?>
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
				<div class="box-body p-0 remarks_box">
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
								<?php echo $this->Form->control('remarks',array('class'=>'form-control','id'=>'office_remarks_box','placeholder'=>'Please Enter Here','type'=>'textarea','label'=>false)); ?>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-12">
								<?php echo $this->Form->button('<i class="fa fa-arrow-right mr-5"></i>Submit', array('type' => 'button','class' => 'btn btn-danger btn-sm','id'=>'remarks_button','escape' => false)); ?>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>

			
	</div>
</section>


<script>

$(document).ready(function() {	


	var user_department = $('#logged_user_department').html();
	//alert(user_department);
	if(user_department == 6){
		$("#lead_status_box :input").attr("disabled", true);
		$("#lead_status_submit").remove();
		$("#cic_file_button").remove();
		$("#document_button").remove();
		$("#document_button_delete").remove();
		
		$("#cic_box :input").attr("disabled", true);
		$("#doc_box :input").attr("disabled", true);
	}
	

	function formatDate(date) {
	     var d = new Date(date),
	         month = '' + (d.getMonth() + 1),
	         day = '' + d.getDate(),
	         year = d.getFullYear();

	     if (month.length < 2) month = '0' + month;
	     if (day.length < 2) day = '0' + day;

	     return [year, month, day].join('-');
	} 
	$('#lead_status_submit').click(function(){
		//alert(user_department);
		if(user_department == 2 || user_department == 3){
			var balance = $('#balance').html();
			var optionText = $("#lead_status_id option:selected").text();
			if( balance != 0 && optionText == 'Case Filed' ){
				alert('Case can not be submitted due to pending balance.');
				location.reload(); 
				exit();
			}
		}
		var lead_status = $('#lead_status_id').val();
		if(lead_status.length != 0){
			if (confirm("Are you sure?")) {
				var data = {'lead_status_id':lead_status,'lead_id':$('#lead_id').html()};
				var callUrl = "<?php echo Router::url(array('controller'=>'Leads','action'=>'changeLeadStatus')); ?>";
				var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
				$.ajax({
					type:"POST",
				 	headers: {
				        'X-CSRF-Token': csrfToken
				    },
					url : callUrl,
					data : data, 
					async: false,
					success:function(response) {
	          			alert('Case Status Changed');
		          		location.reload(); 
			        },
		          	error: function() {
		                alert('Error occured');
		                return;
		          	}
		      	});		
			}
			else{
				location.reload(); 
			}
			
			
		}
		else{alert("Please select the status.");}
	});

	$('#cic_file_button').click(function(){
		if (confirm("Are you sure?")) {
			var file_no = $('#cic_file_id').val();
			var date = $('#cic_file_date').val();
			if(file_no.length != 0){
				var data = {'file_no':file_no,'date':date,'portal_used':$('#cic_portal').val(),'file_id':$('#file_id').html()};
				var callUrl = "<?php echo Router::url(array('controller'=>'Leads','action'=>'addCicDetail')); ?>";
				var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
				$.ajax({
					type:"POST",
				 	headers: {
				        'X-CSRF-Token': csrfToken
				    },
					url : callUrl,
					data : data, 
					async: false,
					success:function(response) {
	          			alert('Cic file Detail Updated');
		          		location.reload(); 
			        },
		          	error: function() {
		                alert('Error occured');
		                return;
		          	}
		      	});
			}
		}
		else{
			location.reload(); 
		}
	});

	$('#document_button').click(function(){
		var document_need = $('#document_need').val();
		if(document_need.length != 0){
			var data = {'document_need':document_need,'lead_id':$('#lead_id').html()};
			var callUrl = "<?php echo Router::url(array('controller'=>'Leads','action'=>'addClientDocument')); ?>";
			var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
			$.ajax({
				type:"POST",
			 	headers: {
			        'X-CSRF-Token': csrfToken
			    },
				url : callUrl,
				data : data, 
				async: false,
				success:function(response) {
          			alert('Document list added');
	          		location.reload(); 
		        },
	          	error: function() {
	                alert('Error occured');
	                return;
	          	}
	      	});	
		}
		else{alert("Please add document list.");}
		
	});

	$('#document_button_delete').click(function(){
		if (confirm("Are you sure? Once document list delete user will stop receiving notification.")) {
 			var data = {'lead_id':$('#lead_id').html()};
 			var callUrl = "<?php echo Router::url(array('controller'=>'Leads','action'=>'delClientDocument')); ?>";
			var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
			$.ajax({
				type:"POST",
			 	headers: {
			        'X-CSRF-Token': csrfToken
			    },
				url : callUrl,
				data : data, 
				async: false,
				success:function(response) {
          			alert('Document list deleted');
	          		location.reload(); 
		        },
	          	error: function() {
	                alert('Error occured');
	                return;
	          	}
	      	});	
	    }
	    
	})

	$('#remarks_button').click(function(){
		var remarks = $('#office_remarks_box').val();
		if(remarks.length != 0){
			var data = {'remarks':remarks,'lead_id':$('#lead_id').html(),'user_id':$('#user_id').val()};
			var callUrl = "<?php echo Router::url(array('controller'=>'Leads','action'=>'addRemarks')); ?>";
			var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
			$.ajax({
				type:"POST",
			 	headers: {
			        'X-CSRF-Token': csrfToken
			    },
				url : callUrl,
				data : data, 
				async: false,
				success:function(response) {
	          		var dataObj = JSON.parse(response);
					$('#remarks_list').empty();
					$('#office_remarks_box').val("");
	          		$(dataObj).each(function() {
		             	$('#remarks_list').append(
		             		"<span class='media media-single'><h4 class='w-100 text-gray font-weight-500'>"+formatDate(this.remarks_date)+"</h4><div class='media-body pl-15 bl-5 rounded border-success'><p>"+this.remarks+"</p><span class='text-fade'>By "+this.user.first_name+" "+this.user.last_name+"</span></div></span>"
						)
		            });
		        },
	          	error: function() {
	                alert('Error occured');
	                return;
	          	}
	      	});	
		}
	});
	$('#client_remarks_button').click(function(){
		var remarks = $('#client_remarks_box').val();
		if(remarks.length != 0){
			var data = {'remarks':remarks,'lead_id':$('#lead_id').html(),'user_id':$('#user_id').val()};
			var callUrl = "<?php echo Router::url(array('controller'=>'Leads','action'=>'addClientRemarks')); ?>";
			var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
			$.ajax({
				type:"POST",
			 	headers: {
			        'X-CSRF-Token': csrfToken
			    },
				url : callUrl,
				data : data, 
				async: false,
				success:function(response) {
	          		var dataObj = JSON.parse(response);
					$('#client_remarks_list').empty();
					$('#client_remarks_box').val("");
	          		$(dataObj).each(function() {
		             	$('#client_remarks_list').append(
		             		"<span class='media media-single'><h4 class='w-100 text-gray font-weight-500'>"+formatDate(this.remarks_date)+"</h4><div class='media-body pl-15 bl-5 rounded border-success'><p>"+this.remarks+"</p><span class='text-fade'>By "+this.user.first_name+" "+this.user.last_name+"</span></div></span>"
						)
		            });
		        },
	          	error: function() {
	                alert('Error occured');
	                return;
	          	}
	      	});	
		}
	});
});

</script>