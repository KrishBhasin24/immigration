<?= $this->Html->script('Chart.min.js'); ?>
<?= $this->Html->script('datatables.min.js'); ?>
<?= $this->Html->script('custome.js'); ?>


<section class="content">		
  	<div class="row">
  		<?php
			if($key_data['loggedInUser']['department_id'] == 1 ){
				echo $this->element('Dashboard/admin', array('admin' => $key_data['admin_data'])); 
			}
			else if($key_data['loggedInUser']['department_id'] == 2 ){
				echo $this->element('Dashboard/caseProcessing', array('caseProcessing' => $key_data['case_data'])); 
			}
			else if($key_data['loggedInUser']['department_id'] == 3 ){
				echo $this->element('Dashboard/customerCare', array('customerCare' => $key_data['customer_data'])); 
			}
			else if($key_data['loggedInUser']['department_id'] == 4 ){
				echo $this->element('Dashboard/account', array('account' => $key_data['account_data'])); 
			}
			else if($key_data['loggedInUser']['department_id'] == 5 ){
				echo $this->element('Dashboard/assessment', array('assessment' => $key_data['assessment_data'])); 
			}
			else if($key_data['loggedInUser']['department_id'] == 6 ){
				
				echo $this->element('Dashboard/marketing', array('marketing' => $key_data['marketing_data'])); 
			}
		?>
  	</div>
</section>



