@props([
    'type' => 'button',
    'variant' => 'primary',
    'icon' => null,
])

@php
    $variantClasses = match ($variant) {
        'secondary' => 'w-full rounded-lg bg-surface-container px-space-md py-3 font-title-sm text-title-sm text-on-surface shadow-sm hover:bg-surface-container-high',
        'subtle' => 'w-auto rounded-full bg-primary/10 px-3 py-1.5 font-title-sm text-title-sm text-primary hover:bg-primary hover:text-on-primary',
        'danger' => 'w-full py-2.5 font-label-md text-label-md text-on-surface-variant underline underline-offset-4 decoration-outline-variant hover:text-error',
        default => 'w-full rounded-lg bg-primary px-space-md py-3.5 font-title-md text-title-md text-on-primary shadow-md hover:bg-primary-container active:scale-[0.99]',
    };
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->class([
        'flex items-center justify-center gap-2 text-center transition-all',
        $variantClasses,
    ]) }}
>
    @if ($icon)
        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">{{ $icon }}</span>
    @endif

    {{ $slot }}
</button>
