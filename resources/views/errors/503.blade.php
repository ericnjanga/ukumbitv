<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                /*font-weight: 100;*/
                font-family: 'Lato';
                background-size: cover;
                background-image: url("{{asset('streamtube/images/bg-youtube.jpg')}}");
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: top;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
            	margin-top: 20px;
                font-size: 30px;
                    text-transform: uppercase;
                /*margin-bottom: 40px;*/
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Coming soon.</div>

                <footer class="text-center">
                    <div class="fb-login">
                        @if(config('services.facebook.client_id') && config('services.facebook.client_secret'))
                            <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
                                <input type="hidden" value="facebook" name="provider" id="provider">
                                <button type="submit" class="btn-link">
                                    <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                    {{trans('messages.login_via_fb')}}
                                </button>
                            </form>
                        @endif
                    </div>

                </footer>



                <!-- Display the countdown timer in an element -->
<p id="demo" style="margin:0; font-size:50px;"></p>

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

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "<span>:</span>" + hours + "<span>:</span>" + minutes + "<span>:</span>" + seconds;

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>





            </div>
        </div>
    </body>
</html>
