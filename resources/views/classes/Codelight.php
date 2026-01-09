<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Codelight extends Component
{
    /**
     * Base Classes
     */
    protected string $baseClasses = 'relative rounded-radius border border-zinc-300 bg-zinc-800 px-5 py-6';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $language = 'php',
        public ?string $view = null
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $view = null;

        if (! empty($this->view)) {
            $path = resource_path('views/'.str_replace('.', '/', $this->view).'.blade.php');
            $view = file_exists($path) ? trim(file_get_contents($path)) : null;
        }

        return function (array $data) use ($view) {
            $attributes = $data['attributes']->twMerge(
                $this->baseClasses,
            );

            return view('components.ui.codelight', compact('attributes', 'view'));
        };
    }
}
