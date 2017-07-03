@extends('layouts.admin')

@section('title', tr('actors'))

@section('content-header', tr('actors'))

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i> {{tr('actors')}}</li>
@endsection

@section('content')

    @include('notification.notify')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header label-primary">
                    <b style="font-size:18px;">{{tr('actors')}}</b>
                </div>

                <div class="box-body">

                    @if(count($actors) > 0)

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>{{tr('id')}}</th>
                                <th>Name</th>
                                <th>BIO</th>
                                <th>{{tr('action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($actors as $i => $actor)

                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$actor->name}}</td>
                                    <td>{{$actor->bio}}</td>
                                    <td>
                                        <button class="btn btn-danger">DELETE</button></td>
                                </tr>



                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="no-result">{{tr('no_video_found')}}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
