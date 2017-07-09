@extends('static.legal-master-page')

@section('content')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-legal
@endsection


<div class="main-content">
  @if($data) <?php echo $data->description; ?> @else {{tr('terms_conditions')}} @endif
</div><!-- main-content -->


@endsection

@section('scripts')
@endsection
