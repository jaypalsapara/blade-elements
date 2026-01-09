<div
    @if ($open)
        x-data="{ open: true }"
    @else
        x-data="{ open: false }"
    @endif
    {{ $attributes }}
>
    {{ $slot }}
</div>
