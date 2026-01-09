<?php

namespace App\View\Components\Ui\Sidebar\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Base Classes
     */
    protected string $baseClasses = "flex h-8 w-full items-center gap-2 rounded-radius p-2 hover:bg-muted data-[active='true']:font-medium data-[active='true']:bg-muted [&_svg]:size-4";

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

            return view('components.ui.sidebar.menu.button', compact('attributes'));
        };
    }
}
