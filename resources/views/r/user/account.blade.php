@extends('r.layouts.user-search')
@section('content')
  <div class="container-fluid page-myaccount">  
    @include('r.chunks._account_menu') 

    <div class="global-main-content">
    	<div class="row">
    		<div class="col-sm-2">
	        <div class="img-block">
	        	<img src="{{asset('r/img/user-photo.png')}}" alt="">
            <a href="" class="change-photo-butn"><span class="icon icon-pencil-edit-button"></span></a>
        	</div>
	    	</div>
		    <div class="col-sm-10">
		        <div class="account-form-block">

		                <div class="input-group">
		                    <label>Full name</label>
		                    <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
		                </div>
		                <div class="input-group">
		                    <label>E-mail</label>
		                    <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
		                </div>
		                <div class="input-group input-tel">
		                    <label>Phone</label>
		                    <input class="form-control" type="tel" name="usrtel" value="{{Auth::user()->mobile}}">
		                </div>
		                <div id="change-pas" class="change-pas like-link">Change password</div>

		                <button  class="btn btn-cta1b btn-lg">Save Changes</button>

		            <div class="change-pas-block">

		                    <div class="input-group">
		                        <label>Enter current password</label>
		                        <input class="form-control" type="password" name="old_password" class="mypass">
		                    </div>
		                    <div class="input-group">
		                        <label>Enter new password</label>
		                        <input class="form-control"  type="password" name="new_password" class="mypass">
		                    </div>
		                    {{--<div class="operations-pass">--}}
		                        {{--<span id="show-pas" class="like-link">Show password</span>--}}
		                    {{--</div>--}}
		                    <button  class="btn btn-cta1 btn-lg">Save new password</button>

		            </div>

		        </div>
		    </div>
    	</div><!-- row -->
    </div><!-- global-main-content --> 
  </div>
@endsection