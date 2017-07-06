@extends('layouts.admin')

@section('title', 'Add lang')

@section('content-header', 'Add lang')

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">



@endsection

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li><a href="{{route('admin.langs')}}"><i class="fa fa-video-camera"></i>{{tr('langs')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i> {{tr('add_video')}}</li>
@endsection

@section('content')

    @include('notification.notify')


    <div class="row">
        <div class="col-lg-12">
            <section>
                <div class="wizard">


                    <form id="lang-upload" method="POST" enctype="multipart/form-data" role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <!-- <h3>Video Details</h3> -->
                                <div style="margin-left: 15px"><small>Note : <span style="color:red">*</span> fields are mandatory. Please fill and click next.</small></div>
                                <hr>
                                <div class="">
                                    <input type="hidden" value="1" name="ajax_key">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title" class="">Title * </label>
                                            <input type="text" required class="form-control" id="title" name="title" placeholder="{{tr('title')}}">
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
    <button class="btn btn-primary btn-info-full" id="finishBtn" onclick="createLang()">Finish</button>



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
        function createLang() {

            var fd = new FormData;

            fd.append('_token', $('#csrf-token').val());
            fd.append('title', $('#title').val());



            $.ajax({
                type: 'POST',
                url: 'create-lang',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    console.log(rep);
                    alert('Lang successful created!');
                }
            });
        }







    </script>






@endsection


