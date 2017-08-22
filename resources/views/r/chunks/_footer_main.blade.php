<div class="footer-wrap">
 <footer>
  <div class="footer-top">
   <div class="container">
    <div class="row">
     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 offset-xl-1 footer-top-item">
      <div class="list-title">{{l("About us")}}</div>
      <ul class="footer-list">
       <li><a href="{{route("user.about")}}">{{l("About Us")}}</a></li>
       <li><a href="{{route("user.jobs")}}">{{l("Jobs")}}</a></li>
       <li><a href="{{route("user.contact")}}">{{l("Contact Us")}}</a></li>
      </ul>
     </div>
     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 footer-top-item">
      <div class="list-title">{{l("About The Project")}}</div>
      <ul class="footer-list">
       <li><a href="{{route("user.privacy_policy")}}">{{l("Privacy Policy")}}</a></li>
       <li><a href="{{route("user.terms-condition")}}">{{l("Terms of Use")}}</a></li>
       <li><a href="{{route("user.advertising")}}">{{l("Advertising")}}</a></li>
       <li><a href="{{route("user.help-center")}}">{{l("Help center")}}</a></li>
      </ul>
     </div>
     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 footer-top-item">
      <div class="list-title">{{l("Devices")}}</div>
      <ul class="footer-list">
       <li><a href="#">{{l("Mobile")}}</a></li>
       <li><a href="#">{{l("TV")}}</a></li>
       <li><a href="#">{{l("Media players")}}</a></li>
       <li><a href="#">{{l("PC")}}</a></li>
       <li><a href="#">{{l("Android")}}</a></li>
       <li><a href="#">{{l("Apple")}}</a></li>
      </ul>
     </div>
     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 offset-xl-1 footer-top-item">
      <div class="last-block">
       <div class="soc-block">
        <div class="list-title">{{l('Get Social')}}</div>
        <ul class="social-list">
         <li><a href="https://www.facebook.com/ukumbitv/" target="_blank" class="icon icon-facebook"></a></li>
         <li><a href="https://twitter.com/ukumbi_tv" target="_blank" class="icon icon-twitter"></a></li>
         <li><a href="https://www.instagram.com/ukumbitv" target="_blank" class="icon icon-instagram"></a></li>
        </ul>
       </div>
       <div class="lang-block">
        <span>{{l('Language')}}:</span>
        <a href="{{url('setlocale/fr')}}" @if(App::isLocale('fr'))class="active"@endif>{{l('French')}}</a>
        <a href="{{url('setlocale/en')}}" @if(App::isLocale('en'))class="active"@endif>{{l('English')}}</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="footer-bottom">
   <div class="container">
    <div class="row">
     <div class="col">
      <div class="footer-bottom-text">
       @2017 Ukumbi TV
      </div>
     </div>
    </div>
   </div>
  </div>
 </footer>
</div>