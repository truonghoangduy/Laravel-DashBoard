<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
{{--                    <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>--}}
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
{{--                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">--}}
{{--                            --}}
{{--                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Tables</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">Tables</li>--}}
{{--                        </ol>--}}
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    @if (str_contains(\Illuminate\Support\Facades\URL::current(),"users"))
                        <a href='{{route('users.create')}}' class="btn btn-sm btn-neutral">New</a>
                    @elseif(str_contains(\Illuminate\Support\Facades\URL::current(),"products"))
                        <a href='{{route('products.create')}}' class="btn btn-sm btn-neutral">New</a>
                    @endif
                    <button class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#filterModal">Filters</button>
                    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <x-table-filter></x-table-filter>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
