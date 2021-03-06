@extends('layouts.dashboard')
@section('main-content')
    @if(session('result'))
        @once
            @push('scripts')
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Add product successful',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endpush
        @endonce
    @endif
    <x-cart.cart-edit :cart-detail="$cartDetail"></x-cart.cart-edit>
@endsection
