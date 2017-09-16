@extends('r.layouts.simple')
@section('content')
  <div class="page-about">
    <div class="container">
      <section class="section1"> 
	      <header class="text-center"> 
	        <h1>About us</h1> 
	        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem nemo, sint autem atque suscipit minima vel exercitationem quisquam consequatur aut quibusdam quos quasi deleniti quia tempora quae officiis officia dicta!</p>
	      </header>
      	<article>
      		<!-- <article class="col-md-4"> -->
	      		<h2>The Brand</h2>
	      		<p>Drawn from her Swahilian origin « theatre », Ukumbi signifies « the show happening on the user's device ». Our main focus here is to embrace the Africain cultural heritage through our brand in its modern
	context and without any fear nor doubt, « Ukumbi TV » after a great reflection is just the perfect brand's name.</p>
	      	<!-- </article> -->
	      	<!-- <div class="col-md-4"> -->
	      		<h2>ORIGINS</h2>
	      		<h3>The rise of African independent filmakers</h3>
	      		<p>The presence of video streaming platforms such as YouTube witnessed the evolution of a great number of small and independent movie production companies in Africa, this made it advantegeous for African film producers to show case their productions on the web at a low cost rate for the pleasure of millions of viewers.</p>
	      	<!-- </div>
	      	<div class="col-md-4"> -->
	      		<h3>The Problem : Limited regulation, Little progress</h3>
	      		<p>The film industry in some African countries is still undesirable and less regulated. This turns to obstruct it from reaching international standards thereby reducing it's chances to compete with other industries world wide. It has had a great negative impact on their productions, and has hinder local talents by preventing them from making a living out of their art.</p>
	      	<!-- </div>
	      	<div class="col-md-4"> -->
	      		<h3>The solution : Why not do it like Netflix ?</h3>
	      		<p>It is not a secret and will neither be an exageration to say that Netflix has successfully brought back to life the home television business by creating a multi-billion dollar film industry, firstly by streaming Hollywood movies and secondly by indulging herself in her own original movies production. Ukumbi TV dreams same for the African cinema. We are taking a bold step ahead in nourishing local talented actors and producers.</p>
	      		<ul>
	      			<li>Firstly,Ukumbi TV streams African movies locally made by talented actors and producers of the continent.</li>
	      			<li>The initial benefits will be re-invested in the production of the brand's own original movies.</li>
	      			<li>From our benefits, we shall proceed into the establishment of local art schools, inorder to elevate the huge local talents Africa has and to further improve the quality so as to make the African cinema meet up competetively with international standards of film making.</li>
	      		</ul>
	      	<!-- </div> -->
	      	<!-- <div class="col-md-4"> -->
	      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore at, quasi officiis vero distinctio voluptatibus dolor, dicta a repellendus ea soluta et obcaecati aut veniam. Numquam id ipsa quam odit.</p>
	      	<!-- </div> -->
      	</article><!-- row -->
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