@props([
    "view" => null,
    "language" => 'php'
])

@php
    if (! empty("view")) {
        $viewPath = resource_path("views/" . str_replace(".", "/", $view) . ".blade.php");
        $view = file_exists($viewPath) ? trim(file_get_contents($viewPath)) : null;
    }
@endphp

<div class="bg-zinc-800 px-5 py-6 relative rounded-radius border border-zinc-300">
    <button class="size-5 grid place-content-center cursor-pointer absolute right-0 top-0 mt-4 mr-4 group">
        <i data-lucide="copy" class="text-white/50 size-4 group-hover:text-white"></i>  
    </button>
    <pre class="flex overflow-auto [scrollbar-width:none]">
        <x-torchlight-code language="{{ $language }}" class="[&_.line-number]:mr-4 bg-transparent!" >@if ($view){!! $view !!}@else{{ $slot }}@endif</x-torchlight-code>
    </pre>
</div>
