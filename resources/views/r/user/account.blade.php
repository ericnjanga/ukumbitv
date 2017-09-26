@extends('r.layouts.user-search')
@section('content')
  <div class="page page-myaccount"> 
  	<div class="global-display"> 
    	@include('r.chunks._account_menu') 

    	<div class="global-content">
    		<h1>{{trans('messages.PMA_title')}}</h1>
	    	<div class="row">
	    		<div class="col-sm-2">
		        <div class="img-block">
		        	<img class="img-responsive img-circle" src="{{Auth::user()->picture}}" style="height: 150px;width: 150px;" alt="">
					<form action="{{route('user.update-avatar')}}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="img-file">Select new image</label>
							<input type="file" id="img-file" name="useravatar" accept="image/jpeg,image/png">
						</div>
						<button id="btn-update-avatar" class="btn btn-cta1b btn-lg">{{trans('messages.save_changes')}}</button>
					</form>
	            <!-- <a href="" class="change-photo-butn"><span class="icon icon-pencil-edit-button"></span></a> -->
	        	</div>
		    	</div>
			    <div class="col-sm-10">
		        <form class="account-form-block">
							<div class="page page-block"> 
	                <div class="form-group">
                    <label>{{trans('messages.full_name')}}</label>
                    <input id="user-name" class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
	                </div>
	                <div class="form-group">
                    <label>{{trans('messages.email')}}</label>
                    <input id="user-email" class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
	                </div>

	                <button id="btn-update-profile" data-update-profile="{{route('user.update-profile')}}"  class="btn btn-cta1b btn-lg">{{trans('messages.save_changes')}}</button>
	                <!-- <div class="form-group input-tel">
	                    <label>Phone</label>
	                    <input id="user-phone" class="form-control" type="number" name="usrtel" value="{{Auth::user()->mobile}}">
	                </div> -->
	                <!-- <div id="change-pas" class="change-pas like-link">Change password</div> -->
							</div>

							<hr>

	            <div class="page page-block"> 
                <div class="form-group">
                    <label>{{trans('messages.enter_curr_pass')}}</label>
                    <input id="old-password" class="form-control" type="password" name="old_password" class="mypass">
                </div>
                <div class="form-group">
                    <label>{{trans('messages.enter_new_pass')}}</label>
                    <input id="new-password" class="form-control"  type="password" name="new_password" class="mypass">
                </div>
                {{--<div class="operations-pass">--}}
                    {{--<span id="show-pas" class="like-link">Show password</span>--}}
                {{--</div>--}}
                <button id="btn-update-password" data-update-password="{{route('user.update-password')}}" class="btn btn-cta1b btn-lg">{{trans('messages.save_changes')}}</button> 
	            </div>

		        </form>
			    </div>
	    	</div><!-- row -->
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