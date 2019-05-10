<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto w-p50">
			<h3 class="page-title">Companies & Branches</h3>
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
				<div class="font-size-30 countnm"><?php echo $key_data['company_count']; ?></div>
				<span>Total Companies</span>
			  </div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 col-12">
			<div class="flexbox flex-justified text-center bg-warning mb-30 pull-up">
			  <div class="no-shrink py-30">
				<span class="mdi mdi-bank font-size-50"></span>
			  </div>

			  <div class="py-30 bg-white text-dark">
				<div class="font-size-30 countnm"><?php echo $key_data['branch_count']; ?></div>
				<span>Total Branches</span>
			  </div>
			</div>
		</div>

		<!-- Main Content -->
		<div class="col-12 col-lg-6">
			<div class="box">
				<div class="box-header with-border">						
					<h4 class="box-title">Comapny List</h4>
					<?php echo $this->Html->link('Add Company',['controller' => 'Admins', 'action' => 'addCompany'],['data-toggle'=>'modal','data-target'=>'#company','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]); ?>
				</div>
				<div class="box-body p-15">						
					<div class="table-responsive">
						<table id="tickets" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
							<thead>
								<tr>
									<th>Name</th>
									<th>City</th>
									<th>Province</th>
									<th>Country</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($key_data['company'] as $company) { ?>
									<tr>
										<td><?php echo $company->name; ?></td>
										<td><?php echo $company->city; ?></td>
										<td><?php echo $company->province; ?></td>
										<td><?php echo $company->country; ?></td>
										<td><?php echo $company->email; ?></td>
										<td><?php echo $this->Html->link('<i class="fa fa-edit"></i>Edit',['controller' => 'Admins', 'action' => 'editCompany',$company->id],['class'=>'btn btn-rounded btn-info mb-5','escape' => false]); ?></td>	
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
					<h4 class="box-title">Branch List</h4>
					<?php echo $this->Html->link('Add Branch',['controller' => 'Admins', 'action' => 'addCompany'],['data-toggle'=>'modal','data-target'=>'#branchData','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]); ?>
				</div>
				<div class="box-body p-15">						
					<div class="table-responsive">
						<table id="branch" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
							<thead>
								<tr>
									<th>Name</th>
									<th>City</th>
									<th>Province</th>
									<th>Country</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($key_data['branch'] as $branch) { ?>
									<tr>
										<td><?php echo $branch->name; ?></td>
										<td><?php echo $branch->city; ?></td>
										<td><?php echo $branch->province; ?></td>
										<td><?php echo $branch->country; ?></td>
										<td><?php echo $branch->email; ?></td>
										<td><?php echo $this->Html->link('<i class="fa fa-edit"></i>Edit',['controller' => 'Admins', 'action' => 'editCompany',$branch->id],['class'=>'btn btn-rounded btn-info mb-5','escape' => false]); ?></td>	
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


<?php //pr($key_data['company']);
foreach ($key_data['company'] as $value) {
  $parent[$value->id] = $value->name;
}

/*$main_parent = array(0=>'No Parent');
$parent = $main_parent+$parent;*/

 ?>

<!-- content-wrpper div close -->
</div>

<!-- content-wrpper div close -->

<div class="modal center-modal fade" id="company" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Company</h5>
				<a type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<?php echo $this->Form->create('User', array('action' => 'addCompany','controller'=>'Admins','class'=>'form-horizontal form-element')); ?>
		  	  	<div class="modal-body">
					<div class="col-xl-12 col-lg-12">
					  	<div class="box">
			            	<div class="box-body">
			            		<?php echo $this->Form->input('parent_id',array('class'=>'form-control','type'=>'hidden','value'=>0)); ?>
			            		<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									   <?php echo $this->Form->input('name',array('class'=>'form-control')); ?>
									</div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									 	<?php echo $this->Form->input('telephone',array('class'=>'form-control','type'=>'text')); ?>
									</div>
								  </div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										   <?php echo $this->Form->input('email',array('class'=>'form-control','type'=>'text')); ?>
										</div>
								  	</div>
								  	<div class="col-md-6">
										<div class="form-group">
										 	<?php echo $this->Form->input('website',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										   <?php echo $this->Form->input('address',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								  	<div class="col-md-6">
										<div class="form-group">
										 	<?php echo $this->Form->input('city',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <?php echo $this->Form->input('province',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								  	<div class="col-md-6">
										<div class="form-group">
										  <?php echo $this->Form->input('postal_code',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <?php echo $this->Form->input('country',array('class'=>'form-control')); ?>
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
<div class="modal center-modal fade" id="branchData" tabindex="-2">
	  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Branch</h5>
				<a type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<?php echo $this->Form->create('User', array('action' => 'addCompany','controller'=>'Admins','class'=>'form-horizontal form-element')); ?>
		  	  	<div class="modal-body">
					<div class="col-xl-12 col-lg-12">
					  	<div class="box">
			            	<div class="box-body">
			            		<div class="row">
								  <div class="col-md-12">
									<div class="form-group">
										<div class="input text">
										<label>Company</label>
									   <?php 
									   		 echo $this->Form->select(
											      'parent_id',
											      $parent,
											      ['empty' => ' ','class'=>'form-control']
											  );

									   ?>
									</div>
									</div>
								  </div>
								  
								</div>
			            		<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									   <?php echo $this->Form->input('name',array('class'=>'form-control')); ?>
									</div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									 	<?php echo $this->Form->input('telephone',array('class'=>'form-control','type'=>'text')); ?>
									</div>
								  </div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										   <?php echo $this->Form->input('email',array('class'=>'form-control','type'=>'text')); ?>
										</div>
								  	</div>
								  	<div class="col-md-6">
										<div class="form-group">
										 	<?php echo $this->Form->input('website',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										   <?php echo $this->Form->input('address',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								  	<div class="col-md-6">
										<div class="form-group">
										 	<?php echo $this->Form->input('city',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <?php echo $this->Form->input('province',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								  	<div class="col-md-6">
										<div class="form-group">
										  <?php echo $this->Form->input('postal_code',array('class'=>'form-control')); ?>
										</div>
								  	</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <?php echo $this->Form->input('country',array('class'=>'form-control')); ?>
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

