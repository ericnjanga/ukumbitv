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

/*        #outlook a {padding:0;}
        body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
        .ExternalClass {width:100%;}
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
        #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
        img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
        a img {border:none;display:inline-block;}
        .image_fix {display:block;}

        h1, h2, h3, h4, h5, h6 {color: white !important;}

        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

        h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
            color: red !important;
        }

        h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
            color: purple !important;
        }

        table td {border-collapse: collapse;}

        table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

        a {color: #000;}

        @media only screen and (max-device-width: 480px) {

            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: black;  
                pointer-events: none;
                cursor: default;
            }

            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: orange !important;  
                pointer-events: auto;
                cursor: default;
            }
        }


        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: blue; 
                pointer-events: none;
                cursor: default;
            }

            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: orange !important;
                pointer-events: auto;
                cursor: default;
            }
        }

        p {
            margin:0;
            color:#FFF;
            font-family:Helvetica, Arial, sans-serif;
            font-size:16px;
            line-height:160%;
        }
        a.link2{
            text-decoration:none;
            font-family:Helvetica, Arial, sans-serif;
            font-size:16px;
            color:#fff;
            border-radius:4px;
        }
        h2{
            color:#FFF;
            font-family:Helvetica, Arial, sans-serif;
            font-size:22px;
            font-weight: normal;
        }

        .bgItem{
            background:#cf4545;
        }
        .bgBody{
            background:#ffffff;
        }

        .table-full{
            height:100%;
        }
*/
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
										
										<h3 style="margin-bottom:20px; font-size:18px; font-family: Roboto,sans-serif;">
			              	{{trans('messages.Welcome_to')}} <b>UkumbiTV</b> {{trans('messages.welcome_email_msg1')}}
			              </h3>
			              <h4 style=" font-size:16px;">For $2 per month, you get:</h4>
			              <ul style="margin-bottom:20px; font-family: Roboto,sans-serif; font-size:16px;">
			              	<li>item 1</li>
			              	<li>item 2</li>
			              	<li>item 3</li>
			              	<li>item 4</li>
			              	<li>item 5</li>
			              	<li>item 6</li>
			              </ul>
			              <p style="font-family: Roboto,sans-serif; font-size:16px;">{{trans('messages.welcome_email_msg2')}}</p>
									</td>
								</tr>
								<tr>
									<td height="50"></td>
								</tr>
								<tr>
									<td align="center" style="padding-top:25px;padding-bottom:115px;"> 
			              <table cellpadding="0" cellspacing="0" border="0" cellpadding="0" align="center" width="300">

			                <tr>
			                  <td bgcolor="#ec174f" align="center" style="border-radius:4px;margin-top: 10px" width="200" height="50">
			                     
			                    <a target='_blank' href="{{route('email.verify' , ['id' => $email_data->id , 'verification_code' => $email_data->verification_code])}}" style="color: #fff; font-family: Roboto,sans-serif; display: block; padding: 15px; text-decoration: none; font-size: 16px; text-transform: uppercase;">{{trans('messages.Verify_Now')}}</a>
			                       
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
 						<td height="150" align="center" valign="middle"> 
							<p style="color: #fff; font-size:9px; color:#ccc; font-family: Roboto,sans-serif; text-align-center;">This email was sent to you because you indicated that you'd like to receive updates about new features and offers to improve your listing's performance from Google My Business. If you don't want to receive such emails in the future, please unsubscribe here. You can also change your preferences on your Google My Business settings page by logging into https://business.google.com/settings. </p>
 							<p style="color: #fff; font-size:9px; color:#ccc; font-family: Roboto,sans-serif; text-align-center;">Pleace website footer links</p>
 							<p style="color: #fff; font-size:9px; color:#ccc; font-family: Roboto,sans-serif; text-align-center;">Pleace the eastmall address</p>
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
