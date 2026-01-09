<div {{ $attributes }}>
    <button class="group absolute top-0 right-0 mt-4 mr-4 grid size-5 cursor-pointer place-content-center">
        <i data-lucide="copy" class="size-4 text-white/50 group-hover:text-white"></i>
    </button>
    <pre class="flex overflow-auto [scrollbar-width:none]">
        <x-torchlight-code language="{{ $language }}" class="[&_.line-number]:mr-4 bg-transparent!" >@if ($view){!! $view !!}@else{{ $slot }}@endif</x-torchlight-code>
    </pre>
</div>
