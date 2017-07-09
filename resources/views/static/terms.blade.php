@extends('static.legal-master-page')

@section('content')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-legal
@endsection




@section('content') 
	@include('static.txt-terms-en')
@endsection




@section('scripts')
@endsection
