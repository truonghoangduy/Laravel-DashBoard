@extends('layouts.dashboard')
@section('main-content')
    @if(session()->has('error'))
        @php
            $errorData = session()->get("error");
            alert()->error('ErrorAlert',$errorData['messages'])->persistent(true)->footer("<a href=".$errorData["redirectLink"].">User doesn't has profile yet, Want to create ?</a>");
        @endphp
    @endif
{{--    @php--}}
{{--      dd($listOfUser)--}}
{{--    @endphp--}}
    <x-profile-table :list-of-user="$listOfUser"></x-profile-table>
@endsection
