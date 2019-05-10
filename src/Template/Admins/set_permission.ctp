<?php
//pr($key_data['page_data']);	


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

					<?php 
					echo $this->Form->create('Permissions', ['class'=> 'formValidation','url' => ['controller'=>'Admins','action'=>'setPermission',$key_data['user_data']['id']]]); ?>
					<div class="box-body">
						<div class="form-group">
							<div class="c-inputs-stacked">

								<?php  foreach ($key_data['page_data'] as $page) { ?>
									
									<?php echo $this->Form->checkbox('handle', ['value' => $page->handle.'_'.$page->name.'_'.$page->menu_id,'name' => 'handle[]','hiddenField' => false,'id'=>$page->id,'checked' => in_array($page->handle, $key_data['permission_data']) ? true : false ]);	?>
									<label for="<?php echo $page->id; ?>" class="block"><?php echo $page->name; ?></label>
								<?php } ?>
							</div>
						</div>
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




