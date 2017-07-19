@extends('layouts.admin')

@section('title', 'Movie Producers')

@section('content-header', 'Movie Producers')

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i>Movie Producers</li>
@endsection

@section('content')

    @include('notification.notify')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header label-primary">
                    <b style="font-size:18px;">Movie Producers</b>
                </div>

                <div class="box-body">

                    @if(count($producers) > 0)

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Royalties</th>
                                <th>Contract expiration</th>
                                <th>Agent</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>{{tr('action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($producers as $i => $producer)

                                <tr id="row{{$producer->id}}">
                                    <td>{{$i+1}}</td>
                                    <td>{{$producer->name}}</td>
                                    <td>{{$producer->royalties}}</td>
                                    <td>{{$producer->contract_expiration}}</td>
                                    <td>{{$producer->producer_agent_id}}</td>
                                    <td>{{$producer->email}}</td>
                                    <td>{{$producer->description}}</td>
                                    <td>
                                        <a href="edit-movie-producer/{{$producer->id}}" class="btn btn-primary">Edit</a>
                                        <button class="btn btn-danger" onclick="return confirmDelete({{$producer->id}});">Delete</button>
                                    </td>
                                </tr>



                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="no-result">No movie producers found!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        function confirmDelete(id) {

            if (confirm("Remove movie producer?")) {
                var fd = new FormData;

                fd.append('_token', $('#csrf-token').val());
                fd.append('id', id);

                $.ajax({
                    type: 'POST',
                    url: 'delete-movie-producer',
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        alert('Movie producer successful deleted!'+id);
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
