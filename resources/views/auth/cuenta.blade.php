@extends('layouts.app')

@section('title', 'Mi Cuenta & Rutina | AVIL Skincare')

@section('content')
    <header class="fixed inset-x-0 top-0 z-50 bg-surface/85 pt-safe shadow-[0_1px_8px_rgba(46,36,31,0.04)] backdrop-blur-xl">
        <div class="mx-auto flex h-16 max-w-xl items-center justify-between px-margin">
            <a class="flex items-center gap-space-sm" href="#inicio" aria-label="AVIL Skincare, inicio">
                <img class="h-8 w-auto object-contain" src="{{ asset('images/avil-logo.jpg') }}" alt="AVIL Skincare">
                <span class="font-headline-sm font-serif text-headline-sm tracking-tight">AVIL</span>
            </a>
            <a
                class="flex h-11 w-11 items-center justify-center rounded-full p-0.5 transition-colors hover:bg-surface-container-low"
                href="#cuenta"
                aria-label="Mi cuenta"
            >
                <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('images/profile-menu-avatar.jpg') }}" alt="">
            </a>
        </div>
    </header>

    <main class="mx-auto flex min-h-screen w-full max-w-xl flex-col bg-surface pb-24 pt-16" id="inicio">
        <div class="flex flex-col gap-space-md px-margin pb-space-xl pt-space-md">
            <section class="flex flex-col items-center gap-space-sm text-center" id="cuenta" aria-labelledby="account-heading">
                <div class="relative">
                    <div class="h-24 w-24 overflow-hidden rounded-full bg-gradient-to-tr from-primary via-surface-container-high to-secondary p-1 shadow-md">
                        <img
                            class="h-full w-full rounded-full bg-surface-container-low object-cover"
                            src="{{ asset('images/elena-romero.jpg') }}"
                            alt="Elena Romero"
                        >
                    </div>
                    <span class="absolute bottom-0 right-0 flex h-8 w-8 items-center justify-center rounded-full bg-secondary text-on-secondary shadow-sm">
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">spa</span>
                    </span>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <h1 class="font-headline-lg-mobile font-serif text-headline-lg-mobile text-on-surface" id="account-heading">
                        Mi Cuenta &amp; Rutina
                    </h1>
                    <p class="font-body-md text-body-md text-on-surface-variant">Tu bienestar, al ritmo de la naturaleza.</p>
                    <span class="mt-1 inline-flex items-center gap-1.5 rounded-full bg-secondary-container px-3 py-1 text-on-secondary-fixed">
                        <span class="material-symbols-outlined text-[14px] text-secondary" aria-hidden="true">verified</span>
                        <span class="font-label-sm text-label-sm uppercase tracking-wider">Miembro Botánico Oro</span>
                    </span>
                </div>
            </section>

            <form class="flex flex-col gap-space-md" action="{{ route('login') }}" method="POST">
                @csrf

                <section class="flex flex-col gap-space-md rounded-xl bg-surface-container-low p-space-md shadow-sm" aria-labelledby="account-details-heading">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px] text-primary" aria-hidden="true">person</span>
                        <h2 class="font-headline-sm font-serif text-headline-sm text-on-surface" id="account-details-heading">
                            Datos de mi cuenta
                        </h2>
                    </div>

                    <div class="flex items-center gap-space-sm">
                        <img
                            class="h-12 w-12 rounded-full object-cover"
                            src="{{ asset('images/elena-romero.jpg') }}"
                            alt=""
                        >
                        <div class="flex flex-col">
                            <span class="font-title-sm text-title-sm text-on-surface">Elena Romero</span>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Miembro desde 2022</span>
                        </div>
                    </div>

                    <x-form-input
                        id="email"
                        name="email"
                        label="Correo electrónico"
                        type="email"
                        :value="old('email', 'elena.romero@estudioavil.com')"
                        autocomplete="email"
                        required
                        icon="mail"
                    />

                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                        Tus datos se mantienen privados y solo se utilizan para gestionar tu cuenta y tus rituales.
                    </p>
                </section>

                <section class="flex flex-col gap-space-md rounded-xl bg-surface-container-low p-space-md shadow-sm" id="rutina" aria-labelledby="routine-heading">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px] text-secondary" aria-hidden="true">routine</span>
                        <div class="flex flex-col">
                            <h2 class="font-headline-sm font-serif text-headline-sm text-on-surface" id="routine-heading">
                                Mi rutina diaria
                            </h2>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Recordatorios para cuidar tu piel con calma.</p>
                        </div>
                    </div>

                    @foreach ([
                        ['id' => 'morningRoutine', 'label' => 'Ritual de mañana', 'description' => 'Limpieza, hidratación y protección · 08:00', 'icon' => 'light_mode', 'checked' => true],
                        ['id' => 'eveningRoutine', 'label' => 'Ritual de noche', 'description' => 'Doble limpieza y cuidado regenerador · 21:30', 'icon' => 'dark_mode', 'checked' => true],
                    ] as $routine)
                        <div class="flex items-center justify-between gap-3 rounded-lg bg-surface-container-lowest p-3.5 shadow-sm">
                            <div class="flex items-center gap-space-sm">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary">
                                    <span class="material-symbols-outlined text-[20px]" aria-hidden="true">{{ $routine['icon'] }}</span>
                                </span>
                                <label class="flex flex-col" for="{{ $routine['id'] }}">
                                    <span class="font-title-sm text-title-sm text-on-surface">{{ $routine['label'] }}</span>
                                    <span class="font-body-sm text-body-sm text-on-surface-variant">{{ $routine['description'] }}</span>
                                </label>
                            </div>
                            <input
                                class="peer sr-only"
                                id="{{ $routine['id'] }}"
                                name="{{ $routine['id'] }}"
                                type="checkbox"
                                value="1"
                                @checked(old($routine['id'], $routine['checked']))
                            >
                            <label
                                class="relative inline-flex h-6 w-12 shrink-0 cursor-pointer items-center rounded-full bg-surface-variant shadow-inner after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-surface-container-lowest after:transition-all peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary peer-checked:bg-primary peer-checked:after:translate-x-6 peer-checked:after:border-surface-container-lowest"
                                for="{{ $routine['id'] }}"
                                aria-label="{{ $routine['label'] }}"
                            ></label>
                        </div>
                    @endforeach
                </section>

                <aside class="flex items-start gap-3 rounded-xl bg-secondary-container p-space-md text-on-secondary-fixed shadow-sm">
                    <span class="material-symbols-outlined mt-0.5 shrink-0 text-[24px] text-secondary" aria-hidden="true">eco</span>
                    <div class="flex flex-col gap-1">
                        <p class="font-headline-sm font-serif text-headline-sm italic">
                            «La constancia transforma cada cuidado en un ritual.»
                        </p>
                        <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">
                            124 días de cuidado consciente
                        </span>
                    </div>
                </aside>

                <div class="flex flex-col gap-space-sm">
                    <x-button type="submit" icon="save">Guardar cambios</x-button>
                    <a
                        class="flex w-full items-center justify-center rounded-lg bg-surface-container px-space-md py-3 text-center font-title-sm text-title-sm text-on-surface shadow-sm transition-colors hover:bg-surface-container-high"
                        href="{{ route('editarperfil') }}"
                    >
                        Editar perfil completo
                    </a>
                </div>
            </form>
        </div>
    </main>

    <nav class="fixed inset-x-0 bottom-0 z-50 bg-surface/90 pb-safe shadow-[0_-2px_12px_rgba(46,36,31,0.05)] backdrop-blur-xl" aria-label="Navegación principal">
        <div class="mx-auto flex h-16 max-w-xl items-center justify-around px-space-xs">
            <a class="group flex min-w-[48px] flex-col items-center justify-center py-1 text-on-surface-variant transition-colors hover:text-on-surface" href="#inicio">
                <span class="nav-pill flex items-center justify-center rounded-full px-3 py-1 transition-colors">
                    <span class="material-symbols-outlined text-[22px]" aria-hidden="true">home</span>
                </span>
                <span class="mt-0.5 font-label-sm text-label-sm tracking-wide">Inicio</span>
            </a>
            <a class="group flex min-w-[48px] flex-col items-center justify-center py-1 text-on-surface-variant transition-colors hover:text-on-surface" href="#rutina">
                <span class="nav-pill flex items-center justify-center rounded-full px-3 py-1 transition-colors">
                    <span class="material-symbols-outlined text-[22px]" aria-hidden="true">spa</span>
                </span>
                <span class="mt-0.5 font-label-sm text-label-sm tracking-wide">Rutina</span>
            </a>
            <a class="group flex min-w-[48px] flex-col items-center justify-center py-1 text-primary transition-colors" href="#cuenta" aria-current="page">
                <span class="nav-pill flex items-center justify-center rounded-full bg-primary/10 px-3 py-1 text-primary transition-colors">
                    <span class="material-symbols-outlined text-[22px]" aria-hidden="true">person</span>
                </span>
                <span class="mt-0.5 font-label-sm text-label-sm tracking-wide">Cuenta</span>
            </a>
        </div>
    </nav>
@endsection
