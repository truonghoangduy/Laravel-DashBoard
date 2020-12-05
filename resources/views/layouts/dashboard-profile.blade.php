@extends('layouts.dashboard')
@section('main-content')
{{--    @php--}}
{{--      dd($listOfUser)--}}
{{--    @endphp--}}
    <x-profile-table :list-of-user="$listOfUser"></x-profile-table>
@endsection
