<div class="col-xl-8 order-xl-1">
    <div class="card">
        <form method="POST" enctype='multipart/form-data' action="{{route("products.store")}}">
            @csrf
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-7">
                        <h3 class="mb-0">Add Product </h3>
                    </div>
                    <div class="col-5 text-right">
                        {{-- <button type="button" class="btn btn-danger">Delete</button>--}}

                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Product information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username"></label>
                                <input type="text" name="name" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email address</label>
                                <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label" for="input-product-price">Price</label>
                            <div class="input-group">
                                <input type="text" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Product Description</h6>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Description,</label>
                        <textarea name="description" rows="4" class="form-control" placeholder="A few words about you ..." data-value="A few words about you ..."></textarea>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Im -->
                <h6 class="heading-small text-muted mb-4">Product Image</h6>
                <div class="pl-lg-4 custom-file">
                    <input type="file" name="product-upload-image" id="avatar" src="{{}}">
                </div>

            </div>
        </form>

    </div>


</div>


