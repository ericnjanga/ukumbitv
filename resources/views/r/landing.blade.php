@extends('r.layouts.main')
@section('content')
    <div class="landing-wrap">

         
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 offset-xl-1 list-text-block">
                    <div class="list-text-item">
                        <h2>{{trans('messages.home_midsec_title1')}}</h2>
                        <span class="icon icon-video"></span>
                        <p>{{trans('messages.home_midsec_blurb1')}}</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 list-text-block">
                    <div class="list-text-item">
                        <h2>{{trans('messages.home_midsec_title2')}}</h2>
                        <span class="icon icon-monitor-tablet-and-smartohone"></span>
                        <p>{{trans('messages.home_midsec_blurb2')}}</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 list-text-block">
                    <div class="list-text-item">
                        <h2>{{trans('messages.home_midsec_title3')}}</h2>
                        <span class="icon icon-computer-screen"></span>
                        <p>{{trans('messages.home_midsec_blurb3')}}</p>
                    </div>
                </div>
            </div>
        </div>
         

    
        <div class="container"> 
          <div class="row">
            <div class="col-sm-12"> 
            	<h2 class="text-center">{{trans('messages.home_plansec_title')}}</h2>
              <div class="price-block">
                  @foreach($payment_plans as $payment_plan)
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
                          <div class="price upper">{{$payment_plan->price == '0'?'Free':'$ '.$payment_plan->price}}</div>
                      </div>
                  @endforeach


                  {{--<div class="price-item">--}}
                  {{--<div class="price-title">Silver</div>--}}
                  {{--<div class="count-text">30 videos</div>--}}
                  {{--<ul class="includ-list">--}}
                  {{--<li>advantage 1</li>--}}
                  {{--<li>another</li>--}}
                  {{--<li>advantage 1</li>--}}
                  {{--</ul>--}}
                  {{--<div class="price"><span>$</span> 3</div>--}}
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
                  {{--</div>--}}
                  {{--<div class="price-item">--}}
                  {{--<div class="price-title">Platinum</div>--}}
                  {{--<div class="count-text">150 videos</div>--}}
                  {{--<ul class="includ-list">--}}
                  {{--<li>advantage 1</li>--}}
                  {{--<li>another</li>--}}
                  {{--<li>advantage 1</li>--}}
                  {{--<li>another</li>--}}
                  {{--<li>advantage 1</li>--}}
                  {{--</ul>--}}
                  {{--<div class="price"><span>$</span> 7</div>--}}
                  {{--</div>--}}
              </div>
              <a href="{{route('user.register.form')}}" class="butn butn-orange-white butn-large">{{trans('messages.home_cta')}}</a> 
            </div>
          </div>
        </div>
        

        <div class="bottom-text-wrap">
          <div class="container"> 
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
              	<h2 class="text-center">{{trans('messages.home_seotext_title')}}</h2>
                  {!!trans('messages.home_seotext_blurb')!!}
              </div>
            </div>
          </div>
        </div>

    </div>
@stop