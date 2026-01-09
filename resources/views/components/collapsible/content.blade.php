@aware(["open" => false])
<div
    @if (! $open)
        x-cloak
    @endif
    x-show="open"
    {{ $attributes }}
>
    {{ $slot }}
</div>
