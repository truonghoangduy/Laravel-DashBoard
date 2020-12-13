@extends('layouts.dashboard')
@section('main-content')
    <x-product.product-view-detail :product-detail="$productDetail"></x-product.product-view-detail>
@endsection
