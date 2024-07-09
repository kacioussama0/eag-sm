<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CTable extends Component
{
    public $thead;
    public $tbody;

    public function __construct($thead,$tbody = [])
    {
        $this->thead = $thead;
        $this->tbody = $tbody;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.c-table');
    }
}
