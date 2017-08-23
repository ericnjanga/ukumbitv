@extends('layouts.user')

@section('content')

<div class="y-content">
    <div class="row y-content-row">
        @include('layouts.user.nav')

        <div class="page-inner col-sm-9 col-md-10 profile-edit">
            
            <div class="profile-content">
                <div class="row no-margin">
                    <div class="col-sm-7 profile-view">
                        <div class="edit-profile profile-view">
                            <div class="profile-details">
                                <div class="sub-profile">

                                    <div class="profile-title">
                                        <h3>{{tr('welcome_user')}} {{Auth::user()->name}}</h3>
                                        
                                        <p>{{tr('pay_subscription_content')}}</p>
                                        
                                        @if(Auth::user()->user_type)
                                            <p style="color:#cc181e">The Pack will Expiry within <b>{{get_expiry_days(Auth::user()->id)}} days</b></p>
                                        @endif
                                    </div><!--end of profile-title-->
                                    <form>
                                    <br>
                                        <div class="change-pwd edit-pwd edit-pro-btn">
                                            @if(envfile('PAYPAL_ID') && envfile('PAYPAL_SECRET'))
                                                <a href="{{route('paypal' , Auth::user()->id)}}" class="btn btn-warning">{{tr('payment')}}</a>
                                            @endif
                                        </div> 
                                    </form>                                
                                </div><!--end of sub-profile-->                            
                            </div><!--end of profile-details-->                           
                        </div><!--end of edit-profile-->

                    </div><!--profile-view end--> 

                </div><!--end of profile-content row-->
            
            </div>

        </div>

    </div>
</div>

@endsection