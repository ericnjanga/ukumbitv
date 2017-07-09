@extends('static.legal-master-page')

@section('content')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-legal
@endsection




@section('content') 
	@if(App::isLocale('en'))
    @include('static.txt-privacy-en')
	@else
    @include('static.txt-privacy-fr')
	@endif
@endsection




@section('scripts')
@endsection
