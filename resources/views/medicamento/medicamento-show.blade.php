@extends('layouts.windmill')
@section('contenido')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Detalle del medicamento
</h2>


<div class="grid gap-6 mb-8 md:grid-cols-2">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
        {{ $medicamento->nombre }}
    </h4>
    <p class="text-gray-600 dark:text-gray-400">
        <ul>
            <li>Clasificacion: {{ $medicamento->clasificacion }}</li>
            <li>Potencia: {{ $medicamento->potencia }}</li>
            <li>Precio: {{ $medicamento->precio }}</li>
            <li>Propiedades: {{ $medicamento->propiedades }}</li>
            <li>Laboratorio: {{ $medicamento->laboratorio }}</li>
        </ul>
    </p>
    </div>

    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Responsables de los medicamentos
            </h4>
            <p class="text-gray-600 dark:text-gray-400">
                <ul>
                    @foreach ($medicamento->responsables as $responsable)
                        <li>{{ $responsable->nombre  }}</li>
                    @endforeach
                    
                </ul>
            </p>
    </div>

</div>

    <div class="grid gap-6 mb-8 md:grid-cols-2">

        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Agregar Responsables
            </h4>
            <p class="text-gray-600 dark:text-gray-400">
                <form action="{{ route('medicamento.agrega-responsable', $medicamento) }}" method="POST">
                    @csrf
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                        Seleccione Responsable
                        </span>

                        <select 
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                            multiple
                            name="responsable_id[]"
                        >
                            @foreach ($responsables as $responsable)
                                <option value="{{ $responsable->id }}" {{ array_search($responsable->id, $medicamento->responsables->pluck('id')->toArray()) !== false ? 'selected' : '' }}>{{ $responsable->nombre }}</option>
                            @endforeach
                        
                        </select>
                    </label>

                    <button 
                        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        type="submit"
                    >
                    <span>Actualizar  responsables</span>
                </button>

                </form>
            </p>
        </div>
    
    </div>

@can('delete', $medicamento)
    <form action="{{ route('medicamento.destroy', $medicamento) }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="mt-4">
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
                <span>Eliminar Medicamento</span>
            </button>
        </div>
    </form>
@endcan

    <br>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="{{ route('medicamento.index') }}">
        Regresar a Listado de Medicamentos
    </a>
</h4>


@endsection