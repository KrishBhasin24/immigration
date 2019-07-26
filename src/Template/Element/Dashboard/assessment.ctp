<?php

//pr($key_data);

 ?>

 <div class="col-12 col-lg-6">
	<div class="box">
	  	<div class="box-header with-border">
			<h3 class="box-title">Monthly Case Report (<?php echo date('F'); ?>)</h3>
		</div>
		<div class="row px-3">
        	<div class="col-12 col-lg-8">
				<div class="box-body">
				  <div class="chart">
	                <canvas id="chart_6" height="300"></canvas>
	              </div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="col-12 col-lg-4">
			 	<ul class="chart-legend clearfix pt-30">
					<li><h4><strong>Total Cases:  <span><?php echo $key_data['assessment_data']['case_count']['total_case']; ?></span>	</strong></h4></li>
					<li><h4><strong>Cases Not Filed:  <span id="un_processed"><?php echo $key_data['assessment_data']['case_count']['un_processed']; ?></span></strong></h4></li>
					<li><h4><strong>Case In Process:  <span id="in_process"><?php echo $key_data['assessment_data']['case_count']['in_process']; ?></span></strong></h4></li>
					<li><h4><strong>Case Filed:  <span id="filed"><?php echo $key_data['assessment_data']['case_count']['filed']; ?></span></strong></h4></li>
					<li><h4><strong>Case Approved:  <span id="approved"><?php echo $key_data['assessment_data']['case_count']['approved']; ?></span></strong></h4></li>
				</ul>
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
							<th>Url</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($assessment['link'] as $links) {?>
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
    var un_processed = $("#un_processed").html();
    var in_process = $("#in_process").html();
    var filed = $("#filed").html();
    var approved = $("#approved").html();
   	if( $('#chart_6').length > 0 ){
		var ctx6 = document.getElementById("chart_6").getContext("2d");
		var data6 = {
			 labels: [
			"Case Not Filed",
			"Case In Process",
			"Case Filed",
			"Case Approved"
		],
		datasets: [
			{
				data: [un_processed, in_process, filed, approved],
				backgroundColor: [
					"#f62d51",
					"#ffd13f",
					"#05b085",
					"#5de1f5"

					
				],
				hoverBackgroundColor: [
					"#f62d51",
					"#ffd13f",
					"#05b085",
					"#5de1f5"
					
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