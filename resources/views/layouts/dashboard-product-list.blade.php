@extends('layouts.dashboard')
@section('main-content')
{{--    @if(session()->has('result')))--}}
{{--            <script>--}}
{{--                alert("asdasd")--}}
                // Swal.fire({
                //     position: 'center',
                //     icon: 'success',
                //     title: 'Add product successful',
                //     showConfirmButton: false,
                //     timer: 1500
                // })
{{--            </script>--}}
{{--    @endif--}}

@if(session()->has('messages'))
    @php
        toast(session()->get("messages"),'success')->autoClose(1000);

    @endphp
{{--    <script>--}}
{{--        Swal({--}}
{{--            position: 'center',--}}
{{--            icon: 'success',--}}
{{--            title: 'Add product successful',--}}
{{--            showConfirmButton: false,--}}
{{--            timer: 1500--}}
{{--        })--}}
{{--    </script>--}}
@endif


<x-table :list-of-product="$listOfProduct"></x-table>
@endsection
