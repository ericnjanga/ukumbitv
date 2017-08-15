@extends('r.layouts.app')
@section('layout')
    @include('r.chunks._header_logo')
    <main>
        @yield('content')
    </main>
    @include('r.chunks._footer_main')
@endsection