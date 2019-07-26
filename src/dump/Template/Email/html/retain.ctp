<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<style type="text/css">
    /* FONTS */
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width:600px){
        h1 {
            font-size: 32px !important;
            line-height: 32px !important;
        }
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">

	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	    <tr>
	        <td align="center">
	            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
	                <tr>
	                    <td align="center" valign="top" style="padding: 40px 10px 0px 10px;">
	                        <!-- <img src="http://localhost/immigration/img/user-info.jpg"> -->
	                        	<?php //echo $this->Html->image("company_logo.gif", ['fullBase' => true]); ?>
								 <span style="display: block; font-family: 'Poppins', sans-serif; color: #69cce0; font-size: 36px;" border="0"><b>Smart</b>Immigration</span>
	                        
	                    </td>
	                </tr>
				</table>
	        </td>
	    </tr>
	    <tr>
        	<td align="center" style="padding: 0px 10px 0px 10px;">
	            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
	                <tr>
	                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px;">
	                      <h1 style="font-size: 36px; font-weight: 600; margin: 0; font-family: 'Poppins', sans-serif;">New Retainer</h1>
	                    </td>
	                </tr>
	            </table>
	        </td>
	    </tr>
	    <tr>
	        <td align="center" style="padding: 0px 10px 0px 10px;">
	            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
		            <tr>
		                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
		                  <p style="margin: 0;">New Client Retained By <?php echo $value['retainer_info']['first_name']." ".$value['retainer_info']['last_name']; ?> . Please check the following details and process the case.</p>
		                </td>
	            	</tr>
	              	<tr>
		                <td bgcolor="#ffffff" align="center">
		                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		                    <tr>
		                      <td bgcolor="#ffffff" style="padding: 20px 30px 30px 30px;">
		                        <table width="50%" border="0" cellspacing="0" cellpadding="0">
		                          <tr>
		                              <td style="color: #3D3D3D; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;" >Client Name: <?php echo $value['first_name']." ".$value['last_name']; ?></td>
		                          </tr>
		                          <tr>
		                              <td style="color: #3D3D3D; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;" >Client Telephone: <?php echo $value['telephone']; ?></td>
		                          </tr>
		                          <tr>
		                              <td style="color: #3D3D3D; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;" >Lead Id: <?php echo $value['lead_id']; ?></td>
		                          </tr>
		                           <tr>
		                              <td style="color: #3D3D3D; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;" >File Id: <?php echo $value['id']; ?></td>
		                          </tr>
		                          <tr>
		                              <td style="color: #3D3D3D; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;" >Applied For: <?php echo $value['category_info']['name']." / ".$value['sub_category']['name']; ?></td>
		                          </tr>
		                        </table>
		                      </td>
		                    </tr>
		                  </table>
		                </td>
		            </tr>
	              	<tr>
				        <td bgcolor="#ffffff" style="padding: 10px 10px 20px 30px;">
				            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
				                <tr>
				                	<td style="color: #666666; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
				                		With Best Regard
				                	</td>
				                </tr>
				                <tr style="color: #666666; font-family: 'Poppins', sans-serif; font-size: 11px; font-weight: 400; line-height: 1px;">
				                  <td>
				                    <h2>Smart International Immigration Solutions Inc</h2>
				                  </td>
			                  	</tr>
			                  	<tr style="color: #666666; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
				                  <td>
				                    7900 Hurontario Street, Suite # 204
				                  </td>
				              	</tr>
				              	<tr style="color: #666666; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 400; line-height: 20px;">
				                  <td>
				                    ON L6Y 0P6
				                  </td>
				              	</tr>
				              	<tr style="color: #666666; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 400; line-height: 20px;">
				                  <td>
				                    Canada,
				                  </td>
				              	</tr>
				              	<tr style="color: #666666; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 400; line-height: 20px;">
				                  <td>
				                    Phone:- (905) 497 4884
				                  </td>
				                </tr>
				                <tr style="color: #666666; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 400; line-height: 20px;">
				                  <td>
				                    Fax:- (905) 497 4883
				                  </td>
				                </tr>
				            </table>
				        </td>
			    	</tr>
	            </table>
	        </td>
	    </tr>	
	    <tr>
	        <td align="center">
	            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
	                <tr>
	                    <td align="center" valign="top" style="padding: 40px 10px 0px 10px;">
	                    </td>
	                </tr>
				</table>
	        </td>
	    </tr>
	</table>
</body>
</html>

