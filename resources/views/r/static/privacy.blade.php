@extends('r.layouts.simple')
@section('content')
  <div class="page-tersm-and-privacy">
    <div class="container">

		  <aside id="fixed-info" class="col-md-3 fixed-info">
		  	<ul class="list-unstyled">
		  		<li><a href="{{route('user.terms-condition')}}">{{trans('messages.tos_title')}}</a></li>
		  		<li class="active">{{trans('messages.PP_title')}}</a></li>
		  		<li><a href="{{route('user.contact')}}">Contact us</a></li>
		  	</ul> 
		  </aside>

		  <div class="col-md-7">
    		<h1>{{trans('messages.tos_title')}}</h1>
		  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, excepturi numquam magnam quas sunt debitis doloremque quam, facere, incidunt mollitia voluptas. Esse commodi nihil rem facilis quia a, atque, ipsam.</p>
		  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex officiis nesciunt consequatur voluptates! Nisi eum voluptas iusto reiciendis, est delectus. Consequuntur ut cupiditate incidunt cum laboriosam, hic voluptas tempore rem.</p>
		  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia perspiciatis ipsa maiores veritatis, consequatur beatae molestiae illo impedit est magnam dolor ex laboriosam a fuga fugit, quos earum quis, quae.</p>
		  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti fugit iste, magnam sit, sint fuga blanditiis possimus esse rerum odio, doloribus veritatis voluptatibus quo atque, adipisci error ratione maiores consequuntur.</p>
		  </div>  
    </div><!-- container -->
  </div>
@endsection