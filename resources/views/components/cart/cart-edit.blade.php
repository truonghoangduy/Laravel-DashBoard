<div class="col-xl-12 order-xl-1">
    <form method="POST" action="{{route('carts.update',["cart"=>$cartDetail->id])}}">
        @csrf
        @method("PUT")
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h3 class="mb-0">Cart ID: {{$cartDetail->id}} Information</h3>
                    </div>
                    <div class="col-3 text-right">
                        {{--                         <button type="button" class="btn btn-danger">Delete</button>--}}
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="flex-row mb-4 w-100 justify-content-lg-between">
                    <h6 class="heading-small text-muted d-inline">User information</h6>
                    <div class="dropdown dropdown-menu-right">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{route('users.show',['user'=>$userDetail->id])}}">View User Info</a>
                        </div>
                    </div>
                </div>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">User Name</label>
                                <input type="text" name="name" id="name" readonly class="form-control" placeholder="Username" value="{{$userDetail->name}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email" readonly>Email address</label>
                                <input type="email" name="email"  id="email" class="form-control" readonly placeholder="jesse@example.com" value="{{$userDetail->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">First name</label>
                                <input type="text" id="input-first-name" readonly class="form-control" placeholder="First name" value="Lucky">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Last name</label>
                                <input type="text" id="input-last-name" readonly class="form-control" placeholder="Last name" value="Jesse">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Role</label>
                                <input type="text" id="input-role" readonly class="form-control" placeholder=" {{ucfirst($userDetail->role->name)}}" value="">
{{--                                <label class="form-control-label" for="input-first-name">Role</label>--}}
{{--                                <select class="form-control d-block w-50" id="role" name="role">--}}
{{--                                    <option>Admin</option>--}}
{{--                                    <option>Editor</option>--}}
{{--                                    <option>Customer</option>--}}
{{--                                </select>--}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Cart Status</label>
                                <select class="form-control d-block w-50" id="role" name="cart_status">
                                    @foreach(['pending','shipping','received'] as $cart_status)
                                        @if($cart_status == $cartDetail->cart_status)
                                            <option value="{{$cart_status}}" selected>{{ucfirst($cart_status)}}</option>
                                        @else
                                            <option value="{{$cart_status}}">{{ucfirst($cart_status)}}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="row" style="visibility: {{$listOfProduct->isEmpty()?"hidden":"visible"}}">
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
                            <th scope="col" class="sort" data-sort="name">Name</th>

                            <th scope="col" class="sort" data-sort="budget">Price</th>
                            <th scope="col" class="sort" data-sort="status">Quantity</th>
                            <th scope="col" class="sort" data-sort="completion">Total</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($listOfProduct as $product)
                            <tr>
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
                                            <h3 class="name mb-0 text-sm"  data-toggle="popover-hover" data-img="{{$product->pictureURL}}">{{$product->name}}</h3>
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
                      <span class="font-weight-700">
                        <span class="status">{{$product->quantity}}</span>
                      </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="font-weight-700">
                        <i class="fas fa-dollar-sign"></i>
                        <span class="status">{{$product->quantity * $product->price}}</span>
                      </span>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('products.show',['product'=>$product->product_id])}}">View Product Detail</a>
{{--                                            @php--}}
{{--                                                dd($product)--}}
{{--                                            @endphp--}}

{{--                                                <input type="hidden" name="productID" value="{{$product->product_id}}">--}}
                                                <a class="dropdown-item" id="{{'product-'.$product->product_id}}" href="{{route('carts.removeproduct',['cart'=>$product->cart_id,'product'=>$product->product_id])}}" type="submit">Remove</a>

                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td class="name text-lg font-weight-bold">Total</td>
                                <td></td>
                                <td></td>

                                <td class="budget">

                                    <div class="d-flex align-items-center">
                                        <span class="font-weight-700">
                                         <i class="fas fa-dollar-sign"></i>
                                          <span class="status">                                        {{array_reduce($listOfProduct->toArray(),function ($carry,$x){
if ($carry != null){
return $carry + ($x->quantity * $x->price);
}
return ($x->quantity * $x->price);
})}}</span>
                                 </span>
                                    </div>
                                    {{--                                    {{strval($product->price)}}--}}
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                function calculateTotalCartPrice(listOfproduct){
                    return  listOfproduct.reduce((x1,x2)=>(x1.quantity*x1.price)+(x2.quantity*x2.price));
                }
            </script>
        </div>
    </div>

</div>
{{-- ListOfProduct Section--}}

