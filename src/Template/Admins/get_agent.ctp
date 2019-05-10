<section class="content">       
    <div class="row">
        <!-- Head Content -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
              <div class="no-shrink py-30">
                <span class="mdi mdi-account font-size-50"></span>
              </div>

              <div class="py-30 bg-white text-dark">
                <div class="font-size-30 countnm"><?php echo $key_data['agent_count']; ?></div>
                <span>Total Agent</span>
              </div>
            </div>
        </div>
        
<!-- Main Content -->
        <div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Agent List</h3>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="tickets" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Branch</th>
                                    <th>Country</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($key_data['agent_list'] as $agent) { ?>
                                    <tr>
                                        <td><?php echo $agent->first_name."  ".$agent->last_name; ?></td>
                                        <td><?php echo $agent->company->name; ?></td>
                                        <td><?php echo $agent->country; ?></td>
                                        <td><?php echo $agent->email; ?></td>
                                        <td> 
                                            <?php echo $this->Html->link('<i class="mdi mdi-account-multiple"></i> View Leads',['controller' => 'Admins', 'action' => 'agentViewLead',$agent->id],['class'=>'btn btn-success mb-5','escape' => false]); ?>
                                        </td> 
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





<?= $this->Html->script('popper.min.js'); ?>

<?= $this->Html->script('datatables.min.js'); ?>
<?= $this->Html->script('data-table.js'); ?>
<?= $this->Html->script('custome.js'); ?>


<?php

//pr($key_data);


 ?>

