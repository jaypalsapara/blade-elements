@props([
    "type" => "text",
    "size" => "default",
    "variant" => "default",
])

@php
    $skeletonClasses = "w-full resize-y rounded-md border border-transparent text-base transition-colors outline-none focus-within:border-ring focus-visible:ring-2 focus-visible:ring-ring/40 disabled:pointer-events-none disabled:opacity-50 md:text-sm";

    $bodyClasses = match ($variant) {
        "default" => "border-border shadow-xs",
    };

    $sizeClasses = match ($size) {
        "sm" => "h-24 p-3",
        "default" => "h-36 p-3",
        "lg" => "h-48 p-3",
    };
@endphp

<textarea {{ $attributes->twMerge($skeletonClasses, $bodyClasses, $sizeClasses) }}>{{ $slot }}</textarea>
