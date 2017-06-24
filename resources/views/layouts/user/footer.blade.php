<footer class="main-footer">
<!--   <div class="row">  
    <div class="col-sm-2 foot-div">
        <div class="tube-image">
            @if(Setting::get('site_logo'))
                <img src="{{Setting::get('site_logo')}}">
            @else
                <img src="{{asset('logo.png')}}">
            @endif
        </div>                                 
    </div> 

    <div class="col-sm-10 foot-content">
        
        <ul class="term">
            <li><a href="{{route('user.about')}}">About Us</a></li>
            <li><a href="{{route('user.terms-condition')}}">Terms &amp; Conditions</a></li>
            <li><a href="{{route('user.privacy_policy')}}">Privacy &amp; Policy</a></li>
            <li><a href="http://streamhash.com/" target="_blank">&#169; 2017 {{Setting::get('site_name' , 'StreamHash')}}</a></li>
        </ul>
    </div>   
  </div> --> 
  <div class="row">
  	<div class="col-md-12 text-center">
  		<ul class="list-inline">
  			<li>
  				<a href="#">Terms of use</a>
  			</li>
  			<li>
  				<a href="#">Privacy Statement</a>
  			</li>
  			<li>
  				Questions? Contact us: <a href="mailto:info@ukumbitv.com">info@ukumbitv.com</a>
  			</li>
  		</ul>
  	</div>

  	<div class="col-md-12 text-center">
  		<div>Copyright 2017, Toronto, Canada</div>
			<div><a href="https://www.ukumbitv.com">ukumbitv</a></div>
  	</div>
  	 
  </div> 
</footer>