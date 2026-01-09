<?php

namespace App\View\Components\Ui\Collapsible;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Collapsible extends Component
{
    /**
     * Base Classes
     */
    protected string $baseClasses = 'contents';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $open = false
    ) {
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

            return view('components.ui.collapsible._collapsible', compact('attributes'));
        };
    }
}
