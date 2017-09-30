<section ng-app="ukumbitvApp">
	<div id="morphsearch" class="morphsearch" ng-controller="InstantSearchController">
		<form class="morphsearch-form">
			<input class="morphsearch-input" type="search" ng-model="searchString" placeholder="{{trans('messages.Search_placeholder')}}"/>
			<button class="morphsearch-submit" type="submit">Search</button>
		</form>
		<div class="morphsearch-content">
			<div class="dummy-column">
				<!-- <h2>People</h2> -->
				<div ng-repeat="i in items | searchFor:searchString">
					<a class="dummy-media-object" href="<%i.video_url%>">
					<img class="round" ng-src="<%i.poster%>" alt="<%i.title%>"/>
					<h3><%i.title%></h3>
				</a>
				<!-- <a href="{{i.url}}"><img ng-src="{{i.image}}" /></a>
				<p>{{i.title}}</p> -->
				</div>
		 
				
				<!-- <a class="dummy-media-object" href="http://twitter.com/rachsmithtweets">
					<img class="round" src="http://0.gravatar.com/avatar/48959f453dffdb6236f4b33eb8e9f4b7?s=50&d=identicon&r=G" alt="Rachel Smith"/>
					<h3>Rachel Smith</h3>
				</a>
				<a class="dummy-media-object" href="http://www.twitter.com/peterfinlan">
					<img class="round" src="http://0.gravatar.com/avatar/06458359cb9e370d7c15bf6329e5facb?s=50&d=identicon&r=G" alt="Peter Finlan"/>
					<h3>Peter Finlan</h3>
				</a>
				<a class="dummy-media-object" href="http://www.twitter.com/pcridesagain">
					<img class="round" src="http://1.gravatar.com/avatar/db7700c89ae12f7d98827642b30c879f?s=50&d=identicon&r=G" alt="Patrick Cox"/>
					<h3>Patrick Cox</h3>
				</a>
				<a class="dummy-media-object" href="https://twitter.com/twholman">
					<img class="round" src="http://0.gravatar.com/avatar/cb947f0ebdde8d0f973741b366a51ed6?s=50&d=identicon&r=G" alt="Tim Holman"/>
					<h3>Tim Holman</h3>
				</a>
				<a class="dummy-media-object" href="https://twitter.com/shaund0na">
					<img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona"/>
					<h3>Shaun Dona</h3>
				</a> -->
			</div> 
		</div><!-- /morphsearch-content -->
		<span class="morphsearch-close"></span>
	</div><!-- /morphsearch -->
	 
	<div class="ukumbitv-overlay"></div>
</section><!-- ukumbitvApp -->
	