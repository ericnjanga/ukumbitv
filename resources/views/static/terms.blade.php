@extends('static.legal-master-page')

@section('content')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-page-legal
@endsection




@section('content') 
  @if($data) <?php echo $data->description; ?> @else {{tr('terms_conditions')}} @endif 
@endsection




@section('scripts')
@endsection
