<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Coordinador;
use App\Models\Grupo;
use App\Models\Maestro;
use App\Models\Periodo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EjeController extends Controller
{

    public function index(User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $turnos = Coordinador::select('turno_id')->where('maestro_id', $usuario->persona->maestro->id)->where('periodo_id', $periodo->id)->groupBy('turno_id')->get();
        $carreras = DB::table('carreras')
            ->select('carrera_id','nombre')
            ->join('coordinadors', 'coordinadors.carrera_id', '=', 'carreras.id')
            ->where('coordinadors.maestro_id', $usuario->persona->maestro->id)
            ->where('coordinadors.periodo_id', $periodo->id)
            ->groupBy('carrera_id','nombre')
            ->get();

        return view('ejes.index', ['carreras' => $carreras, 'turnos' => $turnos]);
    }

    public function create(User $usuario, Request $request)
    {
        $periodo = Periodo::where('activo', 1)->first();

        $maestros = DB::table('maestros')
            ->select('maestros.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre')
            ->join('personas', 'maestros.persona_id', '=', 'personas.id')
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();
            
        if (isset($request->carrera_id)) {
            $carrera = Carrera::where('id', $request->carrera_id)->get()->first();
            $grupos = Grupo::where('carrera_id', $request->carrera_id)
                ->where('periodo_id', $periodo->id)
                ->where('turno_id', $request->turno_id)
                ->orderBy('grado')
                ->get();
        }

        return view('ejes.create', ['grupos' => $grupos, 'carrera' => $carrera, 'maestros' => $maestros, 'turno' => $request->turno_id])->with('status', 'Profesores Eje asignados correctamente');
    }

    public function store(User $usuario, Carrera $carrera, $turno, Request $request)
    {

        $periodo = Periodo::where('activo', 1)->first();
        $maestros = DB::table('maestros')
            ->select('maestros.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre')
            ->join('personas', 'maestros.persona_id', '=', 'personas.id')
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();
        $grupos = Grupo::where('periodo_id', $periodo->id)
            ->where('carrera_id', $carrera->id)
            ->where('turno_id', $turno)
            ->orderBy('grado')->get();
        foreach ($grupos as $grupo) {
            $name = "maestro_" . $grupo->id;
            $grupo->maestro_eje_id = $request->input($name);
            $grupo->save();
        }
        
        session()->flash('status','Profesores Asignados Correctamente');
        return view('ejes.create', ['grupos' => $grupos, 'carrera' => $carrera, 'maestros' => $maestros, 'turno' => $turno]);

    }
}
