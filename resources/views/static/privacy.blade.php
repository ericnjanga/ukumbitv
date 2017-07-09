@extends('static.legal-master-page') 




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
