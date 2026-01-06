@props([
    "size" => "default",
    "variant" => "default",
])

@php
    $skeletonClasses = "leading-none font-medium select-none disabled:pointer-events-none disabled:opacity-50";

    $bodyClasses = match ($variant) {
        "default" => "text-foreground",
    };

    $sizeClasses = match ($size) {
        "default" => "text-sm",
    };
@endphp

<label {{ $attributes->twMerge($skeletonClasses, $bodyClasses, $sizeClasses) }}>
    {{ $slot }}
</label>
