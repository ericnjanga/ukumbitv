@extends('r.layouts.user-search')
@section('content')
	<div class="page page-packages">
		<div class="global-display">
			@include('r.chunks._account_menu')

			<div class="global-content">
				<!-- packages selection section -->
				<section class="section-packages">
					<header>
						<h1>
							<span class="badge">1</span>
							{{trans('messages.home_plansec_title')}}</h1>
						<p>{{trans('messages.packages_hero1_p')}}</p>
											</header>

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
								<section id="plan{{$payment_plan->id}}" data-plan-id="{{$payment_plan->id}}" class="price-item active">
									<div class="alert alert-info" role="alert">
										<h2 class="alert-title">{{trans('messages.packages_yourcurrplan')}}</h2>
										@if($payment_plan->price > 0)
											@if($checkStripe) <a class="btn-cancel" href="{{route('stripe.cancel-payment-plan')}}">{{trans('messages.packages_cancelsubs')}}</a> @elseif($checkPayPal)
											<a class="btn-cancel" href="{{route('paypal.cancel-payment-plan')}}">{{trans('messages.packages_cancelsubs')}}</a> @endif
										@endif
									</div>
									@else
										<section id="plan{{$payment_plan->id}}" class="price-item" data-plan-id="{{$payment_plan->id}}">
											<div class="alert alert-info" role="alert">
												@if($payment_plan->price == 0)
													<h2 class="alert-title">{{trans('messages.packages_returnguest')}}</h2>
													@if($checkStripe) <a class="btn-cancel" href="{{route('stripe.cancel-payment-plan')}}">{{trans('messages.packages_cancelsubs')}}</a> @elseif($checkPayPal)
														<a class="btn-cancel" href="{{route('paypal.cancel-payment-plan')}}">{{trans('messages.packages_cancelplan')}}</a> @endif
												@else
													<h2 class="alert-title">{{trans('messages.packages_nextplan')}}</h2>
												@endif

											</div>
										@endif
										<!-- activate current selected package if possible -->
											<div class="price-title">
												{{$payment_plan->name}}
												@if($payment_plan->price > 0)
													<small>({{trans('messages.packages_monthlysubs')}})</small>
												@endif
											</div>
											<div class="count-text">{{$payment_plan->description}}</div>
											<ul class="includ-list">
												@php($i=1)
													@while(isset($payment_plan->{'product'.$i}))
														<li>{!! $payment_plan->{'product'.$i} !!}</li>
														@php($i++)
															@endwhile
											</ul>
											@if($payment_plan->price == 0)
												<div class="price text-uppercase">{{trans('messages.free')}}</div>
											@else
												<div class="price"><span>$</span> {{$payment_plan->price}}</div>
											@endif


											@if($indexKey == 2)
												<div class="best-text">
													<div>{{trans('messages.best_choice')}}</div>
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
					<header>
						<h1>
							<span class="badge">2</span> {{trans('messages.packages_hero2')}}</h1>
						<p>{{trans('messages.packages_hero2_p')}}</p>
					</header>


					<div class="row">
						<div class="col-left col-md-6">
							<h2>
								<span class="badge">3</span>
								{{trans('messages.credit_card')}}
							</h2>
							<p style="margin-bottom: 20px;">{{trans('messages.packages_creditcard_msg')}}</p>


							<div class="payment-form-block" ng-app="validationApp" ng-controller="mainController">
								<form id="payment-form" name="paymentForm" action="{{route('stripe.create-card')}}" method="post" class="xl-inputs" autocomplete="off" novalidate>
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="input-group" ng-class="{ 'has-error' : (paymentForm.card_number.$invalid && paymentForm.$dirty) }">
												<label>{{trans('messages.card_number')}}</label>
												<input type="text" name="card_number" ng-model="user.card_number" ng-minlength="4" data-stripe="number" class="form-control" required>
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

        								<div ng-cloak ng-show="paymentForm.card_number.$invalid && paymentForm.$dirty" class="help-block">{{trans('messages.card_number_err_enter')}}</div> 
											</div>
										</div><!-- col -->
									</div><!-- row -->

									<div class="row">
										<div class="col-md-4">
											<div class="input-group">
												<label for="expiry-month">Expiration (MM)</label>
												<select data-stripe="exp_month" id="expiry-month" class="form-control" required>
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
												<select data-stripe="exp_year" required id="expiry-year" class="form-control">
													@for($i = \Carbon\Carbon::now()->year; $i < \Carbon\Carbon::now()->addYears(20)->year; $i++)
														<option value="{{$i}}">{{$i}}</option>
												@endfor
												<!-- option list -->
													<!-- from current year up to 30 years -->
												</select>
											</div><!-- year -->
										</div><!-- col -->

										<div class="col-md-4">
											<div class="input-group" ng-class="{ 'has-error' : (paymentForm.cvv.$invalid && paymentForm.$dirty) }">
												<label for="cvv">CVV</label>
												<input type="text" data-stripe="cvc" name="cvv" ng-model="user.cvv" id="cvv" class="form-control" required>
											</div><!-- year -->
										</div><!-- col -->
									</div><!-- row -->

									<div class="row">
										<div class="col-md-12">
											<div class="input-group" ng-class="{ 'has-error' : paymentForm.username.$invalid && paymentForm.$dirty }"> 
												<label for="cardhlder-name">{{trans('messages.card_holder_name')}}</label>
												<input type="text" name="username" ng-model="user.username" data-stripe="name" id="cardhlder-name" ng-minlength="2" class="form-control" required>
        								<div ng-cloak ng-show="paymentForm.username.$invalid && paymentForm.$dirty" class="help-block">{{trans('messages.card_holder_name_error')}}</div> 
											</div>
										</div><!-- col --> 
									</div><!-- row -->

									<div class="row">
										<div class="col-md-12">
											<div class="input-group" ng-class="{ 'has-error' : paymentForm.country.$invalid && paymentForm.$dirty }"> 
												<label>{{trans('messages.pays')}}</label>
												<input type="text" name="country" ng-model="user.country" data-stripe="address_state" class="form-control" required>
        								<div ng-cloak ng-show="paymentForm.country.$invalid && paymentForm.$dirty" class="help-block">{{trans('messages.country_error')}}</div> 
											</div>
										</div><!-- col -->
									</div><!-- row -->

									<div class="row">
										<div class="col-md-12">
											<div class="input-group" ng-class="{ 'has-error' : paymentForm.province.$invalid && paymentForm.$dirty }"> 
												<label>{{trans('messages.state_province_region')}}</label>
												<input type="text" name="province" ng-model="user.province" data-stripe="address_state" class="form-control" required>
        								<div ng-cloak ng-show="paymentForm.province.$invalid && paymentForm.$dirty" class="help-block">{{trans('messages.state_province_region_error')}}</div> 
											</div>
										</div><!-- col -->
									</div><!-- row -->

									<div class="row">
										<div class="col-md-12">
											<div class="input-group" ng-class="{ 'has-error' : paymentForm.postalcode.$invalid && paymentForm.$dirty }"> 
												<label>{{trans('messages.zip_Postal_code')}}</label>
												<input type="text" name="postalcode" ng-model="user.postalcode" data-stripe="address_zip" class="form-control" required>
        								<div ng-cloak ng-show="paymentForm.postalcode.$invalid && paymentForm.$dirty" class="help-block">{{trans('messages.zip_Postal_code_error')}}</div> 
											</div>
										</div><!-- col -->
									</div><!-- row -->

									<div class="row section-submit">
										<div class="col-md-12">
											<button type="submit" id="update-pay-method-btn" class="btn btn-primary btn-block btn-lg btn-submit" ng-disabled="paymentForm.$invalid">{{trans('messages.update_payment_method')}}</button>
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
							<p>{{trans('messages.packages_paypal_msg')}}</p>
							{{--<button class="btn btn-primary btn-block btn-lg btn-submit" id="btn-checkout-paypal" onclick="checkoutPlanPayPal()">{{trans('messages.packages_paypal_cta')}}</button>--}}
							<button class="btn btn-primary btn-block btn-lg btn-submit section-submit" id="btn-checkout-paypal" onclick="checkoutPlanPayPal()">{{trans('messages.packages_paypal_cta')}}</button>
							{{--		              <a href="{{ url('subscribe/paypal') }}" class="btn btn-primary btn-block btn-lg btn-submit">subscribe Pay Pal</a>--}}
						</div><!-- col-right -->
					</div><!-- row -->






				</section> <!-- section-payment -->
			</div><!-- "global-content -->
		</div><!-- global-display -->
	</div>

	@if(Session::has('flash_success'))
		<script>
            window.onload=function(){
                swal("Cool!", "{{Session::get('flash_success')}}", "success");
            }
		</script>
	@endif
	@if(Session::has('flash_error'))
		<script>
            window.onload=function(){
                swal("Oops!", "{{Session::get('flash_error')}}", "error");
            }
		</script>
	@endif
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

            //if paymentplan is free disabled buttons
            if(selectedPlan === 2) {
                $('#btn-checkout-paypal, #update-pay-method-btn').prop('disabled', true);
			} else {
                $('#btn-checkout-paypal, #update-pay-method-btn').prop('disabled', false);
			}

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

	<script type="text/javascript">

        Stripe.setPublishableKey("{{ config('services.stripe.key') }}");

        $(function() {
            var $form = $('#payment-form');
            $form.submit(function(event) {
                // Disable the submit button to prevent repeated clicks:
                $form.find('#update-pay-method-btn').prop('disabled', true);

                // Request a token from Stripe:
                Stripe.card.createToken($form, stripeResponseHandler);

                // Prevent the form from being submitted:
                return false;
            });
        });

        function stripeResponseHandler(status, response) {
            // Grab the form:
            var $form = $('#payment-form');

            if (response.error) { // Problem!

                // Show the errors on the form:
                $form.find('.payment-errors').text(response.error.message);
                $form.find('#update-pay-method-btn').prop('disabled', false); // Re-enable submission

            } else { // Token was created!

                // Get the token ID:
                var token = response.id;

                // Insert the token ID into the form so it gets submitted to the server:
                $form.append($('<input type="hidden" name="stripeToken">').val(token));
                $form.append($('<input type="hidden" name="selectedPlan">').val(selectedPlan));

                // Submit the form:
                $form.get(0).submit();
            }
        }
	</script>
@endsection