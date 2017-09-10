@extends('r.layouts.user-search')
@section('content')
  <div class="page-myaccount"> 
  	<div class="global-display"> 
    	@include('r.chunks._account_menu') 

    	<div class="global-content">
    		<h1>Change your preferences</h1>
	    	<div class="row">
	    		<div class="col-sm-2">
		        <div class="img-block">
		        	<img src="{{Auth::user()->picture}}" alt="">
	            <!-- <a href="" class="change-photo-butn"><span class="icon icon-pencil-edit-button"></span></a> -->
	        	</div>
		    	</div>
			    <div class="col-sm-10">
		        <form class="account-form-block">
							<div class="page-block"> 
	                <div class="form-group">
                    <label>Full name</label>
                    <input id="user-name" class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
	                </div>
	                <div class="form-group">
                    <label>E-mail</label>
                    <input id="user-email" class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
	                </div>

	                <button id="btn-update-profile" data-update-profile="{{route('user.update-profile')}}"  class="btn btn-cta1b btn-lg">Save Changes</button>
	                <!-- <div class="form-group input-tel">
	                    <label>Phone</label>
	                    <input id="user-phone" class="form-control" type="number" name="usrtel" value="{{Auth::user()->mobile}}">
	                </div> -->
	                <!-- <div id="change-pas" class="change-pas like-link">Change password</div> -->
							</div>

							<hr>

	            <div class="page-block"> 
                <div class="form-group">
                    <label>Enter current password</label>
                    <input id="old-password" class="form-control" type="password" name="old_password" class="mypass">
                </div>
                <div class="form-group">
                    <label>Enter new password</label>
                    <input id="new-password" class="form-control"  type="password" name="new_password" class="mypass">
                </div>
                {{--<div class="operations-pass">--}}
                    {{--<span id="show-pas" class="like-link">Show password</span>--}}
                {{--</div>--}}
                <button id="btn-update-password" data-update-password="{{route('user.update-password')}}" class="btn btn-cta1b btn-lg">Save new password</button> 
	            </div>

		        </form>
			    </div>
	    	</div><!-- row -->
	    </div><!-- "global-content -->
    </div><!-- global-display --> 
  </div>
@endsection