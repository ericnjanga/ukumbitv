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
		            <form action="" method="">
		                <div class="input-wrap">
		                    <label>Full name</label>
		                    <input type="text" name="name">
		                </div>
		                <div class="input-wrap">
		                    <label>E-mail</label>
		                    <input type="email" name="email">
		                </div>
		                <div class="input-wrap input-tel">
		                    <label>Phone</label>
		                    <input type="tel" name="usrtel">
		                </div>
		                <div id="change-pas" class="change-pas like-link">Change password</div>

		                <button type="submit" class="butn btn-cta1b btn-lg">Save Changes</button>
		            </form>
		            <div class="change-pas-block">
		                <form action="" method="">
		                    <div class="input-wrap">
		                        <label>Enter current password</label>
		                        <input type="password" name="old_password" class="mypass">
		                    </div>
		                    <div class="input-wrap">
		                        <label>Enter new password</label>
		                        <input  type="password" name="new_password" class="mypass">
		                    </div>
		                    {{--<div class="operations-pass">--}}
		                        {{--<span id="show-pas" class="like-link">Show password</span>--}}
		                    {{--</div>--}}
		                    <button type="submit" class="butn btn-cta1 btn-lg">Save new password</button>
		                </form>
		            </div>

		        </div>
		    </div>
    	</div><!-- row -->
    </div><!-- global-main-content --> 
  </div>
@endsection