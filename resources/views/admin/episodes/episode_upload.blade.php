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

              <fieldset class="blk col-md-12 mb35">
                  <legend>Season</legend>

                  <div class="form-group">
                      <label for="movie">Select movie</label>
                      <select required id="movie" name="movie_id" class="form-control">
                          <option>Select movie</option>
                          @foreach($videos as $video)
                              <option value="{{$video->id}}">{{$video->title}}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="season" class="">Select season</label>
                      <select required id="season" name="season" class="form-control">

                      </select>
                  </div>

                  <div class="form-group">
                      <label for="vimeoid" class="">Vimeo video ID ex: 227573689  </label>
                      <input type="text" class="form-control" id="vimeoid" name="vimeoid" placeholder="Vimeo video ID">
                  </div>
              </fieldset><!-- fieldset -->


          </div><!-- row -->
        </form><!-- form -->
      </div><!-- tab-content -->
    </div><!-- col-lg-12 -->
			

		<div class="col-md-4 col-md-offset-8 form-group">
	    <button class="btn btn-submit btn-block" id="finishBtn" onclick="createEpisode()">Save</button>
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

    {{--<script src="{{asset('packages/dropzone/dropzone.js')}}"></script>--}}
    {{--<script src="{{asset('packages/dropzone/dropzone-config.js')}}"></script>--}}

    <script src="https://malsup.github.com/jquery.form.js"></script>


    <script type="text/javascript">

        $('#movie').on('change', function(){
            console.log(this.value);

            $( '.overlay' ).css( 'display', 'block' );

            $.ajax({
                type: 'GET',
                url: 'create-movie',
                contentType: false,
                processData: false,
                data: '',
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    console.log(rep);
                    $( '.overlay' ).css( 'display', 'none' );
                    //alert('Movie successful created!');
                },
                error: function (data) {
                    $( '.overlay' ).css( 'display', 'none' );
                    swal("Hmmm...", "Something went wrong, try later", "error");
                    //alert('error '+data);
                }
            });

        });


        function createMovie() {

            var fd = new FormData;


            fd.append('_token', $('#csrf-token').val());
            fd.append('title', $('#title').val());


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


        function previewUploadedPhoto(controlID, previewID, imgType) {
            var imgWidth;
            var imgHeight;
            var imgSize = '';
            switch (imgType) {
                case 'billboard':
                    imgWidth = 650;
                    imgHeight = 510;
                    imgSize = '650x510';
                    break;
                case 'small1':
                    imgWidth = 450;
                    imgHeight = 450;
                    imgSize = '450x450';
                    break;
                case 'small2':
                    imgWidth = 1600;
                    imgHeight = 510;
                    imgSize = '1600x510';
                    break;
                case 'small3':
                    imgWidth = 1100;
                    imgHeight = 510;
                    imgSize = '1100x510';
                    break;
                case 'preview':
                    imgWidth = 800;
                    imgHeight = 510;
                    imgSize = '800x510';
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


