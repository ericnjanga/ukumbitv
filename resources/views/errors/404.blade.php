@extends('static.masterpage-404')

@section('styles')

@endsection

@section('content')

  <div class="panel panel-default page-404">
  	<h1>La page n'a pas été trouvée</h1>
		<p>La page demandée n'existe pas. Nous tenterons de vous rediriger automatiquement vers notre page d'accueil dans <span></span> <span id="countdown" style="font-weight:bold;">10</span> secondes</span>.</p>
		<p>Veuillez aller à la page d'accueil de Netflix en cliquant sur le bouton ci-dessous.</p>

		<br>

		<div>
			<a href="/" class="btn btn-cta1b btn-lg">UkumbiTV Home</a> 
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