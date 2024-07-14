<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CTable extends Component
{
    public $head;
    public $body;
    public $title = "";
    public $hasAction = false;
    public $edit = "";
    public $destroy = "";
    public $keys = [];


    public function __construct($title,$keys,$head,$body = [],$hasAction = false,$edit = "",$destroy = "")
    {
        $this->title = $title;
        $this->head = $head;
        $this->body = $body;
        $this->hasAction = $hasAction;
        $this->edit = $edit;
        $this->destroy = $destroy;
        $this->keys = $keys;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.c-table');
    }
}
