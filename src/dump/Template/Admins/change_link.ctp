<?php

$display_list = array('Client'=>'Client','Staff'=>'Staff','All'=>'All');

?>

<section class="content">       
    <div class="row">
    	<div class="col-lg-9 col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Edit Link</h4>
					<?php echo $this->Form->create($key_data['link_data'], array('action' => 'changeLink','controller'=>'Admins','class'=>'form-horizontal form-element','novalidate')); ?>
		                <div class="modal-body">
		                    <div class="col-xl-12 col-lg-12">
		                        <div class="box">
		                            <div class="box-body">
		                                <div class="row">
				                            <div class="col-md-6">
				                                <div class="form-group">
				                                   	<div class="controls">
		                                                <?php echo $this->Form->control('name',array('label'=>'Link Name<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
		                                            </div>
				                                </div>
				                            </div>
				                            <div class="col-md-6">
			                                    <div class="form-group">
			                                        <div class="controls">
		                                                <?php echo $this->Form->control('url',array('label'=>'Link Url<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
		                                            </div>
			                                    </div>
		                                  	</div>
		                                  	
		                                </div>
		                                <div class="row">
		                                	<div class="col-md-12">
		                                    	<div class="form-group">
		                                        	<div class="controls">
		    	                                    	<div class="input text">
		    		                                        <label>Display To<span class="text-danger">*</span></label>
		    												<?php echo $this->Form->select('display_to',$display_list,['empty' => ' ','class'=>'form-control','required']); ?>
		    											</div>
		                                            </div>
		                                    	</div>
		                                  	</div>
		                                </div>
									</div>
		                        </div>
		                    </div>
		                </div>
		                <div class="modal-footer modal-footer-uniform">
		                	<?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'getLink'],['class'=>'btn btn-danger','escape' => false]); ?>
		                    <?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success btn-primary float-right','escape' => false)); ?>
		                </div>
		            <?php echo $this->Form->end(); ?>
	            </div>
	        </div>
	    </div>
	</div>
</section>