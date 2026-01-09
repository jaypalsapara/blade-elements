<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
{
    /**
     * Skeleton classes
     */
    protected string $skeletonClasses = 'checked:after:content flex appearance-none items-center justify-center rounded-full border border-transparent after:rounded-full disabled:pointer-events-none disabled:opacity-50';

    /**
     * Body classes
     */
    protected array $bodyClasses = [
        'default' => 'border-border shadow-xs checked:bg-primary checked:after:bg-primary-foreground',
        'secondary' => 'bg-secondary checked:after:bg-primary',
        'outline' => 'border-border shadow-xs checked:after:bg-primary',
        'ghost' => 'bg-transparent checked:after:bg-primary',
    ];

    /**
     * Size classes
     */
    protected array $sizeClasses = [
        'sm' => 'size-3 after:size-1',
        'default' => 'size-4 after:size-1.5',
        'lg' => 'size-5 after:size-2',
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

            return view('components.ui.radio', compact('attributes'));
        };
    }
}
