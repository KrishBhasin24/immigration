<?php use Cake\Routing\Router; 
foreach ($key_data['Countries'] as $val){
    $Countries[$val->name] = $val->name;
}
foreach ($key_data['category'] as $val){
    $category[$val->id] = $val->name;
}

foreach ($key_data['subcat'] as $val){
    $subcat[$val->id] = $val->name;
}

foreach ($key_data['staff_list'] as $val){
    $staff[$val->id] = $val->first_name.' '.$val->last_name;
}

$marital_status  = array('Never Married'=>'Never Married','Engaged'=>'Engaged','Married'=>'Married','Widowed'=>'Widowed','Separated'=>'Separated','Divorced'=>'Divorced','Comman Law Partner'=>'Comman Law Partner');
$source_of_lead   = array('1'=>'Internet Search','2'=>'Newspaper','3'=>'Reference');
 ?>

<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto w-p50">
            <h3 class="page-title">Edit Lead</h3>
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
<div class="reverse-mode">
	<section class="left-block content fixed-left-block">
		<div class="scrollable" style="height: 100%;">
			<div class="left-content-area">
				<div class="card mb-0">
					<div class="card-header with-border">
						<h4 class="card-title">Remarks</h4>
					</div>
					<div class="card-body p-0 custome_box">
						<div class="media-list media-list-hover">
							<div class="box-body p-10">
								<ul class="todo-list" id="all_remarks">
									
									<?php 
									if(count($key_data['Remarks']) != 0){

									foreach ($key_data['Remarks'] as $remarks_list) { ?>
									<li class="bg-light p-0 mb-15 bl-5 rounded border-success">
									  	<div class="position-relative p-20">
								  			<span class="text-line font-size-16"><?php echo $remarks_list['user']['first_name']." ".$remarks_list['user']['first_name']; ?></span>
									  		<div class="mt-5 ml-0 pl-5">
								  				<?php echo $remarks_list['remarks']; ?>
									  		</div>
										  	<div class="mt-5 ml-0 pl-5"><em><?php echo date("d-m-Y", strtotime($remarks_list['remarks_date'])); ?></em></div>
										</div>
									</li>
									<?php } } else {?>
										<li>No Records Found</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="card mb-0">
					<div class="card-header with-border">
						<h4 class="card-title">Add Remarks</h4>
					</div>
					<div class="card-content">
						<div class="card-body">
							<?php echo $this->Form->create('remarks', ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'newdata']]); ?>
							<div class="form-group row">
								<div class="col-12">
									<?php echo $this->Form->control('remarks',array('class'=>'form-control','id'=>'remarks_box','placeholder'=>'Please Enter Here','type'=>'textarea','label'=>false)); ?>
									<?php echo $this->Form->control('lead_id',array('id'=>'remark_lead_id','type'=>'hidden','value'=>$key_data['lead_data']['id'])); ?>
									<?php echo $this->Form->control('user_id',array('id'=>'remark_user_id','type'=>'hidden','value'=>$key_data['lead_data']['agent_id'])); ?>
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
	<section class="right-block content">       
    	<div class="row">
    	<div class="col-lg-12 col-12">
			<div class="box">
				<div class="box-header with-border">
					
					<?php echo $this->Form->create($key_data['lead_data'], ['class'=> 'formValidation','id'=>'edit_lead','url' => ['controller'=>'Admins','action'=>'editLead'],'novalidate']); ?>
					<?php echo $this->Form->control('client_id',array('type'=>'hidden','value'=>$key_data['lead_data']['client_id'])); ?>
					<div class="box-body">
						<h4 class="box-title text-info"><i class="ti-location-arrow mr-15"></i> Immigration Category</h4>
						<hr class="my-15">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<div class="input text">
											<label>Immigration Type<span class="text-danger">*</span></label>
											<?php echo $this->Form->select('category_id',$category,['empty' => ' ','class'=>'form-control','id'=>'category','required']); ?>
	                                   	</div>
                                   	</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<div class="input text">
										<label>Immigration Sub Type</label>
										<?php echo $this->Form->select('sub_category_id',$subcat,['empty' => ' ','class'=>'form-control','id'=>'subCategory']);?>
									</div>
								</div>
							</div>
						</div>
						<h4 class="box-title text-info"><i class="ti-user mr-15"></i>Personal Info</h4>
						<hr class="my-15">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('first_name',array('label'=>'First Name<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control','placeholder'=>'First name')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('last_name',array('label'=>'Last Name<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control','placeholder'=>'Last name')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('email',array('label'=>'Email<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control','placeholder'=>'Email','disabled')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="controls">
										<div class="input text">
											<label>Date Of Birth<span class="text-danger">*</span></label>
											<input class="form-control" type="date" name="dob" required value="<?php echo $key_data['lead_data']['dob']; ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							 <div class="col-md-3">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('address',array('label'=>'Address<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control','placeholder'=>'Address','type'=>'textarea')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="controls">
										<?php echo $this->Form->control('telephone',array('label'=>'Contact Number<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control','placeholder'=>'Phone','id'=>'phone')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->control('city',array('class'=>'form-control','placeholder'=>'City')); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->control('province',array('class'=>'form-control','placeholder'=>'Province')); ?>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->control('postal_code',array('class'=>'form-control','placeholder'=>'PostalCode')); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="input text">
										<label>Country</label>
										<?php echo $this->Form->select('country',$Countries,['empty' => ' ','class'=>'form-control']);?>	
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="input text">
										<label>Marital Status</label>
										<?php echo $this->Form->select('marital_status',$marital_status,['empty' => ' ','class'=>'form-control']);?>	
									</div>
								</div>
							</div>
						</div>
						
						<h4 class="box-title text-info"><i class="ti-pencil-alt mr-15"></i>Extra Info</h4>
						<hr class="my-15">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->control('reason_of_qualify',array('class'=>'form-control','placeholder'=>'Reason Of Qualification','type'=>'textarea')); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->control('special_instruction',array('class'=>'form-control','placeholder'=>'Special Instruction','type'=>'textarea')); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="controls">
										<div class="input text">
											<label>Submission Deadline<span class="text-danger">*</span></label>
											<input class="form-control" required type="date" name="submission_deadline" value="<?php echo $key_data['lead_data']['submission_deadline']; ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
						<h4 class="box-title text-info"><i class="ti-pencil-alt mr-15"></i>Media Info</h4>
						<hr class="my-15">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="input text">
										<label>How did you came to know about us?</label>
										<?php echo $this->Form->select('source_of_lead',$source_of_lead,['empty' => 'Please Select','class'=>'form-control']);?>	
									</div>
								</div>
							</div>
						</div>
						<h4 class="box-title text-info"><i class="ti-pencil-alt mr-15"></i>Retainer Info</h4>
						<hr class="my-15">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<div class="c-inputs-stacked">
											<?php
											 	if($key_data['lead_data']['contract_signed'] == 1 )
										 		{ $condition = 'disabled';}
												else
												{ $condition = '';}
										 	?>
									        <?php  echo $this->Form->checkbox('contract_signed', ['value' => 1,'id'=>'con',$condition]); ?>
									        <label for="con" class="">I Have Signed Contract From Client</label>
									    </div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="amt form-group">
									<div class="controls">
										<?php echo $this->Form->control('amount_payable',array('label'=>'Total Amount Payable','type'=>'text','class'=>'form-control','id'=>'amount_payable','disabled')); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="amt form-group">
									<div class="controls">
										<div class="input text">
											<label>Retained By</label>
											<?php echo $this->Form->select('retainer_id',$staff,['empty' => ' ','id'=>'retained_by','class'=>'form-control']);?>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer modal-footer-uniform centre">
	                	<?php echo $this->Form->button('Submit', array('type' => 'submit','id'=>'sub_btn','class' => 'btn btn-success btn-primary btn-lg btn-centre','escape' => false)); ?>
	                </div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
		</div>
	</section>
</div>

<script>

$(document).ready(function() {	

	var amount_payable = $('#amount_payable').val();

	if(amount_payable == 0){
		$('#amount_payable').val("");	
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

	
	$('#con').click(function(){
	 	if($(this).prop("checked") == true){
			$("#amount_payable").attr("required", true);
			$("#retained_by").attr("required", true);
			
			//$("#amount_payable").jqBootstrapValidation();
			$("#retained_by").jqBootstrapValidation();
		}
		else if($(this).prop("checked") == false){
			$("#amount_payable").attr("required", false);
			$("#retained_by").attr("required", false);

			//$("#amount_payable").jqBootstrapValidation("destroy");
			$(".amt").removeClass("error");
			$(".amt .help-block").html("");
			$("#edit_lead").not("[type=submit]").jqBootstrapValidation();
		}
		
	})

	$('#remarks').click(function(){
		var remarks = $('#remarks_box').val();
		if(remarks.length != 0){
			var data = {'remarks':remarks,'lead_id':$('#remark_lead_id').val(),'user_id':$('#remark_user_id').val()};
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
					$('#all_remarks').empty();
					$('#remarks_box').val("");
	          		$(dataObj).each(function() {
		             	$('#all_remarks').append(
		             		"<li class='bg-light p-0 mb-15'><div class='position-relative p-20'><span class='text-line font-size-16'>"+this.user.first_name+" "+this.user.last_name+"</span><div class='mt-5 ml-0 pl-5'>"+this.remarks+"</div><div class='mt-5 ml-0 pl-5'><em>"+formatDate(this.remarks_date)+"</em></div>"
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


	$('#category').change(function() {
		$('#subCategory').each(function() {
			$('#subCategory option').remove();
		});
		var data = {'cat_id':$(this).val()};
		var callUrl = "<?php echo Router::url(array('controller'=>'Users','action'=>'getSubCatById')); ?>";
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
          		$(dataObj).each(function() {
	             	$('#subCategory').append($("<option>").attr('value',this.id).text(this.name));
	            });
          	},
          	error:  function() {
                alert('Error occured');
                return;
          	}
      	});	
	});


});

</script>



<?= $this->Html->script('popper.min.js'); ?>


<?= $this->Html->script('custome.js'); ?>



