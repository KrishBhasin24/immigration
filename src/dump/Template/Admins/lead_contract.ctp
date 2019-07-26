<?php //pr($key_data['leadDetail']); ?>

<section class="invoice">
  	<div id="printableArea" class="row invoice-info  text-black ">

    	<div class="col-md-12 invoice-col">
    		<?php echo $this->Html->image("company_logo.gif"); ?>
    	</div>
    	<div class="col-md-12 invoice-col text-center mb-30">
    		<h2><u>Contract of Engagement</u></h2>
    	</div>
    	<div class="col-md-12 invoice-col text-center mb-30 font-size-16">
			<table class="col-md-3 contract_table text-black">
				<tbody class="text-left">
					<tr>
						<td>Full Name of Client:</td>
						<td><?php echo $key_data['leadDetail']->first_name." ".$key_data['leadDetail']->last_name; ?></td>
					</tr>
					<tr>
						<td>Home Address:</td>
						<td><?php echo $key_data['leadDetail']->address; ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $key_data['leadDetail']->city.', '.$key_data['leadDetail']->province.' '.$key_data['leadDetail']->postal_code; ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $key_data['leadDetail']->country; ?></td>
					</tr>
					<tr>
						<td>Phone Number:</td>
						<td><?php echo $key_data['leadDetail']->telephone; ?></td>
					</tr>
					<tr>
						<td>Email ID:</td>
						<td><?php echo $key_data['leadDetail']->email; ?></td>
					</tr>
					<tr>
						<td>File ID:</td>
						<td><?php echo $key_data['leadDetail']->account_lead->id; ?></td>
					</tr>
				</tbody>
			</table>
    	</div>
    	<div class="col-md-12 invoice-col text-center mb-30 font-size-16">
    		<span>Hereinafter the <strong>'Client'</strong>,</span><br>
    		<span class="text-center">AND</span><br>
    		<span><strong>Smart International Immigration Solutions (SIIS )</strong></span><br>
			<span>Located at 7900 Hurontario St., Suite # 204, Brampton, ON L6Y 0P6</span><br>
			<span>Ph: 905 497 4884, Fax : 905 487 4883, Web: www.siiscanada.com</span><br>
			<span>Hereinafter referred to as the <strong>'Company'.</strong></span><br>
    	</div>
    	<div class="col-md-12 invoice-col mb-20">
    		<span><b>WHEREAS,</b> Company is an immigration consulting Company providing quality immigration solutions to individuals and families who wish to immigrate to Canada.</span><br>
    		<span><b>AND WHEREAS,</b>Client is in need of immigration assistance in applying for <b>"<?php echo $key_data['leadDetail']->category->name." / ".$key_data['leadDetail']->sub_category->name; ?>"</b>.</span><br>
    		<span><b>NOW THEREFORE,</b> in mutual consideration of the premises above and covenants herein contained, the parties agree as follows:</span>
    	</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>DUTIES OF THE COMPANY</b></h5>
			<span>The Company undertakes to</span>
			<ul class="contact_list">
				<li>Assess the Client’s personal details and eligibility information, as provided in the assessment/Initial Information form;</li>
				<li>Assist the Client in the preparation of the case, including review of all documents and supporting evidence and submission of the case to the processing visa office;</li>
				<li>Counsel the Client at various stages of the processing of the case on immigration matters when required, including interview preparation;</li>
				<li>Monitor the Client’s case throughout processing so as to ensure the process of application will be in a timely fashion and making all additional written and/or verbal representations to the processing visa office and related Canadian government and other agencies as deemed necessary by the Company.</li>
			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>DUTIES OF THE CLIENT</b></h5>
			<span>The Client shall:</span>
			<ul class="contact_list">
				<li>Provide all required documentation in a timely fashion and ensure that all additional documents requested thereafter are submitted;</li>
				<li>Complete and sign all forms which may be necessary for the processing of the case and complete additional forms as required and as per the directions of the Company;</li>
				<li>Provide all supporting documentation and evidence, which are legal, valid and genuine;</li>
				<li>Provide timely disclosure of all information regarding dependents that may affect the processing of the information requested on the assessment forms;</li>
				<li>Provide timely notice to the Company of any and all communications received by the Client from the processing visa office;</li>
				<li>Provide timely notice of all changes in information relating to Client’s address, education, training, employment, job responsibilities, marital status, residence, contact information, criminal charges or other information (whichever is applicable);</li>
				<li>Attend all immigration interviews as and when required, following all instructions and counseling provided by the Company as well as after consultation with the Company.</li>
				<li>Maintain required Income as per LICO table during the Immigration process.(If applicable to your category)</li>
			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>CLIENT'S UNDERTAKINGS</b></h5>
			<span>The Client undertakes to:</span>
			<ul class="contact_list">
				<li>Maintain legal status from the country where the application will be filed and maintain legal status in the country of residence until landing is granted;</li>
				<li>Extend authority, by signing this agreement to act on the Client’s behalf with regards to all matters relating to the application for permanent residence, and this authority shall extend to all dependents listed in the application;</li>
				<li>Authorize all government departments and representatives to forward all correspondence related to the application for permanent residence to the Company as the Client’s appointed representative;</li>
				<li>Pay all fees required by Canadian immigration authorities in a timely fashion and demonstrate possession of sufficient liquid funds in a financial institution when requested;</li>
				<li>Provide recognized language test results for the English language proficiency (i.e. IELTS). (If applicable)</li>
				<li>Provide full consent and authority to the Company to disclose any and all information provided by the Client to any governmental body or other official as required, including information with regards to any dependents;</li>
				<li>Provide truthful, accurate, and complete information to the Company, with the understanding that any inaccuracies may seriously affect the outcome of the application;</li>
				<li>Acknowledge that the Company has not undertaken to provide any legal advice on any topic other than immigration;</li>
				<li>I understand that the processing time(s) for my application that have been given are estimated based on historical data and present trends. If these times are revised by the visa post or any other concerned authorities, company shall not be held   responsible for the resultant effect by such changes that create delays.</li>
				<li>I understand the company assumes no commitment to assist the application in obtaining Visitor Visas for the interview into a country other than that of their natural habitual residence. These arrangements are the responsibility of the client. I understood that only the Canadian government can grant immigration visas and company is only offering consulting services.</li>
				<li>I understand that I should not leave my employment, sell my property or take any irrevocable steps in anticipation of immigration to Canada until the visa is received. If I do so it will be my sole responsibility.</li>
			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>FEES PAYABLE TO THE COMPANY AND TO IMMIGRATION AUTHORITIES</b></h5>
			<span>That the Client undertakes and agrees to the following:</span>
			<ul class="contact_list">
				<li>It is the responsibility of the client to make sure the fees reaches Company’s bank account by way of bank draft, credit cards or through a wire transfer; the Company is only responsible for the fee that  has been successfully deposited in their bank account in Canada.</li>
				<li>I understand that if payments are not made as per agreed terms and conditions of this agreement, the   company shall not be held responsible for consequences arising from the efforts to recover the same.</li>
			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>PROFESSIONAL FEES</b></h5>
			<p>The Client(s) will be billed, a flat fees of CDN <b>$<?php echo $key_data['leadDetail']->amount_payable; ?></b>. The detail of professional fees charges is as follows. The company will charge professional fees as per below mentioned detail and will file the application within 10 Business days from the date of receipt of all required documents from client. </p>
			<span class="contract-centre mb-10"><u>Installments</u></span>
			<table class="col-md-9 table table-hover no-wrap table-bordered text-black">
				<tbody class="text-left">
					<?php 
						$total = 0;
						foreach ($key_data['leadDetail']->lead_payment_plans as $payment_plan) { 
						$total = $total + $payment_plan->payment;
					?>
						<tr>
							<td><?php echo $payment_plan->title; ?></td>
							<td><?php echo $payment_plan->payment; ?></td>
						</tr>	
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td>Total</td>
						<td><?php echo $total; ?></td>
					</tr>
				</tfoot>
			</table>
			<span>All fees are in Canadian Dollars. The above fees includes all applicable tax.Following will be the detail of disbursements of <b>total fees</b> charged above.</span>
			<table class="col-md-9 table mt-20 table-hover no-wrap table-bordered text-black">
				<tbody class="text-left">
					<?php $total_charges = 0;
						foreach ($key_data['leadDetail']->lead_charge->toArray() as $key => $value) {
							if( $key != "id" && $key != "lead_id" && $key != "created_at"){
								$total_charges = $total_charges + $value ;
							}
						}
					?>
					<tr>
						<td>Administration Charges<br></td>
						<td><?php echo $key_data['leadDetail']->lead_charge->admin_charges; ?></td>
					</tr>
					<tr>
						<td>Government Charges</td>
						<td><?php echo $key_data['leadDetail']->lead_charge->gov_fee; ?></td>
					</tr>
					<tr>
						<td>Consultation Charges</td>
						<td><?php echo $key_data['leadDetail']->lead_charge->consultation_fee; ?></td>
					</tr>
					<tr>
						<td>Case Processing Charges<br>(e.g. Case Preparation, Submission & Documentation Charges, Visa Processing Fees etc)</td>
						<td><?php echo $key_data['leadDetail']->lead_charge->case_processing_fee; ?></td>
					</tr>
					<tr>
						<td>Misc. Charges<br>(Courier Charges, Transaction Fees etc)</td>
						<td><?php echo $key_data['leadDetail']->lead_charge->misc_fee; ?></td>
					</tr>

				</tbody>
				<tfoot>
					<tr>
						<td>Total</td>
						<td><?php echo $total_charges; ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>REFUND OF PROFESSIONAL FEES</b></h5>
			<span>Following paid fees will be non-refundable</span>
			<table class="col-md-9 table mt-20 table-hover no-wrap table-bordered text-black">
				<tbody class="text-left">
					<tr>
						<td>Administration Charges<br>(Applicable in Case of Withdrawal or Termination of Representation)</td>
						<td><?php echo $key_data['leadDetail']->lead_charge->admin_charges; ?></td>
					</tr>
					<tr>
						<td>Government Charges<br>(Applicable in Case of File Processed)</td>
						<td><?php echo $key_data['leadDetail']->lead_charge->gov_fee; ?></td>
					</tr>
					<tr>
						<td>Consultation Charges</td>
						<td><?php echo $key_data['leadDetail']->lead_charge->consultation_fee; ?></td>
					</tr>
					<tr>
						<td>Case Processing Charges<br>(Applicable in Case of File Processed)</td>
						<td><?php echo $key_data['leadDetail']->lead_charge->case_processing_fee; ?></td>
					</tr>
					<tr>
						<td>Misc. Charges<br>(Applicable in Case of File Processed)</td>
						<td><?php echo $key_data['leadDetail']->lead_charge->misc_fee; ?></td>
					</tr>

				</tbody>
				<tfoot>
					<tr>
						<td>Total</td>
						<td><?php echo $total_charges; ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<ul class="contact_list">
				<li>The Client(s) acknowledge that the granting of a visa or status and the time required for processing this application is at the sole discretion of the government and not the RCIC.</li>
				<li>If however, the application is denied because of an error or omission on the part of the RCIC or professional staff, the RCIC will refund all professional fees collected.</li>
				<li>The Client(s) agree that the fees paid are for services indicated above, and any refund is strictly limited to the amount of fees paid.</li>
				<li>I understand that if I withdraw my application or abandon or non-compliance of submitting the required/requested documents on time then the company will deduct non-refundable charges and refund all unearned funds after issuing invoice.</li>
				<li>I further understand, if I am not able to provide IELTS results with the marks required for me to qualify, within one year from the date of signing this agreement, I will not be entitled for the refund of the fee paid to the company.  If, however, the application is denied because of an error or omission on the part of the RCIC or professional staff, the RCIC will refund all professional fees collected.  The Client(s) agree that the fees paid are for services indicated above, and any refund is strictly limited to the amount of fees paid.  All earned fees will not be refunded.</li>
				<li>Once the case is filed and CIC issued File number, all earned funds paid will be non-refundable provided the application is denied because of an error or omission on the part of the RCIC or professional staff.</li>
				<li>The unearned fees will be refunded to client by Cheque along with Statement of account which will be issued immediately upon completion of services within 15 days from the date of refund request.</li>
			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>DISCHARGE OR WITHDRAWAL OF REPRESENTATION</b></h5>
			<ul class="contact_list">
				<li>The Client may discharge representation and terminate this Agreement, upon writing, at which time any outstanding fees or Disbursements will be refunded by the RCIC to the Client/any outstanding fees or Disbursements will be remitted by the Client to the RCIC.</li>
				<li>RCIC may withdraw representation and terminate this Agreement, upon writing, provided withdrawal does not cause prejudice to the Client, at which time any outstanding fees or Disbursements will be refunded by the RCIC to the Client/any outstanding fees or Disbursements will be remitted by the Client to the RCIC.</li>
			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>EXCLUSIONS OF SERVICES</b></h5>
			<span>That the Company shall not assist or offer guarantees with regards to the following:</span>
			<ul class="contact_list">
				<li>The procurement of the required documentation, including but not limited to passports, police clearance certificates, educational or experience certificates or other documentation as required by the immigration authorities. These shall be the Client’s sole responsibility;</li>
				<li>The Company will not be responsible for Client’s non-attendance of interviews or refusal on the basis of lack of preparation prior to interview;</li>
				<li>The Company will not be responsible in any way for any changes in the Client’s circumstances or any other changes which may have or will occur in Immigration Act and Regulations or any policies governed by the Canadian government or the Inland and overseas immigration offices, which may have an adverse effect in the processing of the Client’s immigration application after submission to a visa post.</li>
				<li>The Company does not guarantee any kind of visa. It is the discretion of Canadian High Commission to grant any visa.</li>
			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>AGREEMENT DETAILS</b></h5>
			<span>The parties agree and undertake the following:</span>
			<ul class="contact_list">
				<li>The authority of the Company to act on the Client’s behalf shall include all of the Client’s members of the family class included in the application and provisions of this agreement shall be applicable to other family members of the Client as well;</li>
				<li>That the parties elect domicile in the city and province of Brampton, Ontario and all matters relating to this agreement and any dispute relating thereto;</li>
				<li>That this agreement represents the entire and complete intention of the parties;</li>
				<li>That it is the intention of the parties that this contract be drafted in the English language;</li>
				<li>That in the event that any section, subsection of component of this agreement is declared null and void, the remaining sections, subsections of components of this agreement shall remain enforceable and binding on the parties;</li>
				<li>This contract consists of two duly executed copies, each of which shall be equally valid, one of which shall be kept by each of the parties hereto.</li>
			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>JURISDICTION</b></h5>
			<ul class="contact_list">
				<li>This Agreement shall be governed by and interpreted in accordance with the laws of City of Brampton, in the Province of Ontario, Canada, and shall be binding up the parties hereto, and upon (a) their respective representatives, successors and assigns and (b) the heirs of any individual that is a party hereto. For the purpose of all legal proceedings, this Agreement shall be deemed to have been performed in Canada shall have jurisdiction to entertain any action arising under this Agreement.  Each party hereto attorns to the jurisdiction of the courts of Canada.</li>
				<li>Please be advised that ______________________________ represent the company and is member in good standing of the Immigration Consultants of Canada Regulatory Council (ICCRC), and as such, is bound by its By-laws, Code of Professional Ethics, and associated Regulations.<br>
				In the event of a dispute, the Client(s) and RCIC are to make every effort to resolve the matter between the two parties.  In the event a resolution cannot be reached, the Client(s) are to present the complaint in writing to the RCIC and allow the RCIC 3 weeks to respond to the Client(s).  In the event the dispute is still unresolved, the Client(s) may follow the complaint and discipline procedure outlined by ICCRC on their website: http://www.iccrc-crcic.ca/public/complaintsDiscipline.cfm  <br>
				<b>NOTE:</b> All complaint forms must be signed.<br>
				ICCRC Contact Information:<br>
				Immigration Consultants of Canada Regulatory Council (ICCRC)<br>
				5500 North Service Rd., Suite 1002<br>
				Burlington, ON, L7L 6W6<br>
				Toll free: 1-877-836-7543<br>
				</li>
				<li>In the event the Client is unable to contact the RCIC and has reason to believe the RCIC may be dead, incapacitated or otherwise unable to fulfill his/her duties, the Client should contact ICCRC.</li>

			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>CONFIDENTIALITY</b></h5>
			<p>All information and documentation reviewed by the RCIC, required by CIC and all other governing bodies, and used for the preparation of the application will not be divulged to any third party, other than agents and employees, without prior consent, except as demanded by law.  The RCIC, and all agents and employees of the RCIC, are also bound by the confidentiality requirements of Article 8.1 and 8.5 of the Code of Professional Ethics.</p>
			<p>The Client(s) agrees to the use of electronic communication and storage of confidential information.  The RCIC will use his/her best efforts to maintain a high degree of security for electronic communication and information storage.</p>
		</div>
		<div class="col-md-12 invoice-col mb-20">
			<h5><b>FORCE MAJEURE</b></h5>
			<p>The RCIC’s failure to perform any term of this Retainer Agreement, as a result of conditions beyond his/her control such as, but not limited to, governmental restrictions or subsequent legislation, war, strikes, or acts of God, shall not be deemed a breach of this Agreement.</p>
			<span>VALIDATION</span>
			<p>The Client(s) acknowledge that they have read this Agreement, understand it, have obtained such independent legal advice as they deem appropriate, have sought translation and agree to be bound by its terms.  The Client(s) acknowledge that they have requested that the Agreement be written in the English language. Client further acknowledge and authorize the company to represent on his/her behalf to Citizenship and Immigration Canada with regards to his application.</p>
		</div>
		<div class="col-md-12 invoice-col mb-30">
			<h6><b>CONSENT AND SIGNATURE</b></h6>
			<span>The Client undertakes and agrees:</span>
			<ul class="contact_list">
				<li>That I have fully read and understood the contents of this agreement. I have also sought clarification for all points that were unclear prior to signature. </li>
			</ul>
		</div>
		<div class="col-md-12 invoice-col mb-20 text-center">
			<div class="turn-left">
				<span>_____________________________________________</span><br>
				<span>Client Signature</span><br><br>
				<span>_____________________________________________</span><br>
				<span>Date[day/month/year]</span>
			</div>
		<!-- </div>
		<div class="col-md-6 invoice-col mb-20 text-center turn-left"> -->
			<div class="turn-left">
				<span>_____________________________________________</span><br>
				<span>RCIC Signature</span><br><br>
				<span>_____________________________________________</span><br>
				<span>Date[day/month/year]</span>
			</div>
		</div>
	</div>
    <div class="col-md-12 invoice-col mt-30 text-center">
    	<button id="print"   class="btn btn-lg btn-warning" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
    </div>
</section>
<!-- onClick='window.print()' -->

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