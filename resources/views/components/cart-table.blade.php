<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Cart</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive" data-toggle="list" data-list-values='["id", "user", "status", "order_date"]'>
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="id">Id</th>
                        <th scope="col" class="sort" data-sort="user">User ID</th>
                        <th scope="col" class="sort" data-sort="status">Status</th>
                        <th scope="col" class="sort" data-sort="order_date">Order Date</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($listOfCart as $cart)
                        <tr>

                            {{--                                                    Name - Picture--}}
                            {{--                                                    Prices--}}
                            {{--                                                    Status--}}
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
                                        <span class="name mb-0 text-sm">{{$cart['id']}}</span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                {{$cart->user_id}}
                            </td>
                            <td>
                      <span class="badge badge-dot mr-4">
{{--                          //['pending','shipping','received']--}}
                        <i class="bg-{{$cart["cart_status"] === 'pending' ? "warning":($cart["cart_status"] === 'shipping' ? "info":"success")}}"></i>
                        <span class="status">{{ucfirst($cart["cart_status"])}}</span>
                      </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{$cart['created_at']}}
{{--                                    <span class="completion mr-2">60%</span>--}}
{{--                                    <div>--}}
{{--                                        <div class="progress">--}}
{{--                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <form method="GET" action="{{route('carts.show',['cart'=>$cart['id']])}}">
                                            <button class="dropdown-item" type="submit">View Detail</button>
                                        </form>
{{--
     <a class="dropdown-item" href="{{route('carts.show',['cart'=>$cart['id']])}}">View Detail</a>--}}
                                        <form method="POST" action="{{route('carts.destroy',['cart'=>$cart['id']])}}">
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
