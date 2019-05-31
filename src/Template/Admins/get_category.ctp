<?php //pr($key_data);die; ?>
<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto w-p50">
			<h3 class="page-title">Immigration Category</h3>
		</div>
	</div>
</div>
<section class="content">		
  	<div class="row">
  		<!-- Head Content -->
		<div class="col-xl-4 col-md-6 col-12">
			<div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
			  <div class="no-shrink py-30">
				<span class="mdi mdi-domain font-size-50"></span>
			  </div>
  			  <div class="py-30 bg-white text-dark">
				<div class="font-size-30 countnm"><?php echo $key_data['cat_count']; ?></div>
				<span>Total  Category</span>
			  </div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 col-12">
			<div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
			  <div class="no-shrink py-30">
				<span class="mdi mdi-domain font-size-50"></span>
			  </div>
  			  <div class="py-30 bg-white text-dark">
				<div class="font-size-30 countnm"><?php echo $key_data['subcat_count']; ?></div>
				<span>Total  Sub Category</span>
			  </div>
			</div>
		</div>
		<div class="col-12 col-lg-6">
			<div class="box">
				<div class="box-header with-border">						
					<h4 class="box-title">Category List</h4>
					<?php echo $this->Html->link('Add Category',['controller' => 'Admins', 'action' => 'addCatgory'],['data-toggle'=>'modal','data-target'=>'#category','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]); ?>
				</div>
				<div class="box-body p-15">						
					<div class="table-responsive">
						<table id="example2" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
							<thead>
								<tr>
									<th>Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($key_data['cat_list'] as $cat) { ?>
									<tr>
										<td><?php echo $cat->name; ?></td>
										<td><?php echo $this->Html->link('<i class="fa fa-edit"></i>Edit',['controller' => 'Admins', 'action' => 'changeCategory',$cat->id],['class'=>'btn btn-rounded btn-info mb-5','escape' => false]); ?></td>	
									</tr>	
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6">
			<div class="box">
				<div class="box-header with-border">						
					<h4 class="box-title">Sub Category List</h4>
					<?php echo $this->Html->link('Add Sub Category',['controller' => 'Admins', 'action' => 'addSubCatgory'],['data-toggle'=>'modal','data-target'=>'#subCategory','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]); ?>
				</div>
				<div class="box-body p-15">						
					<div class="table-responsive">
						<table id="cat" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="5">
							<thead>
								<tr>
									<th>Name</th>
									<th>Category</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($key_data['subcat_list'] as $subcat) { ?>
									<tr>
										<td><?php echo $subcat->name; ?></td>
										<td><?php echo $subcat->category->name; ?></td>
										<td><?php echo $this->Html->link('<i class="fa fa-edit"></i>Edit',['controller' => 'Admins', 'action' => 'changeSubCategory',$subcat->id],['class'=>'btn btn-rounded btn-info mb-5','escape' => false]); ?></td>	
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

<!-- content-wrpper div close -->
</div>

<!-- content-wrpper div close -->

<?php //pr($key_data['company']);
$category = array();
foreach ($key_data['cat_list'] as $value) {
  $category[$value->id] = $value->name;
}


 ?>


<div class="modal center-modal fade" id="category" tabindex="-2">
	  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Category</h5>
				<a type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<?php echo $this->Form->create('Category', array('action' => 'changeCategory','controller'=>'Admins','class'=>'form-horizontal form-element','novalidate')); ?>
		  	  	<div class="modal-body">
					<div class="col-xl-12 col-lg-12">
					  	<div class="box">
			            	<div class="box-body">
			            		<div class="row">
								  <div class="col-md-12">
									<div class="form-group">
										<div class="controls">
									   		<?php echo $this->Form->control('name',array('label'=>'Category Name<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
										</div>
									</div>
								  </div>
  								</div>
							</div>
					    </div>
					</div>
			  	</div>
				<div class="modal-footer modal-footer-uniform">
					
					<?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success btn-primary float-right','escape' => false)); ?>
				</div>
		   	<?php echo $this->Form->end(); ?>
		</div>
	  </div>
</div>

<div class="modal center-modal fade" id="subCategory" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Sub Category</h5>
				<a type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<?php echo $this->Form->create('SubCategory', array('action' => 'addSubCategory','controller'=>'Admins','class'=>'form-horizontal form-element','novalidate')); ?>
		  	  	<div class="modal-body">
					<div class="col-xl-12 col-lg-12">
					  	<div class="box">
			            	<div class="box-body">
			            		<div class="row">
								  <div class="col-md-12">
									<div class="form-group">
										<div class="controls">
									   		<?php echo $this->Form->control('name',array('label'=>'Sub Category Name<span class="text-danger">*</span>','escape'=>false,'required','class'=>'form-control')); ?>
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
											   <?php echo $this->Form->select('catgory_id',$category,['empty' => ' ','class'=>'form-control','required']);?>
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
					
					<?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-success btn-primary float-right','escape' => false)); ?>
				</div>
		   	<?php echo $this->Form->end(); ?>
		</div>
	  </div>
</div>

<?= $this->Html->script('datatables.min.js'); ?>
<?= $this->Html->script('data-table.js'); ?>
<?= $this->Html->script('custome.js'); ?>

