@extends('layouts.dashboard')
@section('main-content')
    {{--    @php--}}
    {{--      dd($listOfUser)--}}
    {{--    @endphp--}}

    <x-user.user-profile-edit :user-detail="$userDetail"></x-user.user-profile-edit>
@endsection
