<section ng-app="ukumbitvApp">
	<div id="morphsearch" class="morphsearch" ng-controller="InstantSearchController">
		<form class="morphsearch-form">
			<input class="morphsearch-input" type="search" ng-model="searchString" placeholder="{{trans('messages.Search_placeholder')}}"/>
			<button class="morphsearch-submit" type="submit">Search</button>
		</form>
		<div class="morphsearch-content">
			<div class="dummy-column">
				<!-- <p>....<% searchString %></p> -->
				<!-- <h2>People</h2> -->
				<div ng-repeat="i in movies | searchForMovies:searchString">
					<figure class="video-item ruby-hover"> 
						<a href="<%i.video_url%>" class="video-item__frame"> 
							<span class="video-item__resume"><%i.excerpt%></span> 
							<img data-src="<%i.poster%>" class="video-item__img lazyloaded" alt="<%i.title%>"> 
						</a> 
						<figcaption class="video-item__title ellipsis-gradient">
							<%i.title%>
						</figcaption> 
						<div class="video-item__info"> 
							<div class="video-genre">Comedy</div> 
							<div class="butn-like">
								<span class="icon icon-thumbs-up"></span>
								<span class="likes-count">0</span>
							</div> 
						</div> 
					</figure> 
				<!-- <a href="{{i.url}}"><img ng-src="{{i.image}}" /></a>
				<p>{{i.title}}</p> -->
				</div>
		 
				 
			</div> 
		</div><!-- /morphsearch-content -->
		<span class="morphsearch-close"></span>
	</div><!-- /morphsearch -->
	 
	<div class="ukumbitv-overlay"></div>
</section><!-- ukumbitvApp -->
	