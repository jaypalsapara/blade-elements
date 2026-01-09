<?php

namespace App\View\Components\Ui\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Base Classes
     */
    protected string $baseClasses = 'flex h-full flex-col w-3xs max-h-svh fixed left-0 top-0 z-10 -translate-x-full md:translate-x-0 will-change-transform';

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

            return view('components.ui.sidebar._sidebar', compact('attributes'));
        };
    }
}
