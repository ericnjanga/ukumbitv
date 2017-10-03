@extends('r.layouts.app')
@section('layout')
    @include('r.chunks._header_logo_only')
    <main>
        @yield('content')
    </main>
    <!-- @include('r.chunks._footer_main') -->
@endsection