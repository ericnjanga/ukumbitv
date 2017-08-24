@extends('r.layouts.simple')
@section('content')
    <div class="confirmmail-wrap">
        <div class="container">
            @if(isset($flash_success))
                <div class="alert alert-success"  >
                    {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
                    {{$flash_success}}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="title-page">Confirm your e-mail</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="notice-block">
                        <div class="notice-text">
                            <p>Please check your inbox for a confirmation link.</p>
                            <p>If you do not receive the email at
                                <span class="bold">{{$user->email}}</span> within an hour, we can
                                <a href="{{route('user.resend-confirm-email', $user->id)}}">resend it to you</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection