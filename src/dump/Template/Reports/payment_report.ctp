<?php

//pr($key_data);

 ?>

 <section class="content">       
    <div class="row">
    	<div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">                        
                    <h3 class="box-title">Payment Report</h3>
                </div>
                <div class="box-body pl-30 pt-15 pb-15">
	                <div class="row">
		                <div class="col-md-3">
							<div class="form-group">
								<div class="input text">
										<label>Start Date</label>
										<input name="min" id="min" type="text">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<div class="input text">
									<label>End Date</label>
									<input name="max" id="max" type="text">
								</div>
							</div>
						</div>
	               	</div>
               	</div>
                	
                	<!-- <input name="max" id="max" type="text"> -->

                
                <div class="box-body p-15">                     
                    <div class="table-responsive">
                    	 <table id="payment_report" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Retained Date</th>
                                    <th>Retained By</th>
                                    <th>Lead No</th>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Category of service</th>
                                    <th>Receipt No</th>
                                    <th>Receipt Date</th>
                                    <th>Payment Mode</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($key_data['lead'] as $lead) { 
                            		 $lead = $lead->toArray(); 
									//pr($lead);
                        		 ?>
                            		<tr>
                            		 	<td><?php echo date("m/d/Y", strtotime($lead['lead']['account_lead']['retain_date'])); ?></td>
                            		 	<td><?php echo $lead['lead']['retain']['first_name']." ".$lead['lead']['retain']['first_name']; ?></td>
                            		 	<td><?php echo $lead['lead']['id']; ?></td>
                            		 	<td><?php echo $lead['lead']['account_lead']['id']; ?></td>
                            		 	<td><?php echo $lead['lead']['first_name']." ".$lead['lead']['last_name']; ?></td>
                            		 	<td><?php echo $lead['lead']['category']['name']." / ".$lead['lead']['sub_category']['name']; ?></td>
                            		 	<td><?php echo $lead['id']; ?></td>
                            		 	<td><?php echo date("m/d/Y", strtotime($lead['payment_date'])); ?></td>
                            		 	<td><?php echo $lead['payment_mode']; ?></td>
                            		 	<td><?php echo $lead['current_payment']; ?></td>
                            		</tr>
                            	<?php } ?>
                            </tbody>
                             <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Retained By</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Payment Mode</th>
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
<?= $this->Html->script('datatables.min.js'); ?>

<script type="text/javascript">
	$(document).ready(function(){
        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[7]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        }
        );

       
            $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            var table = $('#payment_report').DataTable({
				        "order": [[ 6, "desc" ]],
				        initComplete: function () {
				            this.api().columns([1, 8]).every( function () {
				                var column = this;
				                var select = $('<select><option value=""></option></select>')
				                    .appendTo( $(column.footer()).empty() )
				                    .on( 'change', function () {
				                        var val = $.fn.dataTable.util.escapeRegex(
				                            $(this).val()
				                        );
				 
				                        column
				                            .search( val ? '^'+val+'$' : '', true, false )
				                            .draw();
				                    } );
				 				column.data().unique().sort().each( function ( d, j ) {
				                    select.append( '<option value="'+d+'">'+d+'</option>' )
				                } );
				            } );
				        }
				    });

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>

