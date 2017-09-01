
    <div class="container-fluid">
        <div class="row">
            <div class="hero">
                @if($checkTrial)
            <iframe src="https://player.vimeo.com/video/{{$videoId}}?autoplay=1" autoplay="1" width="100%" height="700" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    @else
                <h1>SELECT PAYMENT PLAN PLS</h1>
                    @endif
            </div>
        </div>
    </div> 
