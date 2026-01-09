<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Skeleton classes
     */
    protected string $skeletonClasses = 'inline-flex cursor-pointer items-center justify-center gap-2 rounded-radius border border-transparent text-sm leading-none font-medium whitespace-nowrap transition-colors disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*=size-])]:size-4';

    /**
     * Body classes
     */
    protected array $bodyClasses = [
        'default' => 'text-primary-foreground bg-primary shadow-xs hover:bg-primary/95',
        'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/50',
        'outline' => 'border-border shadow-xs hover:bg-secondary/70',
        'ghost' => 'bg-transparent hover:bg-secondary',
        'destructive' => 'bg-destructive text-destructive-foreground shadow-xs hover:bg-destructive/90',
        'link' => 'bg-transparent underline-offset-3 hover:underline',
    ];

    /**
     * Size classes
     */
    protected array $sizeClasses = [
        'sm' => 'h-8 gap-1.5 px-3 has-[svg]:px-2.5',
        'default' => 'h-9 px-4 has-[svg]:px-3',
        'lg' => 'h-10 px-6 has-[svg]:px-3.5',
        'icon-sm' => 'size-8',
        'icon' => 'size-9',
        'icon-lg' => 'size-10',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $variant = 'default',
        public string $size = 'default',
        public string $type = 'button'
    ) {}

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

            return view('components.ui.button', compact('attributes'));
        };
    }
}
