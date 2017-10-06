@extends('r.layouts.app')
@section('layout')
  @include('r.chunks._morphsearch')
  @include('r.chunks._header_search')
  <main>



  	@if(Auth::check())
			@if(!Auth::user()->isVerified())
			<script>alert('?????');</script>
			@endif
		@endif



    @yield('content')
  </main>
  @include('r.chunks._footer_main')
@endsection


@section('scripts')
	<!-- email confirmation reminder -->
	@if(Auth::check())
		@if(!Auth::user()->isVerified())
		<script>
			swal ( "Oops" ,  "Something went wrong!" ,  "info" )
		</script>
			<!-- <div class="alert__force-notice alert alert-info text-center" role="alert">
				{{trans('messages.auth_confirm_reminder1')}}
				<a href="{{route('user.confirm-user-email')}}"><b>{{trans('messages.auth_confirm_reminder2')}}</b></a> <i class="fa fa-smile-o" aria-hidden="true"></i>
			</div> -->
		@endif
	@endif
	<!-- email confirmation reminder -->
@endsection