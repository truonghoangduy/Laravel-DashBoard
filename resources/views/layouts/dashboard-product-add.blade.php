@extends('layouts.dashboard')
@section('main-content')
    <x-product.product-edit-add></x-product.product-edit-add>

@endsection
@section('js')
    <script>
        $('#avatar').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            console.log((fileName))
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection('js')
