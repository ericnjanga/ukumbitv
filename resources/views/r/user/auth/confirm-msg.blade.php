@extends('r.layouts.simple')
@section('content')


	<div class="page-emailconfirm text-center">
    @if(isset($flash_success))
      <div class="alert alert-success">
          {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
          {{$flash_success}}
      </div>
    @endif
    <h1>{{trans('messages.registration_confirm_h1')}}</h1>  
    <article> 
      <p>{{trans('messages.registration_confirm_p1')}}</p>
      <p>{{trans('messages.registration_confirm_p2_1')}} <span class="bold">{{$user->email}}</span> {{trans('messages.registration_confirm_p2_2')}} <a href="{{route('user.resend-confirm-email', $user->id)}}">{{trans('messages.registration_confirm_p2_3')}}</a>.</p> 
    </article>
  </div> 


@endsection