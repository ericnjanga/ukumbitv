@extends('layouts.admin')

@section('title', 'Producer Agents')

@section('content-header', 'Producer Agents')

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i>Producer Agents</li>
@endsection

@section('content')

    @include('notification.notify')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header label-primary">
                    <b style="font-size:18px;">Producer Agents</b>
                </div>

                <div class="box-body">

                    @if(count($agents) > 0)

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Royalties</th>
                                <th>Contract expiration</th>
                                <th>Providers</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>{{tr('action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($agents as $i => $agent)

                                <tr id="row{{$agent->id}}">
                                    <td>{{$i+1}}</td>
                                    <td>{{$agent->name}}</td>
                                    <td>{{$agent->royalties}}</td>
                                    <td>{{$agent->contract_expiration}}</td>
                                    <td>Providers</td>
                                    <td>{{$agent->email}}</td>
                                    <td>{{$agent->description}}</td>
                                    <td>
                                        <a href="edit-producer-agent/{{$agent->id}}" class="btn btn-primary">Edit</a>
                                        <button class="btn btn-danger" onclick="return confirmDelete({{$agent->id}});">Delete</button>
                                    </td>
                                </tr>



                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="no-result">No agents found!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        function confirmDelete(id) {

            if (confirm("Remove agent?")) {
                var fd = new FormData;

                fd.append('_token', $('#csrf-token').val());
                fd.append('id', id);

                $.ajax({
                    type: 'POST',
                    url: 'delete-producer-agent',
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        alert('Agent successful deleted!'+id);
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