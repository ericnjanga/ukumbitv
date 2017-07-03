@extends('layouts.admin')

@section('title', 'Add director')

@section('content-header', 'Add director')

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">



@endsection

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li><a href="{{route('admin.directors')}}"><i class="fa fa-video-camera"></i>{{tr('directors')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i> {{tr('add_director')}}</li>
@endsection

@section('content')

    @include('notification.notify')


    <div class="row">
        <div class="col-lg-12">
            <section>
                <div class="wizard">


                    <form id="director-upload" method="POST" enctype="multipart/form-data" role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <!-- <h3>Video Details</h3> -->
                                <div style="margin-left: 15px"><small>Note : <span style="color:red">*</span> fields are mandatory. Please fill and click next.</small></div>
                                <hr>
                                <div class="">
                                    <input type="hidden" value="1" name="ajax_key">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title" class="">Name * </label>
                                            <input type="text" required class="form-control" id="title" name="title" placeholder="{{tr('title')}}">
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="description" class="">BIO * </label>
                                            <textarea  style="overflow:auto;resize:none" class="form-control" required rows="4" cols="50" id="description" name="description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </section>
        </div>
    </div>
    <button class="btn btn-primary btn-info-full" id="finishBtn" onclick="createDirector()">Finish</button>



    <div class="overlay">
        <div id="loading-img"></div>
    </div>

@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/moment.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>

    <script src="{{asset('admin-css/plugins/iCheck/icheck.min.js')}}"></script>



    <script src="http://malsup.github.com/jquery.form.js"></script>


    <script type="text/javascript">
        function createDirector() {

            var fd = new FormData;

            fd.append('_token', $('#csrf-token').val());
            fd.append('title', $('#title').val());
            fd.append('description', $('#description').val());



            $.ajax({
                type: 'POST',
                url: 'create-director',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    console.log(rep);
                    alert('Director successful created!');
                }
            });
        }







    </script>






@endsection


