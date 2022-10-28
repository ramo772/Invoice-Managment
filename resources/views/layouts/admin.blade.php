@extends('layouts.app')

@section('auth')
    @include('layouts.navbars.sidebar')
    <main
        class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg {{ Request::is('rtl') ? 'overflow-hidden' : '' }}">
        @include('layouts.navbars.nav')
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </main>
@endsection
