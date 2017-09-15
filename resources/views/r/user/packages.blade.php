@extends('r.layouts.user-search')
@section('content')
  <div class="page-packages"> 
    <div class="global-display">
	    @include('r.chunks._account_menu')
	               
	    <div class="global-content">
	    	<!-- packages selection section -->
	      <section class="section-packages">
	        <h1>
						<span class="badge">1</span>
	        	{{trans('messages.home_plansec_title')}}</h1>
			  @if(Session::has('flash_success'))
				  <div class="alert alert-success"  >
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  {{Session::get('flash_success')}}
				  </div>
			  @endif
	        <div class="price-block">
	            {{--<div class="price-item">--}}
	                {{--<div class="price-title">Basic</div>--}}
	                {{--<div class="count-text">10 videos</div>--}}
	                {{--<ul class="includ-list">--}}
	                    {{--<li>advantage 1</li>--}}
	                    {{--<li>another</li>--}}
	                {{--</ul>--}}
	                {{--<div class="price upper">Free</div>--}}
	                {{--<a href="" class="btn btn-block butn-white-trans active">Your plan</a>--}}
	            {{--</div>--}}
	            {{--<div class="price-item">--}}
	                {{--<div class="price-title">Silver</div>--}}
	                {{--<div class="count-text">30 videos</div>--}}
	                {{--<ul class="includ-list">--}}
	                    {{--<li>advantage 1</li>--}}
	                    {{--<li>another</li>--}}
	                    {{--<li>advantage 1</li>--}}
	                {{--</ul>--}}
	                {{--<div class="price"><span>$</span> 3</div>--}}
	                {{--<a href="" class="btn btn-block butn-white-trans">Restart plan</a>--}}
	            {{--</div>--}}
	            {{--<div class="price-item">--}}
	                {{--<div class="price-title">Gold</div>--}}
	                {{--<div class="count-text">100 videos</div>--}}
	                {{--<ul class="includ-list">--}}
	                    {{--<li>advantage 1</li>--}}
	                    {{--<li>another</li>--}}
	                    {{--<li>advantage 1</li>--}}
	                    {{--<li>another</li>--}}
	                    {{--<li>advantage 1</li>--}}
	                {{--</ul>--}}
	                {{--<div class="price"><span>$</span> 5</div>--}}
	                {{--<a href="" class="btn btn-block butn-white-trans">Select this</a>--}}
	            {{--</div>--}}

						@foreach($payment_plans as $indexKey => $payment_plan)
							<!-- activate current selected package if possible -->
							@if($userPayPlan->id == $payment_plan->id)
								<section id="plan{{$payment_plan->id}}" class="price-item active"> 
									<div class="alert alert-info" role="alert">
										<h2 class="alert-title">Your current Plan</h2> 
										@if($payment_plan->price > 0)
											<a class="btn-cancel" href="{{route('user.cancel-payment-plan')}}">&raquo;Cancel plan</a>
										@endif
									</div>
							@else
								<section id="plan{{$payment_plan->id}}" class="price-item" data-plan-id="{{$payment_plan->id}}"> 
									<div class="alert alert-info" role="alert">
										<h2 class="alert-title">Your next Plan</h2>
									</div>
							@endif
							<!-- activate current selected package if possible -->
                <div class="price-title">{{$payment_plan->name}} {{$payment_plan->id}}</div>
                <div class="count-text">{{$payment_plan->description}}</div>
                <ul class="includ-list">
									@php($i=1)
									@while(isset($payment_plan->{'product'.$i}))
										<li>{!! $payment_plan->{'product'.$i} !!}</li>
										@php($i++) 
									@endwhile
			          </ul>
								@if($payment_plan->price == 0)
									<div class="price">FREE</div>
								@else
									<div class="price"><span>$</span> {{$payment_plan->price}}</div>
								@endif
								
				        <!-- <button id="plan{{$payment_plan->id}}" data-plan-id="{{$payment_plan->id}}" class="btn btn-block butn-white-trans select-plan-btn" onclick="selectPlan(this)">Select this</button> -->
								@if($indexKey == 2)
	                <div class="best-text">
	                    <div>Best Choice</div>
	                </div>
								@endif
	            </section>
						@endforeach
	        </div>
			  
	      </section>
	    	<!-- packages selection section -->



	      <hr>






	    	<!-- payment info section --> 
	      <section class="section-payment">
	        <h1> 
						<span class="badge">2</span>
						Payment information</h1>
	        	<p class="payment-text" style="max-width: 500px; margin-bottom: 30px;">Your new payment method will be applied to your next billing cycle. Your monthly membership is billed on the first day of each billing period.</p>


	        <div class="row">
	        	<div class="col-left col-md-6">
	        		<h2>
								<span class="badge">3</span>
								Credit Card
							</h2>
	        		

	        		<div class="payment-form-block">
	              <form action="" method="" class="xl-inputs"> 
	              	<div class="row">
	              		<div class="col-md-12"> 
			                <div class="input-group">
			                  <label>Card Number</label>
			                  <input type="text" name="cardnumber" class="form-control">
			                  <div class="card-samples">
			                  	<div id="card-image-container-Visa" role="widget" aria-live="polite" name="card-image-creditCardType" class="card-image-Visa-disabled card-image " aria-selected="false" aria-hidden="true" aria-disabled="true">
							              <span id="card-image-text-Visa" class="card-image-text-Visa sr-only">
							                Visa 
							              </span>
							           </div><!-- Visa -->
							           <div id="card-image-container-MasterCard" role="widget" aria-live="polite" name="card-image-creditCardType" class="card-image-MasterCard-disabled card-image " aria-selected="false" aria-hidden="true" aria-disabled="true">
							              <span id="card-image-text-MasterCard" class="card-image-text-MasterCard sr-only">
							                MasterCard 
							              </span>
							           </div><!-- MasterCard -->
			                  </div><!-- card samples -->
			                </div>
	              		</div><!-- col -->
	              	</div><!-- row -->

	              	<div class="row">
	              		<div class="col-md-4"> 
			                <div class="input-group">
			                  <label for="expiry-month">Expiration (MM)</label>
			                  <select name="expiry-month" id="expiry-month" class="form-control">
								  	@for($i = 1; $i < 13; $i++)
			                  		<option value="{{$i}}">{{$i}}</option>
								  	@endfor
			                  	<!-- option list -->
			                  	<!-- All 12 months -->
			                  </select> 
			                </div><!-- month -->
	              		</div><!-- col -->

	              		<div class="col-md-4"> 
			                <div class="input-group">
			                  <label for="expiry-year">Expiration (YYYY)</label>
			                  <select name="expiry-year" id="expiry-year" class="form-control">
								  @for($i = \Carbon\Carbon::now()->year; $i < \Carbon\Carbon::now()->addYears(20)->year; $i++)
			                  		<option value="{{$i}}">{{$i}}</option>
								  @endfor
			                  	<!-- option list -->
			                  	<!-- from current year up to 30 years -->
			                  </select> 
			                </div><!-- year -->
	              		</div><!-- col -->

	              		<div class="col-md-4"> 
			                <div class="input-group">
			                    <label for="cvv">CVV</label>
								<input type="text" name="cvv" id="cvv" class="form-control">
			                </div><!-- year -->
	              		</div><!-- col -->
	              	</div><!-- row -->
	              	
	              	<div class="row">
	              		<div class="col-md-12"> 
			                <div class="input-group">
							  <label for="cardhlder-name">Cardholder Name</label>
							  <input type="text" name="cardhlder-name" id="cardhlder-name" class="form-control">
			                </div>
	              		</div><!-- col -->
	              	</div><!-- row -->
	              	
	              	<div class="row">
	              		<div class="col-md-12"> 
			                <div class="input-group">
			                  <label>Country</label>
			                  <select name="expiry-year" id="expiry-year" class="form-control">
			                  	<option value="">Select a country</option> 
			                  	<!-- option list -->
			                  	<!-- from current year up to 30 years -->
			                  </select> 
			                </div>
	              		</div><!-- col -->
	              	</div><!-- row -->
	              	
	              	<div class="row">
	              		<div class="col-md-12"> 
			                <div class="input-group">
	                      <label>State/Province/Region</label>
	                      <input type="text" name="cardhlder-state" class="form-control">
			                </div>
	              		</div><!-- col -->
	              	</div><!-- row -->
	              	
	              	<div class="row">
	              		<div class="col-md-12"> 
			                <div class="input-group">
	                      <label>Zip/Postal Code</label>
	                      <input type="text" name="cardhlder-zip" class="form-control">
			                </div>
	              		</div><!-- col -->
	              	</div><!-- row -->
	     
	                <div class="row section-submit">
	                	<div class="col-md-12">
	                		<button type="submit" class="btn btn-primary btn-block btn-lg btn-submit">Update payment method</button>
	                	</div><!-- col -->  
	                </div><!-- row -->
	              </form>
	            </div>


	        	</div><!-- col-left -->
	        	<div class="col-right col-md-5 col-md-offset-1">
	        		<h2>
								<span class="badge">3</span>
								Paypal
							</h2> 
	        		<p class="payment-text">To finish sign-up, click on the "Continue to PayPal" button and log on to PayPal using your email and password.</p>
		              {{--<button class="btn btn-primary btn-block btn-lg btn-submit" id="btn-checkout-paypal" onclick="checkoutPlanPayPal()">Continue to Pay Pal</button>--}}
		              <button class="btn btn-primary btn-block btn-lg btn-submit" id="btn-checkout-paypal" onclick="checkoutPlanPayPal()">Continue to Pay Pal</button>
{{--		              <a href="{{ url('subscribe/paypal') }}" class="btn btn-primary btn-block btn-lg btn-submit">subscribe Pay Pal</a>--}}
	        	</div><!-- col-right -->
	        </div><!-- row -->





					
	      </section> <!-- section-payment --> 
	    </div><!-- "global-content -->
	  </div><!-- global-display -->
  </div>
@endsection

@section('scripts')
	<script> 
		var selectedPlan = ''; 

		//Allow user to select the whole block, not just the button
		//can only select inactive plans
		$('body').on('click', '.price-item:not(.active)', function(){ 
			selectPlan($(this));
		});


		//Deactivate current plan, activate new plan
		//Keep a reference of the selected plan
    function selectPlan($plan) { 
      selectedPlan = $plan.data('plan-id');

      $('.price-item.active').removeClass('active');
      $plan.addClass('active'); 
    }


    function checkoutPlanPayPal() {
      if(selectedPlan === '') {
        return swal('Oops!', 'Select payment plan please', 'error');
			}
      if(selectedPlan === 2) {
          return swal('Hey!', 'You can\'t pay for the free plan', 'warning');
      }

      $('#btn-checkout-paypal').addClass('disabled');

      window.location = "subscribe/paypal/plan/"+selectedPlan;
//            window.location = "select-payment-plan/"+selectedPlan;

		}

	</script>
@endsection