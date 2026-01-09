<?php

namespace App\View\Components\Ui\Sidebar\Group;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    /**
     * Base Classes
     */
    protected string $baseClasses = 'flex h-8 items-center px-2 text-xs text-muted-foreground';

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

            return view('components.ui.sidebar.group.label', compact('attributes'));
        };
    }
}
