@extends('layouts.admin')

@section('title', tr('add_video'))

@section('content-header', tr('add_video'))

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('packages/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

@endsection

@section('breadcrumb')
  <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
  <li><a href="{{route('admin.videos')}}"><i class="fa fa-video-camera"></i>{{tr('videos')}}</a></li>
  <li class="active"><i class="fa fa-video-camera"></i> {{tr('add_video')}}</li>
@endsection

@section('content')

  @include('notification.notify')

  <div class="row">
    <div class="col-lg-12"> 
      <div class="box tab-content tab-content-movie-add"> 
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
		            			<input type="radio" name="video-type" id="video-type-movie" value="movie" checked> 
		            			Movie
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-type" id="video-type-tvshow" value="tvshow"> 
		            			TvShow
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-type" id="video-type-webserie" value="webserie"> 
		            			Web Serie
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-type" id="video-type-documentary" value="documentary"> 
		            			Documentary
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-type" id="video-type-anime" value="anime"> 
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
		            			<input type="radio" name="video-length" id="video-length-1" value="full" checked> 
		            			Full
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-length" id="video-length-2" value="medium"> 
		            			Medium
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="video-length" id="video-length-3" value="short"> 
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
	                <input type="text" required class="form-control" id="title" name="title" placeholder="{{tr('title')}}">
	              </div>

	              <div class="form-group">
	                <label>{{tr('duration')}} * : </label><small> Note: Format must be HH:MM:SS</small>

	                <div class="input-group">
	                    <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                    </div>
	                    <input required type="text" name="duration" class="form-control" data-inputmask="'alias': 'hh:mm:ss'" data-mask id="duration">
	                </div>
	              </div>

	              <div class="form-group">
	                <label for="description" class="">{{tr('description')}} * </label>
	                <textarea  style="overflow:auto;resize:none" class="form-control" required rows="4" cols="50" id="description" name="description"></textarea>
	              </div>
          		</fieldset><!-- fieldset -->


          		<fieldset class="blk col-md-12 mb35">
								<legend>Complementary Info 1</legend>

	              <div id="year_id" class="form-group"> 
	                <label for="year" class="">Select year *</label> 
	                <select required id="year" name="year_id" class="form-control">
	                    @for ($i = 2017; $i > 1900; $i--)
	                        <option value="{{$i}}">{{$i}}</option>
	                    @endfor
	                </select>
	            	</div>
	 
	              <div id="lang_id" class="form-group"> 
	                <label for="lang" class="">Select language *</label>

	                <select required id="lang" name="lang_id" class="form-control">
	                    @foreach($langs as $lang)
	                        <option value="{{$lang->id}}">{{$lang->title}}</option>
	                    @endforeach
	                </select>
	              </div>

	              <div class="form-group">
	                <label for="video-country" class="">Select Country *</label>
	                <!-- integrate to dabatase -->
	                <!-- integrate to dabatase -->
	                <select name="video-country" id="video-country" class="form-control">
						@foreach(trans('countries.countries') as $tran))
	                					<option value="{{$tran}}">{{$tran}}</option>
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
	                    <option value="{{$category->id}}">{{$category->name}}</option>
	                    @endforeach
	                </select>
	              </div>

	              <div id="tags" class="form-group category-container">
	                <label for="tags_id" class="">Add tags</label>
	                <!-- add tagging system here -->
	                <!-- add tagging system here -->
	                {{--<div style="min-height:100px; background-color: #E8F0FA;">--}}
                        <input type="text" data-role="tagsinput" id="tags_id" class="form-control">
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
		            			<input type="radio" name="grand-display" id="grand-display-1" value="1">
		            			Grand Display
		            		</label>
		            	</li>
		            	<li class="mr20">
		            		<label class="radio-inline">
		            			<input type="radio" name="grand-display" id="grand-display-2" value="0" checked>
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
	                        <option value="{{$producer->id}}">{{$producer->name}}</option>
	                    @endforeach
	                </select>
	              </div>

	              <div class="form-group"> 
	                <label for="director" class="">Select The Director *</label>

	                <select multiple required id="director" name="director_id" class="form-control" style="height:140px;">
	                    @foreach($directors as $director)
	                        <option value="{{$director->id}}">{{$director->name}}</option>
	                    @endforeach
	                </select>
	              </div>

	              <div class="form-group"> 
	                <label for="actor" class="">Select actors *</label>

	                <select multiple required id="actor" name="actor_id" class="form-control" style="height:240px;">
	                    @foreach($actors as $actor)
	                        <option value="{{$actor->id}}">{{$actor->name}}</option>
	                    @endforeach
	                </select>
	              </div> 
          		</fieldset><!-- fieldset -->  
  
							{{--Images--}}
              <fieldset class="blk col-md-12 mb35"> 
								<legend>Video Posters</legend>
	              <div class="form-group">
	                  <label for="billboard_image" class="">Billboard  image</label>
	                  <input required type="file" id="billboard_image" name="billboard_image" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('billboard_image', 'previewArea1', 'billboard');">
	                  <div id="previewArea1"></div>
	                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 1600x510)</p>
	              </div>
	             
	              <div class="form-group">
	                  <label for="small_image1" class="">Hero image</label>
	                  <input required type="file" id="small_image1" name="small_image1" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('small_image1', 'previewArea2', 'small1');">
	                  <div id="previewArea2"></div>
	                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 1100x510)</p>
	              </div>
	          
	              <div class="form-group">
	                  <label for="small_image2" class="">Preview image 1</label>
	                  <input type="file" id="small_image2" name="small_image2" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('small_image2', 'previewArea3', 'small2');">
	                  <div id="previewArea3"></div>
	                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 510x800)</p>
	              </div>
	           
	              <div class="form-group">
	                  <label for="small_image3" class="">Preview image 2 *</label>
	                  <input type="file" id="small_image3" name="small_image3" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('small_image3', 'previewArea4', 'small3');">
	                  <div id="previewArea4"></div>
	                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 510x650)</p>
	              </div>
	           
	              <div class="form-group">
	                  <label for="preview_image" class="">Preview image 3 *</label>
	                  <input required type="file" id="preview_image" name="preview_image" accept="image/jpeg,image/png" onchange="previewUploadedPhoto('preview_image', 'previewArea5', 'preview');">
	                  <div id="previewArea5"></div>
	                  <p class="help-block">Please enter .png .jpeg .jpg images only. (size: 450x450)</p>
	              </div>
              </fieldset>
							{{--images end--}} 
  
          		<fieldset class="blk col-md-12 mb35">
								<legend>Video file</legend>
								
	              <div class="form-group">
	                  <label for="video" class="">{{tr('video')}}</label>
	                  <input required type="file" id="video" accept="video/mp4" name="video">
	                  <p class="help-block">{{tr('video_validate')}}</p>
	              </div>

                    <div class="form-group">
                        <label for="vimeoid" class="">Vimeo video ID ex: 227573689  </label>
                        <input type="text" class="form-control" id="vimeoid" name="vimeoid" placeholder="Vimeo video ID">
                    </div>
          		</fieldset><!-- fieldset -->  
            </div><!-- col-md-6 --> 
          </div><!-- row --> 
        </form><!-- form -->
      </div><!-- tab-content -->
    </div><!-- col-lg-12 -->
			

		<div class="col-md-4 col-md-offset-8 form-group">
	    <button class="btn btn-submit btn-block" id="finishBtn" onclick="createMovie()">Save</button>
		</div>
		

		<div class="col-md-12 form-group">
	    <progress id="progressbar" style="width:100%" value="0" max="100"></progress>
		</div> 
  </div><!-- row -->
 








  {{--<div class="row">--}}
      {{--<div class="col-md-offset-1 col-md-10">--}}
          {{--<div class="jumbotron how-to-create" >--}}

              {{--<h3>Images <span id="photoCounter"></span></h3>--}}
              {{--<br />--}}


              {{--<form action="{{route('movie-upload-images')}}" class="dropzone" id="real-dropzone">--}}
              {{--<div class="dz-message">--}}

              {{--</div>--}}

              {{--<div class="fallback">--}}
                  {{--<input name="file" type="file" multiple />--}}
              {{--</div>--}}

              {{--<div class="dropzone-previews" id="dropzonePreview"></div>--}}

              {{--<h4 style="text-align: center;color:#428bca;">Drop images in this area  <span class="glyphicon glyphicon-hand-down"></span></h4>--}}


              {{--</form>--}}
          {{--</div>--}}
          {{--<div class="jumbotron how-to-create">--}}
              {{--<ul>--}}
                  {{--<li>Images are uploaded as soon as you drop them</li>--}}
                  {{--<li>Maximum allowed size of image is 8MB</li>--}}
              {{--</ul>--}}

          {{--</div>--}}
      {{--</div>--}}
  {{--</div>--}}

  <!-- Dropzone Preview Template -->
  {{--<div id="preview-template" style="display: none;">--}}

      {{--<div class="dz-preview dz-file-preview">--}}
          {{--<div class="dz-image"><img data-dz-thumbnail=""></div>--}}

          {{--<div class="dz-details">--}}
              {{--<div class="dz-size"><span data-dz-size=""></span></div>--}}
              {{--<div class="dz-filename"><span data-dz-name=""></span></div>--}}
          {{--</div>--}}
          {{--<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>--}}
          {{--<div class="dz-error-message"><span data-dz-errormessage=""></span></div>--}}

          {{--<div class="dz-success-mark">--}}
              {{--<svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">--}}
                  {{--<!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->--}}
                  {{--<title>Check</title>--}}
                  {{--<desc>Created with Sketch.</desc>--}}
                  {{--<defs></defs>--}}
                  {{--<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">--}}
                      {{--<path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>--}}
                  {{--</g>--}}
              {{--</svg>--}}
          {{--</div>--}}

          {{--<div class="dz-error-mark">--}}
              {{--<svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">--}}
                  {{--<!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->--}}
                  {{--<title>error</title>--}}
                  {{--<desc>Created with Sketch.</desc>--}}
                  {{--<defs></defs>--}}
                  {{--<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">--}}
                      {{--<g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">--}}
                          {{--<path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>--}}
                      {{--</g>--}}
                  {{--</g>--}}
              {{--</svg>--}}
          {{--</div>--}}

      {{--</div>--}}
  {{--</div>--}}

  <!-- End Dropzone Preview Template -->


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

    {{--<script src="{{asset('packages/dropzone/dropzone.js')}}"></script>--}}
    {{--<script src="{{asset('packages/dropzone/dropzone-config.js')}}"></script>--}}

    <script src="https://malsup.github.com/jquery.form.js"></script>


    <script type="text/javascript">
        var string = '{{$tags}}';
        var data = string.split(',');
        //console.log(data);
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


        function createMovie() {
            if($('#small_image3').prop('files')[0] === undefined || $('#preview_image').prop('files')[0] === undefined) {
                swal("Hmmm...", "Preview 2 and Preview 3 images is required", "error");
            } else {

            var tagsArr = $('.alltags').map(function(){
                return $.trim($(this).text());
            }).get();

            var tags = tagsArr.join();


            $( '.overlay' ).css( 'display', 'block' );
            var video = $('#video');
            var fd = new FormData;


            fd.append('billboard_image', $('#billboard_image').prop('files')[0]);
            fd.append('small_image1', $('#small_image1').prop('files')[0]);
            fd.append('small_image2', $('#small_image2').prop('files')[0]);
            fd.append('small_image3', $('#small_image3').prop('files')[0]);
            fd.append('preview_image', $('#preview_image').prop('files')[0]);
            fd.append('video', video.prop('files')[0]);
            fd.append('_token', $('#csrf-token').val());
            fd.append('title', $('#title').val());
            fd.append('duration', $('#duration').val());
            fd.append('description', $('#description').val());
            fd.append('category', $('#category_id').val());
            fd.append('year', $('#year').val());
            fd.append('director', $('#director').val());
            fd.append('actor', $('#actor').val());
            fd.append('lang', $('#lang').val());
            fd.append('producer', $('#producer').val());
            fd.append('video_country', $('#video-country').val());
            fd.append('vimeoid', $('#vimeoid').val());
            fd.append('tags', tags);
            fd.append('video_type', $("input[name=video-type]:checked").val());
            fd.append('video_length', $("input[name=video-length]:checked").val());
            fd.append('grand_display', $("input[name=grand-display]:checked").val());

            //fd.append('images', dropImages.join(';'));
            var progressBar = $('#progressbar');

            $.ajax({
                type: 'POST',
                url: 'create-movie',
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
                    var rep = JSON.parse(data);
                    console.log(rep);
                    $( '.overlay' ).css( 'display', 'none' );
                    swal("Great!", "Movie successful created!", "success");
                    //alert('Movie successful created!');
                },
                error: function (data) {
                    $( '.overlay' ).css( 'display', 'none' );
                    swal("Hmmm...", "Something went wrong, try later", "error");
                    //alert('error '+data);
                }
            });
            }
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
                    imgWidth = 510;
                    imgHeight = 800;
                    imgSize = '510x800';
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




        var cat_url = "{{ url('select/sub_category')}}";
        var step3 = "{{REQUEST_STEP_3}}";
        var sub_cat_url = "{{ url('select/genre')}}";
        var final = "{{REQUEST_STEP_FINAL}}";

        $('#datepicker').datetimepicker({
            minTime: "00:00:00",
            minDate: moment(),
            autoclose:true,
        });
        $('#upload').show();
        $('#others').hide();
        $("#compress").show();
        $("#resolution").show();

        $("#video_upload").click(function(){
            $("#upload").show();
            $("#others").hide();
            $("#compress").show();
            $("#resolution").show();
        });

        $("#youtube").click(function(){
            $("#others").show();
            $("#upload").hide();
            $("#compress").hide();
            $("#resolution").hide();
        });

        $("#other_link").click(function(){
            $("#others").show();
            $("#upload").hide();
            $("#compress").hide();
            $("#resolution").hide();
        });

    </script>






@endsection


