@extends('layouts.admin')

@section('title', 'Movie Producer')

@section('content-header', 'Add Movie Producer')

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/datepicker/datepicker3.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">



@endsection

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li><a href="{{route('admin.movie-producers')}}"><i class="fa fa-video-camera"></i>Movie Producers</a></li>
@endsection

@section('content')

    @include('notification.notify')


    <div class="row">
        <div class="col-lg-12">
            <section>
                <div class="wizard">


                    <form id="movie-producer-upload" method="POST" enctype="multipart/form-data" role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1"> 
                                <div style="margin-left: 15px"><small>Note : <span style="color:red">*</span> fields are mandatory. Please fill and click next.</small></div>
                                <hr>
                                <div class="row">
                                  <input type="hidden" value="1" name="ajax_key">
                                  <div class="col-md-12">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="name" class="">Name * </label>
                                          <input type="text" required class="form-control" id="name" name="name" placeholder="name">
                                      </div>
                                      <div class="form-group">
                                          <label for="datepicker" class="">Contract expiration * </label>

                                          <input type="text" name="contract_expiration" placeholder="Select the contract expiration i.e YYYY-MM-DD" class="form-control pull-right" id="datepicker">
                                      </div>
                                      <div class="form-group">
                                        <label for="royalties" class="">Royalties (0-100) * </label>
                                        <div class="input-group">
                                        	<input type="number" min="0" max="100" required class="form-control" id="royalties" name="royalties" placeholder="royalties" aria-describedby="basic-addon2">
																		  		<span class="input-group-addon" id="basic-addon2">%</span>
                                        </div> 
                                      </div>
                                      <div class="form-group">

                                          <label for="provider" class="">Select Agent *</label>

                                          <select required id="agent" name="agent_id" class="form-control">
                                              @foreach($agents as $agent)
                                                  <option value="{{$agent->id}}">{{$agent->name}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                    </div><!-- col-md-6 -->

                                    <div class="col-md-6"> 
                                      <div class="form-group">
                                          <label for="email" class="">Email * </label>
                                          <input type="email" required class="form-control" id="email" name="email" placeholder="email">
                                      </div>
                                      <div class="form-group">
                                          <label for="password" class="">Password * </label>
                                          <input type="password" required class="form-control" id="password" name="password" placeholder="password">
                                      </div>
                                      <div class="form-group">
                                          <label for="description" class="">Description </label>
                                          <textarea  style="overflow:auto;resize:none" class="form-control" rows="4" cols="50" id="description" name="description"></textarea>
                                      </div>
                                    </div><!-- col-md-6 -->
																	</div><!-- col-md-12 --> 
                                </div><!-- row --> 
                            </div>
                        </div>

                    </form>

                </div>
            </section>
        </div>
    </div>
    <button class="btn btn-primary btn-info-full" id="finishBtn" onclick="createProducer()">Finish</button>



    <div class="overlay">
        <div id="loading-img"></div>
    </div>

@endsection

@section('scripts')

    {{--<script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/moment.min.js')}}"></script>--}}

    <script src="{{asset('admin-css/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

    <script src="{{asset('admin-css/plugins/iCheck/icheck.min.js')}}"></script>



    <script src="https://malsup.github.com/jquery.form.js"></script>


    <script type="text/javascript">

        $('#datepicker').datepicker({
          // minDate: moment(),
            format: 'yyyy-mm-dd',
            autoclose:true
        });

        function createProducer() {

            var fd = new FormData;
            var check = $('#royalties').val();

            fd.append('_token', $('#csrf-token').val());
            fd.append('name', $('#name').val());
            fd.append('royalties', $('#royalties').val());
            fd.append('contract_expiration', $('#datepicker').val());
            fd.append('agent', $('#agent').val());
            fd.append('email', $('#email').val());
            fd.append('password', $('#password').val());
            fd.append('description', $('#description').val());


            if (check >= 0 && check <=100) {
                $.ajax({
                    type: 'POST',
                    url: 'create-movie-producer',
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        console.log(rep);
                        alert('Movie producer successful created!');
                    },
                    error: function (data) {
                        alert('error '+data);
                    }
                });
            } else {
                alert('royalties should be 0-100')
            }

        }







    </script>






@endsection


