@extends('layouts.admin')

@section('title', 'Add payment plan')

@section('content-header', 'Add payment plan')

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">



@endsection

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li><a href="{{route('admin.pay-plans')}}"><i class="fa fa-video-camera"></i>{{tr('pay_plans')}}</a></li>
    <li class="active"><i class="fa fa-credit-card"></i> {{tr('add_pay_plan')}}</li>
@endsection

@section('content')

  @include('notification.notify')

<!-- 
<div style="margin-left: 15px"><small>Note : <span style="color:red">*</span> fields are mandatory. Please fill and click next.</small></div>
 -->
  <div class="row">
    <div class="col-lg-12"> 
      <div class="box tab-content tab-content-planadd">  
        <form id="lang-upload" method="POST" enctype="multipart/form-data" role="form">
        	<div class="row">


 
            <!-- Left column -->
          	<div class="col-md-6">
          		<fieldset class="blk col-md-12 mb35">
								<legend>Basic Information</legend>
			          <div class="form-group">
			            <input type="hidden" value="1" name="ajax_key">
			            <label for="name" class="">Name * </label>
			            <input type="text" required class="form-control" id="name" name="name" placeholder="Name">
			          </div>
 
                <div class="form-group">
                    <label for="price" class="">Price $ * </label>
                    <input type="number" required class="form-control" id="price" name="price" placeholder="Price $">
                </div>

                <div class="form-group">
                    <label for="description" class="">Description </label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" required rows="4" cols="50" id="description" name="description"></textarea>
                </div>
							</fieldset><!-- fieldset -->
          	</div>
          	<!-- Left column -->


 
            <!-- Right column -->
          	<div class="col-md-6">
          		<fieldset class="blk col-md-12 mb35">
								<legend>List of products</legend>

                <div class="form-group">
                    <label for="product1" class="">Product 1 *</label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" required rows="2" cols="50" id="product1" name="product1"></textarea>
                </div>

                <div class="form-group">
                    <label for="product2" class="">Product 2</label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" required rows="2" cols="50" id="product2" name="product2"></textarea>
                </div>

                <div class="form-group">
                    <label for="product3" class="">Product 3</label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" required rows="2" cols="50" id="product3" name="product3"></textarea>
                </div>

                <div class="form-group">
                    <label for="product4" class="">Product 4</label>
                    <textarea  style="overflow:auto;resize:none" class="form-control" required rows="2" cols="50" id="product4" name="product4"></textarea>
                </div>
							</fieldset><!-- fieldset -->
          	</div>
          	<!-- Right column -->




        	</div> <!-- row -->   
        </form> 
      </div> 
    </div>
		

		<div class="col-md-4 col-md-offset-8 form-group">
	    <button class="btn btn-submit btn-block" id="finishBtn" onclick="validateForm()">Finish</button>
		</div> 
  </div><!-- row --> 




  <div class="overlay">
      <div id="loading-img"></div>
  </div>

@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/moment.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>

    <script src="{{asset('admin-css/plugins/iCheck/icheck.min.js')}}"></script>



    <script src="https://malsup.github.com/jquery.form.js"></script>


    <script type="text/javascript">

        function validateForm() {

            if($('#name').val() === '' || $('#price').val() === '' || $('#product1').val() === '') {
                alert('Name, price and product 1 is required!');
            } else {
                createPayPlan();
            }
        }

        function createPayPlan() {
            var fd = new FormData;

            fd.append('_token', $('#csrf-token').val());
            fd.append('name', $('#name').val());
            fd.append('price', $('#price').val());
            fd.append('description', $('#description').val());
            fd.append('product1', $('#product1').val());
            fd.append('product2', $('#product2').val());
            fd.append('product3', $('#product3').val());
            fd.append('product4', $('#product4').val());



            $.ajax({
                type: 'POST',
                url: 'create-payment-plan',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    //console.log(rep);
                    alert('Payment plan successful created!');
                }
            });
        }







    </script>






@endsection


