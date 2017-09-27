@extends('static.masterpage-404')

@section('styles')

@endsection

@section('content')

  <div class="panel panel-default page-404">
  	<h1>La page n'a pas été trouvée</h1>
		<p>La page demandée n'existe pas. Nous tenterons de vous rediriger automatiquement vers notre page d'accueil dans 10 secondes.</p>
		<p>Veuillez aller à la page d'accueil de Netflix en cliquant sur le bouton ci-dessous.</p>

		<div>
			<a href="/" class="btn btn-cta1b btn-lg">UkumbiTV Home</a> 
		</div>


  </div><!--end off canvas wrapper-->
    

@endsection

@section('scripts')

@endsection