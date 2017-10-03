@extends('layouts.admin')

@section('title', 'Edit movie')

@section('content-header', tr('add_video'))

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('packages/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

@endsection


@section('content')

  <div class="row">
    <div class="col-lg-12"> 
      <div class="box tab-content tab-content-movie-edit"> 
        <form id="video-upload" method="POST" enctype="multipart/form-data" role="form" action="{{route('admin.save.movie')}}"> 
          <div class="row"> 
            <input type="hidden" value="1" name="ajax_key">
						
						<!-- select video type -->
						<div class="col-md-12 mb35">
							<fieldset class="blk col-md-12"> 
								<legend>Video Type</legend>
		            <ul class="list-inline" style="padding:0;">
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-type" id="video-type-movie" value="movies" @if($video->video_type == 'webseries') disabled @endif @if($video->video_type == 'movies') checked @endif>
		            			Movie
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-type" id="video-type-tvshow" value="tvshows" @if($video->video_type == 'webseries') disabled @endif @if($video->video_type == 'tvshows') checked @endif>
		            			TvShow
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-type" id="video-type-webserie" value="webseries" @if($video->video_type == 'webseries') checked @endif>
		            			Web Serie
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-type" id="video-type-documentary" value="documentaries" @if($video->video_type == 'webseries') disabled @endif @if($video->video_type == 'documentaries') checked @endif>
		            			Documentary
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-type" id="video-type-anime" value="animations" @if($video->video_type == 'webseries') disabled @endif @if($video->video_type == 'animations') checked @endif>
		            			Anime Movie
		            		</label>
		            	</li>
		            </ul><!-- col-md-12 --> 
							</fieldset> 
						</div>


						
						<!-- select video length -->
						<div class="col-md-12 mb35">
							<fieldset class="blk col-md-12"> 
								<legend>Video Length</legend>
		            <ul class="list-inline" style="padding:0;">
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-length" id="video-length-1" value="full" @if($video->length == 'full') checked @endif>
		            			Full
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-length" id="video-length-2" value="medium" @if($video->length == 'medium') checked @endif>
		            			Medium
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-length" id="video-length-3" value="short" @if($video->length == 'short') checked @endif>
		            			Short
		            		</label>
		            	</li> 
		            </ul><!-- col-md-12 --> 
							</fieldset> 
						</div>


 
            <!-- Left column -->
          	<div class="col-md-6">
          		<fieldset class="blk col-md-12 mb35">
								<legend>Video Common Information</legend>
          			
	              <div class="form-group">
	                <label for="title" class="">{{tr('title')}} * </label>
	                <input type="text" required class="form-control" id="title" name="title" placeholder="{{tr('title')}}" value="{{$video->title}}">
	              </div>

	              <div class="form-group">
	                <label>{{tr('duration')}} * : </label><small> Note: Format must be HH:MM:SS</small>

	                <div class="input-group">
	                    <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                    </div>
	                    <input @if($video->video_type == 'webseries') disabled @endif required type="text" name="duration" class="form-control" data-inputmask="'alias': 'hh:mm:ss'" data-mask id="duration" value="{{$video->duration}}">
	                </div>
	              </div>

	              <div class="form-group">
	                <label for="description" class="">{{tr('description')}} * </label>
	                <textarea  style="overflow:auto;resize:none" class="form-control" required rows="4" cols="50" id="description" name="description">{{$video->description}}</textarea>
	              </div>
          		</fieldset><!-- fieldset -->


          		<fieldset class="blk col-md-12 mb35">
								<legend>Complementary Info 1</legend>

	              <div id="year_id" class="form-group"> 
	                <label for="year" class="">Select year *</label>  
                  <select required id="year" name="year_id" class="form-control">
                      @for ($i = 2017; $i > 1900; $i--)
                          <option value="{{$i}}" @if($video->year == $i) selected @endif>{{$i}}</option>
                      @endfor
                  </select>
	            	</div>
	 
	              <div id="lang_id" class="form-group"> 
	                <label for="lang" class="">Select language *</label>
                  <select required id="lang" name="lang_id" class="form-control">
                      @foreach($langs as $lang)
                          <option value="{{$lang->id}}" @if($video->lang_id == $lang->id) selected @endif>{{$lang->title}}</option>
                      @endforeach
                  </select>
	              </div>

	              <div class="form-group">
	                <label for="video-country" class="">Select Country *</label>
	                <!-- integrate to dabatase -->
	                <!-- integrate to dabatase -->
	                <select name="video-country" id="video-country" class="form-control">
                        @foreach(trans('countries.countries') as $tran))
                        <option @if($video->country == $tran) selected @endif value="{{$tran}}">{{$tran}}</option>
                        @endforeach
	                </select> 
	                <!-- integrate to dabatase -->
	                <!-- integrate to dabatase -->
	              </div>
          		</fieldset><!-- fieldset --> 


          		<fieldset class="blk col-md-12 mb35">
								<legend>Taxonomy</legend>

	              <div id="category" class="form-group"> 
	                <label for="category_id" class="">Select category</label>
                  <select required id="category_id" name="category_id" class="form-control">
                      @foreach($categories as $category)
                          <option value="{{$category->id}}" @if($video->category_id == $category->id) selected @endif>{{$category->name}}</option>
                      @endforeach
                  </select>
	              </div>

                <div id="tags" class="form-group category-container">
                    <label for="tags_id" class="">Add tags</label>
                    <!-- add tagging system here -->
                    <!-- add tagging system here -->
                    {{--<div style="min-height:100px; background-color: #E8F0FA;">--}}
                    <input type="text" value="{{$movieTags}}" data-role="tagsinput" id="tags_id" class="form-control">
                {{--</div>--}}
                <!-- add tagging system here -->
                    <!-- add tagging system here -->
                </div> 
          		</fieldset><!-- fieldset --> 


							<!-- needs to be wired -->
							<!-- needs to be wired -->
							<!-- needs to be wired -->
          		<fieldset class="blk col-md-12">
								<legend>Poster grand display</legend>
								<p>By checking "Grand Display", this movie will be showcased as a big poster on major sections of the site.</p>
 
		            <ul class="list-inline" style="padding:0;">
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="grand-display" id="grand-display-1" value="1" @if($video->is_banner == 1) checked @endif>
		            			Grand Display
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="grand-display" id="grand-display-2" value="0" @if($video->is_banner == 0) checked @endif>
		            			Normal Display
		            		</label>
		            	</li> 
		            </ul><!-- col-md-12 -->  
          		</fieldset><!-- fieldset --> 
							<!-- needs to be wired -->
							<!-- needs to be wired -->
							<!-- needs to be wired -->
            </div><!-- col-md-6 -->


 
            <!-- Right column -->
            <div class="col-md-6"> 
          		<fieldset class="blk col-md-12 mb35">
								<legend>Complementary Info 2</legend>

	              <div class="form-group"> 
	                <label for="producer" class="">Select movie producer *</label>

	                <select required id="producer" name="producer_id" class="form-control">
	                    @foreach($producers as $producer)
	                        <option value="{{$producer->id}}" @if($video->movie_producer_id == $producer->id) selected @endif>{{$producer->name}}</option>
	                    @endforeach
	                </select>
	              </div>

	              <div class="form-group"> 
	                <label for="director" class="">Select The Director *</label> 
                  <select multiple required id="director" name="director_id" class="form-control" style="height:140px;">
                      @foreach($directors as $director)
                          <option value="{{$director->id}}" @foreach($video->videoDirectors as $dir) @if($dir->id == $director->id) selected @endif @endforeach>{{$director->name}}</option>
                      @endforeach
                  </select>
	              </div>

	              <div class="form-group"> 
	                <label for="actor" class="">Select actors *</label>
                  <select multiple required id="actor" name="actor_id" class="form-control" style="height:240px;">
                      @foreach($actors as $actor)
                          <option value="{{$actor->id}}" @foreach($video->videoActors as $act) @if($act->id == $actor->id) selected @endif @endforeach>{{$actor->name}}</option>
                      @endforeach
                  </select>
	              </div> 
          		</fieldset><!-- fieldset -->  
  
							<!-- IMAGES -->
              <fieldset class="blk col-md-12 mb35"> 
								<legend>Video Posters</legend> 
              	{{--Images--}}
              	<div class="form-group">
                  <label for="billboard_image" class="">Billboard  image</label>
                  <input required type="file" id="billboard_image" name="billboard_image" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('billboard_image', 'previewArea1', 'billboard');">
                  <img class="thumb img-responsive" src="{{$images->imgBillboard}}" style="max-width:200px" />
                  <div id="previewArea1"></div>
                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 1600x510)</p>
              	</div>

              	<div class="form-group">
                  <label for="small_image1" class="">Hero image</label>
                  <input required type="file" id="small_image1" name="small_image1" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('small_image1', 'previewArea2', 'small1');">
                  <img class="thumb img-responsive" src="{{$images->imgHero}}" style="max-width:200px" />
                  <div id="previewArea2"></div>
                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 1100x510)</p>
              	</div>

              	<div class="form-group">
                  <label for="small_image2" class="">Preview image 1 *</label>
                  <input type="file" id="small_image2" name="small_image2" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('small_image2', 'previewArea3', 'small2');">
                  <img class="thumb img-responsive" src="{{$images->imgPreview1}}" style="max-width:200px" />
                  <div id="previewArea3"></div>
                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 350x500)</p>
              	</div>

              	<div class="form-group">
                  <label for="small_image3" class="">Preview image 2</label>
                  <input type="file" id="small_image3" name="small_image3" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('small_image3', 'previewArea4', 'small3');">
                  <img class="thumb img-responsive" src="{{$images->imgPreview2}}" style="max-width:200px" />
                  <div id="previewArea4"></div>
                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 510x650)</p>
              	</div>

              	<div class="form-group">
                  <label for="preview_image" class="">Preview image 3</label>
                  <input required type="file" id="preview_image" name="preview_image" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('preview_image', 'previewArea5', 'preview');">
                  <img class="thumb img-responsive" src="{{$images->imgPreview3}}" style="max-width:200px" />
                  <div id="previewArea5"></div>
                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 450x450)</p>
              	</div>


              	{{--images end--}}
              </fieldset>
							<!-- IMAGES -->  

          		<fieldset class="blk col-md-12 mb35">
								<legend>Video file</legend>
								
	              <div class="form-group">
	                  <label for="video-file" class="">{{tr('video')}}</label>
	                  <input required type="file" id="video-file" accept="video/mp4" name="video-file" @if($video->video_type == 'webseries') disabled @endif>
	                  <p class="help-block">{{tr('video_validate')}}</p>
	              </div>

                    <div class="form-group">
                        <label for="vimeoid" class="">Vimeo video ID ex: 227573689  </label>
                        <input type="text" class="form-control" id="vimeoid" name="vimeoid" value="{{substr($video->video, 8)}}" placeholder="Vimeo video ID" @if($video->video_type == 'webseries') disabled @endif>
                    </div>
          		</fieldset><!-- fieldset -->
            </div><!-- col-md-6 -->


						<div class="col-md-12">
	            <fieldset class="blk col-md-12 mb35">
								<legend>Video Preview</legend>
	              <iframe src="https://player.vimeo.com/video/{{$videoId}}" width="100%" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	            </fieldset><!-- col-md-12 -->  
						</div><!-- col-md-12 -->


 
          	<input type="hidden" id="video_id" value="{{$video->id}}">
          </div><!-- row --> 
	           
        </form><!-- form -->
      </div>
      </div><!-- tab-content -->
    </div><!-- col-lg-12 -->
			

		<div class="col-md-4 col-md-offset-8 form-group">
	    <button class="btn btn-submit btn-block" id="finishBtn" onclick="editMovie()">Save</button>
		</div>
		

		<div class="col-md-12 form-group">
	    <progress id="progressbar" style="width:100%" value="0" max="100"></progress>
		</div> 
  </div><!-- row -->








     <div class="overlay">
        <div id="loading-img"></div>
    </div>

