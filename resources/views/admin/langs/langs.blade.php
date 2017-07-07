@extends('layouts.admin')

@section('title', tr('langs'))

@section('content-header', tr('langs'))

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i> {{tr('langs')}}</li>
@endsection

@section('content')

    @include('notification.notify')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header label-primary">
                    <b style="font-size:18px;">{{tr('langs')}}</b>
                </div>

                <div class="box-body">

                    @if(count($langs) > 0)

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>{{tr('id')}}</th>
                                <th>Title</th>
                                <th>{{tr('action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($langs as $i => $lang)

                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$lang->title}}</td>
                                    <td>
                                        <button class="btn btn-danger">DELETE</button></td>
                                </tr>



                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="no-result">No languages found!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
