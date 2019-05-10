<section class="content">       
    <div class="row">
        <!-- Head Content -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
              <div class="no-shrink py-30">
                <span class="mdi mdi-link-variant font-size-50"></span>
              </div>

              <div class="py-30 bg-white text-dark">
                <div class="font-size-30 countnm"><?php echo $key_data['link_count']; ?></div>
                <span>Total Links</span>
              </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">List of Links</h3>
                   <?php echo $this->Html->link('Add Link',['controller' => 'Admins', 'action' => 'getLink'],['data-toggle'=>'modal','data-target'=>'#link','class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]); ?>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="lead" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Link Name</th>
                                    <th>Url</th>
                                    <th>Display To</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($key_data['link_data'] as $link) { ?>
                                    <tr>
                                        <td><?php echo $link->name; ?></td>
                                        <td><?php echo $link->url; ?></td>
                                        <td><?php echo $link->display_to; ?></td>
                                        <td><?php echo $this->Html->link('<i class="fa fa-edit"></i>Edit',['controller' => 'Admins', 'action' => 'changeLink',$link->id],['class'=>'btn btn-rounded btn-info mb-5','escape' => false]); ?></td>	
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


<?php

$display_list = array('Client'=>'Client','Staff'=>'Staff','All'=>'All');

?>
<div class="modal center-modal fade" id="link" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Link</h5>
                <a type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <?php echo $this->Form->create('Users', array('action' => 'changeLink','controller'=>'Admins','class'=>'form-horizontal form-element')); ?>
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                   <?php echo $this->Form->input('name',array('class'=>'form-control')); ?>
		                                </div>
		                            </div>
                                  	<div class="col-md-6">
                                    	<div class="form-group">
                                        	<?php echo $this->Form->input('url',array('class'=>'form-control')); ?>
                                    	</div>
                                  	</div>
                                </div>
                                <div class="row">
                                	<div class="col-md-12">
	                                    <div class="form-group">
	                                    	<div class="input text">
		                                        <label>Display To</label>
												<?php echo $this->Form->select('display_to',$display_list,['empty' => ' ','class'=>'form-control']); ?>
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

<?= $this->Html->script('popper.min.js'); ?>

<?= $this->Html->script('datatables.min.js'); ?>
<?= $this->Html->script('data-table.js'); ?>
<?= $this->Html->script('custome.js'); ?>
