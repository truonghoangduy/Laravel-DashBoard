@extends('layouts.dashboard')
@section('main-content')
<x-table :list-of-product="$listOfProduct"></x-table>
@endsection
