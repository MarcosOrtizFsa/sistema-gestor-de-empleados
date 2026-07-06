@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

            <!-- Cabecera -->
            <div class="bg-gradient-to-r from-blue-700 to-indigo-700 px-8 py-6">
                <h1 class="text-3xl font-bold text-white">
                    Registro de Empleados
                </h1>

                <p class="text-blue-100 mt-2">
                    Complete los datos del nuevo empleado.
                </p>
            </div>

            <!-- Formulario -->
            <div class="p-8">

                <form action="/formulario" method="POST">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Nombre -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nombre
                            </label>

                            <input
                                type="text"
                                name="nombre"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Ingrese el nombre"
                                required>
                        </div>

                        <!-- Apellido -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Apellido
                            </label>

                            <input
                                type="text"
                                name="apellido"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Ingrese el apellido"
                                required>
                        </div>

                        <!-- Domicilio -->
                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Domicilio
                            </label>

                            <input
                                type="text"
                                name="domicilio"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Ingrese el domicilio">

                        </div>

                        <!-- Email -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="correo@empresa.com">

                        </div>

                        <!-- DNI -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                DNI
                            </label>

                            <input
                                type="text"
                                name="dni"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="12345678">

                        </div>

                        <!-- Celular -->
                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Celular
                            </label>

                            <input
                                type="text"
                                name="celular"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="3704-123456">

                        </div>

                    </div>

                    <div class="mt-8 flex justify-end">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition duration-300">

                            💾 Guardar empleado

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection

