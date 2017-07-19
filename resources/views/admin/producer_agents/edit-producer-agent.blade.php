@extends('layouts.admin')

@section('title', 'Edit Agent')

@section('content-header', 'Edit Agent')

@section('breadcrumb')

@endsection

@section('content')

    @include('notification.notify')

    <div class="row">

        <div class="col-md-10">

            <div class="box box-primary">

                <div class="box-header label-primary">
                    <b style="font-size:18px;">Edit agent</b>
                </div>

                <form id="producer-agent-upload" method="POST" enctype="multipart/form-data" role="form">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1"> 
                            <div style="margin-left: 15px"><small>Note : <span style="color:red">*</span> fields are mandatory. Please fill and click next.</small></div>
                            <hr>
                            <div class="row">
                                <input type="hidden" value="1" name="ajax_key">
                                <input type="hidden" id="agentid" value="{{$agent->id}}">
                              <div class="col-md-12"> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="">Name * </label>
                                        <input type="text" required class="form-control" id="name" name="name" value="{{$agent->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="datepicker" class="">Contract expiration * </label>

                                        <input type="text" name="contract_expiration" value="{{$agent->contract_expiration}}" class="form-control pull-right" id="datepicker">
                                    </div>
                                    <div class="form-group">
                                        <label for="royalties" class="">Royalties (0-100) * </label>
                                        <div class="input-group">
                                        	<input type="number" min="0" max="100" required class="form-control" id="royalties" name="royalties" value="{{$agent->royalties}}" aria-describedby="basic-addon2">
																		  		<span class="input-group-addon" id="basic-addon2">%</span> 
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="provider" class="">Select Affiliated Movie Providers *</label>

                                        <select multiple required id="provider" name="provider_id" class="form-control">
                                            @foreach($providers as $provider)
                                                <option value="{{$provider->id}}" @foreach($dirarr as $dira) @if($dira == $provider->id) selected @endif @endforeach>{{$provider->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- col-md-6 -->

                                <div class="col-md-6"> 
                                  <div class="form-group">
                                      <label for="email" class="">Email * </label>
                                      <input type="email" required class="form-control" id="email" name="email" value="{{$agent->email}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="password" class="">Password * </label>
                                      <input type="password" required class="form-control" id="password" name="password" value="{{$agent->password}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="description" class="">Description </label>
                                      <textarea  style="overflow:auto;resize:none" class="form-control" rows="4" cols="50" id="description" name="description">{{$agent->description}}</textarea>
                                  </div>
                                </div><!-- col-md-6 -->
                              </div><!-- col-md-12 --> 



                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>
    <div class="box-footer">
        {{--<progress id="progressbar" value="0" max="100"></progress>--}}
        <button class="btn btn-primary btn-info-full" id="finishBtn" onclick="editAgent()">Save</button>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        function editAgent() {
            var fd = new FormData;

            fd.append('_token', $('#csrf-token').val());
            fd.append('name', $('#name').val());
            fd.append('royalties', $('#royalties').val());
            fd.append('contract_expiration', $('#datepicker').val());
            fd.append('providers', $('#provider').val());
            fd.append('email', $('#email').val());
            fd.append('password', $('#password').val());
            fd.append('description', $('#description').val());
            fd.append('id', $('#agentid').val());

            //fd.append('images', dropImages.join(';'));
           // var progressBar = $('#progressbar');

            $.ajax({
                type: 'POST',
                url: 'update-producer-agent',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    //var rep = JSON.parse(data);
                    //console.log(rep);
                    alert('Agent successful updated!');
                },
                error: function (data) {
                    alert('error '+data);
                }
            });
        }

    </script>






@endsection