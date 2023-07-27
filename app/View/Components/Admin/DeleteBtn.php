<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class DeleteBtn extends Component
{
    public $action;
    public $style;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $style = null)
    {
        $this->action = $action;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.delete-btn');
    }
}
