<?php

namespace App\View\Components\Ui\Sidebar\Menu\Sub;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sub extends Component
{
    /**
     * Base Classes
     */
    protected string $baseClasses = 'flex flex-col gap-1 mx-3.5 px-2.5 py-0.5 border-l';

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

            return view('components.ui.sidebar.menu.sub._sub', compact('attributes'));
        };
    }
}
