<nav id="GP-menu" class="GP-menu">
	<div class="show-entries-hover hidden">
		<span class="hover-arrow"></span>
	</div>
	<ul class="play-menu">
		<li id="movies">
			<a href="{{route('user.videotype', 'movies')}}">
				<i class="fa fa-film menu-entry-icon movies" aria-hidden="true"></i> 
				<span class="menu-entry-text">Movies</span>
			</a> 
		</li>
		<li id="animations">
			<a href="{{route('user.videotype', 'animations')}}">
				<i class="fa fa-star menu-entry-icon books" aria-hidden="true"></i> 
				<span class="menu-entry-text">Animations</span>
			</a> 
		</li>  
	</ul>
</nav>