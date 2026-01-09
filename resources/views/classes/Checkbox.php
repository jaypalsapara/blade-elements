<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    /**
     * Skeleton classes
     */
    protected string $skeletonClasses = "appearance-none rounded-sm border border-transparent checked:after:content-['✓'] flex justify-center items-center disabled:pointer-events-none disabled:opacity-50";

    /**
     * Body classes
     */
    protected array $bodyClasses = [
        'default' => 'border-border shadow-xs checked:bg-primary checked:text-primary-foreground',
        'secondary' => 'bg-secondary',
        'outline' => 'border-border shadow-xs',
        'ghost' => 'bg-transparent',
    ];

    /**
     * Size classes
     */
    protected array $sizeClasses = [
        'sm' => 'size-3 after:text-[0.5rem]',
        'default' => 'size-4 after:text-xs',
        'lg' => 'size-5 after:text-base',
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

            return view('components.ui.checkbox', compact('attributes'));
        };
    }
}
