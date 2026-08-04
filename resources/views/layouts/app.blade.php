<!DOCTYPE html>
<html lang="es" class="scroll-smooth bg-[#F8FAFA] text-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Catálogo Turístico'))</title>
    <!-- Google Fonts: Plus Jakarta Sans for UI & Playfair Display for Serifs -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-[radial-gradient(100%_100%_at_top_right,rgba(20,184,166,0.06),transparent),radial-gradient(100%_100%_at_bottom_left,rgba(245,158,11,0.04),transparent)] bg-[#F8FAFA] text-slate-800 antialiased selection:bg-teal-100 selection:text-teal-900" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <!-- Sticky Glassmorphic Navbar -->
    <header class="sticky top-0 z-50 w-full border-b border-teal-100/40 bg-white/75 backdrop-blur-md transition-all duration-300">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="group flex items-center gap-3 text-xl font-bold tracking-tight text-slate-800">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-tr from-teal-400 via-emerald-400 to-amber-300 shadow-md shadow-teal-500/10 transition-transform duration-300 group-hover:scale-110">
                    🌴
                </span>
                <span class="bg-gradient-to-r from-teal-700 via-emerald-600 to-teal-800 bg-clip-text text-transparent">El Salvador Travel</span>
            </a>

            <!-- Navigation Links -->
            <nav class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="relative text-sm font-semibold text-slate-600 transition-colors duration-200 hover:text-teal-600 after:absolute after:bottom-[-4px] after:left-0 after:h-[2px] after:w-0 after:bg-teal-500 after:transition-all after:duration-300 hover:after:w-full {{ request()->routeIs('home') ? 'text-teal-600 after:w-full' : '' }}">
                    Inicio
                </a>
                <a href="{{ route('contacto.create') }}" class="group relative flex items-center gap-2 overflow-hidden rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-teal-500/10 transition-all duration-300 hover:from-teal-600 hover:to-emerald-600 hover:shadow-lg hover:shadow-teal-500/20">
                    <span>Contacto</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.3" stroke="currentColor" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="relative z-10">
        @yield('content')
    </main>

    <!-- Representative Modern Footer -->
    <footer class="relative mt-20 overflow-hidden border-t border-teal-100/40 bg-white py-16">
        <!-- Tropical decorative top line -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-teal-400 via-emerald-400 to-amber-300"></div>
        
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid grid-cols-1 gap-10 md:grid-cols-4">
                <!-- Brand Section -->
                <div class="space-y-4 md:col-span-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-bold text-slate-800">
                        <span class="text-xl">🌴</span>
                        <span class="bg-gradient-to-r from-teal-700 to-emerald-600 bg-clip-text text-transparent">El Salvador Travel</span>
                    </a>
                    <p class="max-w-sm text-sm leading-relaxed text-slate-500">
                        Descubre la magia de El Salvador. Desde majestuosos volcanes hasta paradisíacas playas de surf y pintorescos pueblos coloniales.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <!-- Social Icons -->
                        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full bg-teal-50 text-teal-600 transition-colors hover:bg-teal-100">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full bg-teal-50 text-teal-600 transition-colors hover:bg-teal-100">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 0c-3.182 0-3.58.013-4.832.071-3.642.166-5.203 1.714-5.37 5.368-.058 1.252-.07 1.65-.07 4.832s.012 3.58.07 4.832c.166 3.633 1.722 5.195 5.37 5.368 1.252.057 1.65.07 4.832.07s3.58-.013 4.832-.07c3.642-.166 5.203-1.714 5.37-5.368.059-1.252.07-1.65.07-4.832s-.012-3.58-.07-4.832c-.166-3.633-1.722-5.195-5.37-5.368-1.252-.057-1.65-.07-4.832-.07zm-1.125 2.162c2.868 0 3.208.01 4.339.062 2.604.119 3.551 1.077 3.67 3.669.052 1.131.062 1.471.062 4.339s-.01 3.208-.062 4.339c-.119 2.592-.1.066-3.67 3.669-1.131.052-1.471.062-4.339.062s-3.208-.01-4.339-.062c-2.604-.119-3.551-1.077-3.67-3.669-.052-1.131-.062-1.471-.062-4.339s.01-3.208.062-4.339c.119-2.592 1.077-3.551 3.67-3.669 1.131-.052 1.471-.062 4.339-.062zm.223 3.663c-3.109 0-5.629 2.52-5.629 5.629s2.52 5.629 5.629 5.629 5.629-2.52 5.629-5.629-2.52-5.629-5.629-5.629zm0 9.213c-1.979 0-3.584-1.605-3.584-3.584s1.605-3.584 3.584-3.584 3.584 1.605 3.584 3.584-1.605 3.584-3.584 3.584zm5.882-9.45c0 .712-.577 1.29-1.29 1.29s-1.29-.578-1.29-1.29.577-1.29 1.29-1.29 1.29.578 1.29 1.29z"/></svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Navegación</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="{{ route('home') }}" class="text-sm text-slate-500 transition-colors hover:text-teal-600">Inicio</a></li>
                        <li><a href="{{ route('contacto.create') }}" class="text-sm text-slate-500 transition-colors hover:text-teal-600">Contacto</a></li>
                    </ul>
                </div>
                
                <!-- Representational Info -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Turismo</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-sm text-slate-500 transition-colors hover:text-teal-600">Volcanes</a></li>
                        <li><a href="#" class="text-sm text-slate-500 transition-colors hover:text-teal-600">Playas</a></li>
                        <li><a href="#" class="text-sm text-slate-500 transition-colors hover:text-teal-600">Pueblos</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-12 border-t border-slate-100 pt-8 text-center md:flex md:items-center md:justify-between md:text-left">
                <p class="text-xs text-slate-400">
                    &copy; {{ date('Y') }} El Salvador Travel. Todos los derechos reservados.
                </p>
                <!-- <p class="mt-4 text-xs text-slate-400 md:mt-0">
                    Diseñado con pasión por la aventura.
                </p> -->
            </div>
        </div>
    </footer>
</body>
</html>
