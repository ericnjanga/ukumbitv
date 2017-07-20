@extends('layouts.admin')

@section('title', tr('add_user'))

@section('content-header', tr('add_user'))

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li><a href="{{route('admin.users')}}"><i class="fa fa-user"></i> {{tr('users')}}</a></li>
    <li class="active"><i class="fa fa-user-plus"></i> {{tr('add_user')}}</li>
@endsection

@section('content')

@include('notification.notify')

    <div class="row">

        <div class="col-md-12">

            <div class="box tab-content tab-content-user-add">

                <!-- <div class="box-header label-primary">
                    <b style="font-size:18px;">{{tr('add_user')}}</b>
                    <a href="{{route('admin.users')}}" class="btn btn-default pull-right">{{tr('view_users')}}</a>
                </div> -->

                <form class="form-horizontal-" action="{{route('admin.save.user')}}" method="POST" enctype="multipart/form-data" role="form">

                    <div class="box-body row">

                        <div class="form-group col-sm-12">
                          <label for="email" class="control-label">{{tr('email')}}</label>
                          <input type="email" maxlength="255" required class="form-control" id="email" name="email" placeholder="{{tr('email')}}">
                        </div>

                        <div class="form-group col-sm-12">
                          <label for="username" class="control-label">{{tr('username')}}</label>

                          <input type="text" required name="name" class="form-control" id="username" placeholder="{{tr('name')}}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="mobile" class="control-label">{{tr('mobile')}}</label>

                            <input type="text" required name="mobile" class="form-control" id="mobile" placeholder="{{tr('mobile')}}" minlength="6" maxlength="13" pattern="[0-9]{6,}">
                                <br>
                                 <small style="color:brown">Note : The mobile must be between 6 and 13 digits.</small>
                        </div>
                        
                        <div class="form-group col-sm-12">
                            <label for="is_guest" class="control-label">{{tr('guest')}}</label>

                            <input type="checkbox" name="is_guest" value="1">
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-danger">{{tr('cancel')}}</button>
                        <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                    </div>
                    <input type="hidden" name="timezone" value="" id="userTimezone">
                </form>
            
            </div>

        </div>

    </div>

@endsection

@section('scripts')

<script src="{{asset('assets/js/jstz.min.js')}}"></script>
<script>
    
    $(document).ready(function() {

        var dMin = new Date().getTimezoneOffset();
        var dtz = -(dMin/60);
        // alert(dtz);
        $("#userTimezone").val(jstz.determine().name());
    });

</script>

@endsection