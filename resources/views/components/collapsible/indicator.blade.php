<div {{ $attributes }}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''"></i>
    @endif
</div>