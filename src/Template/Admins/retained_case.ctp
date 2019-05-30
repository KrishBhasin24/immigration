<?php

//pr($key_data);
 ?>

 <section class="content">       
    <div class="row">
        <!-- Head Content -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
              <div class="no-shrink py-30">
                <span class="mdi mdi-book-variant font-size-50"></span>
              </div>

              <div class="py-30 bg-white text-dark">
                <div class="font-size-30 countnm"><?php echo $key_data['retained_lead_count']; ?></div>
                <span>My Retained Lead</span>
              </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Retained Cases</h3>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                    	<table id="retained" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Lead No.</th>
                                    <th>Lead Agent</th>
                                    <th>Official File No.</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Cic File No.</th>
                                    <th>Case Processed By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($key_data['retained_lead_data'] as $lead) { ?>
                                    <tr>
                                        <td><?php echo $lead->id; ?></td>
                                        <td><?php echo $lead->lead->first_name." ".$lead->lead->last_name; ?></td>
                                        <td><?php echo $lead->account_lead->id; ?></td>
                                        <td><?php echo $lead->category->name; ?></td>
                                        <td><?php echo $lead->sub_category->name; ?></td>
                                        <td><?php echo $lead->first_name." ".$lead->last_name; ?></td>
                                        <td><?php echo $lead->lead_status->lead_status; ?></td>
                                        <td><?php echo $lead->account_lead->cic_file_id; ?></td>
                                        <td><?php echo $lead->filling->first_name." ".$lead->filling->last_name; ?></td>
                                        <td>
                                        	<div class="btn-group mb-5">
                                                <span  class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</span>
                                                <div class="dropdown-menu">
                                                    <?php echo $this->Html->link('Manage Remarks',['controller' => 'Admins', 'action' => 'manageRemarks',$lead->id],['class'=>'dropdown-item','escape' => false]); ?>
                                                </div>
                                            </div>
                                        </td> 
                                    </tr>   
                                <?php } ?>
                            </tbody>
                            <tfoot>
                            	<th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
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