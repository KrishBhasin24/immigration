<?php //pr($key_data['lead_list']); ?>

<section class="content">       
    <div class="row">
        <!-- Head Content -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
              <div class="no-shrink py-30">
                <span class="mdi mdi-book-variant font-size-50"></span>
              </div>

              <div class="py-30 bg-white text-dark">
                <div class="font-size-30 countnm"><?php echo $key_data['my_lead_count']; ?></div>
                <span>My Total Lead</span>
              </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Lead List</h3>
                   <?php echo $this->Html->link('Add Lead',['controller' => 'Admins', 'action' => 'addLead'],['class'=>'btn btn-rounded btn-success mb-5 right','escape' => false]); ?>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="viewlead" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Lead No</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Status</th>
                                    <th>Resident</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                             <tbody>
                                <?php foreach ($key_data['lead_list'] as $lead) { ?>
                                    <tr>
                                        <td><?php echo $lead->id; ?></td>
                                        <td><?php echo $lead->first_name."  ".$lead->last_name; ?></td>
                                        <td><?php echo $lead->category->name; ?></td>
                                        <td><?php echo $lead->sub_category->name; ?></td>
                                        <td><?php echo $lead->lead_status->lead_status; ?></td>
                                        <td><?php echo $lead->country; ?></td>
                                        <td><?php echo $lead->telephone; ?></td>
                                        <td> 
                                            <div class="btn-group mb-5">
                                                <span  class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</span>
                                                <div class="dropdown-menu">
                                                    <?php echo $this->Html->link('Edit',['controller' => 'Admins', 'action' => 'editLead',$lead->id],['class'=>'dropdown-item','escape' => false]); ?>
                                                    
                                                    <?php if($lead->lead_status->lead_status == 'R'){ ?>
                                                        <div class="dropdown-divider"></div>
                                                    <?php echo $this->Html->link('Case Assign',['controller' => 'Admins', 'action' => 'caseAssign',$lead->id],['class'=>'dropdown-item','escape' => false]);}?>
                                                </div>
                                            </div>
                                        </td> 
                                    </tr>   
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
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

