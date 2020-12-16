@extends('layouts.dashboard')
@section('main-content')

    <x-user.user-edit :user-detail="$userDetail"></x-user.user-edit>

@endsection
