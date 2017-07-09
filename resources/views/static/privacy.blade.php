@extends('static.legal-master-page')




{{-- Assign "page-login" class to body --}}
@section('body-class')
page-legal
@endsection


{{-- page title --}}
@section('page-title')
{{trans('messages.privacy_statement')}}
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
