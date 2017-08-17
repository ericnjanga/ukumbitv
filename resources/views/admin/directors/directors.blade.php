@extends('layouts.admin')

@section('title', tr('directors'))

@section('content-header', tr('directors'))

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i> {{tr('directors')}}</li>
@endsection

@section('content')

    @include('notification.notify')
    <div class="row">
      <div class="col-xs-12">
    		<div class="box tab-content tab-content-directorsview">  
          @if(count($directors) > 0) 
            <table id="table-directorsview" class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>{{tr('id')}}</th>
                    <th>Name</th>
                    <th>BIO</th>
                    <th>{{tr('action')}}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($directors as $i => $director)

                    <tr id="row{{$director->id}}">
                        <td>{{$i+1}}</td>
                        <td>{{$director->name}}</td>
                        <td>{{$director->bio}}</td>
                        <td>
                            <a href="edit-director/{{$director->id}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit record"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <button class="btn btn-danger" onclick="return confirmDelete({{$director->id}});" data-toggle="tooltip" data-placement="top" title="Delete record"><i class="fa fa-trash" aria-hidden="true"></i></button>
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

@endsection

@section('scripts')
    <script type="text/javascript">
        function confirmDelete(id) {

            if (confirm("Remove actor?")) {
                var fd = new FormData;

                fd.append('_token', $('#csrf-token').val());
                fd.append('id', id);

                $.ajax({
                    type: 'POST',
                    url: 'delete-director',
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        alert('Director successful deleted!'+id);
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
