@extends('r.layouts.user-search')
@section('content')
  <div class="container-fluid page-packages"> 
    @include('r.chunks._account_menu')
               
    <div class="global-main-content">
        <div class="price-list-block">
          <h1>{{trans('messages.home_plansec_title')}}</h1>
 
          <div class="price-block">
              <div class="price-item">
                  <div class="price-title">Basic</div>
                  <div class="count-text">10 videos</div>
                  <ul class="includ-list">
                      <li>advantage 1</li>
                      <li>another</li>
                  </ul>
                  <div class="price upper">Free</div>
                  <a href="" class="btn butn-white-trans active">Your plan</a>
              </div>
              <div class="price-item">
                  <div class="price-title">Silver</div>
                  <div class="count-text">30 videos</div>
                  <ul class="includ-list">
                      <li>advantage 1</li>
                      <li>another</li>
                      <li>advantage 1</li>
                  </ul>
                  <div class="price"><span>$</span> 3</div>
                  <a href="" class="btn butn-white-trans">Restart plan</a>
              </div>
              <div class="price-item">
                  <div class="price-title">Gold</div>
                  <div class="count-text">100 videos</div>
                  <ul class="includ-list">
                      <li>advantage 1</li>
                      <li>another</li>
                      <li>advantage 1</li>
                      <li>another</li>
                      <li>advantage 1</li>
                  </ul>
                  <div class="price"><span>$</span> 5</div>
                  <a href="" class="btn butn-white-trans">Select this</a>
              </div>
              <div class="price-item">
                  <div class="price-title">Platinum</div>
                  <div class="count-text">150 videos</div>
                  <ul class="includ-list">
                      <li>advantage 1</li>
                      <li>another</li>
                      <li>advantage 1</li>
                      <li>another</li>
                      <li>advantage 1</li>
                  </ul>
                  <div class="price"><span>$</span> 7</div>
                  <a href="" class="btn butn-white-trans">Select this</a>
                  <div class="best-text">
                      <div>Best Choise</div>
                  </div>
              </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <div class="payment-block-wrap">
                    <div class="title-text">Payment information</div>
                    <div class="payment-block">
                        <div class="payment-info"><span class="icon icon-paypal-big-logo"></span>example@redentu.com</div>
                        <a id="payinfo" href="" class="btn btn-cta1b btn-lg">Update payment information <span class="icon icon-scroll-arrow-to-down"></span></a>
                    </div>
                    <div class="payment-content-block">
                        <div class="payment-content">
                            <div class="title-text">Update Payment Information</div>
                            <p class="payment-text">Your new payment method will be applied to your next billing cycle. Your monthly membership is billed on the first day of each billing period.</p>
                            <div class="card-text">
                                <span class="bold">Credit or Debit Card</span>
                                <img src="{{asset('r/img/visa.png')}}" alt="">
                                <img src="{{asset('r/img/mastercard.png')}}" alt="">
                            </div>
                            <div class="payment-form-block">
                                <form action="" method="">
                                    <div class="payment-form-left">
                                        <div class="input-group">
                                            <label>First Name <span class="label-add-text">Must match card</span></label>
                                            <input type="text" name="firstname" class="form-control">
                                        </div>
                                        <div class="input-group input-lock">
                                            <label>Card Number</label>
                                            <input type="text" name="cardnumber" class="form-control">
                                        </div>
                                        <div class="input-group input-lock">
                                            <label>CVC</label>
                                            <input type="text" name="cvc" class="form-control">
                                        </div>
                                    </div>
                                    <div class="payment-form-right">
                                        <div class="input-group">
                                            <label>Last Name <span class="label-add-text">Must match card</span></label>
                                            <input type="text" name="lastname" class="form-control">
                                        </div>
                                        <div class="date-block">
                                            <div class="sublabel">Expiration Date</div>
                                            <div class="input-group">
                                                <input type="text" name="year" class="form-control">
                                            </div>
                                            <span>/</span>
                                            <div class="input-group">
                                                <input type="text" name="month" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-cta1b btn-lg">Update payment method</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="paypal-block">
                            <div class="card-text">
                                <span class="bold">Pay Pal</span>
                                <img src="{{asset('r/img/paypal.png')}}" alt="">
                            </div>
                            <p class="payment-text">To finish sign-up, click on the "Continue to PayPal" button and log on to PayPal using your email and password.</p>
                            <a href="" class="btn btn-cta1b btn-lg">Continue to Pay Pal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- "global-main-content -->
  </div>
@endsection