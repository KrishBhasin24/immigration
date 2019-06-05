<?php
//pr($key_data['page_data']);	

/*foreach ($key_data['page_data'] as $value) {
	if( !empty($value['pages']) ){
		pr($value);	
	}
}*/


 ?>


<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto w-p50">
            <h3 class="page-title">Staff Section</h3>
        </div>
    </div>
</div>
<section class="content">       
    <div class="row">
    	<div class="col-lg-9 col-12 permission">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Set Permission</h4>	
					<?php echo $this->Form->create('Permissions', ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'setPermission',$key_data['user_data']['id']]]); ?>
					<div class="box-body">
						<?php  foreach ($key_data['page_data'] as $page) { 
							if( !empty($page['pages']) ){ ?>
								<h4 class="box-title text-info"><?php echo $page['name']; ?></h4>
								<div class="box-body">
									<div class="form-group">
										<div class="c-inputs-stacked custom_check">
										<?php foreach ($page['pages'] as $value) {  
											echo $this->Form->checkbox('handle', ['value' => $value->handle.'_'.$value->name.'_'.$value->menu_id,'name' => 'handle[]','hiddenField' => false,'id'=>$value->id,'checked' => in_array($value->handle, $key_data['permission_data']) ? true : false ]); 
										?>
										<label for="<?php echo $value->id; ?>" class="block"><?php echo $value->name; ?></label>
										<?php } ?>
										</div>
									</div>
								</div>
						<?php } } ?>
					</div>
					<div class="box-footer">
						<?php echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back',['controller' => 'Admins', 'action' => 'getAllStaff'],['class'=>'btn btn-danger','escape' => false]); ?>
						<?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success pull-right','escape' => false)); ?>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</section>




