<?php

//pr($key_data);

foreach ($key_data['Countries'] as $val){
    $Countries[$val->name] = $val->name;
}

foreach ($key_data['category'] as $val){
    $category[$val->id] = $val->name;
}

$marital_status  = array('Never Married'=>'Never Married','Engaged'=>'Engaged','Married'=>'Married','Widowed'=>'Widowed','Separated'=>'Separated','Divorced'=>'Divorced','Comman Law Partner'=>'Comman Law Partner');

 ?>
<?php use Cake\Routing\Router; ?>


 <div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto w-p50">
            <h3 class="page-title">Leads</h3>
        </div>
    </div>
</div>

<section class="content">       
    <div class="row">
    	<div class="col-lg-12 col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Add Lead</h4>	
					<?php echo $this->Form->create('lead', ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'addLead']]); ?>
					<div class="box-body">
						<h4 class="box-title text-info"><i class="ti-location-arrow mr-15"></i> Immigration Category</h4>
						<hr class="my-15">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="input text">
										<label>Immigration Type</label>
										<?php 
	                                       	echo $this->Form->select(
												'category_id',
												$category,
												['empty' => ' ','class'=>'form-control','id'=>'category']
	                                      	);

	                                   	?>
                                   	</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<div class="input text">
										<label>Immigration Sub Type</label>
										<?php echo $this->Form->select('sub_category_id',null,['empty' => ' ','class'=>'form-control','id'=>'subCategory']);?>
									</div>
								</div>
							</div>
						</div>
						<h4 class="box-title text-info"><i class="ti-user mr-15"></i>Personal Info</h4>
						<hr class="my-15">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->input('first_name',array('class'=>'form-control','placeholder'=>'First name')); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->input('last_name',array('class'=>'form-control','placeholder'=>'Last name')); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Email')); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->input('address',array('class'=>'form-control','placeholder'=>'Address','type'=>'textarea')); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<!-- <div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->input('address',array('class'=>'form-control','placeholder'=>'Address','type'=>'textarea')); ?>
								</div>
							</div> -->
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->input('telephone',array('class'=>'form-control','placeholder'=>'Phone')); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->input('city',array('class'=>'form-control','placeholder'=>'City')); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->input('province',array('class'=>'form-control','placeholder'=>'Province')); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php echo $this->Form->input('postal_code',array('class'=>'form-control','placeholder'=>'PostalCode')); ?>
								</div>
							</div>
						</div>
						<div class="row">
							
							
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
										<?php echo $this->Form->select('marital_status ',$marital_status,['empty' => ' ','class'=>'form-control']);?>	
									</div>
								</div>
							</div>
						</div>
						
						<h4 class="box-title text-info"><i class="ti-pencil-alt mr-15"></i>Extra Info</h4>
						<hr class="my-15">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->input('reason_of_qualify',array('class'=>'form-control','placeholder'=>'Reason Of Qualification','type'=>'textarea')); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php echo $this->Form->input('special_instruction ',array('class'=>'form-control','placeholder'=>'Special Instruction','type'=>'textarea')); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="input text">
										<label>Submission Deadline</label>
										<input class="form-control" type="date" name="submission_deadline">
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</section>



<script>

$(document).ready(function() {	 	


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

