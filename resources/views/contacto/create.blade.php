@extends('layouts.app')

@section('title', 'Contacto | Catálogo Turístico')

@section('content')
    <section class="relative bg-gradient-to-b from-teal-50/20 via-transparent to-transparent py-16 lg:py-24">
        <!-- Background accents -->
        <div class="absolute -top-12 left-0 h-96 w-96 rounded-full bg-teal-200/5 blur-3xl"></div>
        <div class="absolute bottom-1/4 right-0 h-64 w-64 rounded-full bg-amber-200/5 blur-3xl"></div>

        <div class="mx-auto max-w-5xl px-6">
            <div class="rounded-[2.5rem] border border-teal-100/30 bg-white/70 p-6 shadow-xl shadow-teal-950/5 backdrop-blur-xl md:p-10 lg:p-12">
                <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
                    <!-- Left: Informational Text & Cards -->
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-orange-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-orange-800">
                                <span>✉️</span> Hablemos
                            </span>
                            <h1 class="font-serif text-3xl font-extrabold tracking-tight text-slate-800 sm:text-4xl md:text-5xl">
                                ¿Tienes alguna pregunta? Escríbenos.
                            </h1>
                            <p class="text-sm leading-relaxed text-slate-600 md:text-base">
                                Nuestro equipo te ayudará a planificar tu visita y encontrar los mejores destinos turísticos de El Salvador. ¡Estamos para servirte!
                            </p>
                        </div>

                        <!-- Direct info cards -->
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl border border-teal-100/40 bg-teal-50/20 p-5 space-y-2">
                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-teal-100 text-teal-600 text-sm">📧</span>
                                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Escríbenos</h4>
                                <p class="text-sm font-semibold text-slate-700">info@elsalvador.travel</p>
                            </div>
                            <div class="rounded-2xl border border-orange-100/40 bg-orange-50/20 p-5 space-y-2">
                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-orange-100 text-orange-600 text-sm">📞</span>
                                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Llámanos</h4>
                                <p class="text-sm font-semibold text-slate-700">+503 1234 5678</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Form Box -->
                    <div class="rounded-[2rem] border border-teal-100/30 bg-white p-6 shadow-md shadow-teal-950/5 md:p-8">
                        <!-- Response Indicator Pill -->
                        <div class="mb-8 flex items-center justify-between gap-4 rounded-2xl bg-teal-50/50 p-4 border border-teal-100/20">
                            <div>
                                <h4 class="text-2xs font-extrabold uppercase tracking-wider text-teal-500">Compromiso de respuesta</h4>
                                <p class="mt-1 text-base font-bold text-slate-700">Menos de 24 horas</p>
                            </div>
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-teal-500 text-white text-sm font-bold shadow-md shadow-teal-500/10">✓</span>
                        </div>

                        <!-- Success Alert Message -->
                        @if (session('success'))
                            <div class="mb-6 flex items-start gap-3 rounded-2xl bg-emerald-50 p-4 text-sm text-emerald-800 border border-emerald-100 shadow-sm animate-fade-in">
                                <span class="text-lg">🎉</span>
                                <div>
                                    <p class="font-bold">¡Mensaje enviado!</p>
                                    <p class="mt-0.5 text-xs text-emerald-700/90">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contacto.store') }}" method="POST" class="space-y-5">
                            @csrf
                            
                            <!-- Nombre -->
                            <div class="space-y-1.5">
                                <label for="nombre" class="text-xs font-bold uppercase tracking-wider text-slate-500">Nombre Completo</label>
                                <input 
                                    type="text" 
                                    id="nombre"
                                    name="nombre" 
                                    value="{{ old('nombre') }}" 
                                    placeholder="Ej. Juan Pérez"
                                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100/50" 
                                />
                                @error('nombre')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Correo -->
                            <div class="space-y-1.5">
                                <label for="correo" class="text-xs font-bold uppercase tracking-wider text-slate-500">Correo Electrónico</label>
                                <input 
                                    type="email" 
                                    id="correo"
                                    name="correo" 
                                    value="{{ old('correo') }}" 
                                    placeholder="juan@ejemplo.com"
                                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100/50" 
                                />
                                @error('correo')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Teléfono -->
                            <div class="space-y-1.5">
                                <label for="telefono" class="text-xs font-bold uppercase tracking-wider text-slate-500">Teléfono</label>
                                <input 
                                    type="text" 
                                    id="telefono"
                                    name="telefono" 
                                    value="{{ old('telefono') }}" 
                                    placeholder="12345678"
                                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100/50" 
                                />
                                @error('telefono')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Mensaje -->
                            <div class="space-y-1.5">
                                <label for="mensaje" class="text-xs font-bold uppercase tracking-wider text-slate-500">Mensaje</label>
                                <textarea 
                                    id="mensaje"
                                    name="mensaje" 
                                    rows="4" 
                                    placeholder="¿En qué te podemos ayudar?"
                                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100/50"
                                >{{ old('mensaje') }}</textarea>
                                @error('mensaje')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button 
                                type="submit" 
                                class="group flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 py-3 text-sm font-bold text-white shadow-md shadow-teal-500/10 transition-all duration-300 hover:from-teal-600 hover:to-emerald-600 hover:shadow-lg hover:shadow-teal-500/20"
                            >
                                <span>Enviar Mensaje</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
