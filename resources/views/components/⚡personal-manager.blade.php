<?php

use Livewire\Component;
use App\Models\Empleados;

new class extends Component {

    public $empleados;

    public bool $mostrarFormulario = false;
    public ?int $empleadoId = null;

    public $nombre;
    public $apellido;
    public $dni;
    public $correo;
    public $celular;
    public $domicilio;

    public function mount()
    {
        $this->cargarEmpleados();
    }

    public function cargarEmpleados()
    {
        $this->empleados = Empleados::latest()->get();
    }

    public function nuevo()
    {
        $this->limpiarFormulario();
        $this->mostrarFormulario = true;
    }

    public function editar($id)
    {
        $empleado = Empleados::findOrFail($id);

        $this->empleadoId = $empleado->id;
        $this->nombre = $empleado->nombre;
        $this->apellido = $empleado->apellido;
        $this->dni = $empleado->dni;
        $this->correo = $empleado->correo;
        $this->celular = $empleado->celular;
        $this->domicilio = $empleado->domicilio;

        $this->mostrarFormulario = true;
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:255',
            'celular' => 'nullable|string|max:50',
            'domicilio' => 'nullable|string|max:255',
        ]);

        Empleados::updateOrCreate(
            ['id' => $this->empleadoId],
            [
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'dni' => $this->dni,
                'correo' => $this->correo,
                'celular' => $this->celular,
                'domicilio' => $this->domicilio,
            ]
        );

        session()->flash(
            'success',
            $this->empleadoId
                ? 'Personal actualizado correctamente.'
                : 'Personal registrado correctamente.'
        );

        $this->limpiarFormulario();
        $this->mostrarFormulario = false;
        $this->cargarEmpleados();
    }

    public function cancelar()
    {
        $this->limpiarFormulario();
        $this->mostrarFormulario = false;
    }

    private function limpiarFormulario()
    {
        $this->reset([
            'empleadoId',
            'nombre',
            'apellido',
            'dni',
            'correo',
            'celular',
            'domicilio',
        ]);
    }
};

?>

<div>

    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Personal Legislativo
            </h1>

            <p class="text-gray-500 mt-1">
                Gestión del personal de la Legislatura de Formosa.
            </p>
        </div>

        <button wire:click="nuevo"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow transition">
            Agregar personal
        </button>
    </div>

    @if($mostrarFormulario)

        <div class="bg-white rounded-2xl shadow p-6 mb-8 border border-gray-100">

            <h2 class="text-xl font-bold text-gray-800 mb-6">
                {{ $empleadoId ? 'Editar personal' : 'Agregar nuevo personal' }}
            </h2>

            <form wire:submit="guardar" class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nombre
                    </label>

                    <input type="text"
                           wire:model="nombre"
                           class="w-full rounded-xl border-gray-300">

                    @error('nombre')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Apellido
                    </label>

                    <input type="text"
                           wire:model="apellido"
                           class="w-full rounded-xl border-gray-300">

                    @error('apellido')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        DNI
                    </label>

                    <input type="text"
                           wire:model="dni"
                           class="w-full rounded-xl border-gray-300">

                    @error('dni')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>

                    <input type="email"
                           wire:model="correo"
                           class="w-full rounded-xl border-gray-300">

                    @error('correo')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Celular
                    </label>

                    <input type="text"
                           wire:model="celular"
                           class="w-full rounded-xl border-gray-300">

                    @error('celular')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Domicilio
                    </label>

                    <input type="text"
                           wire:model="domicilio"
                           class="w-full rounded-xl border-gray-300">

                    @error('domicilio')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2 flex flex-col sm:flex-row gap-3 pt-4">

                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl shadow">
                        Guardar
                    </button>

                    <button type="button"
                            wire:click="cancelar"
                            class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-3 rounded-xl shadow">
                        Cancelar
                    </button>

                </div>

            </form>

        </div>

    @endif

    <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100">

        <div class="border-b px-6 py-4">
            <h2 class="text-xl font-bold text-gray-800">
                Listado de Personal
            </h2>
        </div>

        <div class="hidden md:block overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left p-4">Apellido y Nombre</th>
                        <th class="text-left p-4">DNI</th>
                        <th class="text-left p-4">Email</th>
                        <th class="text-left p-4">Celular</th>
                        <th class="text-right p-4">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($empleados as $empleado)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-4 font-semibold">
                                {{ $empleado->apellido }}, {{ $empleado->nombre }}
                            </td>

                            <td class="p-4">
                                {{ $empleado->dni ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $empleado->correo ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $empleado->celular ?? '-' }}
                            </td>

                            <td class="p-4 text-right">
                                <button wire:click="editar({{ $empleado->id }})"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg">
                                    Editar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                No hay personal registrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden p-4 space-y-4">
            @forelse($empleados as $empleado)
                <div class="border rounded-xl p-4 bg-gray-50">

                    <p class="font-bold text-gray-800">
                        {{ $empleado->apellido }}, {{ $empleado->nombre }}
                    </p>

                    <p class="text-sm text-gray-500 mt-1">
                        DNI: {{ $empleado->dni ?? '-' }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Email: {{ $empleado->correo ?? '-' }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Celular: {{ $empleado->celular ?? '-' }}
                    </p>

                    <button wire:click="editar({{ $empleado->id }})"
                            class="mt-4 bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg">
                        Editar
                    </button>

                </div>
            @empty
                <div class="p-6 text-center text-gray-500">
                    No hay personal registrado.
                </div>
            @endforelse
        </div>

    </div>

</div>