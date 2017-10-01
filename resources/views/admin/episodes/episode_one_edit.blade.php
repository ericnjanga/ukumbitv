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

                <div class="row">

                    <fieldset class="blk col-md-12 mb35">
                        <legend>Episode edit</legend>


                        <div class="form-group">
                            <label for="season" class="">Select season</label>
                            <select required id="season" name="season" class="form-control">
                                @for($i=1; $i<30; $i++)
                                    <option value="{{$i}}" @if($episode->season_id == $i) selected @endif>Season {{$i}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title" class="">TITLE  </label>
                            <input type="text" class="form-control" id="title" value="{{$episode->title}}" name="title" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label for="vimeoid" class="">Vimeo video ID ex: 227573689  </label>
                            <input type="text" class="form-control" id="vimeoid" value="{{$episode->vimeo_id}}" name="vimeoid" placeholder="Vimeo video ID">
                        </div>


                    </fieldset><!-- fieldset -->


                </div><!-- row -->


            </div><!-- tab-content -->
        </div><!-- col-lg-12 -->


        <div class="col-md-4 col-md-offset-8 form-group">
            <button class="btn btn-submit btn-block" id="finishBtn" onclick="saveEpisode({{$episode->id}})">Save</button>
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


        function saveEpisode(id) {

            var fd = new FormData;
            fd.append('_token', $('#csrf-token').val());
            fd.append('season', $('#season').val());
            fd.append('vimeoid', $('#vimeoid').val());
            fd.append('title', $('#title').val());
            fd.append('id', id);


            $.ajax({
                type: 'POST',
                url: "{{route('admin.updateone.episode')}}",
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    console.log(rep);
                    $( '.overlay' ).css( 'display', 'none' );
                    swal("Great!", "Episode successfully updated", "success");
                },
                error: function (data) {
                    $( '.overlay' ).css( 'display', 'none' );
                    swal("Hmmm...", "Something went wrong, try later", "error");
                    //alert('error '+data);
                }
            });
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


