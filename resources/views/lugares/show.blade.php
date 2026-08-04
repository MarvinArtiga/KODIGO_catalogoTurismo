@extends('layouts.app')

@section('title', $lugar->titulo .' | Catálogo Turístico')

@section('content')
    @php
        // Optimizing Unsplash Image URL to w=1000 for the detail page
        $optimizedDetailImage = Str::replace('w=1200', 'w=1000&q=85&fit=crop', $lugar->imagen);

        // Determine category style & emoji
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
    @endphp

    <section class="relative bg-gradient-to-b from-teal-50/20 via-transparent to-transparent py-12 lg:py-16">
        <!-- Background accents -->
        <div class="absolute -top-12 right-0 h-96 w-96 rounded-full bg-teal-200/5 blur-3xl"></div>
        <div class="absolute bottom-1/4 left-0 h-64 w-64 rounded-full bg-amber-200/5 blur-3xl"></div>

        <div class="mx-auto max-w-6xl px-6">
            <!-- Navigation header & back link -->
            <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <nav class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    <a href="{{ route('home') }}" class="hover:text-teal-600 transition-colors">Inicio</a>
                    <span>/</span>
                    <a href="{{ route('home') }}" class="hover:text-teal-600 transition-colors">Lugares</a>
                    <span>/</span>
                    <span class="text-slate-600">{{ $lugar->titulo }}</span>
                </nav>
                
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-full border border-teal-100 bg-white px-5 py-2 text-xs font-bold text-teal-700 shadow-sm transition-all duration-300 hover:bg-teal-50 hover:text-teal-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4.5 w-4.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    <span>Volver al Catálogo</span>
                </a>
            </div>

            <!-- Detail Grid Layout -->
            <div class="grid gap-10 lg:grid-cols-[1.8fr_1fr] lg:items-start">
                <!-- Left: Destination Info & Main Image -->
                <article class="space-y-8 rounded-[2.5rem] border border-teal-100/30 bg-white p-6 shadow-xl shadow-teal-950/5 md:p-8">
                    <!-- Title & Category Header -->
                    <div class="space-y-4">
                        <span class="inline-flex items-center gap-1 rounded-full border px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider {{ $badgeStyle }}">
                            <span>{{ $icon }}</span> {{ $lugar->categoria }}
                        </span>
                        
                        <h1 class="font-serif text-3xl font-extrabold tracking-tight text-slate-800 sm:text-4xl md:text-5xl">
                            {{ $lugar->titulo }}
                        </h1>
                        
                        <p class="text-xs uppercase tracking-widest text-slate-400 font-extrabold">
                            📍 {{ $lugar->departamento }}, El Salvador
                        </p>
                    </div>

                    <!-- Destination Banner Image -->
                    <div class="overflow-hidden rounded-[2rem] border border-teal-100/20 shadow-md">
                        <img 
                            src="{{ $optimizedDetailImage }}" 
                            alt="{{ $lugar->titulo }}" 
                            class="h-[300px] w-full object-cover transition-transform duration-700 hover:scale-102 sm:h-[400px] md:h-[450px]" 
                            loading="lazy" 
                        />
                    </div>

                    <!-- Description Block -->
                    <div class="space-y-4 border-t border-slate-100 pt-6">
                        <h2 class="font-serif text-2xl font-bold text-slate-800">Descripción del Lugar</h2>
                        <p class="text-sm leading-relaxed text-slate-600 md:text-base">
                            {{ $lugar->descripcion }}
                        </p>
                    </div>
                </article>

                <!-- Right Sidebar: Price & Specifications -->
                <aside class="space-y-8 lg:sticky lg:top-24">
                    <!-- Price Card with Beautiful Sunset Gradient -->
                    <div class="group relative overflow-hidden rounded-[2.5rem] bg-gradient-to-tr from-orange-500 via-rose-500 to-amber-400 p-8 text-white shadow-xl shadow-orange-500/20">
                        <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-white/10 blur-xl transition-transform duration-500 group-hover:scale-125"></div>
                        <p class="text-xs font-bold uppercase tracking-widest text-orange-100">Precio Sugerido</p>
                        <div class="mt-3 flex items-baseline gap-1">
                            <span class="text-4xl font-extrabold">${{ number_format($lugar->precio, 2) }}</span>
                            <span class="text-xs text-orange-100/80">/ por persona</span>
                        </div>
                    </div>

                    <!-- Detail Spec List -->
                    <div class="rounded-[2.5rem] border border-teal-100/30 bg-white p-8 shadow-xl shadow-teal-950/5">
                        <h3 class="font-serif text-lg font-bold text-slate-800 border-b border-slate-100 pb-4 mb-6">Detalles del Destino</h3>
                        
                        <div class="space-y-6">
                            <!-- Ubicación -->
                            <div class="flex items-start gap-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-teal-50 text-teal-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                </span>
                                <div>
                                    <h4 class="text-2xs font-extrabold uppercase tracking-wider text-slate-400">Dirección exacta</h4>
                                    <p class="mt-1 text-sm font-semibold text-slate-700 leading-snug">{{ $lugar->ubicacion }}</p>
                                </div>
                            </div>

                            <!-- Horario -->
                            <div class="flex items-start gap-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <div>
                                    <h4 class="text-2xs font-extrabold uppercase tracking-wider text-slate-400">Horario de visita</h4>
                                    <p class="mt-1 text-sm font-semibold text-slate-700">{{ $lugar->horario }}</p>
                                </div>
                            </div>

                            <!-- Categoría -->
                            <div class="flex items-start gap-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-rose-50 text-rose-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.44 1.44 0 002.037 0l4.318-4.318a1.44 1.44 0 000-2.037l-9.58-9.581A2.25 2.25 0 009.568 3z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 7.5h.008v.008H6V7.5z" />
                                    </svg>
                                </span>
                                <div>
                                    <h4 class="text-2xs font-extrabold uppercase tracking-wider text-slate-400">Categoría</h4>
                                    <p class="mt-1 text-sm font-semibold text-slate-700">{{ $lugar->categoria }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
