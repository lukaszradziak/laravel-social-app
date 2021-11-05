<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Left menu visibility.
     *
     * @var string
     */
    public $leftMenu;

    /**
     * Create the component instance.
     *
     * @param  boolean  $leftMenu
     * @return void
     */
    public function __construct($leftMenu = false)
    {
        $this->leftMenu = $leftMenu;
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
