<header class="ukb-main-header">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="ukb-navbar-brand navbar-brand" href="/"><img src="{{asset('r/img/logo.png')}}" alt=""></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
	      <ul class="nav navbar-nav navbar-right"> 
	      	<li>
	      		<a href="{{route('user.login.form')}}" class="btn btn-link btn-lg">{{l("Sign in")}}</a>
	      	</li> 
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav> 
</header>