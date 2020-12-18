<form method="POST" action="{{route("carts.filter")}}">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title text-lg" id="exampleModalLabel">Filter Option</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div>
            <!-- Order your soul. Reduce your wants. - Augustine -->
            <div class="form-group">
                <label for="example-text-input" class="form-control-label float-left">ID</label>
                <input name="keyword" class="form-control" type="text" id="example-text-input">
            </div>
            {{--    Role Select    --}}

            <div class="form-group">
                <label for="exampleFormControlSelect1" class="form-control-label float-left">Cart Status</label>
                <select class="form-control w-100" id="role" name="cart_status">
                    @foreach(['pending','shipping','received','none'] as $key=>$cart_status)
                        @if($filterOption['selectedOption'] == $cart_status)
                            <option value="{{$cart_status}}" selected>{{ucfirst($cart_status)}}</option>
                        @else
                            <option value="{{$cart_status}}">{{ucfirst($cart_status)}}</option>

                        @endif

                    @endforeach

                </select>
            </div>

            {{--    Day Picker--}}
            <div class="input-daterange datepicker row align-items-center">
                <div class="col">
                    <label class="form-control-label float-left">From</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input name="dateFrom" id="dateFrom" class="form-control" placeholder="Start date" type="text" value="{{$filterOption['dateFrom']}}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label class="form-control-label float-left">To</label>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input name="dateTo" class="form-control" placeholder="End date" type="text" value="{{$filterOption['dateTo']}}">
                        </div>
                    </div>
                </div>
            </div>

{{--            Restart Filter--}}
            <div class="form-group">
                    <a type="button" class="btn btn-primary btn-lg float-left" href="{{route("carts.index")}}">
                        <i class="fas fa-redo"></i>
                        Reload Filter
                    </a>

            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Filter</button>
    </div>
</form>
