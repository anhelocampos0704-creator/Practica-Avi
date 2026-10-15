@props([
    'name',
    'label',
    'id' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'icon' => null,
    'iconPosition' => 'right',
    'required' => false,
])

@php
    $inputId = $id ?? $name;
    $inputClasses = 'w-full rounded-lg bg-surface-container-lowest font-body-md text-body-md text-on-surface shadow-sm focus:outline-none focus:ring-2 focus:ring-primary';
    $inputClasses .= $iconPosition === 'left' ? ' py-3 pl-11 pr-4' : ' px-3.5 py-3';
    $iconClasses = $iconPosition === 'left' ? 'left-3.5' : 'right-3';

    if ($errors->has($name)) {
        $inputClasses .= ' ring-2 ring-error';
    }
@endphp

<div class="flex flex-col gap-1.5">
    @if ($label)
        <label class="font-label-md text-label-md text-on-surface-variant" for="{{ $inputId }}">
            {{ $label }}
        </label>
    @endif

    <div class="relative flex items-center">
        <input
            id="{{ $inputId }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ old($name, $value) }}"
            @if ($placeholder)
                placeholder="{{ $placeholder }}"
            @endif
            @required($required)
            {{ $attributes->merge(['class' => $inputClasses]) }}
        >

        @if ($icon)
            <span class="material-symbols-outlined pointer-events-none absolute {{ $iconClasses }} text-[20px] text-on-surface-variant/50" aria-hidden="true">
                {{ $icon }}
            </span>
        @endif
    </div>

    @error($name)
        <p class="font-body-sm text-body-sm text-error" role="alert">{{ $message }}</p>
    @enderror
</div>
