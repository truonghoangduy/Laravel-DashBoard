<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tableFilter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     *
     *
     */

    public $keyword="";
    public $dateFrom="";
    public $dateTo ="";
    public $filterOption;
    public function __construct()
    {
        //
        $this->filterOption = session()->get("filterOption");
        if ($this->filterOption != null){
//            dd($this->filterOption);

        }

    }



    public function getDateBetween(){
        return $this->dateFrom."x".$this->dateTo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.table-filter');
    }
}
