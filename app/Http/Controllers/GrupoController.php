<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Grupo;
use App\Models\GrupoMateria;
use App\Models\Materia;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{

    public function index()
    {
        $periodo = Periodo::where('activo', 1)->first();
        $grupos = Grupo::where('periodo_id', $periodo->id)
            ->orderBy('grado')
            ->orderBy('grupo')
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

        $materias = Materia::where('grado', $grupo->grado)
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
            ->select('grupos.grado', 'grupos.grupo', 'materias.nombre', 'materias.id')
            ->join('grupo_materias', 'grupo_materias.grupo_id', '=', 'grupos.id')
            ->join('materias', 'materias.id', '=', 'grupo_materias.materia_id')
            ->where('grupos.id', $grupo->id)
            ->get();

        $carrera = Carrera::where('id', $grupo->carrera_id)->first();

        $maestros = DB::table('maestros')
            ->select('maestros.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre')
            ->join('personas', 'maestros.persona_id', '=', 'personas.id')
            ->where('activo', 1)
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        $grupoMateria = GrupoMateria::where('grupo_id', $grupo->id)
            ->get();

        return view('grupos.show-materias', ['materias' => $materias, 'carrera' => $carrera, 'grupo' => $grupo, 'maestros' => $maestros, 'grupoMateria' => $grupoMateria]);

    }

    public function showGrupos(Request $request, $idCarrera, $turno)
    {
        $periodo = Periodo::where('activo', 1)->first();

        if ($request->input('carrera_id') != null) {
            $id = $request->input('carrera_id');
            $turno = $request->input('turno_id');
            $carrera = Carrera::where('id', $id)->first();
            $grupos = Grupo::where('carrera_id', $id)
                ->where('periodo_id', $periodo->id)
                ->where('turno_id', $turno)
                ->orderBy('grado')
                ->orderBy('grupo')
                ->get();

            $tutores = DB::table('grupos')
                ->where('periodo_id', $periodo->id)
                ->where('turno_id', $turno)
                ->where('carrera_id', $id)
                ->orderBy('grado')
                ->orderBy('grupo')
                ->get();

        } else {
            $carrera = Carrera::where('id', $idCarrera)->first();
            $grupos = Grupo::where('carrera_id', $idCarrera)
                ->where('periodo_id', $periodo->id)
                ->where('turno_id', $turno)
                ->orderBy('grado')
                ->orderBy('grupo')
                ->get();

            $tutores = DB::table('grupos')
                ->where('periodo_id', $periodo->id)
                ->where('turno_id', $turno)
                ->where('carrera_id', $idCarrera)
                ->orderBy('grado')
                ->orderBy('grupo')
                ->get();
        }

        $maestros = DB::table('maestros')
            ->select('maestros.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre')
            ->join('personas', 'maestros.persona_id', '=', 'personas.id')
            ->where('activo', 1)
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        return view('grupos.show-grupos', ['grupos' => $grupos, 'carrera' => $carrera, 'turno' => $turno, 'maestros' => $maestros, 'tutores' => $tutores]);
    }

    public function destroy(Grupo $grupo)
    {
        GrupoMateria::where('grupo_id', $grupo->id)->delete();
        $grupo->delete();
        return to_route('grupos.index')->with('status', 'Grupo eliminada');
    }

    public function maestroStore(Grupo $grupo, Request $request)
    {
        $materias = DB::table('grupos')
            ->select('grupos.grado', 'grupos.grupo', 'materias.nombre', 'materias.id')
            ->join('grupo_materias', 'grupo_materias.grupo_id', '=', 'grupos.id')
            ->join('materias', 'materias.id', '=', 'grupo_materias.materia_id')
            ->where('grupos.id', $grupo->id)
            ->get();

        foreach ($materias as $materia) {
            $name = "materia_" . $materia->id;
            $gp = GrupoMateria::where('grupo_id', $grupo->id)
                ->where('materia_id', $materia->id)
                ->update([
                    'maestro_id' => $request->input($name),
                ]);
        }
        $carrera = Carrera::where('id', $grupo->carrera_id)->first();

        $maestros = DB::table('maestros')
            ->select('maestros.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre')
            ->join('personas', 'maestros.persona_id', '=', 'personas.id')
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        $grupoMateria = GrupoMateria::where('grupo_id', $grupo->id)
            ->get();

        return view('grupos.show-materias', ['materias' => $materias, 'carrera' => $carrera, 'grupo' => $grupo, 'maestros' => $maestros, 'grupoMateria' => $grupoMateria]);

    }

    public function tutorStore(Request $request, Carrera $carrera, $turno)
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
                ->orderBy('grupo')
                ->get();
        } else {
            $grupos = Grupo::where('carrera_id', $carrera->id)
                ->where('periodo_id', $periodo->id)
                ->where('turno_id', $turno)
                ->orderBy('grado')
                ->orderBy('grupo')
                ->get();
        }

        $maestros = DB::table('maestros')
            ->select('maestros.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre')
            ->join('personas', 'maestros.persona_id', '=', 'personas.id')
            ->where('activo', 1)
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        foreach ($grupos as $grupo) {
            $name = "tutor_" . $grupo->id;
            $grupo->maestro_tutor_id = $request->input($name);
            $grupo->save();
        }

        $tutores = DB::table('grupos')
            ->where('periodo_id', $periodo->id)
            ->where('turno_id', $turno)
            ->where('carrera_id', $carrera->id)
            ->orderBy('grado')
            ->orderBy('grupo')
            ->get();

        return view('grupos.show-grupos', ['grupos' => $grupos, 'carrera' => $carrera, 'turno' => $turno, 'maestros' => $maestros, 'tutores' => $tutores]);
    }

}
