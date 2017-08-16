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

    <script src="https://js.stripe.com/v3/"></script>

  <link href="{{asset('streamtube/images/598c864bc327c10001ec1587_Favicon2032.png')}}" rel="shortcut icon" type="image/x-icon">
  <link href="images/598c8655153f32000197a4b0_Favicon20256.png" rel="apple-touch-icon">
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/utv-comingsoon.css')}}">
    <style>
        /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
            background-color: white;
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
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
						display: -webkit-box;
						display: -ms-flexbox;
						display: flex;
						    width: 100%;
						height: 50px;
						margin-top: 25px;
						-webkit-box-pack: center;
						    -ms-flex-pack: center;
						        justify-content: center;
					}
					.count-frame {
						position: relative;
				    float: left;
				    font-family: 'Gotham Pro', sans-serif;
						display: -webkit-box;
						display: -ms-flexbox;
						display: flex;
						font-size: 20px;
						margin: 0 5px;
						width: 50px;
						height: 50px;
						background: #333;
						color: #fff;
						border-radius: 10px;
						-webkit-box-align: end;
						    -ms-flex-align: end;
						        align-items: flex-end;
						-webkit-box-pack: center;
						    -ms-flex-pack: center;
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
						position: fixed;
				    bottom: 0;
				    left: 0;
					}
					#countdown-days:before{
						content: 'Days';
					}
					#countdown-hours:before{
						content: 'Hours';
					}
					#countdown-mins:before{
						content: 'Mins';
					}
					#countdown-secs:before{
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


        <h1>PURCHASE</h1>
        {{--<a href="{{route('stripe-pay')}}" class="btn btn-primary">Buy!</a>--}}
        {{--@if(isset($msg))--}}
            {{--<h2>{{$msg}}</h2>--}}
            {{--@endif--}}
        <form action="{{route('stripe-pay-post')}}" method="post" id="payment-form">
            <div class="form-row">
                <label for="card-element">
                    Credit or debit card
                </label>
                <div id="card-element">
                    <!-- a Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display Element errors -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button>Submit Payment</button>
        </form>



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

<script>
    // Create a Stripe client
    var stripe = Stripe('pk_test_roNaBrxur5v7dvm6VUa11Gs1');

    // Create an instance of Elements
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '24px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
  
</body>

</html>