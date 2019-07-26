	<div class="col-xl-3 col-md-6 col-12">
			<div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
			  <div class="no-shrink py-30">
				<span class="mdi mdi-ticket-confirmation font-size-50"></span>
			  </div>

			  <div class="py-30 bg-white text-dark">
				<div class="font-size-30 countnm"><?php echo $admin['case_count']['total_case']; ?></div>
				<span>Total Cases (<?php echo date('F'); ?>)</span>
			  </div>
			</div>
	</div>
	<div class="col-xl-2 col-md-6 col-12">
		<div class="flexbox flex-justified text-center bg-warning mb-30 pull-up">
		  <div class="no-shrink py-30">
			<span class="mdi mdi-message-reply-text font-size-50"></span>
		  </div>

		  <div class="py-30 bg-white text-dark">
			<div class="font-size-30 countnm"><?php echo $admin['case_count']['un_processed']; ?></div>
			<span>Pending Cases</span>
		  </div>
		</div>
	</div>
	<div class="col-xl-2 col-md-6 col-12">
		<div class="flexbox flex-justified text-center bg-success mb-30 pull-up">
		  <div class="no-shrink py-30">
			<span class="mdi mdi-thumb-up-outline font-size-50"></span>
		  </div>

		  <div class="py-30 bg-white text-dark">
			<div class="font-size-30 countnm"><?php echo $admin['case_count']['filed']; ?></div>
			<span>Filed Cases</span>
		  </div>
		</div>
	</div>
	<div class="col-xl-2 col-md-6 col-12">
		<div class="flexbox flex-justified text-center bg-danger mb-30 pull-up">
		  <div class="no-shrink py-30">
			<span class="mdi mdi-ticket font-size-50"></span>
		  </div>

		  <div class="py-30 bg-white text-dark">
			<div class="font-size-30 countnm"><?php echo $admin['case_count']['approved']; ?></div>
			<span>Approved Cases</span>
		  </div>
		</div>
	</div>
	<div class="col-xl-2 col-md-6 col-12">
		<div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
		  <div class="no-shrink py-30">
			<span class="mdi mdi-ticket-confirmation font-size-50"></span>
		  </div>

		  <div class="py-30 bg-white text-dark">
			<div class="font-size-30 countnm"><?php echo $admin['case_count']['in_process']; ?></div>
			<span>In-Process Cases</span>
		  </div>
		</div>
	</div>

		<div class="col-12 col-lg-6">
			<div class="box">
			  	<div class="box-header with-border">
					<h3 class="box-title">Monthly Sales Report (<?php echo date('F'); ?>)</h3>
				</div>
				<div class="row px-3">
	            	<div class="col-12 col-lg-7">
						<div class="box-body">
						  <div class="chart">
			                <canvas id="chart_6" height="300"></canvas>
			              </div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="col-12 col-lg-5">
					  <ul class="chart-legend clearfix pt-30">
						<li><h4><strong>Total Transaction:  $<span><?php echo $admin['total_transection']; ?></span>	</strong></h4></li>
						<li><h4><strong>Total Payment Received:  $<span id="payment"><?php echo $admin['total_payment']; ?></span></strong></h4></li>
						<li><h4><strong>Total Payment Refund:  $<span id="refund"><?php echo $admin['total_refund']; ?></span></strong></h4></li>
					  </ul>
					</div>
			 	</div>
			</div>
		</div>
		<div class="col-lg-6 col-12">
				<div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Marketing Report (<?php echo date('F'); ?>)</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="dash_user" class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Marketing Team</th>
										<th>Client Retain</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($admin['user_info'] as $user) {

										$count = count($user->account_leads);
										$ave = $count / $admin['case_count']['total_case'];
										$perecntage = $ave * 100;
									 ?>
										<tr>
											<th scope="row"><?php echo $user->id; ?></th>
											<td><?php echo $user->first_name." ".$user->last_name; ?></td>
											<td>
												<span><?php //echo count($user->account_leads); ?></span>
												<div class="progress-group">
													<span class="progress-text">Total Retained Client</span>
													<span class="progress-number"><b><?php echo $count; ?></b>/ <?php echo $admin['case_count']['total_case']; ?></span>
													<div class="progress sm">
													  <div class="progress-bar progress-bar-success progress-bar-striped progress-bar-animated" style="width: <?php echo $perecntage;?>%"></div>
													</div>
											  	</div>
											</td>
										</tr>	
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>  
		</div>
		<div class="col-lg-6 col-12">
			<div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Important Links</h4>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table id="dash_user" class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Display To</th>
									<th>Url</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($admin['link'] as $links) {?>
									<tr>
										<th scope="row"><?php echo $links->id; ?></th>
										<td><?php echo $links->name; ?></td>
										<td><?php echo $links->display_to; ?></td>
										<td><a target="_blank" href="<?php echo $links->url; ?>"><span class="badge badge-info">Click Here</span></a></td>
									</tr>	
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>  
		</div>


		<script type="text/javascript">
	$( document ).ready(function() {
    "use strict";
    var payment = $("#payment").html();
    var refund = $("#refund").html();
   	if( $('#chart_6').length > 0 ){
		var ctx6 = document.getElementById("chart_6").getContext("2d");
		var data6 = {
			 labels: [
			"Payment Received",
			"Payment Refund"
		],
		datasets: [
			{
				data: [payment, refund],
				backgroundColor: [
					"#05b085",
					"#ffd13f"
					
				],
				hoverBackgroundColor: [
					"#05b085",
					"#ffd13f"
					
				]
			}]
		};
		
		var pieChart  = new Chart(ctx6,{
			type: 'pie',
			data: data6,
			options: {
				animation: {
					duration:	3000
				},
				responsive: true,
				legend: {
					labels: {
					fontFamily: "Poppins",
					fontColor:"#878787"
					}
				},
				tooltip: {
					backgroundColor:'rgba(33,33,33,1)',
					cornerRadius:0,
					footerFontFamily:"'Poppins'"
				},
				elements: {
					arc: {
						borderWidth: 0
					}
				}
			}
		});
	}


	$('#dash_user').DataTable({
	  'paging'      : true,
	  'lengthChange': false,
	  'searching'   : false,
	  'ordering'    : false,
	  'info'        : true,
	  'autoWidth'   : true,
	  'pageLength' : 4,
	});

});
</script>