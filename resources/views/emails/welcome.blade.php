<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{Setting::get('site_name')}}</title>
    <style type="text/css">
        body {
            background-color: #282250;
					/*Crisp text*/ 
					-webkit-font-smoothing: antialiased;
					-moz-osx-font-smoothing: grayscale;
        }
    </style>
 

</head>
<body>

	<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr> 
			<td style="background-color: #282250;" align="center" valign="top">
				<!-- main table -->
				<table cellpadding="0" cellspacing="0" border="0" width="600"> 
					<tr>
						<td height="100" align="left" valign="middle">
							<img src="{{asset('streamtube/images/logo1.png')}}" width="151" height="30" alt='UkumbiTv' />
						</td>
					</tr>
					<tr>
						<td height="230" align="left" valign="middle" style="background-image:url({{asset('streamtube/images/email-hero1.jpg')}})">
							<table cellpadding="0" cellspacing="0" border="0" width="50%">
								<tr>
									<td width="30"></td>
									<td>
										<h2 style="color: #fff; font-family: Roboto,sans-serif; line-height: 30px;">{{trans('messages.website_description')}}</h2></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td align="center" valign="middle" style="background-color: #ddd;">

							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td height="50"></td>
								</tr>
								<tr>
									<td align="center" valign="middle">
										
										<h3 style="margin-bottom:20px; margin-top:0; font-size:18px; font-family: Roboto,sans-serif; color:#333;">
			              	{{trans('messages.Welcome_to')}} <b>UkumbiTV</b> {{trans('messages.welcome_email_msg1')}}
			              </h3>
			              <h4 style=" font-size:16px;">{{trans('messages.you_get_per_month')}}:</h4>
			              <div style="margin-bottom:20px; list-style:none;">
			              	<!-- <li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">[icon] {{trans('messages.website_offer_1')}}</li>
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">[icon] {{trans('messages.website_offer_2')}}</li>
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">[icon] {{trans('messages.website_offer_3')}}</li>
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">[icon] {{trans('messages.website_offer_4')}}</li>
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">[icon] {{trans('messages.website_offer_5')}}</li> -->
	  									@include('snippet.offers')
			              </div>
			              <p style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">{{trans('messages.welcome_email_msg2')}}</p>
									</td>
								</tr>
								<tr>
									<td height="25"></td>
								</tr>
								<tr>
									<td align="center"> 
			              <table cellpadding="0" cellspacing="0" border="0" cellpadding="0" align="center" width="300">

			                <tr>
			                  <td bgcolor="#ec174f" align="center" style="border-radius:4px;" width="200" height="50">
			                     
			                    <a target='_blank' href="{{route('email.verify' , ['id' => $email_data->id , 'verification_code' => $email_data->verification_code])}}" style="color: #fff; font-family: Roboto,sans-serif; display: block; padding: 15px; text-decoration: none; font-size: 16px; text-transform: uppercase;">{{trans('messages.go_to_the_website_now')}}</a>
			                       
			                  </td>
			                </tr>
			              </table>
			            </td> 
								</tr>
								<tr>
									<td height="50"></td>
								</tr>
							</table>
							



						</td>
					</tr>
 


					<tr>
						<td height="50"></td>
					</tr>

 					<tr>
 						<td align="center" valign="middle"> 
 							<table cellpadding="0" cellspacing="0" border="0" cellpadding="0" align="center" width="400">
								<tr>
									<td> 
										<p style="font-size:10px; color:#ccc; font-family: Roboto,sans-serif; text-align:center;">{{trans('messages.welcome_email_footer_msg1')}} <a href="https://ukumbitv.com" style="font-size:10px; color:#ccc; font-family: Roboto,sans-serif; text-decoration:underline;">ukumbitv</a>. </p>


										<p style="text-align:center; color:#ccc; text-align:center;">
											<a href="https://ukumbitv.com/terms-of-use" style="font-size:10px; color:#ccc; font-family: Roboto,sans-serif; text-decoration:underline;">{{trans('messages.terms_of_use')}}</a> | <a href="https://ukumbitv.com/privacy-statement" style="font-size:10px; color:#ccc; font-family: Roboto,sans-serif; text-decoration:underline;">{{trans('messages.privacy_statement')}}</a>
										</p>

  
										<p style="font-size:10px; text-align:center; color:#ccc; text-align:center;">
											{{trans('messages.question_contactus')}}: <a href="mailto:info@ukumbitv.com" style="font-size:10px; color:#ccc; font-family: Roboto,sans-serif; text-decoration:underline;">info@ukumbitv.com</a>
										</p>


										<p style="font-size:10px; text-align:center; color:#ccc; text-align:center;">{{trans('messages.Copyright')}} 2017, Toronto, Canada</p> 
 
									</td>
								</tr>
 							</table>
 						</td>
 					</tr>



					<tr>
						<td height="50"></td>
					</tr>
				</table>
				<!-- main table -->
			</td> 
		</tr>
	</table>



</body>
</html>
