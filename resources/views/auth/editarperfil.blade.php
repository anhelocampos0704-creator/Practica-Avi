@extends('layouts.app')

@section('title', 'Editar Perfil | AVIL Skincare')

@section('content')
    <header class="fixed inset-x-0 top-0 z-50 bg-surface/85 pt-safe shadow-[0_1px_8px_rgba(46,36,31,0.04)] backdrop-blur-xl">
        <div class="flex h-16 items-center justify-between px-margin">
            <a class="flex items-center gap-space-sm" href="{{ route('cuenta') }}" aria-label="AVIL Skincare, inicio">
                <img class="h-8 w-auto object-contain" src="{{ asset('images/avil-logo.jpg') }}" alt="AVIL Skincare">
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
                    href="{{ route('cuenta') }}"
                    aria-label="Mi cuenta"
                >
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('images/profile-menu-avatar.jpg') }}" alt="">
                </a>
            </div>
        </div>
    </header>

    <main class="relative flex min-h-screen w-full flex-col bg-surface pb-24 pt-16">
        <div class="flex w-full flex-col">
            <div class="flex items-center justify-between px-margin pb-space-sm pt-space-xs">
                <a
                    class="-ml-1 flex h-10 w-10 items-center justify-center rounded-full bg-surface-container-low text-on-surface shadow-sm transition-colors hover:bg-surface-container"
                    href="{{ route('cuenta') }}"
                    aria-label="Volver a mi cuenta"
                >
                    <span class="material-symbols-outlined text-[20px]" aria-hidden="true">arrow_back</span>
                </a>
                <div class="text-center">
                    <h1 class="font-headline-sm font-serif text-headline-sm text-on-surface">Editar Perfil</h1>
                    <p class="font-label-sm text-label-sm uppercase tracking-wider text-tertiary">Ritual Personal</p>
                </div>
                <x-button variant="subtle" type="submit" form="botanicProfileForm" icon="check">
                    Listo
                </x-button>
            </div>

            <section class="relative flex flex-col items-center px-margin pb-space-md pt-space-sm" aria-label="Perfil botánico">
                <div class="relative">
                    <div class="h-28 w-28 overflow-hidden rounded-full bg-gradient-to-tr from-primary via-surface-container-high to-secondary p-1 shadow-md">
                        <img
                            class="h-full w-full rounded-full bg-surface-container-low object-cover"
                            src="{{ asset('images/elena-romero.jpg') }}"
                            alt="{{ $user->name }}"
                        >
                    </div>
                    <button
                        class="absolute bottom-0 right-0 flex h-9 w-9 items-center justify-center rounded-full bg-primary text-on-primary shadow-md transition-transform hover:scale-105 active:scale-95"
                        type="button"
                        aria-label="Cambiar fotografía"
                    >
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">photo_camera</span>
                    </button>
                    <span class="absolute -right-1 -top-1 flex h-7 w-7 items-center justify-center rounded-full bg-secondary text-on-secondary shadow-sm">
                        <span class="material-symbols-outlined text-[15px]" aria-hidden="true">eco</span>
                    </span>
                </div>

                <div class="mt-space-sm flex flex-col items-center gap-1 text-center">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-container px-3 py-1 text-on-secondary-fixed">
                        <span class="material-symbols-outlined text-[14px] text-secondary" aria-hidden="true">verified</span>
                        <span class="font-label-sm text-label-sm uppercase tracking-wider">Miembro Botánico Oro</span>
                    </span>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Rituales completados: 124 días consecutivos</p>
                </div>
            </section>

            <form
                class="flex flex-col gap-space-lg px-margin pb-space-xl"
                id="botanicProfileForm"
                action="{{ route('editarperfil.update') }}"
                method="POST"
            >
                @csrf
                @method('PATCH')

                @if (session('status'))
                    <p class="rounded-lg bg-secondary-container px-space-md py-3 font-body-sm text-body-sm text-on-secondary-fixed" role="status">
                        {{ session('status') }}
                    </p>
                @endif

                <section class="flex flex-col gap-space-md rounded-xl bg-surface-container-low p-space-md shadow-sm" aria-labelledby="identity-heading">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px] text-primary" aria-hidden="true">spa</span>
                        <h2 class="font-headline-sm font-serif text-headline-sm text-on-surface" id="identity-heading">Identidad Botánica</h2>
                    </div>

                    <x-form-input
                        id="fullName"
                        name="name"
                        label="Nombre y Apellidos"
                        :value="old('name', $user->name)"
                        autocomplete="name"
                        required
                        icon="edit"
                    />

                    <div class="flex items-center justify-between">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="email">Correo Verificado</label>
                        <span class="flex items-center gap-0.5 font-label-sm text-label-sm text-secondary">
                            <span class="material-symbols-outlined text-[13px]" aria-hidden="true">check_circle</span>
                            Verificado
                        </span>
                    </div>
                    <x-form-input
                        id="email"
                        name="email"
                        label=""
                        type="email"
                        :value="old('email', $user->email)"
                        autocomplete="email"
                        required
                        icon="mail"
                    />

                    <x-form-input
                        id="userPhone"
                        name="phone"
                        label="Teléfono (Recordatorios vía SMS / WhatsApp)"
                        type="tel"
                        :value="old('phone', $user->phone)"
                        autocomplete="tel"
                        icon="chat"
                    />

                    <div class="flex items-center justify-between">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="birthDate">Fecha de Nacimiento</label>
                        <span class="font-label-sm text-label-sm text-primary">Regalo Anual</span>
                    </div>
                    <x-form-input
                        id="birthDate"
                        name="birth_date"
                        label=""
                        type="date"
                        :value="old('birth_date', $user->birth_date?->format('Y-m-d'))"
                        icon="cake"
                    />
                    <p class="font-body-sm text-body-sm text-on-surface-variant/80">Te enviaremos un elixir silvestre personalizado en tu mes de nacimiento.</p>
                </section>

                <section class="flex flex-col gap-space-md rounded-xl bg-surface-container-low p-space-md shadow-sm" aria-labelledby="skin-heading">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[20px] text-secondary" aria-hidden="true">psychology_alt</span>
                            <h2 class="font-headline-sm font-serif text-headline-sm text-on-surface" id="skin-heading">Diagnóstico Cutáneo</h2>
                        </div>
                        <span class="rounded-full bg-tertiary-fixed px-2 py-0.5 font-label-sm text-label-sm text-on-tertiary-fixed-variant">Actualizado</span>
                    </div>

                    <div class="flex flex-col gap-2 rounded-lg bg-surface-container p-3.5">
                        <div class="flex items-start justify-between gap-2">
                            <div>
                                <p class="font-label-sm text-label-sm uppercase tracking-wide text-primary">Biotipo Actual</p>
                                <h3 class="font-headline-sm font-serif text-headline-sm text-on-surface">Piel Mixta Sensible</h3>
                                <p class="mt-0.5 font-body-sm text-body-sm text-on-surface-variant">
                                    Barrera reactiva con tendencia lipídica en zona T y deshidratación lateral.
                                </p>
                            </div>
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-surface-container-lowest text-primary shadow-sm">
                                <span class="material-symbols-outlined text-[20px]" aria-hidden="true">water_drop</span>
                            </span>
                        </div>
                        <div class="flex justify-end pt-1">
                            <a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary transition-colors hover:text-on-primary-fixed-variant" href="{{ route('cuenta') }}">
                                Rehacer Test Botánico
                                <span class="material-symbols-outlined text-[16px]" aria-hidden="true">restart_alt</span>
                            </a>
                        </div>
                    </div>

                    <fieldset class="flex flex-col gap-2">
                        <legend class="font-label-md text-label-md text-on-surface-variant">Preocupaciones Prioritarias (Selecciona hasta 3)</legend>
                        <div class="flex flex-wrap gap-2" id="concernsGroup">
                            @foreach ([
                                'Rojeces & Calma' => true,
                                'Poros dilatados' => false,
                                'Hidratación profunda' => true,
                                'Primeras líneas' => true,
                                'Luminosidad' => false,
                            ] as $concern => $selected)
                                <button
                                    class="concern-pill flex items-center gap-1.5 rounded-full px-3 py-1.5 font-body-sm text-body-sm shadow-sm transition-all {{ $selected ? 'bg-primary text-on-primary' : 'bg-surface-container-lowest text-on-surface hover:bg-surface-container' }}"
                                    type="button"
                                    data-selected="{{ $selected ? 'true' : 'false' }}"
                                    aria-pressed="{{ $selected ? 'true' : 'false' }}"
                                >
                                    <span class="material-symbols-outlined text-[15px]" aria-hidden="true">{{ $selected ? 'check' : 'add' }}</span>
                                    <span>{{ $concern }}</span>
                                </button>
                            @endforeach
                        </div>
                        <p class="sr-only" id="concernsNotice" aria-live="polite"></p>
                    </fieldset>

                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="allergyInput">Alergias o Restricciones de Extractos</label>
                        <div class="flex flex-wrap items-center gap-1.5 rounded-lg bg-surface-container-lowest p-2 shadow-sm" id="allergiesContainer">
                            @foreach (['Sin aceites esenciales', 'Sin frutos secos'] as $allergy)
                                <span class="inline-flex items-center gap-1 rounded-full bg-surface-container-high px-2.5 py-1 font-body-sm text-body-sm text-on-surface">
                                    {{ $allergy }}
                                    <button class="flex items-center hover:text-error" type="button" aria-label="Eliminar restricción {{ $allergy }}">
                                        <span class="material-symbols-outlined text-[14px]" aria-hidden="true">close</span>
                                    </button>
                                </span>
                            @endforeach
                            <input class="w-24 bg-transparent py-1 font-body-sm text-body-sm text-on-surface focus:outline-none" id="allergyInput" type="text" placeholder="+ Añadir...">
                        </div>
                        <p class="font-body-sm text-body-sm text-on-surface-variant/70">Filtraremos formulaciones con estos alérgenos automáticamente.</p>
                    </div>
                </section>

                <section class="flex flex-col gap-space-md rounded-xl bg-surface-container-low p-space-md shadow-sm" aria-labelledby="ritual-heading">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px] text-secondary" aria-hidden="true">routine</span>
                        <h2 class="font-headline-sm font-serif text-headline-sm text-on-surface" id="ritual-heading">Sincronización de Rituales</h2>
                    </div>

                    @foreach ([
                        'toggleMorning' => ['Ritual Matutino de Despertar', 'Alarma de bruma y antioxidantes (08:00 AM)', 'primary', 'morning_routine'],
                        'toggleEvening' => ['Ritual Nocturno Regenerador', 'Doble limpieza y bálsamo calmante (21:30 PM)', 'primary', 'evening_routine'],
                        'toggleHarvest' => ['Cosechas Silvestres & Lotes Limitados', 'Avisos de prensado en frío y reservas estacionales', 'secondary', 'harvest_notifications'],
                    ] as $id => [$label, $description, $activeColor, $attribute])
                        <div class="flex items-center justify-between gap-3">
                            <label class="flex flex-col" for="{{ $id }}">
                                <span class="font-title-sm text-title-sm text-on-surface">{{ $label }}</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant">{{ $description }}</span>
                            </label>
                            <input class="peer sr-only" id="{{ $id }}" name="{{ $id }}" type="checkbox" value="1" @checked(old($id, $user->{$attribute}))>
                            <label
                                class="relative inline-flex h-6 w-12 shrink-0 cursor-pointer items-center rounded-full bg-surface-variant shadow-inner after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-surface-container-lowest after:transition-all peer-focus:outline-none peer-checked:after:translate-x-6 peer-checked:after:border-surface-container-lowest {{ $activeColor === 'secondary' ? 'peer-checked:bg-secondary' : 'peer-checked:bg-primary' }}"
                                for="{{ $id }}"
                                aria-label="{{ $label }}"
                            ></label>
                        </div>
                    @endforeach
                </section>

                <aside class="flex items-start gap-3 rounded-xl bg-secondary-container p-space-md text-on-secondary-fixed shadow-sm">
                    <span class="material-symbols-outlined mt-0.5 shrink-0 text-[24px] text-secondary" aria-hidden="true">nature_people</span>
                    <div class="flex flex-col gap-1">
                        <p class="font-headline-sm font-serif text-headline-sm italic">«La piel florece cuando respetamos el ritmo de sus ciclos naturales.»</p>
                        <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Compromiso Botánico AVIL</span>
                    </div>
                </aside>

            </form>

            <div class="flex flex-col gap-space-sm px-margin pt-space-xs">
                <x-button id="saveButton" type="submit" form="botanicProfileForm" icon="local_florist">Guardar Cambios Botánicos</x-button>
                <a
                    class="flex w-full items-center justify-center rounded-lg bg-surface-container px-space-md py-3 text-center font-title-sm text-title-sm text-on-surface shadow-sm transition-colors hover:bg-surface-container-high"
                    href="{{ route('cuenta') }}"
                >
                    Cancelar y Descartar
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <x-button variant="danger" type="submit">Cerrar sesión</x-button>
                </form>
            </div>
        </div>
    </main>

    <nav class="fixed inset-x-0 bottom-0 z-50 bg-surface/90 pb-safe shadow-[0_-2px_12px_rgba(46,36,31,0.05)] backdrop-blur-xl" aria-label="Navegación principal">
        <div class="flex h-16 items-center justify-around px-space-xs">
            @foreach ([
                ['label' => 'Inicio', 'icon' => 'home', 'href' => route('cuenta')],
                ['label' => 'Categorías', 'icon' => 'category', 'href' => '#'],
                ['label' => 'Skin Quiz', 'icon' => 'auto_awesome', 'href' => '#'],
                ['label' => 'Nosotros', 'icon' => 'spa', 'href' => '#'],
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
