<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MedicamentoController extends Controller
{
    /**
     * Muestra listado de medicamentos de usuario que ha ingresado.
     */
    public function index()
    {
        
        $medicamentos = Auth::user()->medicamentos()->with('user:id,name')->get();

        return view('medicamento.medicamento-index', compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')) {

            return view('medicamento.medicamento-form');
        } else {
            return redirect('/');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:255'],
            'clasificacion' => 'required|string|min:5|max:255',
            'potencia' => 'required|integer|min:1',
            'precio' => 'required|integer|min:1',
            'propiedades' => 'required|string|min:5|max:255',
            'laboratorio' => 'required|string|min:3|max:255',
        ]);
        
        $request->merge(['user_id' => Auth::id()]);
        Medicamento::create($request->all());

        return redirect()->route('medicamento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        Gate::authorize('admin');
        $responsables = Responsable::get();
        return view('medicamento.medicamento-show', compact('medicamento', 'responsables'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        Gate::authorize('admin');
        return view('medicamento.medicamento-form', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:255'],
            'clasificacion' => 'required|string|min:5|max:255',
            'potencia' => 'required|integer|min:1',
            'precio' => 'required|integer|min:1',
            'propiedades' => 'required|string|min:5|max:255',
            'laboratorio' => 'required|string|min:3|max:255',
        ]);
        Medicamento::where('id', $medicamento->id)->update($request->except('_token', '_method'));

        return redirect()->route('medicamento.show', $medicamento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return redirect()->route('medicamento.index');
    }


    /**
     * Agregar un responsable a un medicamento.
     */

    public function agregaResponsable(Request $request, Medicamento $medicamento)
    {
        $medicamento->responsables()->sync($request->responsable_id);

        return redirect()->route('medicamento.show', $medicamento);

    }
}
