<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Coordinador;
use App\Models\Grupo;
use App\Models\GrupoMateria;
use App\Models\Maestro;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{

    public function index()
    {
        $periodo = Periodo::where('activo', 1)->first();
        $grupos = Grupo::where('periodo_id', $periodo->id)
            ->orderBy('grado')
            ->get();
        $carreras = Carrera::where('activo', 1)->get();
        return view('grupos.index', ['grupos' => $grupos, 'carreras' => $carreras]);
    }

    public function create()
    {
        return view('grupos.create', ['grupo' => new Grupo()]);
    }

    public function store(Request $request)
    {
        $periodo = Periodo::where('activo', 1)->first();

        $grupo = new Grupo();
        $grupo->grado = $request->input('grado');
        $grupo->grupo = $request->input('grupo_id');
        $grupo->turno_id = $request->input('turno_id');
        $grupo->maestro_tutor_id = 0;
        $grupo->maestro_eje_id = 0;
        $grupo->periodo_id = $periodo->id;
        $grupo->carrera_id = $request->input('carrera_id');
        $grupo->save();

        $grupo = Grupo::latest('id')->first();

        $materias = Materia::where('grado',$grupo->grado)
            ->where('carrera_id', $grupo->carrera_id)
            ->where('turno', $grupo->turno_id)
            ->get();

        foreach ($materias as $materia) {
            GrupoMateria::create([
                'grupo_id' => $grupo->id,
                'materia_id' => $materia->id,
                'maestro_id' => 1,
            ]);
        }
        return to_route('grupos.create')->with('status', 'Grupo registrado con exito');
        
    }

    public function showMaterias(Grupo $grupo)
    {
        $materias = DB::table('grupos')
            ->select('grupos.grado', 'grupos.grupo', 'materias.nombre')
            ->join('grupo_materias', 'grupo_materias.grupo_id', '=', 'grupos.id')
            ->join('materias', 'materias.id', '=', 'grupo_materias.materia_id')
            ->where('grupos.id', $grupo->id)
            ->get();

        $carrera = Carrera::where('id', $grupo->carrera_id)->get();
        return view('grupos.show-materias', ['materias' => $materias, 'carrera' => $carrera, 'grupo' => $grupo]);
    }

    public function showGrupos(Request $request, $idCarrera)
    {
        $periodo = Periodo::where('activo', 1)->first();

        if ($request->input('carrera_id') != null) {
            $id = $request->input('carrera_id');
            $turno = $request->input('turno_id');
            $carrera = Carrera::where('id', $id)->get();
            $grupos = Grupo::where('carrera_id', $id)
                ->where('periodo_id', $periodo->id)
                ->where('turno_id', $turno)
                ->orderBy('grado')
                ->get();
        } else {
            $carrera = Carrera::where('id', $idCarrera)->get();
            $grupos = Grupo::where('carrera_id', $idCarrera)
                ->where('periodo_id', $periodo->id)
                ->orderBy('grado')
                ->get();
        }
        return view('grupos.show-grupos', ['grupos' => $grupos, 'carrera' => $carrera]);
    }


    public function destroy(Grupo $grupo)
    {
        GrupoMateria::where('grupo_id', $grupo->id)->delete();
        $grupo->delete();
        return to_route('grupos.index')->with('status', 'Grupo eliminada');
    }

}
