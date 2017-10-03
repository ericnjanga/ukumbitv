<section ng-app="ukumbitvApp">
	<div id="morphsearch" class="morphsearch" ng-controller="InstantSearchController">
		<form class="morphsearch-form">
			<i class="fa fa-search btn-fake-search" aria-hidden="true"></i>
			<input class="morphsearch-input" type="search" ng-model="searchString" placeholder="{{trans('messages.Search_placeholder')}}"/>
			<button class="morphsearch-submit" type="submit">Search</button>
		</form>
		<div class="morphsearch-content">
			<div class="dummy-column"> 
				<figure class="video-item morphsearch-item" ng-repeat="movie in filteredMovies = (movies | searchForMovies:searchString)"> 
					<a ng-href="<% url_origin %><% movie.watchid %>" class="video-item__frame"  angular-lazy-load threshold="100"> 
						<span class="video-item__resume"><% getExcerpt(movie.description,235) %></span> 
						<img data-src="<% movie.videoimage.imgPreview1 %>" class="video-item__img" alt="<% movie.title %>"> 
					</a> 
					<figcaption class="video-item__title ellipsis-gradient">
						<% movie.title %>
					</figcaption> 
					<!-- these elements needs extra customization on the backend -->
					<!-- <div class="video-item__info"> 
						<div class="video-genre">Comedy</div> 
						<div class="butn-like">
							<span class="icon icon-thumbs-up"></span>
							<span class="likes-count">0</span>
						</div> 
					</div>  -->
				</figure> 


		    <div class="animate-repeat" ng-if="filteredMovies.length === 0" style="font-size: 3em; line-height:1em;">
		      <strong>{{trans('messages.no_results')}}</strong>
		    </div>  
			</div> 
		</div><!-- /morphsearch-content -->
		<span class="morphsearch-close"></span>
	</div><!-- /morphsearch -->
	 
	<div class="ukumbitv-overlay"></div>
</section><!-- ukumbitvApp -->
	