<div id="carousel-example-generic" class="carousel slide carousel-fade billboard" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    @foreach($videos_by_cat as $i => $video)
    <div class="item @if($i == 0) active @endif">
      <a href="{{url('/')}}/watch/{{$video->watchid}}">
    		<img src="{{$video->videoimage->imgBillboard}}" class="img-responsive">
    	</a>
      <!-- <div class="carousel-caption">
      	<h3>{{$video->title}}</h3>
        <p>{{$video->description}}</p>
      </div> -->
    </div>
    @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>