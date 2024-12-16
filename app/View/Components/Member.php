<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Member extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $member;

    public function __construct($member)
    {
        $this->member = $member;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.member');
    }
}
