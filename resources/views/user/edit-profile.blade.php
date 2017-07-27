
@extends('static.legal-master-page')


@section('content-title')
Update Profile
@endsection

@section('content')
	<style>
		h1 { 
    	margin-bottom: 0;
		}
		.p-acc hr { 
    	border-top: 1px solid #999;
    	margin-top: 30px;
    	margin-bottom: 30px;
		}
		.p-acc h2 {
			margin-top: 0;
			margin-bottom: 15px;
	    font-size: 18px;
	    text-transform: uppercase;
	    color: #999;
		}
		.p-acc .btn-cta {
			max-width: 200px;
    	padding: 10px;
		}

		.p-acc .btn-cta {
			background-color: #ec174f;
			color: #fff;
		}
		.p-acc .btn-cta:hover {
			opacity: 0.7;
		}
	</style>




<div class="p-acc row">   

 	<div class="col-sm-12">
 		<hr>
 	</div>


  <div class="col-sm-6 profile-view">
    <div class="edit-profile profile-view">
      <div class="edit-form"> 
        <!-- <h4 class="edit-head">{{tr('edit_profile')}}</h4> -->
        
        <div class="image-profile edit-image">
            @if(Auth::user()->picture)
            <img src="{{Auth::user()->picture}}" class="img-responsive">
            @else
              <img src="{{asset('placeholder.png')}}" class="img-responsive">
            @endif                               
        </div><!--end of image-profile-->        
      </div><!--end of edit-form-->                           
    </div><!--end of edit-profile-->
  </div><!--profile-view end--> 



  <div class="col-sm-6 editform-content"> 
      <form  action="{{ route('user.profile.save') }}" method="POST" enctype="multipart/form-data">

           <div class="form-group">
              <label for="exampleInputFile">{{tr('upload_image')}}</label>
              <input type="file" name="picture" class="form-control-file" accept="image/png, image/jpeg" id="exampleInputFile" aria-describedby="fileHelp">
              <p class="help-block">{{tr('image_validate')}} {{tr('image_square')}}</p>
          </div>

          <div class="form-group">
              <label for="username">{{tr('username')}}</label>
              <input required value="{{Auth::user()->name}}" name="name" type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
          </div>

          @if(Auth::user()->login_by == 'manual')

              <div class="form-group">
                  <label for="email">{{tr('email')}}</label>
                  <input type="email" value="{{Auth::user()->email}}" name="email" disabled class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              
              </div>

          @endif

          <div class="form-group">
              <label for="mobile">{{tr('mobile')}}</label>
              <input type="mobile" value="{{Auth::user()->mobile}}" name="mobile" class="form-control" id="mobile" aria-describedby="emailHelp" placeholder="Enter mobile">
          
          </div>
                
          <div class="form-group">
              <label for="about">{{tr('about')}}</label>
              <textarea name="description" class="form-control" id="about" rows="3">{{Auth::user()->description}}</textarea>
          </div>
                
          <div class="change-pwd save-pro-btn">
              <button type="submit" class="btn btn-default btn-block btn-cta">{{tr('submit')}}</button>
          </div>                                              

      </form>
  </div><!--end of editform-content-->  


	<!-- mylist -->
	<!-- mylist -->
  <?php $wishlist = wishlist(Auth::user()->id); ?>
  @if(count($wishlist)) 
    <div class="mylist-profile col-sm-5">
        <h4 class="mylist-head">{{tr('wishlist')}}</h4>

        <ul class="history-list profile-history">

            @foreach($wishlist as $i => $video)

                <li class="sub-list row no-margin">
                    <div class="main-history">
                        <div class="history-image">
                            <a href="{{route('user.single' , $video->admin_video_id)}}"><img src="{{$video->default_image}}"></a>                        
                        </div><!--history-image-->

                        <div class="history-title">
                            <div class="history-head row">
                                <div class="cross-title">
                                    <h5><a href="{{route('user.single' , $video->admin_video_id)}}">{{$video->title}}</a></h5>
                                    <p class="duration">{{tr('duration')}}: {{$video->duration}}</p>
                                </div> 
                                <div class="cross-mark">
                                    <a onclick="return confirm('Are you sure?');" href="{{route('user.delete.wishlist' , array('wishlist_id' => $video->wishlist_id))}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div><!--end of cross-mark-->                       
                            </div> <!--end of history-head--> 

                            <!-- <div class="description">
                                <p>{{$video->description}}</p>
                            </div> --><!--end of description--> 

                            <span class="stars">
                                <a href="#"><i @if($video->ratings > 1) style="color:gold" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                <a href="#"><i @if($video->ratings > 2) style="color:gold" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                <a href="#"><i @if($video->ratings > 3) style="color:gold" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                <a href="#"><i @if($video->ratings > 4) style="color:gold" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                <a href="#"><i @if($video->ratings > 5) style="color:gold" @endif class="fa fa-star" aria-hidden="true"></i></a>
                            </span>                                                       
                        </div><!--end of history-title--> 
                    </div><!--end of main-history-->
                </li>

            @endforeach


        </ul>                                   
    </div>
  @endif 
  <!-- mylist -->
  <!-- mylist -->
</div><!-- p-acc -->


@endsection