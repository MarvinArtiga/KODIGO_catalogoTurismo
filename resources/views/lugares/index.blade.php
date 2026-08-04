@extends('layouts.app')

@section('title', 'Catálogo de lugares turísticos')

@section('content')
    <!-- Tropical Hero Section with Soft Warm Gradients -->
    <section class="relative overflow-hidden bg-gradient-to-b from-teal-50/40 via-emerald-50/20 to-transparent py-16 lg:py-24">
        <!-- Floating tropical background bubbles -->
        <div class="absolute -top-12 -left-12 h-64 w-64 rounded-full bg-teal-200/10 blur-3xl"></div>
        <div class="absolute top-1/2 right-0 h-96 w-96 rounded-full bg-amber-200/10 blur-3xl"></div>

        <div class="mx-auto max-w-7xl px-6">
            <div class="relative rounded-[2.5rem] border border-teal-100/30 bg-white/60 p-8 shadow-xl shadow-teal-950/5 backdrop-blur-xl lg:p-12">
                <div class="grid gap-12 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
                    <!-- Left Column: Copywriting -->
                    <div class="space-y-6">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-teal-100/50 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-teal-800">
                            <span>🌊</span> Explora el Trópico
                        </span>
                        <h1 class="font-serif text-4xl font-extrabold leading-tight text-slate-800 sm:text-5xl lg:text-6xl">
                            Descubre la belleza de <span class="bg-gradient-to-r from-teal-600 via-emerald-500 to-amber-500 bg-clip-text text-transparent">El Salvador</span>
                        </h1>
                        <p class="max-w-xl text-base leading-relaxed text-slate-600 md:text-lg">
                            Sumérgete en un viaje por destinos exóticos y mágicos. Explora volcanes imponentes, playas de surf de clase mundial y encantadores pueblos coloniales.
                        </p>
                        <div class="flex flex-wrap gap-2.5 pt-2">
                            <span class="rounded-full border border-teal-100 bg-teal-50/50 px-4 py-2 text-xs font-semibold text-teal-700">🌋 Aventura</span>
                            <span class="rounded-full border border-orange-100 bg-orange-50/50 px-4 py-2 text-xs font-semibold text-orange-700">🎨 Cultural</span>
                            <span class="rounded-full border border-emerald-100 bg-emerald-50/50 px-4 py-2 text-xs font-semibold text-emerald-700">🍃 Naturaleza</span>
                        </div>
                    </div>

                    <!-- Right Column: Featured Route Highlight Card -->
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="group relative overflow-hidden rounded-3xl border border-teal-100/20 bg-teal-950 p-6 text-white shadow-xl shadow-teal-950/20 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-4 -bottom-4 text-8xl opacity-10 transition-transform duration-500 group-hover:scale-125">🌋</div>
                            <span class="text-2xs font-extrabold uppercase tracking-widest text-teal-300">Ruta Destacada</span>
                            <h3 class="mt-3 text-lg font-bold">Volcán de Santa Ana</h3>
                            <p class="mt-2 text-xs text-teal-100/80">Ascenso panorámico por senderos únicos con vista al lago Coatepeque.</p>
                        </div>
                        <div class="group relative overflow-hidden rounded-3xl border border-amber-100/20 bg-gradient-to-br from-amber-500 to-orange-500 p-6 text-white shadow-xl shadow-orange-500/20 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-4 -bottom-4 text-8xl opacity-10 transition-transform duration-500 group-hover:scale-125">🌺</div>
                            <span class="text-2xs font-extrabold uppercase tracking-widest text-amber-100">Experiencias</span>
                            <h3 class="mt-3 text-lg font-bold">Ruta de las Flores</h3>
                            <p class="mt-2 text-xs text-amber-50/90">Pueblos coloniales coloridos, aromas de café y mercados artesanales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catalog Section with exact 3 columns / 3 items -->
    <section class="mx-auto max-w-7xl px-6 py-12">
        <div class="mb-12 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div class="space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-orange-500">Destinos Seleccionados</span>
                <h2 class="font-serif text-3xl font-extrabold text-slate-800 sm:text-4xl">Lugares Recomendados</h2>
            </div>
            <p class="max-w-md text-sm text-slate-500">
                Hemos seleccionado tres lugares espectaculares con imágenes optimizadas y descripciones completas para planificar tu próxima aventura.
            </p>
        </div>

        <!-- 3-Place Grid -->
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($lugares->take(3) as $lugar)
                @php
                    // Dynamic tropical colors and emojis depending on category
                    $category = strtolower($lugar->categoria);
                    $badgeStyle = 'bg-teal-50 text-teal-700 border-teal-100';
                    $icon = '📍';
                    
                    if (str_contains($category, 'aventura')) {
                        $badgeStyle = 'bg-rose-50 text-rose-700 border-rose-100';
                        $icon = '🌋';
                    } elseif (str_contains($category, 'cultur')) {
                        $badgeStyle = 'bg-amber-50 text-amber-700 border-amber-100';
                        $icon = '🎨';
                    } elseif (str_contains($category, 'natur')) {
                        $badgeStyle = 'bg-emerald-50 text-emerald-700 border-emerald-100';
                        $icon = '🍃';
                    } elseif (str_contains($category, 'playa') || str_contains($category, 'surf')) {
                        $badgeStyle = 'bg-sky-50 text-sky-700 border-sky-100';
                        $icon = '🌊';
                    }

                    // Optimizing Unsplash Image URL to w=600 (from original w=1200)
                    $optimizedImage = Str::replace('w=1200', 'w=600&q=85&fit=crop', $lugar->imagen);
                @endphp
                
                <article class="group flex flex-col overflow-hidden rounded-[2rem] border border-teal-100/30 bg-white shadow-lg shadow-teal-950/5 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-teal-500/10">
                    <!-- Image Area -->
                    <div class="relative overflow-hidden aspect-[4/3] w-full bg-teal-50">
                        <img 
                            src="{{ $optimizedImage }}" 
                            alt="{{ $lugar->titulo }}" 
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" 
                            loading="lazy" 
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-5 right-5 text-white">
                            <span class="text-2xs font-extrabold uppercase tracking-widest text-teal-300">{{ $lugar->departamento }}</span>
                            <h3 class="mt-1 text-xl font-bold leading-tight">{{ $lugar->titulo }}</h3>
                        </div>
                    </div>

                    <!-- Details Area -->
                    <div class="flex flex-1 flex-col p-6 space-y-4">
                        <div class="flex items-center justify-between gap-4">
                            <span class="inline-flex items-center gap-1 rounded-full border px-3 py-1 text-2xs font-bold uppercase tracking-wider {{ $badgeStyle }}">
                                <span>{{ $icon }}</span> {{ $lugar->categoria }}
                            </span>
                            <span class="text-sm font-extrabold text-teal-800">
                                ${{ number_format($lugar->precio, 2) }}
                            </span>
                        </div>

                        <p class="text-xs leading-relaxed text-slate-600 line-clamp-3 flex-1">
                            {{ $lugar->descripcion }}
                        </p>

                        <!-- Footer Details -->
                        <div class="flex items-center justify-between gap-3 pt-2 border-t border-slate-50">
                            <span class="inline-flex items-center gap-1 text-2xs font-medium text-slate-500">
                                🕒 {{ $lugar->horario }}
                            </span>
                            <a 
                                href="{{ route('lugares.show', $lugar) }}" 
                                class="inline-flex items-center gap-1 rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 px-4 py-2 text-xs font-bold text-white shadow-md shadow-teal-500/5 transition-all duration-300 hover:from-teal-600 hover:to-emerald-600 hover:shadow-lg"
                            >
                                <span>Detalles</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-3 w-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[2rem] border border-teal-100/30 bg-white p-12 text-center shadow-lg shadow-teal-950/5">
                    <span class="text-4xl">🏝️</span>
                    <p class="mt-4 text-sm font-semibold text-slate-500">No hay lugares disponibles en este momento.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
