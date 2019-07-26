<?php  //pr($key_data); die;?>
<section class="invoice">
  	<div id="printableArea" class="row invoice-info  text-black ">

    	<div class="col-md-12 invoice-col">
    		<?php echo $this->Html->image("company_logo.gif"); ?>
    	</div>
    	<div class="col-md-12 invoice-col text-center mb-30">
    		<h2><u>Receipt Of Refund</u></h2>
    	</div>
    	<div class="col-md-12 invoice-col text-center mb-30 font-size-16">
			<table class="col-md-3 contract_table text-black">
				<tbody class="text-left">
					<tr>
						<td>Receipt Number:</td>
						<td><?php echo $key_data['lead_refund']['id']; ?></td>
					</tr>
					<tr>
						<td>File Number:</td>
						<td><?php echo $key_data['leadInfo']['account_lead']['id']; ?></td>
					</tr>
					<tr>
						<td>Client Name:</td>
						<td><?php echo $key_data['leadInfo']['first_name']." ".$key_data['leadInfo']['last_name']; ?></td>
					</tr>
					<tr>
						<td>Date:</td>
						<td><?php echo date("d-m-Y", strtotime($key_data['lead_refund']['payment_date'])); ?>
						</td>
					</tr>
					<tr>
						<td>Received with thanks on Behalf of Smart International Immigration Solutions Inc an amount of CAD$</td>
						<td><?php echo $key_data['lead_refund']['refund_payment']; ?></td>
					</tr>
					<tr>
						<td>Payment Mode</td>
						<td><?php echo $key_data['lead_refund']['payment_mode']; ?></td>
					</tr>
					<tr>
						<td>Authorization Number</td>
						<td><?php echo $key_data['lead_refund']['authorization_number']; ?></td>
					</tr>
					<tr>
						<td>Issued By</td>
						<td><?php echo $key_data['lead_refund']['issued_by']; ?></td>
					</tr>

				</tbody>
			</table>
    	</div>
    	<div class="col-md-12 invoice-col mb-20 text-center">
			<div>
				<span>For Smart International Immigration Solutions Inc</span><br>
				<span></span><br><br>
				<span>_____________________________________________</span><br>
				<span>Auth. Signatory</span>
			</div>
		</div>
	</div>
	<div class="col-md-12 invoice-col mt-30 text-center">
    	<button id="print"   class="btn btn-lg btn-warning" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
    </div>
</section>

<?= $this->Html->script('jquery.PrintArea.js'); ?>

<script type="text/javascript">


	$(function () {
    "use strict";   

    

	$("#print").click(function() {
			var mode = 'iframe'; //popup
            var close = mode == "popup";
            
            var options = { mode : mode, popClose : close};
            
            $("#printableArea").printArea(options);
        });
	
  });

</script>

<?= $this->Html->script('datatables.min.js'); ?>