@extends('static.masterpage-legal')




{{-- page title --}}
@section('page-title')
{{trans('messages.terms_of_use')}}
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
