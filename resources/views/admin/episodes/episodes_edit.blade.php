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
                            <legend>Season for {{$video->title}}</legend>


                            <div class="form-group">
                                <label for="season" class="">Select season</label>
                                <select required id="season" name="season" class="form-control">
                                    @for($i=1; $i<30; $i++)
                                        <option value="{{$i}}" @if($selectedSeason == $i) selected @endif>Season {{$i}}</option>
                                    @endfor
                                </select>
                            </div>

                            @if(count($seasons) > 0)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{tr('id')}}</th>
                                        <th>Video title</th>
                                        <th>{{tr('action')}}</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($seasons as $i => $season)

                                        <tr id="row{{$season->id}}">
                                            <td>{{$i+1}}</td>
                                            <td>{{$season->title}}</td>
                                            <td>
                                                <a href="" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit record"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <button class="btn btn-danger" onclick="return confirmDelete({{$season->id}});" data-toggle="tooltip" data-placement="top" title="Delete record"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3 class="no-result">{{tr('no_video_found')}}</h3>
                            @endif




                        </fieldset><!-- fieldset -->


                    </div><!-- row -->


            </div><!-- tab-content -->
        </div><!-- col-lg-12 -->





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

        $('#season').on('change', function(){
            console.log(this.value);

            window.location = "/admin/edit-seasons/{{$video->id}}/"+this.value;


        });

        function confirmDelete(id) {

            if (confirm("Remove video?")) {
                window.location = "/admin/delete-seasons/"+id;
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


