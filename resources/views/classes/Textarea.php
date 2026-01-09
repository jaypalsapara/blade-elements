<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Skeleton classes
     */
    protected string $skeletonClasses = 'w-full resize-y rounded-radius border border-transparent text-base transition-colors outline-none focus-within:border-ring focus-visible:ring-2 focus-visible:ring-ring/40 disabled:pointer-events-none disabled:opacity-50 md:text-sm';

    /**
     * Body classes
     */
    protected array $bodyClasses = [
        'default' => 'border-border shadow-xs',
    ];

    /**
     * Size classes
     */
    protected array $sizeClasses = [
        'sm' => 'h-24 p-3',
        'default' => 'h-36 p-3',
        'lg' => 'h-48 p-3',
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

            return view('components.ui.textarea', compact('attributes'));
        };
    }
}
