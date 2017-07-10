{{-- INSPIRATION --}}
{{-- INSPIRATION --}}
{{-- INSPIRATION --}}
{{-- INSPIRATION --}}
{{-- https://tympanus.net/codrops/about/ --}}
{{-- INSPIRATION --}}
{{-- INSPIRATION --}}
{{-- INSPIRATION --}}
{{-- INSPIRATION --}}
@extends('static.legal-master-page') 




{{-- page title --}}
@section('page-title')
{{trans('messages.about_us')}}
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
