<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileTable extends Component
{
    public $listOfUser;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($listOfUser)
    {
        $this->listOfUser = $listOfUser;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.profile-table');
    }
}
