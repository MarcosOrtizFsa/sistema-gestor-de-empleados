<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema de Empleados</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950">

<div class="min-h-screen flex items-center justify-center px-6 py-12">

    <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-2 bg-white rounded-3xl shadow-2xl overflow-hidden">

        <!-- Presentación -->
        <div class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-900 p-10 text-white">

            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_top_left,_#60a5fa,_transparent_35%),radial-gradient(circle_at_bottom_right,_#818cf8,_transparent_35%)]"></div>

            <div class="relative z-10 h-full flex flex-col justify-between">

                <div>
                    <div class="w-14 h-14 rounded-2xl bg-blue-600 flex items-center justify-center text-2xl font-bold shadow-lg">
                        SE
                    </div>

                    <h1 class="mt-10 text-4xl font-bold leading-tight">
                        Sistema de Empleados
                    </h1>

                    <p class="mt-5 text-blue-100 text-lg">
                        Plataforma simple para registrar, consultar y administrar empleados.
                    </p>
                </div>

                <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-white/10 rounded-2xl p-4 backdrop-blur">
                        <p class="text-2xl font-bold">01</p>
                        <p class="text-sm text-blue-100">Registro</p>
                    </div>

                    <div class="bg-white/10 rounded-2xl p-4 backdrop-blur">
                        <p class="text-2xl font-bold">02</p>
                        <p class="text-sm text-blue-100">Listado</p>
                    </div>

                    <div class="bg-white/10 rounded-2xl p-4 backdrop-blur">
                        <p class="text-2xl font-bold">03</p>
                        <p class="text-sm text-blue-100">Gestión</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Login -->
        <div class="p-10 lg:p-14 bg-gray-50">

            <div class="max-w-md mx-auto">

                <h2 class="text-3xl font-bold text-gray-900">
                    Iniciar sesión
                </h2>

                <p class="mt-2 text-gray-500">
                    Ingrese sus datos para acceder al sistema.
                </p>

                <form action="/empleados" method="GET" class="mt-8 space-y-5">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Usuario
                        </label>

                        <input
                            type="text"
                            name="usuario"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese su usuario">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese su contraseña">
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" class="rounded border-gray-300">
                            Recordarme
                        </label>

                        <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">
                            ¿Olvidó su clave?
                        </a>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-lg transition">
                        Entrar al sistema
                    </button>

                </form>

                <div class="mt-6 text-center">
                    <a href="/formulario" class="text-sm font-semibold text-gray-600 hover:text-blue-600">
                        Registrar nuevo empleado sin iniciar sesión
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>