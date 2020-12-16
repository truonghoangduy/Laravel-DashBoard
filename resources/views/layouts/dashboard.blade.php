@extends('layouts.app')

@section('content')
    @if(session()->has('messages'))
        @php
            toast(session()->get("messages"),'success')->autoClose(1000);

        @endphp
    @endif

    @if(session()->has('error'))
        @php
            $errorData = session()->get("error");
            alert()->error('ErrorAlert',$errorData['messages'])->persistent(true)->footer("<a href=".$errorData["redirectLink"].">You doesn't has profile yet, Want to create ?</a>");
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
