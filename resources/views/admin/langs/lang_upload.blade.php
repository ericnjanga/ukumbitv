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

<!-- 
<div style="margin-left: 15px"><small>Note : <span style="color:red">*</span> fields are mandatory. Please fill and click next.</small></div>
 -->
  <div class="row">
    <div class="col-lg-12"> 
      <div class="box tab-content tab-content-langadd"> 
        <form id="lang-upload" method="POST" enctype="multipart/form-data" role="form">
          <div class="form-group col-sm-12">
            <input type="hidden" value="1" name="ajax_key">
            <label for="title" class="">Title * </label>
            <input type="text" required class="form-control" id="title" name="title" placeholder="{{tr('title')}}"> 
          </div>    
        </form> 
      </div> 
    </div>
		

		<div class="col-md-4 col-md-offset-8 form-group">
	    <button class="btn btn-submit btn-block" id="finishBtn" onclick="createLang()">Finish</button>
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


