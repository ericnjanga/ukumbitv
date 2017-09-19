<footer class="main-footer">
  <div class="footer-main">
   <div class="container">
    <nav class="row">
     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 offset-xl-1 footer-top-item">
      <h4></h4>
      <ul class="footer-list">
      	<li><a href="{{route("user.about")}}">{{trans('messages.about_us')}}</a></li>
       <!-- 
       <li><a href="{{route("user.jobs")}}">{{trans('messages.about_us)}}</a></li>
       <li><a href="{{route("user.contact")}}">{{trans('messages.contact_us)}}</a></li> --> 
       <li>{{trans('messages.jobs')}}</li>
        <li><a href="{{route("user.contact")}}">{{trans('messages.contact_us')}}</a></li>
      </ul>
     </div>
     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 footer-top-item">
      <h4>{{trans('messages.About_project')}}</h4>
      <ul class="footer-list">
       <!-- <li><a href="{{route("user.privacy_policy")}}">{{l("Privacy Policy")}}</a></li>
       <li><a href="{{route("user.terms-condition")}}">{{l("Terms of Use")}}</a></li>
       <li><a href="{{route("user.advertising")}}">{{l("Advertising")}}</a></li>
       <li><a href="{{route("user.help-center")}}">{{l("Help center")}}</a></li> -->
       <li>{{trans('messages.PP_title')}}</li>
       <li>{{trans('messages.tos_title')}}</li>
       <li>{{trans('messages.HC_title')}}</li>
      </ul>
     </div>
     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 footer-top-item">
      <h4>{{trans('messages.devices')}}</h4>
      <ul class="footer-list"> 
       <li>{{l("Android")}}</li>
       <li>{{l("Apple")}}</li>
       <li>{{l("TV")}}</li> 
       <li>{{l("PC")}}</li>
      </ul>
     </div>
     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 offset-xl-1 footer-top-item">
      <div class="last-block"> 
        <h4>{{trans('messages.social_medias')}}</h4>
        <ul class="social-list list-inline">
         <li><a href="https://www.facebook.com/ukumbitv/" target="_blank" class="icon icon-facebook"></a></li>
         <li><a href="https://twitter.com/ukumbi_tv" target="_blank" class="icon icon-twitter"></a></li>
         <li><a href="https://www.instagram.com/ukumbitv" target="_blank" class="icon icon-instagram"></a></li>
        </ul> 
       <div class="lang-block">
        <span>{{l('Language')}}:</span>
        <a href="{{url('setlocale/fr')}}" @if(App::isLocale('fr'))class="active"@endif>Fran&#xE7;ais</a>
        <a href="{{url('setlocale/en')}}" @if(App::isLocale('en'))class="active"@endif>English</a>
       </div>
      </div>
     </div>
    </nav>
   </div>
  </div> 
  <div class="copyright text-center">
   @<?php echo date("Y"); ?> Ukumbi TV
  </div>  
</footer> 