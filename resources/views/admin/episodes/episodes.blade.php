@extends('layouts.admin')

@section('title', tr('videos'))

@section('content-header', tr('videos'))

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i> {{tr('videos')}}</li>
@endsection

@section('content')

    @include('notification.notify')
    <div class="row">
        <div class="col-xs-12">
            <div class="box tab-content tab-content-movie-view">
                <div class="row">
                    @if(count($videos) > 0)
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{tr('id')}}</th>
                                <th>Video title</th>

                                <th>{{tr('action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($videos as $i => $video)

                                <tr id="row{{$video->id}}">
                                    <td>{{$i+1}}</td>
                                    <td>{{$video->title}}</td>

                                    <td>
                                        <a href="{{route('admin.edit.episode', $video->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add record"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        <a href="{{route('admin.edit.episodes', [$video->id, 1])}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit record"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <button class="btn btn-danger" onclick="return confirmDelete({{$video->id}});" data-toggle="tooltip" data-placement="top" title="Delete record"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
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

@section('scripts')
    <script type="text/javascript">
        function confirmDelete(id) {

            if (confirm("Remove video?")) {
                var fd = new FormData;

                fd.append('_token', $('#csrf-token').val());
                fd.append('id', id);

                $.ajax({
                    type: 'POST',
                    url: 'delete-movie',
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        alert('Movie successful deleted!'+id);
                        $('#row'+id).css('display', 'none');
                    },
                    error: function (data) {
                        alert('error '+data);
                    }
                });
            }

        }
    </script>
@endsection
