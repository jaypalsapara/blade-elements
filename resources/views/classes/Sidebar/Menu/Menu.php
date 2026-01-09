<?php

namespace App\View\Components\Ui\Sidebar\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Base Classes
     */
    protected string $baseClasses = 'flex w-full flex-col gap-1';

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return function (array $data) {
            $attributes = $data['attributes']->twMerge(
                $this->baseClasses,
            );

            return view('components.ui.sidebar.menu._menu', compact('attributes'));
        };
    }
}
