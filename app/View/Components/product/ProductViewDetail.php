<?php

namespace App\View\Components\product;

use Illuminate\View\Component;

class ProductViewDetail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $productDetail;

    public function __construct($productDetail)
    {
        $this->productDetail = $productDetail;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product.product-view-detail');
    }
}
