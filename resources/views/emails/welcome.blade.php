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
							<table cellpadding="0" cellspacing="0" border="0" width="60%">
								<tr>
									<td width="30"></td>
									<td>
										<h2 style="color: #fff; font-family: Roboto,sans-serif;">{{trans('messages.website_description')}}</h2></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td align="center" valign="middle" style="background-color: #ccc;">

							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td height="25"></td>
								</tr>
								<tr>
									<td align="center" valign="middle">
										
										<h3 style="margin-bottom:20px; font-size:18px; font-family: Roboto,sans-serif; color:#333;">
			              	{{trans('messages.Welcome_to')}} <b>UkumbiTV</b> {{trans('messages.welcome_email_msg1')}}
			              </h3>
			              <h4 style=" font-size:16px;">For $2 per month, you get:</h4>
			              <ul style="margin-bottom:20px;">
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">item 1</li>
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">item 2</li>
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">item 3</li>
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">item 4</li>
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">item 5</li>
			              	<li style="font-family: Roboto,sans-serif; font-size:16px; color:#333;">item 6</li>
			              </ul>
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
			                     
			                    <a target='_blank' href="{{route('email.verify' , ['id' => $email_data->id , 'verification_code' => $email_data->verification_code])}}" style="color: #fff; font-family: Roboto,sans-serif; display: block; padding: 15px; text-decoration: none; font-size: 16px; text-transform: uppercase;">{{trans('messages.Verify_Now')}}</a>
			                       
			                  </td>
			                </tr>
			              </table>
			            </td> 
								</tr>
								<tr>
									<td height="25"></td>
								</tr>
							</table>
							



						</td>
					</tr>
 

 					<tr>
 						<td height="250" align="center" valign="middle"> 
 							<table cellpadding="0" cellspacing="0" border="0" cellpadding="0" align="center" width="400">
								<tr>
									<td> 
										<p style="font-size:9px; color:#ccc; font-family: Roboto,sans-serif; text-align:center;">This email was sent to you because you indicated that you'd like to receive updates about new features and offers to improve your listing's performance from Google My Business. If you don't want to receive such emails in the future, please unsubscribe here. You can also change your preferences on your Google My Business settings page by logging into https://business.google.com/settings. </p>
			 							<p style="font-size:9px; color:#ccc; font-family: Roboto,sans-serif; text-align:center;">Pleace website footer links</p>
			 							<p style="font-size:9px; color:#ccc; font-family: Roboto,sans-serif; text-align:center;">Pleace the eastmall address</p>
									</td>
								</tr>
 							</table>
 						</td>
 					</tr>
				</table>
				<!-- main table -->
			</td> 
		</tr>
	</table>









	<!-- <table cellpadding="0" cellspacing="0" border="0" style="background-color: black; text-align:center;" cellpadding="0" width="100%" cellspacing="0" border="0">
		<tr>
			<td valign="middle">
				<h1 style="color:#fff;">{{trans('messages.site_name')}}</h1>
			</td>
		</tr>
		<tr>
			<td valign="middle">
				<h2>{{trans('messages.Hi')}} {{$email_data->name}}! </h2>
			</td>
		</tr>
	</table>
		 -->



  <!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<!--   <table cellpadding="0" cellspacing="0" border="0" style="background-color: black;" cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" class='bgBody table-full'>
    <tr>
      <td>  

        <table cellpadding="0" cellspacing="0" border="0" cellpadding="0" class="table-full" cellspacing="0" border="0" align="center" width="100%" style="border-collapse:collapse;">
            <tr>
                <td class='movableContentContainer'>

                    <div class='movableContent'>
                        <table cellpadding="0" cellspacing="0" border="0" cellpadding="0" cellspacing="0" border="0" align="center" width="600">
                            <tr height="40">
                                <td width="200">&nbsp;</td>
                                <td width="200">&nbsp;</td>
                                <td width="200">&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="200" valign="top">&nbsp;</td>
                                <td width="200" valign="top" align="center">
                                    <div class="contentEditableContainer contentTextEditable">
                                        <div class="contentEditable">
                                            <img src="{{asset('streamtube/images/logo1.png')}}" width="155" height='155' alt='UkumbiTv' />
                                        </div>
                                    </div>
                                </td>
                                <td width="200" valign="top">&nbsp;</td>
                            </tr>
                            <tr height="25">
                                <td width="200">&nbsp;</td>
                                <td width="200">&nbsp;</td>
                                <td width="200">&nbsp;</td>
                            </tr>
                        </table>
                    </div>

                    <div class='movableContent'>
                        <table cellpadding="0" cellspacing="0" border="0" cellpadding="0" cellspacing="0" border="0" align="center" width="600"> 
                            <tr>
                                <td width="100">&nbsp;</td>
                                <td width="400" align="center" style="padding-bottom:5px;">
                                    <div class="contentEditableContainer contentTextEditable">
                                        <div class="contentEditable" >
                                            <p>
                                            	"{{trans('messages.Welcome_to')}} <b>UkumbiTV</b> {{trans('messages.welcome_email_msg1')}} "
                                            </p>
                                            <p>{{trans('messages.welcome_email_msg2')}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td width="100">&nbsp;</td>
                            </tr>
                        </table>
                    </div>

                    <div class='movableContent'>
                        <table cellpadding="0" cellspacing="0" border="0" cellpadding="0" cellspacing="0" border="0" align="center" width="600">
                            <tr>
                                <td width="100">&nbsp;</td>
                                
                                @if(Setting::get('email_verify_control'))
                                    <td width="400" align="center" style="padding-top:25px;padding-bottom:115px;"> 
                                      <table cellpadding="0" cellspacing="0" border="0" cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">

                                        <tr>
                                          <td bgcolor="#ec174f" align="center" style="border-radius:4px;margin-top: 10px" width="200" height="50">
                                            <div class="contentEditableContainer contentTextEditable">
                                              <div class="contentEditable" >
                                                  <a target='_blank' href="{{route('email.verify' , ['id' => $email_data->id , 'verification_code' => $email_data->verification_code])}}" style="color: #FFF;text-orientation: none;cursor: pointer;" class='link2'>{{trans('messages.Verify_Now')}}</a>
                                              </div>
                                            </div> 
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                @endif
                                
                                </td>
                                <td width="100">&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table> 
      </td>
    </tr>
  </table>  -->




</body>
</html>
