<?php
//pr($key_data['loggedInUser']);
//pr($key_data['leadDetail']);
//pr($key_data['count']);

 ?>
 <section class="content">       
    <div class="row">
    	<div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Manage All Cases</h3>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="caselead" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Lead No.</th>
                                    <th>Lead Agent</th>
                                    <th>Retained By</th>
                                    <th>Official File No.</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Cic File No.</th>
                                    <th>Case Processed By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                             <tbody>
                                <?php foreach ($key_data['leadDetail'] as $lead) { ?>
                                    <tr>
                                        <td><?php echo $lead->id; ?></td>
                                        <td><?php echo $lead->lead->first_name." ".$lead->lead->last_name; ?></td>
                                        <td><?php echo $lead->retain->first_name." ".$lead->retain->last_name; ?></td>
                                        <td><?php echo $lead->account_lead->id; ?></td>
                                        <td><?php echo $lead->category->name." / ".$lead->sub_category->name; ?></td>
                                        <td><?php echo $lead->first_name." ".$lead->last_name; ?></td>
                                        <td><?php echo $lead->lead_status->lead_status; ?></td>
                                        <td><?php echo $lead->account_lead->cic_file_id; ?></td>
                                        <td><?php echo $lead->filling->first_name." ".$lead->filling->last_name; ?></td>
                                        <td>
                                        	<div class="btn-group mb-5">
                                                <span  class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</span>
                                                <div class="dropdown-menu">
                                                    <?php echo $this->Html->link('View',['controller' => 'Admins', 'action' => 'editCase',$lead->id],['class'=>'dropdown-item text-danger','escape' => false]); ?>
                                                    <div class="dropdown-divider bg-dange"></div>
                                                    <?php if($key_data['loggedInUser']['department_id'] == 1 || $key_data['loggedInUser']['department_id'] == 3 ){ ?>
                                                    <?php echo $this->Html->link('Re-Assign',['controller' => 'Admins', 'action' => 'caseReAssign',$lead->id],['class'=>'dropdown-item text-danger','escape' => false]); ?>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </td> 
                                    </tr>   
                                <?php } ?>
                            </tbody>
                            <tfoot>
                            	<th></th>
                                <th></th>
                                <th>Retained By</th>
                                <th></th>
                                <th>Category</th>
                                <th></th>
                                <th>Status</th>
                                <th></th>
                                <th>Case Processed By</th>
                                <th></th>
                                
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