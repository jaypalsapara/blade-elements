<div x-data="{ open: window.innerWidth >= 768 }" {{ $attributes }}>
    <div class="h-0 md:w-3xs" :class="{'md:w-3xs':open}"></div>
    {{ $slot }}
</div>