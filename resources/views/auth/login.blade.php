<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPLF - Inicio de sesión</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950">

<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 py-10">

    <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-2 bg-white rounded-3xl shadow-2xl overflow-hidden">

        {{-- Presentación institucional --}}
        <div class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-900 p-8 sm:p-10 text-white">

            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_top_left,_#60a5fa,_transparent_35%),radial-gradient(circle_at_bottom_right,_#818cf8,_transparent_35%)]"></div>

            <div class="relative z-10 h-full flex flex-col justify-between">

                <div>
                    <div class="w-14 h-14 rounded-2xl bg-blue-600 flex items-center justify-center text-2xl font-bold shadow-lg">
                        PL
                    </div>

                    <p class="mt-8 text-blue-200 text-sm uppercase tracking-wide font-semibold">
                        Poder Legislativo de la Provincia de Formosa
                    </p>

                    <h1 class="mt-3 text-4xl font-bold leading-tight">
                        SIPLF
                    </h1>

                    <p class="mt-3 text-blue-100 text-xl font-semibold">
                        Sistema Integral del Personal
                    </p>

                    <p class="mt-5 text-blue-100 text-base sm:text-lg">
                        Plataforma institucional para la gestión del personal legislativo, control de asistencia e historial de marcaciones.
                    </p>
                </div>


            </div>
        </div>

        {{-- Login --}}
        <div class="p-8 sm:p-10 lg:p-14 bg-gray-50">

            <div class="max-w-md mx-auto">

                <h2 class="text-3xl font-bold text-gray-900">
                    Iniciar sesión
                </h2>

                <p class="mt-2 text-gray-500">
                    Ingrese sus credenciales para acceder al sistema.
                </p>

                @if (session('error'))
                    <div class="mt-6 bg-red-100 border border-red-300 text-red-800 px-5 py-4 rounded-xl shadow">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="mt-8 space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Usuario
                        </label>

                        <input
                            type="text"
                            name="usuario"
                            value="{{ old('usuario') }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese su usuario"
                            autocomplete="username"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese su contraseña"
                            autocomplete="current-password"
                            required>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" name="remember" class="rounded border-gray-300">
                            Recordarme
                        </label>

                        <span class="text-gray-400">
                            Acceso institucional
                        </span>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-lg transition">
                        Entrar al sistema
                    </button>

                </form>

                <div class="mt-8 border-t pt-5 text-center">
                    <p class="text-xs text-gray-400">
                        Poder Legislativo de la Provincia de Formosa
                    </p>
                    <p class="text-xs text-gray-400 mt-1">
                        Departamento de Personal Legislativo
                    </p>
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>