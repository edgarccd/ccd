<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{

    public function index()
    {
        $divisiones = Division::orderBy('nombre')
            ->get();
        return view('divisiones.index', ['divisiones' => $divisiones]);
    }

    public function create()
    {
        return view('divisiones.create', ['division' => new Division()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
        ]);

        Division::create([
            'nombre' => $request->input('nombre'),
            'acronimo' => $request->input('acronimo'),
            'activo' => 1,
        ]);

        session()->flash('status', 'Division Registrada con exito');
        return to_route('divisiones.index')->with('status', 'Division registrada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

   
    public function edit(Division $division)
    {
        return view('divisiones.edit', ['division' => $division]);
    }

public function actualizar(){
    echo "Hola";
}

    public function update(Request $request, $division)
    {        
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'acronimo' => ['required'],
            'ruta' => ['required'],            
        ]);

        $division = Division::find($division);
        $division->nombre = $request->input('nombre');
        $division->acronimo = $request->input('acronimo');
        $division->updated_at = now();
        $division->save();

        return to_route('divisiones.index')->with('status', 'Division actualizada con exito');
    }

    public function activar(Division $division){
        if($division->activo ==1){
            $division->activo = 0;
            }else{
            $division->activo = 1;
            }
            $division->save();
            return to_route('divisiones.index')->with('status', 'Division actualizada');
    }

    public function destroy(Division $division)
    {
        $division->delete();
        return to_route('divisiones.index')->with('status', 'Division eliminada');
    }
}
