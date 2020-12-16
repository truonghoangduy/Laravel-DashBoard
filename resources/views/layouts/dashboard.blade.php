@extends('layouts.app')

@section('content')
    @if(session()->has('messages'))
        @php
            toast(session()->get("messages"),'success')->autoClose(1000);

        @endphp
    @endif
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
