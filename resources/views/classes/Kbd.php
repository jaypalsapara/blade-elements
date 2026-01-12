<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Kbd extends Component
{
    /**
     * Skeleton classes
     */
    protected string $skeletonClasses = 'inline-flex select-none font-mono items-center justify-center gap-0.5 rounded-radius border border-transparent leading-none whitespace-nowrap transition-colors disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*=size-])]:size-4';

    /**
     * Body classes
     */
    protected array $bodyClasses = [
        'default' => 'text-primary-foreground bg-primary',
        'secondary' => 'bg-muted text-muted-foreground',
        'outline' => 'border-border text-muted-foreground',
    ];

    /**
     * Size classes
     */
    protected array $sizeClasses = [
        'sm' => 'h-6 px-2 has-[svg]:px-1.5 text-sm [&_svg:not([class*=size-])]:size-3',
        'default' => 'h-8 px-3 has-[svg]:px-2',
        'icon-sm' => 'size-6 [&_svg:not([class*=size-])]:size-3',
        'icon' => 'size-8',
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

            return view('components.ui.kbd', compact('attributes'));
        };
    }
}
