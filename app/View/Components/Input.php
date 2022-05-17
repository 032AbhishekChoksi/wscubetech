<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $label;
    public $demo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$name,$label,$demo = 0)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->demo = $demo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
