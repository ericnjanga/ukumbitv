@extends('static.masterpage-404')

@section('styles')

@endsection

@section('content')

  <div class="panel panel-default page-404">
  	<h1>{{trans('messages.P404_h1')}}</h1>
		<p>{{trans('messages.P404_p1')}} <span></span> <span id="countdown" style="font-weight:bold;">10</span> secondes</span>.</p>
		<p>{{trans('messages.P404_p2')}}</p>

		<br>

		<div>
			<a href="/" class="btn btn-cta1b btn-lg">{{trans('messages.P404_cta')}}</a> 
		</div>


  </div><!--end off canvas wrapper-->

  <script>
  	//Redirect to home page after "timeleft" seconds
	  var timeleft = 10;
		var downloadTimer = setInterval(function(){
		  document.getElementById('countdown').innerHTML = --timeleft;
		  if(timeleft <= 0){
		  	document.location.href = document.location.origin;
		  	clearInterval(downloadTimer);
		  }  
		},1000);
  </script>
    

@endsection

@section('scripts')

@endsection