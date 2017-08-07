@extends('layouts.admin')

@section('title', 'Edit Language')

@section('content-header', 'Edit Language')

@section('breadcrumb')

@endsection

@section('content')

    @include('notification.notify')

    <div class="row"> 
    	<div class="col-lg-12"> 
      	<div class="box tab-content tab-content-langedit">  
          <form class="form-horizontal" method="POST" enctype="multipart/form-data" role="form"> 
            <div class="row"> 
              <input type="hidden" id="payplanid" name="id" value="{{$payPlan->id}}">

                <div class="form-group col-sm-12">
                    <input type="hidden" value="1" name="ajax_key">
                    <label for="name" class="">Name * </label>
                    <input type="text" required class="form-control" id="name" name="name" value="{{$payPlan->name}}" placeholder="Name">
                </div>

                <div class="form-group col-sm-12">
                    <label for="price" class="">Price $ * </label>
                    <input type="number" required class="form-control" id="price" name="price" value="{{$payPlan->price}}" placeholder="Price $">
                </div>

                <div class="form-group col-sm-12">
                    <label for="description" class="">Description </label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" required rows="4" cols="50" id="description" name="description">{{$payPlan->description}}</textarea>
                </div>

                <div class="form-group col-sm-12">
                    <label for="product1" class="">Product 1 *</label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" required rows="2" cols="50" id="product1" name="product1">{{$payPlan->product1}}</textarea>
                </div>

                <div class="form-group col-sm-12">
                    <label for="product2" class="">Product 2</label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" rows="2" cols="50" id="product2" name="product2">{{$payPlan->product2}}</textarea>
                </div>

                <div class="form-group col-sm-12">
                    <label for="product3" class="">Product 3</label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" rows="2" cols="50" id="product3" name="product3">{{$payPlan->product3}}</textarea>
                </div>

                <div class="form-group col-sm-12">
                    <label for="product4" class="">Product 4</label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" rows="2" cols="50" id="product4" name="product4">{{$payPlan->product4}}</textarea>
                </div>


            </div> 
          </form> 
        </div> 
      </div> 
			

			<div class="col-md-4 col-md-offset-8 form-group">
		    <button class="btn btn-submit btn-block" id="finishBtn" onclick="validateForm()">Save</button>
			</div>
			


    </div><!-- row --> 
@endsection

@section('scripts')

    <script type="text/javascript">
        function validateForm() {

            if($('#name').val() === '' || $('#price').val() === '' || $('#product1').val() === '') {
                alert('Name, price and product 1 is required!');
            } else {
                editPayPlan();
            }
        }

        function editPayPlan() {
            var fd = new FormData;

            fd.append('_token', $('#csrf-token').val());
            fd.append('name', $('#name').val());
            fd.append('id', $('#payplanid').val());
            fd.append('price', $('#price').val());
            fd.append('description', $('#description').val());
            fd.append('product1', $('#product1').val());
            fd.append('product2', $('#product2').val());
            fd.append('product3', $('#product3').val());
            fd.append('product4', $('#product4').val());




            $.ajax({
                type: 'POST',
                url: 'update-payment-plan',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    //var rep = JSON.parse(data);
                    //console.log(rep);
                    alert('Payment plan successful edited!');
                },
                error: function (data) {
                    alert('error '+data);
                }
            });
        }

    </script>






@endsection