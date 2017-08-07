
@extends('static.masterpage-legal')


@section('content-title')
Select payment plan
@endsection

@section('content')

	<div class="container">
		<div class="row">
			@foreach($payPlans as $payPlan)
			<div class="col-md-4">
				<h2>Plan name: {{$payPlan->name}}</h2>
				<p>Price: ${{$payPlan->price}}</p>
				<br>
				<h3>Products:</h3>
				<p>1. {{$payPlan->product1}}</p>
				<a href="#" class="btn btn-primary">
					Select plan
				</a>
			</div>
			@endforeach
		</div>
	</div>

@endsection