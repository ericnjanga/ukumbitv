@extends('r.layouts.app')
@section('layout')
    @include('r.chunks._header_search')
    <main style="border:10px solid blue!important;">
        @yield('content')
    </main>
    @include('r.chunks._footer_main')
@endsection