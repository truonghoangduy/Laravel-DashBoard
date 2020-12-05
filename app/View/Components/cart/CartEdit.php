<?php

namespace App\View\Components\cart;

use Illuminate\View\Component;

class CartEdit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $cartDetail;
    public $cartProductList;
    public $userDetail;
    public $listOfProduct;
    public function __construct($cartDetail)
    {
        $this->listOfProduct = $cartDetail['listOfProduct'];
        $this->userDetail=$cartDetail['userDetail'];
        $this->cartDetail = $cartDetail['cart'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cart.cart-edit');
    }
}
