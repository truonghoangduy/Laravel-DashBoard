<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Products</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="name">ID</th>

                        <th scope="col" class="sort" data-sort="name">Name</th>

                        <th scope="col" class="sort" data-sort="budget">Unit Price</th>
                        <th scope="col" class="sort" data-sort="budget">CREATE AT</th>
                        <th scope="col" class="sort" data-sort="budget">Quantity</th>
                        <th scope="col" class="sort" data-sort="budget">Category</th>



                        {{--                        <th scope="col" class="sort" data-sort="status">Status</th>--}}
{{--                        <th scope="col" class="sort" data-sort="completion">Completion</th>--}}
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($listOfProduct as $product)
                        <tr>

{{--                                                    Name - Picture--}}
{{--                                                    Prices--}}
{{--                                                    Status--}}
                            <td class="budget">
                                {{strval($product['id'])}}
                            </td>
                            <th scope="row">
                                <div class="media align-items-center">
{{--                                    <a href="#" class="flex-row w mr-3">--}}
{{--                                        @if($product['pictureURL'] != null)--}}
{{--                                            <img alt="Image placeholder" class="thumbnail-img fit-image" src="{{\Illuminate\Support\Facades\URL::asset($product['pictureURL'])}}">--}}
{{--                                        @else--}}
{{--                                            <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">--}}
{{--                                        @endif--}}
{{--                                    </a>--}}
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm" data-toggle="popover-hover" data-img="{{$product['pictureURL']}}">{{$product['name']}}</span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">

                                <div class="d-flex align-items-center">
                                        <span class="font-weight-700">
                                         <i class="fas fa-dollar-sign"></i>
                                          <span class="status">{{$product->price}}</span>
                                 </span>
                                </div>
                                {{--                                    {{strval($product->price)}}--}}
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    {{$product->created_at}}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-800">
                                       {{$product->quantity}}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-300">
                                       {{ucfirst( $product->category)}}
                                    </span>
                                </div>
                            </td>
{{--                            <td>--}}
{{--                      <span class="badge badge-dot mr-4">--}}
{{--                        <i class="bg-warning"></i>--}}
{{--                        <span class="status">pending</span>--}}
{{--                      </span>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <span class="completion mr-2">60%</span>--}}
{{--                                    <div>--}}
{{--                                        <div class="progress">--}}
{{--                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{route('products.show',['product'=>$product['id']])}}">View Detail</a>
                                        <a class="dropdown-item" href="{{route('products.edit',['product'=>$product['id']])}}">Edit</a>
                                        <form method="POST" action="{{route('products.destroy',['product'=>$product['id']])}}">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
                <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fas fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-angle-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
