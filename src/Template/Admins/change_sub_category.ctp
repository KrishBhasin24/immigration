<?php

$category = array();
foreach ($key_data['cat_list'] as $value) {
  $category[$value->id] = $value->name;
}

?>

<section class="content">       
    <div class="row">
    	<div class="col-lg-6 col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Edit Sub Category</h4>
					<?php echo $this->Form->create($key_data['subcat_list'], array('action' => 'changeSubCategory','controller'=>'Admins','class'=>'form-horizontal form-element','novalidate')); ?>
		                <div class="modal-body">
		                    <div class="col-xl-12 col-lg-12">
		                        <div class="box">
		                            <div class="box-body">
		                                <div class="row">
				                            <div class="col-md-12">
				                                <div class="form-group">
				                                   <div class="controls">
												   		<?php echo $this->Form->input('name',array('label'=>'Sub Category Name<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
													</div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="row">
		                                	<div class="col-md-12">
		                                    	<div class="form-group">
		                                        	<div class="controls">
			                                        	<div class="input text">
			                                        		<label>Category<span class="text-danger">*</span></label>
			                                       			<?php echo $this->Form->select('category_id',$category,['empty' => ' ','class'=>'form-control','required']); ?>
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
		                	<?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'getCategory'],['class'=>'btn btn-danger','escape' => false]); ?>
		                    <?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success btn-primary float-right','escape' => false)); ?>
		                </div>
		            <?php echo $this->Form->end(); ?>
	            </div>
	        </div>
	    </div>
	</div>
</section>