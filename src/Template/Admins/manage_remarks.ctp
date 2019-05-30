<?php //pr($key_data['lead_id']); ?>
<?php use Cake\Routing\Router; ?>

<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto w-p50">
            <h3 class="page-title">Manage Lead Remarks</h3>
            <div class="d-inline-block align-items-center">
				<nav>
					<ol class="breadcrumb">
						<li class=><?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'retainedCase'],['class'=>'btn btn-danger','escape' => false]); ?></li>
					</ol>
				</nav>
			</div>
        </div>
	</div>
</div>
<section class="content">       
    <div class="row">
    	<?php //pr($key_data); ?>
    	<div class="col-md-6 col-lg-6">
            <div class="box">
				<div class="box-header with-border">
              		<h5 class="box-title">Resent Remarks</h5>
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
			</div>
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="box">
				<div class="box-header with-border">
              		<h5 class="box-title">Add Remarks</h5>
				</div>
				<div class="box-body p-0 ">
					<div class="card-body">
						<?php echo $this->Form->create('remarks', ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'newdata']]); ?>
						<div class="form-group row">
							<div class="col-12">
								<?php echo $this->Form->input('remarks',array('class'=>'form-control','id'=>'remarks_box','placeholder'=>'Please Enter Here','type'=>'textarea','label'=>false)); ?>
								<?php echo $this->Form->input('lead_id',array('id'=>'remark_lead_id','type'=>'hidden','value'=>$key_data['lead_id'])); ?>
								<?php echo $this->Form->input('user_id',array('id'=>'remark_user_id','type'=>'hidden','value'=>$key_data['loggedInUser']['id'])); ?>
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


<script>

$(document).ready(function() {	

	function formatDate(date) {
	     var d = new Date(date),
	         month = '' + (d.getMonth() + 1),
	         day = '' + d.getDate(),
	         year = d.getFullYear();

	     if (month.length < 2) month = '0' + month;
	     if (day.length < 2) day = '0' + day;

	     return [year, month, day].join('-');
	} 
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
					$('#remarks_list').empty();
					$('#remarks_box').val("");
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
});

</script>



<?= $this->Html->script('popper.min.js'); ?>


<?= $this->Html->script('custome.js'); ?>

