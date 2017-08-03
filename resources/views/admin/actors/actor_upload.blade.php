@extends('layouts.admin')

@section('title', 'Add actor')

@section('content-header', 'Add actor')

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">



@endsection

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li><a href="{{route('admin.actors')}}"><i class="fa fa-video-camera"></i>{{tr('actors')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i> {{tr('add_video')}}</li>
@endsection

@section('content')
  @include('notification.notify')

  <div class="row">
    <div class="col-lg-12"> 
      <div class="box tab-content tab-content-addactor"> 
        <form id="actor-upload" method="POST" enctype="multipart/form-data" role="form">
        	<div class="row">
        		<div class="form-group col-sm-12">
              <input type="hidden" value="1" name="ajax_key">
              <label for="title" class="">Name * </label>
              <input type="text" required class="form-control" id="title" name="title" placeholder="{{tr('title')}}">
						</div><!-- form-group -->

            <div class="form-group col-sm-12">
              <label for="description" class="">BIO * </label>
              <textarea class="form-control" required rows="4" cols="50" id="description" name="description"></textarea>
            </div> 
        	</div><!-- row --> 
        </form> 
      </div>
    </div><!-- col-lg-12 -->
		

		<div class="col-md-4 col-md-offset-8 form-group">
	    <button class="btn btn-submit btn-block" id="finishBtn" onclick="createActor()">Save</button>
		</div> 
  </div><!-- row --> 
@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/moment.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>

    <script src="{{asset('admin-css/plugins/iCheck/icheck.min.js')}}"></script>



    <script src="http://malsup.github.com/jquery.form.js"></script>


    <script type="text/javascript">
        function createActor() {

            var fd = new FormData;

            fd.append('_token', $('#csrf-token').val());
            fd.append('title', $('#title').val());
            fd.append('description', $('#description').val());



            $.ajax({
                type: 'POST',
                url: 'create-actor',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    console.log(rep);
                    alert('Actor successful created!');
                }
            });
        }







    </script>






@endsection


