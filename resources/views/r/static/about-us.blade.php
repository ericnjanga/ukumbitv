@extends('r.layouts.simple')
@section('content')
  <div class="page-about">
    <div class="container">
      <section class="section1"> 
	      <header class="text-center"> 
	        <h1>About us</h1> 
	        <p>At UkumbiTV, we're passionate about developing the African cinema to the highest international standards!</p>
	      </header>
      	<article> 
	      		<h2>The Brand</h2>
	      		<p>Drawn from her Swahilian origin « theatre », Ukumbi signifies « the show happening on the user's device ». Our main focus here is to embrace the Africain cultural heritage through our brand in its modern
	context and without any fear nor doubt, « UkumbiTV » after a great reflection is just the perfect brand's name.</p>
	      	 
	      		<h2>ORIGINS</h2>
	      		<h3>The rise of African independent filmakers</h3>
	      		<p>The presence of video streaming platforms such as YouTube witnessed the evolution of a great number of small and independent movie production companies in Africa, this made it advantegeous for African film producers to showcase their productions on the web at a low cost rate for the pleasure of millions of viewers.</p>
	      
	      		<h3>The Problem : Limited regulation, Little progress</h3>
	      		<p>The film industry in some African countries is still undesirable and less regulated. This turns to obstruct it from reaching international standards thereby reducing it's chances to compete with other industries world wide. It has had a great negative impact on their productions, and has hinder local talents by preventing them from making a living out of their art.</p>
	      	
	      		<h3>The solution : Why not do it like Netflix ?</h3>
	      		<p>It is not a secret and will neither be an exageration to say that Netflix has successfully reinvented the home television business by creating a multi-billion dollar film industry, firstly by streaming Hollywood movies and secondly by indulging herself in her own original movies production. UkumbiTV dreams same for the African cinema. We are taking a bold step ahead in nourishing local talented actors and producers:</p>
	      		<ul class="list-decimal">
	      			<li>Firstly, UkumbiTV streams African movies locally made by talented actors and producers of the continent</li>
	      			<li>The initial benefits will be re-invested in the production of the brand's own original movies</li>
	      			<li>From our benefits, we shall proceed into the establishment of local art schools, inorder to elevate the huge local talents Africa has and to further improve the quality so as to make the African cinema meet up competetively with international standards of film making.</li>
	      		</ul>
	      	
      	</article><!-- row --> 
      </section>

      <hr>

      <section class="row">
      	<h2 class="text-center">The Team</h2>
				<article class="col-md-4 col-md-offset-2">
					<figure>
						<img src="{{asset('r/img/team/Eric_0784.jpg')}}" alt="Eric Njanga, founder, CEO" class="tmb img-responsive">
						<figcaption>
							<b>Eric Njanga</b>
							<span>Founder, CEO</span>
						</figcaption>
					</figure>
					<ul class="list-inline">
						<li>
							<a href="https://www.linkedin.com/in/ericanjanga/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="https://www.instagram.com/ericnjanga/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</li>
					</ul>
					<p>Young and talented internet entrepreneur with a 10years experience as a web developer from Toronto (Canada). He has a great passion for cinema, visual arts and technology. His biggest dream is to give a different view to the African cinema.</p>
					<p>A big fan of <a href="http://marvel.com/characters/5/black_panther" target="_blank">Marvel's Black Panther</a> , Eric dreams to bring up successful fiction characters. As a responsible and serious man, he lives in Toronto with his wife and three children. What facinates him most is travelling accross Africa.</p>
				</article>
				
				<article class="col-md-4">
					<figure>
						<img src="{{asset('r/img/team/seraphine.jpg')}}" alt="Seraphine Beng, Chief Copywriter" class="tmb img-responsive">
						<figcaption>
							<b>Seraphine Beng</b>
							<span>Chief Copywriter</span>
						</figcaption>
					</figure>
					<ul class="list-inline">
						<li>
							<a href="https://www.facebook.com/seraphine.beng" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="https://www.instagram.com/seraphinebeng/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</li>
					</ul>
					<p>Born and raised up In Douala (Cameron), she is a very brilliant, talented and dynamic lady. Always very active when it comes to work. Academically, she is very studious and successfully obtained a masters degree In entrepreneuriat communication from the university of Douala (Cameron). She is a journalist, TV show  host and also do present events too. She loves reading, writing and travelling. She loves to associate herself with hard working people, those who are constantly involve in creating innovative stuffs, people who are in search of originality. She is a volunteer in so many projets, she fights so hard when it comes to realising her dreams. Her greatest dream is to own a purely entertainment TV station. She lives in Douala (Cameron) and hopes to explore other nations with time.</p>
				</article>

				<!-- <article class="col-md-4">
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
					
				</article> -->
      </section>
    </div>
  </div>
@endsection