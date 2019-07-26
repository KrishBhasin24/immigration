<?php //pr($key_data); ?>

<section class="content">       
    <div class="row">
		<div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Retained Lead List</h3>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="acclead" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Lead No.</th>
                                    <th>File No.</th>
                                    <th>Retained By</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                             <tbody>
                                <?php foreach ($key_data['accountLeads'] as $lead) { ?>
                                    <tr>
                                        <td><?php echo $lead->id; ?></td>
                                        <td><?php echo $lead->account_lead->id; ?></td>
                                        <td><?php echo $lead->retain->first_name." ".$lead->retain->last_name; ?></td>
                                        <td><?php echo $lead->first_name."  ".$lead->last_name; ?></td>
                                        <td><?php echo $lead->category->name." / ".$lead->sub_category->name; ?></td>
                                        <td><?php echo $lead->lead_status->lead_status; ?></td>
                                        <td>
                                        	<?php echo $this->Html->link('Manage Receipt',['controller' => 'Admins', 'action' => 'manageReceipt',$lead->id],['class'=>'btn btn-purple mb-5','escape' => false]); ?>
                                        </td> 
                                    </tr>   
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Retained By</th>
                                    <th></th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th></th>
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>


<?= $this->Html->script('popper.min.js'); ?>
<?= $this->Html->script('datatables.min.js'); ?>
<?= $this->Html->script('data-table.js'); ?>
<?= $this->Html->script('custome.js'); ?>