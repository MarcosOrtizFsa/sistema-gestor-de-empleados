<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPLF - Sistema Integral del Personal</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

    <header class="bg-slate-900 shadow-lg">

        <div class="max-w-7xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between">

                {{-- Identidad institucional --}}
                <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold shadow">
                        PL
                    </div>

                    <div>
                        <p class="text-slate-300 text-xs uppercase tracking-wide">
                            Poder Legislativo
                        </p>

                        <h1 class="text-white text-xl font-bold leading-tight">
                            SIPLF
                        </h1>

                        <p class="text-slate-300 text-sm hidden sm:block">
                            Sistema Integral del Personal
                        </p>
                    </div>

                </a>

                {{-- Botón móvil --}}
                <button id="menuButton"
                        type="button"
                        class="md:hidden text-white bg-slate-800 hover:bg-slate-700 p-2 rounded-lg focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                {{-- Menú escritorio --}}
                <nav class="hidden md:flex items-center gap-2">

                    <a href="{{ route('dashboard.index') }}"
                       class="text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-2 rounded-lg transition">
                        Dashboard
                    </a>

                    <a href="{{ route('personal.index') }}"
                       class="text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-2 rounded-lg transition">
                        Personal
                    </a>

                    <a href="{{ route('asistencias.index') }}"
                       class="text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-2 rounded-lg transition">
                        Asistencia
                    </a>

                    <a href="{{ route('asistencias.historial') }}"
                       class="text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-2 rounded-lg transition">
                        Historial
                    </a>

                    <a href="{{ route('logout') }}"
                       class="ml-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">
                        Salir
                    </a>

                </nav>

            </div>

            {{-- Menú móvil --}}
            <nav id="mobileMenu" class="hidden md:hidden mt-4 border-t border-slate-700 pt-4 space-y-2">

                <a href="{{ route('dashboard.index') }}"
                   class="block text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-3 rounded-lg transition">
                    Dashboard
                </a>

                <a href="{{ route('personal.index') }}"
                   class="block text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-3 rounded-lg transition">
                    Personal
                </a>

                <a href="{{ route('asistencias.index') }}"
                   class="block text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-3 rounded-lg transition">
                    Asistencia
                </a>

                <a href="{{ route('asistencias.historial') }}"
                   class="block text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-3 rounded-lg transition">
                    Historial
                </a>


                <a href="{{ route('logout') }}"
                   class="block bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-lg transition">
                    Salir
                </a>

            </nav>

        </div>

    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        @if (session('success'))
            <div id="flash-message"
                class="mb-6 bg-green-100 border border-green-300 text-green-800 px-5 py-4 rounded-xl shadow">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="flash-message"
                class="mb-6 bg-red-100 border border-red-300 text-red-800 px-5 py-4 rounded-xl shadow">
                {{ session('error') }}
            </div>
        @endif

        @if (session('info'))
            <div id="flash-message"
                class="mb-6 bg-blue-100 border border-blue-300 text-blue-800 px-5 py-4 rounded-xl shadow">
                {{ session('info') }}
            </div>
        @endif

        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset

    </main>

    <footer class="mt-10 bg-white border-t">
        <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-gray-500">
            Poder Legislativo de la Provincia de Formosa · SIPLF · Laravel 12
        </div>
    </footer>

    <script>
        const menuButton = document.getElementById('menuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        menuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    <script>
        setTimeout(function () {
            const flashMessage = document.getElementById('flash-message');

            if (flashMessage) {
                flashMessage.style.transition = 'opacity 0.5s ease';
                flashMessage.style.opacity = '0';

                setTimeout(function () {
                    flashMessage.remove();
                }, 500);
            }
        }, 3500);
    </script>
</body>
</html>