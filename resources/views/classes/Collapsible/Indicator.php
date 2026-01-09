<?php

namespace App\View\Components\Ui\Collapsible;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Indicator extends Component
{
    /**
     * Base Classes
     */
    protected string $baseClasses = 'ms-auto';

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

            return view('components.ui.collapsible.indicator', compact('attributes'));
        };
    }
}
