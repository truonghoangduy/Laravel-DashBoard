@extends('layouts.app')

@section('content')
    @include('sweetalert::alert')

    @include('shared.sidebar')
    <div class="main-content" id="panel">
        @include('shared.topnav')
        @include('shared.breeadcrum')
        <!-- Page content -->
            <div class="container-fluid mt--6">
            @yield('main-content')
{{--                    @include('components.product.product')--}}
            </div>
    </div>
@endsection
