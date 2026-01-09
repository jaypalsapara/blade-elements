<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    /**
     * Skeleton classes
     */
    protected string $skeletonClasses = 'leading-none font-medium select-none disabled:pointer-events-none disabled:opacity-50';

    /**
     * Body classes
     */
    protected array $bodyClasses = [
        'default' => 'text-foreground',
    ];

    /**
     * Size classes
     */
    protected array $sizeClasses = [
        'default' => 'text-sm',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $variant = 'default',
        public string $size = 'default',
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
                $this->skeletonClasses,
                $this->bodyClasses[$this->variant],
                $this->sizeClasses[$this->size]
            );

            return view('components.ui.label', compact('attributes'));
        };
    }
}
