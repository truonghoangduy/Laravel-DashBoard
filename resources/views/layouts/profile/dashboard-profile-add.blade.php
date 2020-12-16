@extends('layouts.dashboard')
@section('main-content')

    <x-user.user-profile-add :user-detail="$userDetail"></x-user.user-profile-add>

@endsection
