
@extends('static.legal-master-page')


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
	 				<h2>Membership &amp; billing</h2>
	 				<a href="#" class="btn btn-default btn-block btn-cta">Cancel Membership</a>
	 			</div>
	 			<div class="col-md-8">
	 				<div class="row" style="margin-bottom: 15px;">
	 					<div class="col-md-6 text-left"></div>
	 					<div class="col-md-6 text-right">
	 						<a href="{{route('user.update.profile')}}">Update profile (image, username and more)</a>
	 					</div>
	 				</div>
	 				<div class="row">
	 					<div class="col-md-6 text-left"></div>
	 					<div class="col-md-6 text-right">
	 						<a href="{{route('paypal' , Auth::user()->id)}}">Update billing information</a>
	 					</div>
	 				</div>
	 			</div> 
 			</div><!-- row -->

 			<hr>

 			<div class="row">
 				<div class="col-md-4">
		 				<h2>PLAN DETAILS</h2>
		 			</div>
		 			<div class="col-md-8">
		 				<div class="row">
		 					<div class="col-md-6 text-left">
		 						<b>Plan B</b>
		 					</div>
		 					<div class="col-md-6 text-right">
		 						<a href="#">Change Plan</a>
		 					</div>
		 				</div>
		 			</div> 
 			</div><!-- row -->
 			 
 		</div><!-- col-md-12 -->  
 	</div><!-- p-acc -->


@endsection