<!DOCTYPE html>


<html data-wf-domain="ukumbitv.webflow.io" data-wf-page="5678f447c23895ea308e187e" data-wf-site="5678f447c23895ea308e187d" data-wf-status="1">

<head>
  <meta charset="utf-8">
  <title>UkumbiTV - Lauching soon</title>
  <meta content="Watch unlimited African movies and TV Shows online" name="description">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  
  
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
  <script type="text/javascript">
  !function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);
  </script>
  <link href="{{asset('streamtube/images/598c864bc327c10001ec1587_Favicon2032.png')}}" rel="shortcut icon" type="image/x-icon">
  <link href="images/598c8655153f32000197a4b0_Favicon20256.png" rel="apple-touch-icon">
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/utv-comingsoon.css')}}">  
</head>

<body>
  <div class="section">
    <div class="w-row">
      <div class="w-col w-col-3">
        <img class="image" src="{{asset('streamtube/images/598c803a153f320001979d21_UkumbiTV-logo.png')}}" width="250">
      </div>
      <div class="w-col w-col-6">
        <img src="{{asset('streamtube/images/598c807fc327c10001ec106f_D0A1D0BBD0BED0B9-1.png')}}">
      </div>
      <div class="w-col w-col-3">
      </div>
    </div>
    <div class="w-container">
      <div class="line">
      </div>
      <div class="h1">Enjoy
        <span class="text-span">Africa's</span>finest cinema in:</div>


				<style>
					#countdown {
						display: flex;
						    width: 100%;
						height: 50px;
						margin-top: 25px;
						justify-content: center;
					}
					.count-frame {
						position: relative;
				    float: left;
				    font-family: 'Gotham Pro', sans-serif;
						display: flex;
						font-size: 20px;
						margin: 0 5px;
						width: 50px;
						height: 50px;
						background: #333;
						color: #fff;
						border-radius: 10px;
						align-items: flex-end;
						justify-content: center;
						padding-bottom: 8px;
					}
					.count-frame:before {
						font-size: 11px;
						color: #ffc93c;
						position: absolute;
						top: 0;
						left: 0;
						width: 100%;
						text-align: center;
					}

					.admin-login {
						position: absolute;
				    bottom: 0;
				    left: 0;
					}
					#countdown-days{
						content: 'Days';
					}
					#countdown-hours{
						content: 'Hours';
					}
					#countdown-mins{
						content: 'Mins';
					}
					#countdown-secs{
						content: 'Secs';
					}
				</style>
        <!-- Display the countdown timer in an element -->
				<div id="countdown" class="text-center">
					<span id="countdown-days" class="count-frame"></span>
					<span id="countdown-hours" class="count-frame"></span>
					<span id="countdown-mins" class="count-frame"></span>
					<span id="countdown-secs" class="count-frame"></span>
				</div>






        <footer class="admin-login text-center">
            <div class="fb-login">
                @if(config('services.facebook.client_id') && config('services.facebook.client_secret'))
                    <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
                        <input type="hidden" value="facebook" name="provider" id="provider">
                        <button type="submit" class="btn-link">
                            <i class="fa fa-facebook-official" aria-hidden="true"></i>
                            Admin Login
                        </button>
                    </form>
                @endif
            </div> 
        </footer>


    </div>
  </div>












<script>
// Set the date we're counting down to
var countDownDate = new Date("Sep 1, 2017 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="countdown"
  var frame_days = document.getElementById("countdown-days");
  var frame_hours = document.getElementById("countdown-hours");
  var frame_mins = document.getElementById("countdown-mins");
  var frame_secs = document.getElementById("countdown-secs");
  frame_days.innerHTML = days;
  frame_hours.innerHTML = hours;
  frame_mins.innerHTML = minutes;
  frame_secs.innerHTML = seconds;
  // document.getElementById("countdown").innerHTML = days + "<span>:</span>" + hours + "<span>:</span>" + minutes + "<span>:</span>" + seconds;

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
  
</body>

</html>