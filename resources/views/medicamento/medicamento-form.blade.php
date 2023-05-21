@extends('layouts.windmill')
@section('contenido')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Formulario de Medicamentos
    </h4>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        @include('partials.form-errors')

        @if(isset($medicamento))
            <!-- Edición de medicamento-->
            <form action=" {{ route('medicamento.update', $medicamento) }}" method="POST">
                @method('PATCH')
        @else
            <!-- Creación de medicamento-->
            <form action="{{ route('medicamento.store') }}" method="POST">
        @endif

        @csrf

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre del Medicamento:</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                name="nombre"
                id="nombre"
                value="{{ old('nombre') ?? $medicamento->nombre ?? '' }}"
            />
            @error('nombre')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Clasificacion:</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                name="clasificacion"
                id="clasificacion"
                value="{{ old('clasificacion') ?? $medicamento->clasificacion ?? '' }}"
            />
            @error('clasificacion')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Potencia:</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="number"
                name="potencia"
                id="potencia"
                value="{{ old('potencia') ?? $medicamento->potencia ?? '' }}"
            />
            @error('potencia')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Precio:</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="number"
                name="precio"
                id="precio"
                value="{{ old('precio') ?? $medicamento->precio ?? '' }}"
            />
            @error('precio')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Propiedades:</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                name="propiedades"
                id="propiedades"
                value="{{ old('propiedades') ?? $medicamento->propiedades ?? '' }}"
            />
            @error('propiedades')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Laboratorio:</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                name="laboratorio"
                id="laboratorio"
                value="{{ old('laboratorio') ?? $medicamento->laboratorio ?? '' }}"
            />
            @error('laboratorio')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </label>

            <div class="mt-4">
                <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit"
                >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                </svg>
                  <span>Guardar</span>
                </button>
            </div>

            </form>
    </div>

@endsection


