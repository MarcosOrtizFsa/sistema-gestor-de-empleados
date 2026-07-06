@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-slate-800 to-slate-900 px-8 py-6">
            <h1 class="text-3xl font-bold text-white">
                Control de Asistencia
            </h1>
            <p class="text-slate-300 mt-1">
                Registro de entrada y salida del personal
            </p>
        </div>

        <div class="p-8">

            @if(session('success'))
                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('asistencia.marcar') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        DNI del empleado
                    </label>

                    <input
                        type="text"
                        name="dni"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Ingrese DNI"
                        required>
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow transition">
                    Marcar entrada / salida
                </button>
            </form>

        </div>

    </div>

</div>

@endsection