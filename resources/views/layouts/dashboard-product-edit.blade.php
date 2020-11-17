@extends('layouts.dashboard')
@section('main-content')
    <x-product.product-edit :product-detail="$productDetail"></x-product.product-edit>
@endsection
