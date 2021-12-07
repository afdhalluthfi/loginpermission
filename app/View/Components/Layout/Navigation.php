<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class Navigation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $role=Role::get();
        return view('components.layout.navigation',compact('role'));
    }
}
