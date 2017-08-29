
<header class="main-header">
  <div class="container-fluid">
    <div class="row">
      <div class="frame-logo">
        <a href="/" class="logo-block">
            <img src="{{asset('r/img/logo.png')}}" alt="">
        </a>
      </div>
      <div id="frame-search" class="frame-search col-sm-6 col-md-6 col-lg-7 col-xl-6 search-block">
        <form action="{{route('search-all')}}" method="post">
          <!-- <div class="input-wrap search-wrap">
              <input type="search" name="key" id="search-input" class="search-input" placeholder="{{trans('messages.Search_placeholder')}}" autocomplete="false" onclick="getSearchData()">
              <div class="search-list-block">
                <ul class="search-list">
                </ul>
              </div>
              <button id="butn-search" type="submit" class="butn-search">
                  <span class="icon icon-magnifying-glass"></span>
              </button>
            </div> -->

          <div class="input-group">
			      <input type="text" id="search-input" class="form-control search-input typeahead" placeholder="{{trans('messages.Search_placeholder')}}" autocomplete="false">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">Go!</button>
			      </span>
			    </div><!-- /input-group -->
        </form> 
      </div>
      <div class="frame-useraccount col-sm-6 col-md-3 col-lg-3 col-xl-4">
        <!-- <a style="position:absolute;" href="{{route('user.reset-trial')}}">RESET TRIAL</a> -->
          @include('r.chunks._login_block')
      </div>
    </div>
  </div>
</header>
