@extends('r.layouts.main')
@section('content')
  <div class="page-landing">

    <section class="section text-center">
    	<a class="link-inner-redirect" name="section1"></a> 
    	<div class="container">
      	<div class="list-inline txt-presentation3">
      		<section class="section-block">
      			<h2 class="title">
      				<span class="txt">{{trans('messages.home_midsec_title1')}}</span>
      				<span class="icon icon-video"></span>
      			</h2> 
            <p>{{trans('messages.home_midsec_blurb1')}}</p>
      		</section>
      		<section class="section-block"> 
            <h2 class="title">
            	<span class="txt">{{trans('messages.home_midsec_title2')}}</span>
            	<span class="icon icon-monitor-tablet-and-smartohone"></span>
            </h2> 
            <p>{{trans('messages.home_midsec_blurb2')}}</p>
      		</section>
      		<section class="section-block"> 
            <h2 class="title">
            	<span class="txt">{{trans('messages.home_midsec_title3')}}</span>
            	<span class="icon icon-computer-screen"></span>
            </h2>
            <p>{{trans('messages.home_midsec_blurb3')}}</p>
      		</section>
      	</div>
      </div>
 
			<a class="btn-down btn-dark" href="#section2">
		   	<span class="icon icon-scroll-arrow-to-down"></span>
		  </a>
    </section><!-- section -->   
      
       

  	<section class="bg1 section text-center">
    	<a class="link-inner-redirect" name="section2"></a> 
  		<div class="container"> 
        <div class="row">
          <div class="col-sm-12"> 
          	<h2 class="title text-center">{{trans('messages.home_plansec_title')}}</h2>
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
                    <!-- <div class="price upper">{{$payment_plan->price == '0'?'Free':'$ '.$payment_plan->price}}</div> -->
                    
										@if($payment_plan->price == '0') 
											<!-- <div class="price upper">{{trans('messages.free')}}</div> -->
											<a href="{{route('user.register.form')}}" class="btn btn-cta1b btn-lg">{{trans('messages.home_cta')}}</a> 
										@else 
											<div class="price upper">{{$payment_plan->price}}<small>/{{trans('messages.month')}}</small></div>
										@endif 
                  </div>
              @endforeach 
            </div> 
          </div>
        </div>
      </div>
 
			<a class="btn-down" href="#section3">
		   	<span class="icon icon-scroll-arrow-to-down"></span>
		  </a>
  	</section><!-- section -->
      
      

    <section class="section text-center">
    	<a class="link-inner-redirect" name="section3"></a> 
      <div class="container"> 
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          	<h2 class="title text-center">{{trans('messages.home_seotext_title')}}</h2>
              {!!trans('messages.home_seotext_blurb')!!}
          </div>
        </div>
      </div>
    </section><!-- section -->
  </div><!-- page-landing -->
@stop