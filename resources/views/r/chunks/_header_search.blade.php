
<header class="main-header">
  <div class="container-fluid">
    <div class="row">
      <div class="frame-logo">
        <a href="/">
         	<img src="{{asset('r/img/logo.png')}}" alt="">
        </a>
      </div>
      <div id="frame-search" class="frame-search">
        <form action="{{route('search-all')}}" method="post">  
          <div class="input-group">
			      <input name="key" type="text" id="search-input" class="form-control search-input typeahead" placeholder="{{trans('messages.Search_placeholder')}}" autocomplete="false">
			      <span class="input-group-btn">
			        <button class="btn btn-search btn-default" type="submit">{{trans('messages.search')}}!</button>
			      </span>
			    </div><!-- /input-group -->
        </form> 
      </div>
      <div class="frame-useraccount">
        <!-- <a style="position:absolute;" href="{{route('user.reset-trial')}}">RESET TRIAL</a> -->
          @include('r.chunks._login_block')
      </div>
    </div>
  </div>
</header>
