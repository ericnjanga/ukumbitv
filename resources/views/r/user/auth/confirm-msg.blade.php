@extends('r.layouts.simple')
@section('content')
	
	<!-- Letting the user know that the email was sent successfuly -->
	@if(isset($flash_success))
    <div class="alert__force-notice alert alert-success">
        {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
        {{$flash_success}}
    </div>
  @endif
	<!-- Letting the user know that the email was sent successfuly -->




	<div class="page page-emailconfirm text-center"> 
    <h1>{{trans('messages.registration_confirm_h1')}}</h1>  
    <article> 
    	<ul class="list-decimal" >
    		<li>
    			{{trans('messages.registration_confirm_p1')}} <b>{{$user->email}}</b>
    		</li>
    		<li>{{trans('messages.registration_confirm_p2')}}</li> 
    		<li>{{trans('messages.registration_confirm_p3')}}</li> 
    		<li>{{trans('messages.registration_confirm_p4')}} <i class="fa fa-smile-o" aria-hidden="true"></i></li>    	
    	</ul>

    	<hr>
       
      <p>{{trans('messages.registration_confirm_error1')}} <a href="{{route('user.resend-confirm-email', $user->id)}}">{{trans('messages.registration_confirm_error2')}}</a>!</p> 
    </article>
  </div> 


@endsection