<?php

namespace App\View\Components\Admin\Sidebar;

use Illuminate\View\Component;

class MenuTitle extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $menu,
    ){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.sidebar.menu-title');
    }
}
