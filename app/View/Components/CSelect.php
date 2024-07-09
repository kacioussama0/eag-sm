<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CSelect extends Component
{
    public $label;
    public $name;
    public $options;
    public $value;


    /**
     * Create a new component instance.
     */
    public function __construct($label,$name,$options = [],$value='')
    {
        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.c-select');
    }
}
