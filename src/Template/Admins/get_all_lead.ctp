<?php
//pr( $key_data['all_lead']);die;
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
                <div class="font-size-30 countnm"><?php echo $key_data['all_lead_count']; ?></div>
                <span>Total Lead</span>
              </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">All Lead</h3>
                </div>
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                        <table id="viewlead" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Lead No</th>
                                    <th>File No</th>
                                    <th>Lead Date</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Lead Agent</th>
                                    <th>Retained By</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($key_data['all_lead'] as $lead) { ?>
                                    <tr>
                                        <td><?php echo $lead->id; ?></td>
                                        <td>
                                            <?php if($lead['account_lead']){ 
                                                echo $lead['account_lead']->id;
                                             }else{
                                                echo "N/A";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo date("m/d/Y", strtotime($lead['created_at'])); ?></td>
                                        <td><?php echo $lead->first_name."  ".$lead->last_name; ?></td>
                                        <td><?php echo $lead->category->name." / ".$lead->sub_category->name; ?></td>
                                        <td><?php echo $lead->lead_status->lead_status; ?></td>
                                        <td><?php echo $lead->lead->first_name." ".$lead->lead->last_name; ?></td>
                                        <td><?php 
                                        if($lead->retain){
                                         echo $lead->retain->first_name." ".$lead->retain->last_name;
                                        }
                                         ?></td>
                                        <td><?php echo $lead->telephone; ?></td>
                                        <td> 
                                            <div class="btn-group mb-5 ">
                                                <span  class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</span>
                                                <div class="dropdown-menu ">
                                                    <?php echo $this->Html->link('Edit',['controller' => 'Admins', 'action' => 'editLead',$lead->id],['class'=>'dropdown-item text-danger','escape' => false]); ?>
                                                    <div class="dropdown-divider bg-dange"></div>
                                                    <?php echo $this->Html->link('Manage Charges',['controller' => 'Admins', 'action' => 'manageCharges',$lead->id],['class'=>'dropdown-item text-danger','escape' => false]); ?>
                                                    
                                                    <?php if($lead->amount_payable > 0 ){ ?>
                                                        <div class="dropdown-divider bg-dange"></div>
                                                        <?php echo $this->Html->link('Payment Plan',['controller' => 'Admins', 'action' => 'paymentPlan',$lead->id],['class'=>'dropdown-item text-danger','escape' => false]); ?>
                                                    <?php } if(!empty($lead->lead_payment_plans) && $lead->lead_status->lead_status != 'L' ) {  ?>
                                                        <div class="dropdown-divider"></div>
                                                        <a style="cursor: pointer;" class="dropdown-item text-danger" onClick=<?php echo 'contract('.$lead->id.')'; ?>>View Contract</a>
                                                    <?php } ?>
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
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Status</th>
                                    <th>Lead Agent</th>
                                    <th>Retained By</th>
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

<script type="text/javascript">
    
        function contract(id){
            window.open('lead_contract/'+id,'viewwin', 'width=650,height=600');    
        }
    
    
</script>

<?= $this->Html->script('popper.min.js'); ?>

<?= $this->Html->script('datatables.min.js'); ?>
<?= $this->Html->script('data-table.js'); ?>
<?= $this->Html->script('custome.js'); ?>

