@props([
    "size" => "default",
    "variant" => "default",
])

@php
    $skeletonClasses = "checked:after:content flex appearance-none items-center justify-center rounded-full border border-transparent after:rounded-full disabled:pointer-events-none disabled:opacity-50";

    $bodyClasses = match ($variant) {
        "default" => "border-border shadow-xs checked:bg-primary checked:after:bg-primary-foreground",
        "secondary" => "bg-secondary checked:after:bg-primary",
        "outline" => "border-border shadow-xs checked:after:bg-primary",
        "ghost" => "bg-transparent checked:after:bg-primary",
    };

    $sizeClasses = match ($size) {
        "sm" => "size-3 after:size-1",
        "default" => "size-4 after:size-1.5",
        "lg" => "size-5 after:size-2",
    };
@endphp

<input
    type="radio"
    {{ $attributes->twMerge($skeletonClasses, $bodyClasses, $sizeClasses) }}
/>
