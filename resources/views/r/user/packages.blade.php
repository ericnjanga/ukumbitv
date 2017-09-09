@extends('r.layouts.user-search')
@section('content')
  <div class="container-fluid page-packages"> 
    @include('r.chunks._account_menu')
               
    <div class="global-main-content">
    	<!-- packages selection section -->
      <section class="section-packages">
        <h1>{{trans('messages.home_plansec_title')}}</h1> 
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
            <div class="price-item">
                <div class="price-title">{{$payment_plan->name}}</div>
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
                <button  class="btn btn-block butn-white-trans">Select this</button>
				@if($indexKey == 2)
                <div class="best-text">
                    <div>Best Choice</div>
                </div>
					@endif
            </div>
				@endforeach
        </div>
      </section>
    	<!-- packages selection section -->



      <hr>






















    	<!-- payment info section --> 
      <section class="section-payment">
        <h1>Payment information</h1>

	      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default panel-payinfo">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a role="button" class="btn btn-block btn-cta1b btn-lg open" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          Update Payment Information
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> 		        <div class="panel-body payment-content"> 
		            <p class="payment-text">Your new payment method will be applied to your next billing cycle. Your monthly membership is billed on the first day of each billing period.</p>
		            <!-- <div class="card-text">
		                <span class="bold">Credit or Debit Card</span>
		                <img src="{{asset('r/img/visa.png')}}" alt="">
		                <img src="{{asset('r/img/mastercard.png')}}" alt="">
		            </div> -->
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
				                  <label>Expiration (MM)</label>
				                  <select name="expiry-month" id="expiry-month" class="form-control">
				                  	<option value="">Month</option>
				                  	<!-- option list -->
				                  	<!-- All 12 months -->
				                  </select> 
				                </div><!-- month -->
		              		</div><!-- col -->

		              		<div class="col-md-4"> 
				                <div class="input-group">
				                  <label>Expiration (YYYY)</label>
				                  <select name="expiry-year" id="expiry-year" class="form-control">
				                  	<option value="">Year</option> 
				                  	<!-- option list -->
				                  	<!-- from current year up to 30 years -->
				                  </select> 
				                </div><!-- year -->
		              		</div><!-- col -->

		              		<div class="col-md-4"> 
				                <div class="input-group">
				                  <label>CVV</label>
		                      <input type="text" name="cvv" id="cvv" class="form-control"> 
				                </div><!-- year -->
		              		</div><!-- col -->
		              	</div><!-- row -->
		              	
		              	<div class="row">
		              		<div class="col-md-12"> 
				                <div class="input-group">
		                      <label>Cardholder Name</label>
		                      <input type="text" name="cardhlder-name" class="form-control">
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
		          </div><!-- panel-body payment-content --> 
				    </div><!-- collapseOne -->
				  </div><!-- panel-payinfo -->
				  <div class="panel panel-default panel-paypal">
				    <div class="panel-heading" role="tab" id="headingTwo">
				      <h4 class="panel-title">
				        <a class="collapsed btn btn-block btn-cta1b btn-lg" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          Use Paypal 
				          <img src="{{asset('r/img/paypal.png')}}" alt="">
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo"> 
			        <div class="panel-body paypal-block"> 
	              <p class="payment-text">To finish sign-up, click on the "Continue to PayPal" button and log on to PayPal using your email and password.</p>
	              <a href="" class="btn btn-primary btn-block btn-lg btn-submit">Continue to Pay Pal</a>
		          </div><!-- panel-body paypal-block -->  
				    </div><!-- collapseTwo -->
				  </div><!-- panel-paypal -->
				</div><!-- panel-group --> 
      </section> <!-- section-payment --> 
    </div><!-- "global-main-content -->
  </div>
@endsection