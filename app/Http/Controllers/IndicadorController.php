<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicador;

class IndicadorController extends Controller
{

    public function index()
    {
        $indicadores = Indicador::orderBy('criterio_id')
            ->get();
        return view('indicadores.index', ['indicadores' => $indicadores]);
    }


    public function create()
    {
        return view('indicadores.create', ['indicador' => new Indicador()]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'descripcion' => ['required', 'min:4'],
            'ponderacion' => ['required'],
            'criterio_id' => ['required'],    
            'cuestionario_id' => ['required'],
               
        ]);

        Indicador::create([
            'descripcion' => $request->input('descripcion'),
            'ponderacion' => $request->input('ponderacion'),
            'criterio_id' => $request->input('criterio_id'),
            'cuestionario_id' => $request->input('cuestionario_id'),
            'activo' => 1,
        ]);

        return to_route('indicadores.index')->with('status', 'Indicador registrada con exito');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Indicador $indicador)
    {
        return view('indicadores.edit', ['indicador' => $indicador]);
    }


    public function update(Request $request, $indicador)
    {
  

        $indicador = Indicador::find($indicador);
        $indicador->descripcion = $request->input('descripcion');
        $indicador->ponderacion = $request->input('ponderacion');
        $indicador->criterio_id = $request->input('criterio_id');
        $indicador->cuestionario_id = $request->input('cuestionario_id');
       
        $indicador->updated_at = now();
        $indicador->save();

        return to_route('indicadores.index')->with('status', 'Indicador actualizadp con exito');
    }


    public function destroy(Indicador $indicador)
    {
        $indicador->delete();
        return to_route('indicadores.index')->with('status', 'Carrera eliminada');
    }
}
