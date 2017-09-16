@extends('r.layouts.simple')
@section('content')
  <div class="page-about">
    <div class="container">
      <section class="row section1"> 
	      <header class="text-center"> 
	        <h1>About us</h1> 
	        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem nemo, sint autem atque suscipit minima vel exercitationem quisquam consequatur aut quibusdam quos quasi deleniti quia tempora quae officiis officia dicta!</p>
	      </header>
      	<div class="row">
      		<article class="col-md-4">
	      		<h2>The Brand</h2>
	      		<p>Drawn from her Swahilian origin « theatre », Ukumbi signifies « the show happening on the user's device ». Our main focus here is to embrace the Africain cultural heritage through our brand in its modern
	context and without any fear nor doubt, « Ukumbi TV » after a great reflection is just the perfect brand's name.</p>
	      	</article>
	      	<div class="col-md-4">
	      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore at, quasi officiis vero distinctio voluptatibus dolor, dicta a repellendus ea soluta et obcaecati aut veniam. Numquam id ipsa quam odit.</p>
	      	</div>
	      	<div class="col-md-4">
	      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore at, quasi officiis vero distinctio voluptatibus dolor, dicta a repellendus ea soluta et obcaecati aut veniam. Numquam id ipsa quam odit.</p>
	      	</div>
	      	<div class="col-md-4">
	      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore at, quasi officiis vero distinctio voluptatibus dolor, dicta a repellendus ea soluta et obcaecati aut veniam. Numquam id ipsa quam odit.</p>
	      	</div>
	      	<div class="col-md-4">
	      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore at, quasi officiis vero distinctio voluptatibus dolor, dicta a repellendus ea soluta et obcaecati aut veniam. Numquam id ipsa quam odit.</p>
	      	</div>
      	</div><!-- row -->
      	<!-- 
        <div class="col-sm-12 col-md-9 col-lg-7 col-xl-6">
          <div class="content-block">
          	 
            <div class="img-block">
                <img src="{{asset('r/img/landing-bg.png')}}" alt="">
            </div>
             
            <div class="content-block-bottom">
                <div class="title-page-add">Questions ?</div>
                <div class="text-add">Fill free to contact us</div>
                <a href="{{route('user.contact')}}" class="butn btn-cta1b btn-lg">Contact us</a>
            </div>
          </div>
        </div> -->
      </section>

      <hr>

      <section class="row">
      	<h2>The Team</h2>
				<article class="col-md-4">
					<figure>
						<img src="http://via.placeholder.com/500x350" alt="" class="tmb img-responsive">
						<figcaption>
							<b>Eric Njanga</b>
							<span>Founder, CEO</span>
						</figcaption>
					</figure>
					<p>Young and talented, he is the founder and CEO of this brand. He is an internet entrepreneur with a 10years experience as a web developer from Toronto ( Canada). He has a great passion for cinema, visual arts and technology. His biggest dream is to give a different view to the African cinema.</p>
					<p>A big fan of Marvel's panther, Eric dreams to bring up successful fiction characters. As a responsible and serious man, he lives in Toronto with his wife and three children. What facinates him most is travelling accross Africa.</p>
				</article>
				<article class="col-md-4">
					<figure>
						<img src="http://via.placeholder.com/500x350" alt="" class="tmb img-responsive">
						<figcaption>
							<b>Joel Njanga</b>
							<span>Chief of Technology</span>
						</figcaption>
					</figure>
					<p>Equally young and talented, he is a technology director and senior advicer. He is also an Electrical engineer who successfully graduated from the university of Concordia ( Montréal Canada). Joel has been actively overseeing the developement of software for more than 500 fortune companies in the US. He has a great love for scientific fictions ( star wars, star trek). He so much dreams of creating home made African scientific fictions. Also very responsible, he lives in Washington ( USA) with his wife and two children.</p>
				</article>
				<article class="col-md-4">
					
				</article>
      </section>
    </div>
  </div>
@endsection