@props([
    "size" => "default",
    "variant" => "default",
])

@php
    $skeletonClasses = "appearance-none rounded-sm border border-transparent checked:after:content-['✓'] flex justify-center items-center disabled:pointer-events-none disabled:opacity-50";

    $bodyClasses = match ($variant) {
        "default" => "border-border shadow-xs checked:bg-primary checked:text-primary-foreground",
        "secondary" => "bg-secondary",
        "outline" => "border-border shadow-xs",
        "ghost" => "bg-transparent",
    };

    $sizeClasses = match ($size) {
        "sm" => "size-3 after:text-[0.5rem]",
        "default" => "size-4 after:text-xs",
        "lg" => "size-5 after:text-base",
    };
@endphp

<input
    type="checkbox"
    {{ $attributes->twMerge($skeletonClasses, $bodyClasses, $sizeClasses) }}
/>
