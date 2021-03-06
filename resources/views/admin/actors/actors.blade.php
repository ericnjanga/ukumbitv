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
      <div class="box tab-content tab-content-actorsview"> 
        @if(count($actors) > 0)
          <table id="table-actorsview" class="table table-bordered table-striped">

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

                  <tr id="row{{$actor->id}}">
                      <td>{{$i+1}}</td>
                      <td>{{$actor->name}}</td>
                      <td>{{$actor->bio}}</td>
                      <td>
                          <a href="edit-actor/{{$actor->id}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit record"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                          <button class="btn btn-danger" onclick="return confirmDelete({{$actor->id}});" data-toggle="tooltip" data-placement="top" title="Delete record"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
                    url: 'delete-actor',
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        alert('Actor successful deleted!'+id);
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
