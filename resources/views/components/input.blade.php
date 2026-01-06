@props([
    "type" => "text",
    "size" => "default",
    "variant" => "default",
])

@php
    $skeletonClasses = "focus-visible:ring-ring/40 focus-within:border-ring inline-flex w-full gap-1.5 rounded-md border border-transparent text-base whitespace-nowrap transition-colors outline-none file:inline-flex file:bg-transparent file:align-middle file:leading-none file:font-medium file:text-foreground focus-visible:ring-2 disabled:pointer-events-none disabled:opacity-50 md:text-sm file:[&+text]:align-middle";

    $bodyClasses = match ($variant) {
        "default" => "border-border shadow-xs",
    };

    $sizeClasses = match ($size) {
        "sm" => "h-8 px-3 file:py-2",
        "default" => "h-9 px-3 file:py-2.5",
        "lg" => "h-10 px-3 file:py-3",
    };
@endphp

<input
    {{ $attributes->twMerge($skeletonClasses, $bodyClasses, $sizeClasses)->merge(["type" => $type]) }}
/>
