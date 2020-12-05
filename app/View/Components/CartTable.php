<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CartTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $listOfCart;
    public function __construct($listOfCart)
    {
        $this->listOfCart = $listOfCart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cart-table');
    }
}
