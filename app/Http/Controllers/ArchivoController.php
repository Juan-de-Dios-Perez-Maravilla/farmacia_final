<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archivos = Archivo::all();
        return view('archivos.archivo-index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('archivos.archivo-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('archivo') && $request->file('archivo')->isValid()) {
            $ruta = $request->archivo->store('documentos');

            //Crear registro en tabla archivos
            $archivo = new Archivo();
            $archivo->ruta = $ruta;
            $archivo->nombre_original = $request->archivo->getClientOriginalName();
            $archivo->mime = $request->archivo->getMimeType();
            $archivo->save();

        }
        return redirect()->route('archivo.index');
    }

    /**
     * Display the specified resource.
     */
    public function descargar(Archivo $archivo)
    {
        return Storage::download($archivo->ruta, $archivo->nombre_original, ['Content-Type' => $archivo->mime]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archivo $archivo)
    {
        //
    }
}
