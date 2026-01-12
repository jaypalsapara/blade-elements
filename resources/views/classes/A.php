<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class A extends Component
{
    /**
     * Skeleton classes
     */
    protected string $skeletonClasses = 'inline-flex cursor-pointer items-center font-medium text-[0.9375rem] leading-none justify-center gap-1 whitespace-nowrap transition-colors disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*=size-])]:size-3';

    /**
     * Body classes
     */
    protected array $bodyClasses = [
        'default' => 'text-primary underline underline-offset-2',
        'simple' => 'text-primary',
    ];

    /**
     * Size classes
     */
    protected array $sizeClasses = [
        'sm' => '',
        'default' => '',
        'lg' => '',
        'icon-sm' => '',
        'icon' => '',
        'icon-lg' => '',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $variant = 'default',
        public string $size = 'default',
        public string $href = ''
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

            return view('components.ui.a', compact('attributes'));
        };
    }
}
