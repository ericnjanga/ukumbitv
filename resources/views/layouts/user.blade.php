<!DOCTYPE html>
<html class="no-js">
	<head>
	    <title>{{trans('messages.site_name')}} - {{trans('messages.website_description')}}</title>
	    
	    <meta name="viewport" content="width=device-width,  initial-scale=1">
	    <link rel="stylesheet" href="{{asset('streamtube/css/bootstrap.min.css')}}"> 
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/app.css')}}"> 
	    <link rel="shortcut icon" type="image/png" href="{{asset('streamtube/images/logo2-fav.png')}}"/>
	    <script src="{{asset('streamtube/js/vendors/modernizr.custom.js')}}"></script>
	    <!--  
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/style.css')}}">
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/responsive.css')}}"> --> 
	    @yield('styles') 
	</head>

	<body class="page-videos"> 
    @include('layouts.user.header')

    <div class="main-content video-content">
    	@include('layouts.user.latest-uploads.hero-carousel')

			<div class="container video-container">
				<div class="row">
		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">  
								<div class="panel-group thumbnail-info2" id="accordion" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="heading3">

							        <h3 class="thumbnail-title">Title</h3>
							        <div class="thumbnail-info1">
							        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
							        </div>

								      <h4 class="panel-title--">
								        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
								          Collapsible Group Item #1
								        </a>
								      </h4>
								    </div>
								    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
								      <div class="panel-body">
								        Danish sweet roll candy canes dragée tart powder gummi bears. Chocolate pastry cookie lollipop liquorice. Cheesecake gingerbread gingerbread pastry jujubes powder caramels.
								      </div>
								    </div>
								  </div> 
								</div><!-- panel-group --> 
				      </div><!-- caption -->
				    </div>
				  </div> 
					
		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">  
								<div class="panel-group thumbnail-info2" id="accordion" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="heading2">

							        <h3 class="thumbnail-title">Title</h3>
							        <div class="thumbnail-info1">
							        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
							        </div>

								      <h4 class="panel-title--">
								        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
								          Collapsible Group Item #1
								        </a>
								      </h4>
								    </div>
								    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
								      <div class="panel-body">
								        Danish sweet roll candy canes dragée tart powder gummi bears. Chocolate pastry cookie lollipop liquorice. Cheesecake gingerbread gingerbread pastry jujubes powder caramels.
								      </div>
								    </div>
								  </div> 
								</div><!-- panel-group --> 
				      </div><!-- caption -->
				    </div>
				  </div> 

		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">  
								<div class="panel-group thumbnail-info2" id="accordion" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="heading1">

							        <h3 class="thumbnail-title">Title</h3>
							        <div class="thumbnail-info1">
							        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
							        </div>

								      <h4 class="panel-title--">
								        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
								          Collapsible Group Item #1
								        </a>
								      </h4>
								    </div>
								    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
								      <div class="panel-body">
								        Danish sweet roll candy canes dragée tart powder gummi bears. Chocolate pastry cookie lollipop liquorice. Cheesecake gingerbread gingerbread pastry jujubes powder caramels.
								      </div>
								    </div>
								  </div> 
								</div><!-- panel-group --> 
				      </div><!-- caption -->
				    </div>
				  </div> 

		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3 class="thumbnail-title">Title</h3>
				        <div class="thumbnail-info1">
				        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
				        </div>
				      </div>
				    </div>
				  </div> 

		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3 class="thumbnail-title">Title</h3>
				        <div class="thumbnail-info1">
				        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
				        </div>
				      </div>
				    </div>
				  </div> 

		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3 class="thumbnail-title">Title</h3>
				        <div class="thumbnail-info1">
				        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
				        </div>
				      </div>
				    </div>
				  </div> 

		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3 class="thumbnail-title">Title</h3>
				        <div class="thumbnail-info1">
				        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
				        </div>
				      </div>
				    </div>
				  </div> 

		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3 class="thumbnail-title">Title</h3>
				        <div class="thumbnail-info1">
				        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
				        </div>
				      </div>
				    </div>
				  </div> 

		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3 class="thumbnail-title">Title</h3>
				        <div class="thumbnail-info1">
				        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
				        </div>
				      </div>
				    </div>
				  </div> 

		    	<div class="col-sm-6 col-md-3">
				    <div class="thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3 class="thumbnail-title">Title</h3>
				        <div class="thumbnail-info1">
				        	<time class="ib">2016</time>, <div class="ib">Cameroon</div>
				        </div>
				      </div>
				    </div>
				  </div> 
				</div><!--row-->
			</div><!--container-->
			


    	<!-- 
      @yield('content') 
    	-->
    </div>

    @include('layouts.user.footer')
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    @yield('scripts') 
	</body>
</html>