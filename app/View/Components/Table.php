<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{

    public $listOfProduct;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($listOfProduct)
    {
        $this->listOfProduct = $listOfProduct;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.table');
    }
}
