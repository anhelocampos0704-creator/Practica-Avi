@extends('layouts.app')

@section('title', 'Iniciar Sesión | AVIL Skincare')

@section('page-assets')
    @vite(['resources/css/stitch/login.css', 'resources/js/stitch/login.js'])
@endsection

@section('content')
    <header class="fixed inset-x-0 top-0 z-50 bg-surface/85 pt-safe shadow-[0_1px_8px_rgba(46,36,31,0.04)] backdrop-blur-xl">
        <div class="flex h-16 items-center justify-between px-margin">
            <a class="flex items-center gap-space-sm" href="{{ url('/') }}" aria-label="AVIL Skincare, inicio">
                <img class="h-8 w-auto object-contain" src="{{ asset('images/avil-logo.jpg') }}" alt="AVIL Skincare">
                <span class="font-headline-sm font-serif text-headline-sm tracking-tight">AVIL</span>
            </a>
            <a
                class="flex h-11 w-11 items-center justify-center rounded-full p-0.5 transition-colors hover:bg-surface-container-low"
                href="{{ route('cuenta') }}"
                aria-label="Mi cuenta"
            >
                <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('images/profile-menu-avatar.jpg') }}" alt="">
            </a>
        </div>
    </header>

    <main class="relative flex min-h-screen w-full flex-col bg-surface pb-24 pt-16">
        <div class="flex w-full flex-col">
            <div class="flex flex-col gap-space-lg px-margin pb-space-xl pt-space-md">
                <section class="flex flex-col items-start gap-space-sm pt-space-xs" aria-labelledby="login-heading">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-container/50 px-3 py-1 text-secondary">
                        <span class="material-symbols-outlined text-[16px]" aria-hidden="true">eco</span>
                        <span class="font-label-sm text-label-sm uppercase tracking-wider">Ritual Diario AVIL</span>
                    </span>
                    <h1 class="font-headline-lg-mobile font-headline-lg leading-tight text-on-surface" id="login-heading">
                        Bienvenida de vuelta a tu espacio botánico.
                    </h1>
                    <p class="max-w-sm font-body-md text-body-md text-on-surface-variant">
                        Accede a tus diagnósticos dérmicos, rutinas personalizadas y seguimiento de pedidos botánicos.
                    </p>
                </section>

                <div class="flex flex-col gap-space-sm" aria-label="Opciones de acceso social">
                    <button
                        class="flex w-full cursor-not-allowed items-center justify-center gap-3 rounded-lg bg-surface-container-lowest px-space-md py-3 text-on-surface opacity-60 shadow-sm"
                        type="button"
                        disabled
                    >
                        <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"></path>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"></path>
                        </svg>
                        <span class="font-title-sm text-title-sm font-medium">Continuar con Google (próximamente)</span>
                    </button>
                    <button
                        class="flex w-full cursor-not-allowed items-center justify-center gap-3 rounded-lg bg-surface-container-lowest px-space-md py-3 text-on-surface opacity-60 shadow-sm"
                        type="button"
                        disabled
                    >
                        <svg class="h-5 w-5 fill-current text-on-surface" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.37c.63-.76 1.05-1.82.93-2.87-.91.04-2 .6-2.64 1.36-.57.65-1.07 1.73-.93 2.76 1.01.08 2.02-.49 2.64-1.25z"></path>
                        </svg>
                        <span class="font-title-sm text-title-sm font-medium">Continuar con Apple (próximamente)</span>
                    </button>
                </div>

                <div class="relative my-1 flex items-center justify-center">
                    <div class="h-px w-full bg-surface-container-highest"></div>
                    <span class="absolute bg-surface px-3 font-label-sm text-[10px] uppercase tracking-widest text-on-surface-variant">
                        O con tu correo clínico
                    </span>
                </div>

                <form class="flex flex-col gap-space-md" action="{{ route('login.store') }}" method="POST">
                    @csrf

                    <x-form-input
                        id="email-field"
                        name="email"
                        label="Correo Electrónico"
                        type="email"
                        :value="old('email')"
                        placeholder="ej. elena.romero@estudioavil.com"
                        autocomplete="email"
                        icon="alternate_email"
                        icon-position="left"
                        required
                    />

                    <div class="flex flex-col gap-1.5">
                        <label class="font-label-md font-medium text-label-md text-on-surface-variant" for="password-field">
                            Contraseña Botánica
                        </label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-3.5 text-[20px] text-on-surface-variant/70" aria-hidden="true">lock</span>
                            <input
                                class="w-full rounded-lg bg-surface-container-low py-3 pl-11 pr-11 font-body-md text-body-md tracking-widest text-on-surface shadow-sm transition-all placeholder:text-on-surface-variant/50 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/20"
                                id="password-field"
                                name="password"
                                type="password"
                                placeholder="••••••••••••"
                                autocomplete="current-password"
                                required
                            >
                            <button
                                class="absolute right-3 rounded-full p-1 text-on-surface-variant/70 transition-colors hover:bg-surface-container hover:text-on-surface"
                                id="toggle-password-btn"
                                type="button"
                                aria-label="Alternar visibilidad de contraseña"
                            >
                                <span class="material-symbols-outlined block text-[20px]" id="password-eye-icon" aria-hidden="true">visibility</span>
                            </button>
                        </div>
                        @error('password')
                            <p class="font-body-sm text-body-sm text-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label class="flex cursor-pointer select-none items-center gap-2">
                            <input
                                class="h-4 w-4 rounded accent-primary"
                                id="remember-me"
                                name="remember"
                                type="checkbox"
                                value="1"
                                @checked(old('remember'))
                            >
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Recordar mi dispositivo</span>
                        </label>
                        <a
                            class="font-body-sm font-medium text-body-sm text-primary underline decoration-primary/40 underline-offset-4 transition-colors hover:text-primary-container"
                            href="#recuperar-contrasena"
                        >
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>

                    <x-button type="submit" class="group mt-2 py-3.5 font-title-sm text-title-sm font-semibold shadow-md transition-all duration-200 hover:shadow-lg active:bg-primary-container">
                        <span>Iniciar Sesión en AVIL</span>
                        <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-1" aria-hidden="true">arrow_forward</span>
                    </x-button>
                </form>

                <section class="flex items-center justify-between rounded-xl bg-surface-container-low p-space-md shadow-sm" aria-label="Acceso biométrico">
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-secondary/10 text-secondary">
                            <span class="material-symbols-outlined text-[22px]" aria-hidden="true">fingerprint</span>
                        </span>
                        <div class="flex flex-col">
                            <span class="font-title-sm text-title-sm text-on-surface">Acceso Biométrico</span>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Face ID / Huella Digital</span>
                        </div>
                    </div>
                    <button
                        class="flex cursor-not-allowed items-center gap-1.5 rounded-full bg-surface-container-lowest px-3.5 py-1.5 font-label-md font-semibold text-label-md text-secondary opacity-60 shadow-sm"
                        type="button"
                        disabled
                        aria-label="Acceso biométrico próximamente"
                    >
                        <span class="material-symbols-outlined text-[16px]" aria-hidden="true">sensors</span>
                        <span>Próximamente</span>
                    </button>
                </section>

                <div class="flex items-center justify-center py-1">
                    <p class="text-center font-body-md text-body-md text-on-surface-variant">
                        ¿Aún no tienes una cuenta botánica?
                        <a
                            class="ml-1 font-title-sm font-semibold text-title-sm text-primary underline decoration-primary/40 underline-offset-4 transition-colors hover:text-primary-container"
                            href="{{ route('register') }}"
                        >
                            Crear Cuenta
                        </a>
                    </p>
                </div>

                <aside class="mt-1 flex items-start gap-3 rounded-xl bg-surface-container p-space-md shadow-sm">
                    <span class="material-symbols-outlined mt-0.5 shrink-0 text-[20px] text-secondary" aria-hidden="true">verified_user</span>
                    <div class="flex flex-col gap-0.5">
                        <span class="font-title-sm font-medium text-title-sm text-on-surface">Seguridad y Confidencialidad Médica</span>
                        <p class="font-body-sm leading-relaxed text-body-sm text-on-surface-variant">
                            Sesión encriptada · Fórmulas clínicamente seguras · Datos de prescripción protegidos bajo normativa de bioseguridad dérmica.
                        </p>
                    </div>
                </aside>

                <div class="flex w-full justify-center py-2 opacity-40">
                    <svg class="text-tertiary" fill="none" height="24" viewBox="0 0 48 24" width="48" aria-hidden="true">
                        <path d="M24 2C24 2 20 8 14 12C8 16 2 18 2 18M24 2C24 2 28 8 34 12C40 16 46 18 46 18M24 2V22" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"></path>
                        <circle cx="24" cy="2" fill="currentColor" r="1.5"></circle>
                    </svg>
                </div>
            </div>
        </div>
    </main>

    <nav class="fixed inset-x-0 bottom-0 z-50 bg-surface/90 pb-safe shadow-[0_-2px_12px_rgba(46,36,31,0.05)] backdrop-blur-xl" aria-label="Navegación principal">
        <div class="flex h-16 items-center justify-around px-space-xs">
            @foreach ([
                ['label' => 'Inicio', 'icon' => 'home', 'href' => url('/')],
                ['label' => 'Categorías', 'icon' => 'category', 'href' => '#categorias'],
                ['label' => 'Skin Quiz', 'icon' => 'auto_awesome', 'href' => '#skin-quiz'],
                ['label' => 'Nosotros', 'icon' => 'spa', 'href' => '#nosotros'],
                ['label' => 'Cuenta', 'icon' => 'person', 'href' => route('cuenta')],
            ] as $item)
                <a class="group flex min-w-[48px] flex-col items-center justify-center py-1 text-on-surface-variant transition-colors hover:text-on-surface" href="{{ $item['href'] }}">
                    <span class="nav-pill flex items-center justify-center rounded-full px-3 py-1 transition-colors">
                        <span class="material-symbols-outlined text-[22px]" aria-hidden="true">{{ $item['icon'] }}</span>
                    </span>
                    <span class="mt-0.5 font-label-sm text-label-sm tracking-wide">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </div>
    </nav>
@endsection
