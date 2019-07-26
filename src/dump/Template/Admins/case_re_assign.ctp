<?php //pr($key_data['user_list']); ?>
<?php use Cake\Routing\Router; ?>
<?= $this->Html->css('sweetalert.css'); ?>

<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto w-p50">
            <h3 class="page-title">Case Re Assignment</h3>
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
		<div class="col-lg-4 col-12"> 			
		  	<div class="box">
		  		<div class="box-header with-border">
			  		<h4 class="box-title pt-5">Case Detail</h4>
		  		</div>
		  		<div class="box-body">
					<div class="flexbox bb-1 mb-10">
						<div><p><span class="text-light">Lead Id:</span> <strong ><?php echo $key_data['lead_info']->id; ?></strong></p></div>
						<p style="display: none" id="lead_id"><?php echo $key_data['lead_info']->id; ?></p>
						<div><p><span class="text-light">File Id:</span> <strong><?php echo $key_data['lead_info']->account_lead->id; ?></strong></p></div>
					</div>
					<div class="row">						
						<div class="col-12">
							<div class="row bb-1 pb-10">
								<div class="col-4">							  
									<div>
										<p class="mb-0"><small>Immigration Class</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['lead_info']->category->name; ?></strong></h5>
									</div>
								</div>
								<div class="col-4 bl-1 br-1">							  
									<div>
										<p class="mb-0"><small>Sub Class</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['lead_info']->sub_category->name; ?></strong></h5>
									</div>
								</div>
								<div class="col-4">							  
									<div>
										<p class="mb-0"><small>Submission Deadline</small></p> 
										<h5 class="text-black mb-0"><strong><?php echo $key_data['lead_info']->submission_deadline; ?></strong></h5>
									</div>
								</div>	
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>	
		<div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Case Processing Team</h3>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="viewlead" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>In Progress Cases</th>
                                    <th>Assigned Cases</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach ( $key_data['user_list'] as $user) { ?>
                                    <tr>
                                  		<td style="display: none" id="user_id"><?php echo $user->id; ?></td>

                                        <td><?php echo $user->first_name." ".$user->last_name; ?></td>
                                        <td><?php echo $user->in_progress; ?></td>
                                        <td><?php echo $user->assigned; ?></td>
                                        <td> 
                                            <div class="btn-group mb-5">
                                               <?php echo $this->Form->button('<i class="fa fa-check-square-o"></i> Assign', array('type' => 'submit','value'=>$user->id,'class' => 'btn btn-success btn-primary float-right sa-params','escape' => false)); ?>
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
<?= $this->Html->script('sweetalert.min.js'); ?>

<script>

!function($) {
	    "use strict";
		var SweetAlert = function() {};
		SweetAlert.prototype.init = function() {
	        $('.sa-params').click(function(){
	        	var user_id = this.value;
	        	var lead_id = $('#lead_id').html();
	        	//console.log(this.value);
		        swal({   
		            title: "Are you sure?",   
		            text: "Case Re-Assign to someone else",   
		            type: "warning",   
		            showCancelButton: true,   
		            confirmButtonColor: "#DD6B55",   
		            confirmButtonText: "Yes, Re-Assign it!",   
		            cancelButtonText: "No, Go Back!",   
		            closeOnConfirm: false,   
		            closeOnCancel: false 
		        }, function(isConfirm){   
		            if (isConfirm) { 
		            	caseAssign(lead_id,user_id);
						swal({
					            title: "Assigned!",
					            text: "Lead has been Re-Assigned!",
					            type: "success"
					        }, function() {
					            window.location = "<?php echo Router::url(array("controller" => "Admins", "action" => "manageCase")); ?>";
				        	});
					} else {
		            	swal("Cancelled", "Case Still assigned to previous agent!", "error");   
		            } 
		        });
		    });
	 	},
		$.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
	}(window.jQuery),

	function($) {
    	"use strict";
    	$.SweetAlert.init()
	}(window.jQuery);


function caseAssign(lead_id,user_id){
	var data = {'lead_id':lead_id,'user_id':user_id};
	var callUrl = "<?php echo Router::url(array('controller'=>'Leads','action'=>'leadReAssignToCaseprocessing')); ?>";
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
      		return;
        },
      	error: function() {
            alert('Error occured');
            return;
      	}
  	});	


}
function redirect(){
	window.location.replace("<?php echo Router::url(array("controller" => "Admins", "action" => "getLead")); ?>"); 
}




</script>