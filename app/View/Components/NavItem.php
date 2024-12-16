<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $active;
    public $href;

    public function __construct($href, $active = false)
    {
        $this->active = $active;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-item');
    }
}
