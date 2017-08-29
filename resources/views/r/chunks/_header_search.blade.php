
<header class="main-header">
  <div class="container-fluid">
    <div class="row">
      <div class="frame-logo col-sm-4 col-md-3 col-lg-2 col-xl-2">
          <a href="/" class="logo-block">
              <img src="{{asset('r/img/logo.png')}}" alt="">
          </a>
      </div>
      <div class="frame-search col-sm-6 col-md-6 col-lg-7 col-xl-6 search-block">
        <form action="{{route('search-all')}}" method="post">
            <div class="input-wrap search-wrap">
                <input type="search" name="key" id="search-input" placeholder="{{trans('messages.Search_placeholder')}}" autocomplete="false" onclick="getSearchData()">
                <div class="search-list-block">
                  <ul class="search-list">
                  </ul>
                </div>
                <button id="butn-search" type="submit" class="butn-search">
                    <span class="icon icon-magnifying-glass"></span>
                </button>
            </div>
        </form> 
      </div>
      <div class="frame-useraccount col-sm-6 col-md-3 col-lg-3 col-xl-4">
        <!-- <a style="position:absolute;" href="{{route('user.reset-trial')}}">RESET TRIAL</a> -->
          @include('r.chunks._login_block')
      </div>
    </div>
  </div>
</header>
