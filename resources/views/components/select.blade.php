@props([
    "variant" => "default",
    "size" => "default",
])

@php
    $skeletonClasses = "focus-within:border-ring focus-visible:ring-ring/40 inline-flex w-full cursor-pointer appearance-none items-center justify-center gap-1.5 rounded-md border border-transparent bg-[url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGNsYXNzPSJsdWNpZGUgbHVjaWRlLWNoZXZyb24tZG93bi1pY29uIGx1Y2lkZS1jaGV2cm9uLWRvd24iPjxwYXRoIGQ9Im02IDkgNiA2IDYtNiIvPjwvc3ZnPg==)] bg-size-(--text-sm) bg-position-[right_0.75rem_center] bg-no-repeat text-sm leading-none whitespace-nowrap transition-colors outline-none *:text-sm focus-visible:ring-2 disabled:pointer-events-none disabled:opacity-50";

    $bodyClasses = match ($variant) {
        "default" => "border-border shadow-xs",
    };

    $sizeClasses = match ($size) {
        "sm" => "h-8 px-3",
        "default" => "h-9 px-3",
        "lg" => "h-10 px-3",
    };
@endphp

<select {{ $attributes->twMerge($skeletonClasses, $bodyClasses, $sizeClasses) }}>
    {{ $slot }}
</select>
