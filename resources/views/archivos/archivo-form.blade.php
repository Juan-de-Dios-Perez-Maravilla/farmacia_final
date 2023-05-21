@extends('layouts.windmill')
@section('contenido')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Carga de Archivos
    </h4>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        @include('partials.form-errors')

        <form action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="block mt-4 text-sm"> 
                <span class="text-gray-700 dark:text-gray-400">
                    Seleccione el archivo a cargar
                </span>
                <input type="file" name="archivo" id="archivo">

            </label>
            <div class="mt-4">
                <button class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                    type="submit"
                    >

                  <span>Cargar</span>
                </button>
            </div>

        </form>
        <br>
        <hr>
    </div>

@endsection