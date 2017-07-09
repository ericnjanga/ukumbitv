@extends('static.legal-master-page')

@section('content')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-legal
@endsection




@section('content') 
	@if(App::isLocale('en'))
    @include('static.txt-terms-en')
	@else
    @include('static.txt-terms-fr')
	@endif
@endsection




@section('scripts')
@endsection
