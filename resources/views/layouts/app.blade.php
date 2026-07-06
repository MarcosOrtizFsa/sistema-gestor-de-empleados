<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Empleados</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

    <header class="bg-slate-900 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="/" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold">
                    SE
                </div>

                <div>
                    <h1 class="text-white text-xl font-bold">
                        Sistema de Empleados
                    </h1>
                    <p class="text-slate-300 text-sm">
                        Gestión administrativa
                    </p>
                </div>
            </a>

            <nav class="flex items-center gap-4">
                <a href="/formulario"
                   class="text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-2 rounded-lg transition">
                    Nuevo empleado
                </a>

                <a href="/empleados"
                   class="text-slate-200 hover:text-white hover:bg-slate-800 px-4 py-2 rounded-lg transition">
                    Lista de empleados
                </a>
            </nav>

        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    <footer class="mt-10 bg-white border-t">
        <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-gray-500">
            Programación III - Laravel 12 - Sistema de Empleados
        </div>
    </footer>

</body>
</html>