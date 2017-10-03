<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{Setting::get('site_name')}}</title>
</head>
<body>
  <h1 style="color:#000;"><span style="color:#666;">MESSAGE FROM</span> CONTACT FORM</h1>
  <table border="0" width="100%">
  	<tr>
  		<td style="color:#666;" width="120px; padding: 10px;">Category:</td>
  		<td style="color:#000; padding: 10px;">{{$email_data->category}}</td>
  	</tr>
  	<tr>
  		<td style="color:#666;" width="120px; padding: 10px;">Email from:</td>
  		<td style="color:#000; padding: 10px;">{{$email_data->email}}</td>
  	</tr>
  	<tr>
  		<td style="color:#666;" width="120px; padding: 10px;">Message:</td>
  		<td style="color:#000; padding: 10px;">{{$email_data->message}}</td>
  	</tr>
  </table>
</body>
</html>
