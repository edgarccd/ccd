<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Maestro;
use App\Models\Periodo;
use App\Models\User;
use App\Models\Coordinador;

class CoordinadorController extends Controller
{   
    public function index()
    {
       $periodo = Periodo::where('activo', 1)->get()->first();
       $coordinadores = Coordinador::where('periodo_id',$periodo->id)->get();
       return view('coordinadores.index', ['coordinadores' => $coordinadores]);       
    }   
    
    public function store(Request $request)
    {        
        $periodo = Periodo::where('activo', 1)->get()->first();

        Coordinador::create([
            'carrera_id' => $request->input('carrera_id'),
            'maestro_id' => $request->input('maestro_id'),
            'periodo_id' => $periodo->id,
            'turno_id' =>$request->input('turno_id'),
            'area_id' => $request->input('area_id'),
        ]);
        return view('coordinadores.index')->with('status', 'Cordinador Registrado con exito');
    }

    public function destroy(Coordinador $coordinador)
    {
        $coordinador->delete();              
        return to_route('coordinadores.index')->with('status', 'Coordinador eliminado');
    }
}
