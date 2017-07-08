<nav class="main-nav-homevideo main-nav navbar navbar-default">
  <div class="container container-fluid-">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="https://www.ukumbitv.com">
				<img class="img-brand" src="{{asset('streamtube/images/logo1.png')}}" alt='UkumbiTv' />
      </a>


      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">{{trans('messages.Toggle_navigation')}}</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- hidding [#movies and #TvShow menu links] for now -->
      <!-- ...................... -->
      <!--  
      <ul class="nav navbar-nav">
        <li class="active">
        	<a href="#">
        		{{trans('Movies')}}
        		<span class="sr-only">(current)</span></a>
        </li>
        <li><a href="#">{{trans('TvShows')}}</a></li> 
      </ul> 
    	-->
      
      <ul class="nav navbar-nav navbar-right"> 
      	<!-- hidding [search] for now -->
      	<!-- ...................... -->
      	<!-- <li>
      		<form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control search-control" placeholder="Search">
		        </div> 
		      </form>
      	</li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          	<img src="{{Auth::user()->picture}}" style="width:40px;height:40px;" data-pin-nopin="true" class="img-circle">
						<span class="user-name">{{Auth::user()->name}}</span>
           	<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="{{route('user.profile')}}">{{tr('account')}}</a></li> 
            <li role="separator" class="divider"></li>
            <li><a href="{{route('user.logout')}}">{{tr('logout')}}</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



