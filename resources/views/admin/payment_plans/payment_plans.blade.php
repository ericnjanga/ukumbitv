@extends('layouts.admin')

@section('title', tr('pay_plans'))

@section('content-header', tr('pay_plans'))

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i> {{tr('pay_plans')}}</li>
@endsection

@section('content')

  @include('notification.notify')
  <div class="row">
    <div class="col-xs-12">
    	<div class="box tab-content tab-content-payplansview">
        @if(count($pay_plans) > 0)
          <table id="table-payplansview" class="table table-bordered table-striped">
            <thead>
              <tr>
                  <th>{{tr('id')}}</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <!-- <th>Product 1</th>
                  <th>Product 2</th>
                  <th>Product 3</th>
                  <th>Product 4</th>
                   -->
                   <th>{{tr('action')}}</th>
              </tr>
            </thead>

            <tbody>
            @foreach($pay_plans as $i => $pay_plan)
              <tr id="row{{$pay_plan->id}}">
                  <td>{{$i+1}}</td>
                  <td>{{$pay_plan->name}}</td>
                  <td>{{$pay_plan->price}}</td>
                  <td>{{$pay_plan->description}}</td>
                  <!-- <td>{{$pay_plan->product1}}</td>
                  <td>{{$pay_plan->product2}}</td>
                  <td>{{$pay_plan->product3}}</td>
                  <td>{{$pay_plan->product4}}</td> -->
                  <td>
                      <a href="edit-payment-plan/{{$pay_plan->id}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit record"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <button class="btn btn-danger" onclick="return confirmDelete({{$pay_plan->id}});" data-toggle="tooltip" data-placement="top" title="Delete record"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
              </tr> 
            @endforeach
            </tbody>
          </table>
        @else
          <h3 class="no-result">No Payment plans found!</h3>
        @endif 
      </div>
    </div>
  </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        function confirmDelete(id) {

            if (confirm("Remove payment plan?")) {
                var fd = new FormData;

                fd.append('_token', $('#csrf-token').val());
                fd.append('id', id);

                $.ajax({
                    type: 'POST',
                    url: 'delete-payment-plan',
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        alert('Payment paln successful deleted!'+id);
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
