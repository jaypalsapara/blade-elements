<aside
    {{ $attributes }}
    :class="{
        '-translate-x-full':!open,
        'md:translate-x-0':open
        }"
    @click.outside="(window.innerWidth < 768 && !$event.target.closest('[data-trigger=sidebar]')) ? open = false : ''"
>
    {{ $slot }}
</aside>
