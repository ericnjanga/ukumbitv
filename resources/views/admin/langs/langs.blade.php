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

                                <tr id="row{{$lang->id}}">
                                    <td>{{$i+1}}</td>
                                    <td>{{$lang->title}}</td>
                                    <td>
                                        <a href="edit-lang/{{$lang->id}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit record"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <button class="btn btn-danger" onclick="return confirmDelete({{$lang->id}});" data-toggle="tooltip" data-placement="top" title="Delete record"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
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

@section('scripts')
    <script type="text/javascript">
        function confirmDelete(id) {

            if (confirm("Remove actor?")) {
                var fd = new FormData;

                fd.append('_token', $('#csrf-token').val());
                fd.append('id', id);

                $.ajax({
                    type: 'POST',
                    url: 'delete-lang',
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        alert('Language successful deleted!'+id);
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
