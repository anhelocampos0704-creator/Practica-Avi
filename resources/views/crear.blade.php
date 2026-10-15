<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#fff8f6">

        <title>Crear cuenta | AVIL Skincare</title>

        @vite(['resources/css/stitch/register.css', 'resources/js/stitch/register.js'])
    </head>
    <body class="min-h-screen bg-surface font-body-md text-on-surface antialiased">
        <header class="fixed inset-x-0 top-0 z-50 bg-surface/85 pt-safe shadow-[0_1px_8px_rgba(46,36,31,0.04)] backdrop-blur-xl">
            <div class="flex h-16 items-center justify-between px-margin">
                <a class="flex items-center gap-space-sm" href="/" aria-label="AVIL Skincare, inicio">
                    <img
                        class="h-8 w-auto object-contain"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbXryTlOPs5BKyddJ9t6kOTe6gv_kkg7kQYbdU_HFOsn_jFabWajl-VulzP-mxVzVZmj5Wc_SshoSwOo0Tndmor5IcHuTFAezJdmsJyA4dTjcaqvXwT5LT76YGV0HRfODKLNsMpagosxdmoLdYIGOwEiw0ANDGryWb4E4eWnAQs9Zs5ROw8XSrQDzRiWJRW3QanEl6330fxv1whe5YE2X4EFIDj-INMnAn9YRyV1g"
                        alt="Logotipo de AVIL Skincare"
                    >
                    <span class="font-headline-sm font-serif text-headline-sm tracking-tight">AVIL</span>
                </a>

                <div class="flex items-center gap-space-xs">
                    <button
                        class="flex h-11 w-11 items-center justify-center rounded-full text-on-surface-variant transition-colors hover:bg-surface-container-low hover:text-on-surface"
                        type="button"
                        aria-label="Notificaciones"
                    >
                        <span class="material-symbols-outlined text-[22px]" aria-hidden="true">notifications</span>
                    </button>
                    <a
                        class="flex h-11 w-11 items-center justify-center rounded-full p-0.5 transition-colors hover:bg-surface-container-low"
                        href="#registro"
                        aria-label="Ir al formulario de registro"
                    >
                        <img
                            class="h-8 w-8 rounded-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIqRtlnLPnebM7wpQoEug2uR3jtofBK_QziQ1jvww96uaaPYVmjPuvBeFbhbGao8Wo8BaqZEydHOZiSyHsv7n060nsPWfwL3TNwSx8CI8dXQ1gsWmCYZmLDaz8iOeL7nO2QcyRb5KLHPAyh6rLR28znZZ7j35nMem5cuGC2wPUiC9zUMhR8CUreslpLPbOX-ij-6Vo2qiZzcjU9RoCBExnYP8x_ICc3TcAIOgzo94"
                            alt=""
                        >
                    </a>
                </div>
            </div>
        </header>

        <main class="relative flex min-h-screen w-full flex-col bg-surface pb-24 pt-16">
            <section class="relative w-full overflow-hidden rounded-b-[2rem] bg-surface-container-low px-margin pb-7 pt-6">
                <div class="pointer-events-none absolute -right-12 -top-12 h-48 w-48 rounded-full bg-secondary-container/30 blur-2xl"></div>
                <div class="pointer-events-none absolute -bottom-0 -left-8 h-36 w-36 rounded-full bg-primary-fixed/40 blur-xl"></div>

                <div class="relative z-10 flex flex-col items-start gap-space-sm">
                    <div class="inline-flex items-center gap-1.5 rounded-full bg-secondary-container px-3 py-1 text-on-secondary-container">
                        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;" aria-hidden="true">spa</span>
                        <span class="font-label-sm text-label-sm uppercase tracking-wider">Bienvenida al Círculo AVIL</span>
                    </div>

                    <h1 class="mt-1 font-headline-lg-mobile text-headline-lg-mobile font-serif text-on-surface">
                        Comienza tu ritual de piel consciente.
                    </h1>
                    <p class="text-body-md leading-relaxed text-on-surface-variant">
                        Crea tu perfil botánico para guardar tus diagnósticos dérmicos, rastrear pedidos y recibir
                        <span class="font-title-sm font-semibold text-primary">15% OFF</span>
                        en tu primera formulación.
                    </p>

                    <ul class="mt-2 grid w-full grid-cols-3 gap-2 rounded-xl bg-surface-container-lowest/80 px-3 py-2.5 shadow-sm">
                        <li class="flex min-w-0 items-center gap-1.5">
                            <span class="material-symbols-outlined shrink-0 text-[18px] text-primary" aria-hidden="true">verified</span>
                            <span class="truncate font-label-sm text-label-sm text-on-surface">Test dérmico</span>
                        </li>
                        <li class="flex min-w-0 items-center gap-1.5">
                            <span class="material-symbols-outlined shrink-0 text-[18px] text-secondary" aria-hidden="true">card_giftcard</span>
                            <span class="truncate font-label-sm text-label-sm text-on-surface">-15% Bienvenida</span>
                        </li>
                        <li class="flex min-w-0 items-center gap-1.5">
                            <span class="material-symbols-outlined shrink-0 text-[18px] text-primary" aria-hidden="true">local_shipping</span>
                            <span class="truncate font-label-sm text-label-sm text-on-surface">Envío prioritario</span>
                        </li>
                    </ul>
                </div>
            </section>

            <section id="registro" class="flex flex-col gap-6 px-margin py-6" aria-label="Crear cuenta AVIL">
                <div class="flex flex-col gap-3">
                    <button
                        class="flex h-13 w-full items-center justify-center gap-3 rounded-lg bg-surface-container-low px-4 py-3 text-on-surface shadow-sm transition-colors hover:bg-surface-container"
                        type="button"
                    >
                        <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z" fill="#4285F4"></path>
                            <path d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.15C3.26 21.36 7.33 24 12 24z" fill="#34A853"></path>
                            <path d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.25C.45 8.18 0 9.98 0 12s.45 3.82 1.25 5.42l4.03-3.15z" fill="#FBBC05"></path>
                            <path d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.33 0 3.26 2.64 1.25 6.58l4.03 3.15c.95-2.83 3.6-4.98 6.72-4.98z" fill="#EA4335"></path>
                        </svg>
                        <span class="font-title-sm text-title-sm">Continuar con Google</span>
                    </button>

                    <button
                        class="flex h-13 w-full items-center justify-center gap-3 rounded-lg bg-surface-container-low px-4 py-3 text-on-surface shadow-sm transition-colors hover:bg-surface-container"
                        type="button"
                    >
                        <svg class="h-5 w-5 shrink-0 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.37c.61-.75 1.04-1.8.92-2.87-.9.04-2.02.6-2.67 1.34-.56.64-1.06 1.7-.92 2.74 1.02.08 2.05-.51 2.67-1.21z"></path>
                        </svg>
                        <span class="font-title-sm text-title-sm">Continuar con Apple</span>
                    </button>
                </div>

                <div class="my-1 flex items-center gap-3">
                    <div class="h-px flex-1 bg-surface-variant"></div>
                    <span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant/75">o con tu correo electrónico</span>
                    <div class="h-px flex-1 bg-surface-variant"></div>
                </div>

                <form id="register-form" class="flex flex-col gap-4" action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-1.5">
                        <label class="font-label-md text-label-md font-medium text-on-surface-variant" for="name">Nombre y apellidos</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined pointer-events-none absolute left-3.5 text-[20px] text-on-surface-variant" aria-hidden="true">person</span>
                            <input
                                class="h-12 w-full rounded-lg bg-surface-container-low pl-11 pr-4 font-body-md text-body-md text-on-surface transition-all placeholder:text-on-surface-variant/50 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/20"
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                autocomplete="name"
                                placeholder="ej. Elena Valdés"
                                required
                            >
                        </div>
                        @error('name')
                            <p class="font-body-sm text-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="font-label-md text-label-md font-medium text-on-surface-variant" for="email">Correo electrónico</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined pointer-events-none absolute left-3.5 text-[20px] text-on-surface-variant" aria-hidden="true">mail</span>
                            <input
                                class="h-12 w-full rounded-lg bg-surface-container-low pl-11 pr-4 font-body-md text-body-md text-on-surface transition-all placeholder:text-on-surface-variant/50 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/20"
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                placeholder="elena@tudominio.com"
                                required
                            >
                        </div>
                        @error('email')
                            <p class="font-body-sm text-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="font-label-md text-label-md font-medium text-on-surface-variant" for="password">Contraseña maestra</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined pointer-events-none absolute left-3.5 text-[20px] text-on-surface-variant" aria-hidden="true">lock</span>
                            <input
                                class="h-12 w-full rounded-lg bg-surface-container-low pl-11 pr-12 font-body-md text-body-md text-on-surface transition-all placeholder:text-on-surface-variant/50 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/20"
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="new-password"
                                minlength="8"
                                required
                            >
                            <button
                                class="absolute right-2.5 flex h-8 w-8 items-center justify-center rounded-full text-on-surface-variant transition-colors hover:text-on-surface"
                                id="togglePassword"
                                type="button"
                                aria-label="Mostrar contraseña"
                                aria-controls="password"
                                aria-pressed="false"
                            >
                                <span class="material-symbols-outlined text-[20px]" id="eyeIcon" aria-hidden="true">visibility</span>
                            </button>
                        </div>
                        @error('password')
                            <p class="font-body-sm text-error" role="alert">{{ $message }}</p>
                        @enderror

                        <div class="mt-1 flex flex-col gap-1.5 rounded-lg bg-surface-container-lowest p-2.5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <span class="font-label-sm text-label-sm text-on-surface-variant">Seguridad de la clave</span>
                                <div class="flex items-center gap-1 font-title-sm text-[11px] text-secondary">
                                    <span class="material-symbols-outlined text-[14px]" aria-hidden="true">shield_with_heart</span>
                                    <span>Al menos 8 caracteres</span>
                                </div>
                            </div>
                            <div class="grid h-1.5 w-full grid-cols-4 gap-1.5" aria-hidden="true">
                                <div class="h-full rounded-full bg-surface-variant"></div>
                                <div class="h-full rounded-full bg-surface-variant"></div>
                                <div class="h-full rounded-full bg-surface-variant"></div>
                                <div class="h-full rounded-full bg-surface-variant"></div>
                            </div>
                            <span class="font-body-sm text-[11px] text-on-surface-variant/80">Usa una contraseña única que no compartas con otros sitios.</span>
                        </div>
                    </div>

                    <fieldset class="flex flex-col gap-2 pt-2">
                        <div class="flex items-center justify-between gap-2">
                            <legend class="font-label-md text-label-md font-medium text-on-surface-variant">Tu objetivo principal de piel</legend>
                            <span class="shrink-0 font-label-sm text-label-sm font-medium text-primary">Paso 1 de tu diagnóstico</span>
                        </div>
                        <div class="flex flex-wrap gap-2" id="skinGoalGroup">
                            <button
                                class="skin-chip flex items-center gap-1.5 rounded-full bg-primary px-3.5 py-2 font-label-md text-label-md text-on-primary shadow-sm transition-all"
                                data-goal="calmar"
                                type="button"
                                aria-pressed="true"
                            >
                                <span class="material-symbols-outlined text-[16px]" aria-hidden="true">local_florist</span>
                                <span>Calmar rojeces</span>
                            </button>
                            <button
                                class="skin-chip flex items-center gap-1.5 rounded-full bg-surface-container px-3.5 py-2 font-label-md text-label-md text-on-surface-variant transition-all hover:bg-surface-container-high"
                                data-goal="equilibrar"
                                type="button"
                                aria-pressed="false"
                            >
                                <span class="material-symbols-outlined text-[16px]" aria-hidden="true">water_drop</span>
                                <span>Equilibrar grasa</span>
                            </button>
                            <button
                                class="skin-chip flex items-center gap-1.5 rounded-full bg-surface-container px-3.5 py-2 font-label-md text-label-md text-on-surface-variant transition-all hover:bg-surface-container-high"
                                data-goal="hidratar"
                                type="button"
                                aria-pressed="false"
                            >
                                <span class="material-symbols-outlined text-[16px]" aria-hidden="true">opacity</span>
                                <span>Hidratación intensa</span>
                            </button>
                            <button
                                class="skin-chip flex items-center gap-1.5 rounded-full bg-surface-container px-3.5 py-2 font-label-md text-label-md text-on-surface-variant transition-all hover:bg-surface-container-high"
                                data-goal="luminosidad"
                                type="button"
                                aria-pressed="false"
                            >
                                <span class="material-symbols-outlined text-[16px]" aria-hidden="true">wb_sunny</span>
                                <span>Luminosidad natural</span>
                            </button>
                        </div>
                    </fieldset>

                    <div class="flex flex-col gap-3 pt-3">
                        <label class="group flex cursor-pointer items-start gap-3">
                            <input class="mt-1 h-4 w-4 shrink-0 cursor-pointer rounded accent-primary focus:ring-primary" name="terms" type="checkbox" value="1" @checked(old('terms')) required>
                            <span class="select-none font-body-sm text-body-sm leading-tight text-on-surface">
                                Acepto los <a class="text-primary underline underline-offset-2" href="#terminos">Términos y Condiciones</a>
                                y la <a class="text-primary underline underline-offset-2" href="#privacidad">Política de Privacidad</a> de AVIL.
                            </span>
                        </label>
                        @error('terms')
                            <p class="font-body-sm text-error" role="alert">{{ $message }}</p>
                        @enderror
                        <label class="group flex cursor-pointer items-start gap-3">
                            <input class="mt-1 h-4 w-4 shrink-0 cursor-pointer rounded accent-primary focus:ring-primary" name="marketing_consent" type="checkbox" value="1" @checked(old('marketing_consent'))>
                            <span class="select-none font-body-sm text-body-sm leading-tight text-on-surface-variant">
                                Deseo recibir recomendaciones personalizadas, alertas botánicas y guías según los ciclos lunares de cosecha.
                            </span>
                        </label>
                        @error('marketing_consent')
                            <p class="font-body-sm text-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-3">
                        <button
                            class="group flex h-14 w-full items-center justify-center gap-2 rounded-lg bg-primary font-title-sm text-title-sm text-on-primary shadow-md transition-all hover:bg-primary-container active:scale-[0.99]"
                            id="btnSubmit"
                            type="submit"
                        >
                            <span>Crear mi cuenta botánica</span>
                            <span class="material-symbols-outlined text-[20px] transition-transform group-hover:translate-x-1" aria-hidden="true">arrow_forward</span>
                        </button>
                    </div>
                </form>

                <div class="flex flex-col items-center gap-4 text-center">
                    <div class="flex items-center gap-1.5 text-body-md text-on-surface-variant">
                        <span>¿Ya tienes una cuenta?</span>
                        <a class="font-title-sm font-semibold text-primary hover:underline" href="{{ route('login') }}">Iniciar sesión</a>
                    </div>

                    <aside class="flex w-full items-center gap-3 rounded-xl bg-surface-container-low p-4 text-left">
                        <img
                            class="h-14 w-14 shrink-0 rounded-lg object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZDafgTG_BO9lX8BUNP19bA53-HSfMgo1MB3qDUcMZwtD06dv41yVJBaF67ipg1Yyu9oPJRj51Hhsoj6VTA-DlfGCuAhvl0npUYd5JmTKZfQw4uVP2Cz4RWlBfD5S_CBNLvmyKnA6iBTUI8BdDy1jUyZewk9GAYSAnCFjuBhaZT3ywYSTCpuJ5PrkeQZW6FJJPYU9sxRHtdmYfzklbxxr6itTIKgCWAkwwwHT2uhQ"
                            alt="Mortero de terracota y hojas frescas de romero"
                            loading="lazy"
                        >
                        <div class="flex flex-col">
                            <span class="font-label-sm text-label-sm font-bold uppercase tracking-wider text-secondary">Laboratorio AVIL</span>
                            <p class="mt-0.5 font-body-sm text-[12px] leading-snug text-on-surface-variant">
                                Cada extracto se infusiona en lotes pequeños garantizando la máxima biodisponibilidad celular.
                            </p>
                        </div>
                    </aside>

                    <ul class="flex w-full items-center justify-around gap-2 border-t-0 pt-2">
                        <li class="flex flex-col items-center gap-1 text-center">
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-secondary-container text-on-secondary-container">
                                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">cruelty_free</span>
                            </span>
                            <span class="font-label-sm text-[10px] font-medium text-on-surface-variant">100% Cruelty-Free</span>
                        </li>
                        <li class="flex flex-col items-center gap-1 text-center">
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-secondary-container text-on-secondary-container">
                                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">science</span>
                            </span>
                            <span class="font-label-sm text-[10px] font-medium text-on-surface-variant">Hipoalergénico</span>
                        </li>
                        <li class="flex flex-col items-center gap-1 text-center">
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-secondary-container text-on-secondary-container">
                                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">lock_clock</span>
                            </span>
                            <span class="font-label-sm text-[10px] font-medium text-on-surface-variant">Datos encriptados</span>
                        </li>
                    </ul>
                </div>
            </section>
        </main>

        <nav
            class="fixed inset-x-0 bottom-0 z-50 bg-surface/90 pb-safe shadow-[0_-2px_12px_rgba(46,36,31,0.05)] backdrop-blur-xl"
            aria-label="Navegación principal"
        >
            <div class="flex h-16 items-center justify-around px-space-xs">
                <a class="group flex min-w-[48px] flex-col items-center justify-center py-1 text-on-surface-variant transition-colors hover:text-on-surface" href="#inicio">
                    <span class="nav-pill flex items-center justify-center rounded-full px-3 py-1 transition-colors">
                        <span class="material-symbols-outlined text-[22px]" aria-hidden="true">home</span>
                    </span>
                    <span class="mt-0.5 font-label-sm text-label-sm tracking-wide">Inicio</span>
                </a>
                <a class="group flex min-w-[48px] flex-col items-center justify-center py-1 text-on-surface-variant transition-colors hover:text-on-surface" href="#categorias">
                    <span class="nav-pill flex items-center justify-center rounded-full px-3 py-1 transition-colors">
                        <span class="material-symbols-outlined text-[22px]" aria-hidden="true">category</span>
                    </span>
                    <span class="mt-0.5 font-label-sm text-label-sm tracking-wide">Categorías</span>
                </a>
                <a class="group flex min-w-[48px] flex-col items-center justify-center py-1 text-on-surface-variant transition-colors hover:text-on-surface" href="#skin-quiz">
                    <span class="nav-pill flex items-center justify-center rounded-full px-3 py-1 transition-colors">
                        <span class="material-symbols-outlined text-[22px]" aria-hidden="true">auto_awesome</span>
                    </span>
                    <span class="mt-0.5 font-label-sm text-label-sm tracking-wide">Skin Quiz</span>
                </a>
                <a class="group flex min-w-[48px] flex-col items-center justify-center py-1 text-on-surface-variant transition-colors hover:text-on-surface" href="#nosotros">
                    <span class="nav-pill flex items-center justify-center rounded-full px-3 py-1 transition-colors">
                        <span class="material-symbols-outlined text-[22px]" aria-hidden="true">spa</span>
                    </span>
                    <span class="mt-0.5 font-label-sm text-label-sm tracking-wide">Nosotros</span>
                </a>
                <a class="group flex min-w-[48px] flex-col items-center justify-center py-1 text-primary transition-colors" href="#cuenta" aria-current="page">
                    <span class="nav-pill flex items-center justify-center rounded-full bg-primary/10 px-3 py-1 text-primary transition-colors">
                        <span class="material-symbols-outlined text-[22px]" aria-hidden="true">person</span>
                    </span>
                    <span class="mt-0.5 font-label-sm text-label-sm font-bold tracking-wide">Cuenta</span>
                </a>
            </div>
        </nav>
    </body>
</html>
