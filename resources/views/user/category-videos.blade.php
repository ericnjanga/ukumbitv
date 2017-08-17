@extends('layouts.user')


@section('body-class')
    page-homevideos
@endsection


@section('styles')
@endsection


@section('content')
@include('user.home-video')

@endsection

@section('scripts')

    <!--
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/blazy/1.8.2/blazy.min.js"></script>
 	<script src="{{asset('streamtube/js/grid.js')}}"></script>-->
    <script src="{{asset('streamtube/js/app.home-videos.js')}}"></script>

@endsection

