<?php //pr($customerCare); ?>

	<div class="col-xl-3 col-md-6 col-12">
			<div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
			  <div class="no-shrink py-30">
				<span class="mdi mdi-ticket-confirmation font-size-50"></span>
			  </div>

			  <div class="py-30 bg-white text-dark">
				<div class="font-size-30 countnm"><?php echo $customerCare['case_count']['total_case']; ?></div>
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
			<div class="font-size-30 countnm"><?php echo $customerCare['case_count']['un_processed']; ?></div>
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
			<div class="font-size-30 countnm"><?php echo $customerCare['case_count']['filed']; ?></div>
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
			<div class="font-size-30 countnm"><?php echo $customerCare['case_count']['approved']; ?></div>
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
			<div class="font-size-30 countnm"><?php echo $customerCare['case_count']['in_process']; ?></div>
			<span>In-Process Cases</span>
		  </div>
		</div>
	</div>
	<div class="col-lg-7 col-12">
				<div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Case Processing Report</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="dash_user" class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Case Processing Team</th>
										<th>Case Assigned</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($customerCare['user_info'] as $user) {

										$count = count($user->filling);
										$ave = $count / $customerCare['case_count']['total_case'];
										$perecntage = $ave * 100;
									 ?>
										<tr>
											<th scope="row"><?php echo $user->id; ?></th>
											<td><?php echo $user->first_name." ".$user->last_name; ?></td>
											<td>
												<span><?php //echo count($user->account_leads); ?></span>
												<div class="progress-group">
													<span class="progress-text">Total Assigned Case</span>
													<span class="progress-number"><b><?php echo $count; ?></b>/ <?php echo $customerCare['case_count']['total_case']; ?></span>
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
		<div class="col-lg-5 col-12">
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
									<th>Url</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($customerCare['link'] as $links) {?>
									<tr>
										<th scope="row"><?php echo $links->id; ?></th>
										<td><?php echo $links->name; ?></td>
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
   
	$('#dash_user').DataTable({
	  'paging'      : true,
	  'lengthChange': false,
	  'searching'   : false,
	  'ordering'    : false,
	  'info'        : true,
	  'autoWidth'   : true,
	  'pageLength' : 5,
	});

});
</script>