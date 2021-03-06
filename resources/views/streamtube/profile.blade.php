
@extends('static.masterpage-legal')


@section('content-title')
{{trans('messages.account')}}
@endsection

@section('content')
	<style>
		h1 { 
    	margin-bottom: 0;
		}
		.p-acc hr { 
    	border-top: 1px solid #999;
    	margin-top: 30px;
    	margin-bottom: 30px;
		}
		.p-acc h2 {
			margin-top: 0;
			margin-bottom: 15px;
	    font-size: 18px;
	    text-transform: uppercase;
	    color: #999;
		}
		.p-acc .text-right {
			line-height: 20px;
		}
		.p-acc .btn-cta {
			max-width: 200px;
    	padding: 10px;
		} 
	</style>
 	<div class="p-acc row">
 		<div class="col-md-12">

 			<hr>


 			<div class="row">
 				<div class="col-md-4">
	 				<h2>{{trans('messages.Membership_billing')}}</h2>
	 				<a href="#" class="btn btn-default btn-block btn-cta">{{trans('messages.Cancel_Membership')}}</a>
	 			</div>
	 			<div class="col-md-8">
	 				<div class="row" style="margin-bottom: 15px;">
	 					<div class="col-md-6 text-left"></div>
	 					<div class="col-md-6 text-right">
	 						<a href="{{route('user.update.profile')}}">{{trans('messages.Update_profile_blurb')}}</a>
	 					</div>
	 				</div>
	 				<div class="row">
	 					<div class="col-md-6 text-left"></div>
	 					<div class="col-md-6 text-right">
	 						<a href="{{route('paypal' , Auth::user()->id)}}">{{trans('messages.Update_billing_information')}}</a>
	 					</div>
	 				</div>
	 			</div> 
 			</div><!-- row -->

 			<hr>

 			<div class="row">
 				<div class="col-md-4">
		 				<h2>{{trans('messages.plan_details')}}</h2>
		 			</div>
		 			<div class="col-md-8">
		 				<div class="row">
		 					<div class="col-md-6 text-left">
		 						<b>Plan B</b>
		 					</div>
		 					<div class="col-md-6 text-right">
		 						<a href="{{route('user.select-pay-plan')}}">{{trans('messages.change_plan')}}</a>
		 					</div>
		 				</div>
		 			</div> 
 			</div><!-- row -->




			<!--     
			CHANGE PASSWORD BUTTON
			.....................  
				<a href="{{route('user.change.password')}}" class="btn btn-danger">{{tr('change_password')}}</a> -->




 			 
 		</div><!-- col-md-12 -->  
 	</div><!-- p-acc -->


@endsection