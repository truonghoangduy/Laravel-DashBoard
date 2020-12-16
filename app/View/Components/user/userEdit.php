<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class userEdit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     *
     */

    public $userDetail;
    public function __construct($userDetail)
    {
        $this->userDetail = $userDetail;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user.user-edit');
    }
}