@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/moment.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>

    <script src="{{asset('admin-css/plugins/iCheck/icheck.min.js')}}"></script>

    <script src="{{asset('packages/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('packages/bootstrap-tagsinput/typeahead.bundle.js')}}"></script>






    <script type="text/javascript">

        var string = '{{$tags}}';
        var data = string.split(',');
        console.log(data);
        var citynames = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: $.map(data, function (city) {
                return {
                    name: city
                };
            })
        });
        citynames.initialize();

        $('#tags_id').tagsinput({
            typeaheadjs: [{
                minLength: 1,
                highlight: true,
            },{
                minlength: 1,
                name: 'citynames',
                displayKey: 'name',
                valueKey: 'name',
                source: citynames.ttAdapter()
            }],
            freeInput: true
        });

        function editMovie() {

            var tagsArr = $('.alltags').map(function(){
                return $.trim($(this).text());
            }).get();

            var tags = tagsArr.join();

            $( '.overlay' ).css( 'display', 'block' );
            var video = $('#video-file').prop('files')[0];
            var bill = $('#billboard_image').prop('files')[0];
            var small1 = $('#small_image1').prop('files')[0];
            var small2 = $('#small_image2').prop('files')[0];
            var small3 = $('#small_image3').prop('files')[0];
            var preview = $('#preview_image').prop('files')[0];

            //alert(video);
            var fd = new FormData;

            if(bill !== undefined){
                fd.append('billboard_image', bill);
            }
            if(small1 !== undefined) {
                fd.append('small_image1', small1);
            }
            if(small2 !== undefined) {
                fd.append('small_image2', small2);
            }
            if(small3 !== undefined) {
                fd.append('small_image3', small3);
            }
            if(preview !== undefined) {
                fd.append('preview_image', preview);
            }
            if(video !== undefined) {
                fd.append('video', video);
            }
            fd.append('_token', $('#csrf-token').val());
            fd.append('title', $('#title').val());
            fd.append('duration', $('#duration').val());
            fd.append('description', $('#description').val());
            fd.append('category', $('#category_id').val());
            fd.append('year', $('#year').val());
            fd.append('director', $('#director').val());
            fd.append('actor', $('#actor').val());
            fd.append('lang', $('#lang').val());
            fd.append('id', $('#video_id').val());
            fd.append('video_country', $('#video-country').val());
            fd.append('video_type', $("input[name=video-type]:checked").val());
            fd.append('video_length', $("input[name=video-length]:checked").val());
            fd.append('tags', tags);
            fd.append('vimeoid', $('#vimeoid').val());
            fd.append('producer', $('#producer').val());
            fd.append('grand_display', $("input[name=grand-display]:checked").val());

            //fd.append('images', dropImages.join(';'));
            var progressBar = $('#progressbar');

            $.ajax({
                type: 'POST',
                url: 'update-movie',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                xhr: function(){
                    var xhr = $.ajaxSettings.xhr(); // получаем объект XMLHttpRequest
                    xhr.upload.addEventListener('progress', function(evt){ // добавляем обработчик события progress (onprogress)
                        if(evt.lengthComputable) { // если известно количество байт
                            // высчитываем процент загруженного
                            var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
                            // устанавливаем значение в атрибут value тега <progress>
                            // и это же значение альтернативным текстом для браузеров, не поддерживающих <progress>
                            progressBar.val(percentComplete).text('Uploaded ' + percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function(data){
                    //var rep = JSON.parse(data);
                    //console.log(rep);
                    $( '.overlay' ).css( 'display', 'none' );
                    swal("Great!", "Movie successful updated!", "success");
                    //alert('Movie successful edited!');
                },
                error: function (data) {
                    $( '.overlay' ).css( 'display', 'none' );
                    swal("Hmmm...", "Something went wrong, try later", "error");
                    //alert('error '+data);
                }
            });
        }

        function previewUploadedPhoto(controlID, previewID, imgType) {
            var imgWidth;
            var imgHeight;
            var imgSize = '';
            switch (imgType) {
                case 'billboard':
                    imgWidth = 1600;
                    imgHeight = 510;
                    imgSize = '1600x510';
                    break;
                case 'small1':
                    imgWidth = 1100;
                    imgHeight = 510;
                    imgSize = '1100x510';
                    break;
                case 'small2':
                    imgWidth = 350;
                    imgHeight = 500;
                    imgSize = '350x500';
                    break;
                case 'small3':
                    imgWidth = 510;
                    imgHeight = 650;
                    imgSize = '510x650';
                    break;
                case 'preview':
                    imgWidth = 450;
                    imgHeight = 450;
                    imgSize = '450x450';
                    break;
                default:
                    imgWidth = 100;
                    imgHeight = 100;
            }
            if (document.getElementById(controlID).files) {
                var file = document.getElementById(controlID).files[0];
                if (file.type.match("image.*")) {
                    if (parseInt(file.size) <= 4 * 1024 * 1024) {
                        var reader = new FileReader();
                        reader.onload = (function (theFile) {
                            return function (e) {
                                var img = new Image();
                                img.src = e.target.result;

                                img.onload = function () {
                                    if (img.width !== imgWidth || img.height !== imgHeight) {
                                        $("#" + previewID).html("<b class='alert-danger'>The image size should be "+imgSize+"</b>");
                                        file.value = null;
                                    }
                                    else {
                                        $("#" + previewID).html('<img class="thumb img-responsive" src="' + e.target.result + '" title="' + theFile.name + '" style="max-width:200px" />');
                                    }
                                };
                            };
                        })(file);
                        reader.readAsDataURL(file);
                    }
                    else {
                        $("#" + previewID).html("<b class='alert-danger'>The maximum image size is 4 MB</b>");
                        file.value = null;
                    }
                }
                else {
                    $("#" + previewID).html("<b class='alert-danger'>This file is not an image. please choose the image</b>");
                    file.value = null;
                }
            }
        }






        $('#datepicker').datetimepicker({
            minTime: "00:00:00",
            minDate: moment(),
            autoclose:true,
        });

    </script>






@endsection


