<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Carrera;
use App\Models\Coordinador;
use App\Models\Grupo;
use App\Models\Periodo;
use App\Models\ProyectoEquipo;
use App\Models\ProyectoHorario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    public function index(User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $coordinador = Coordinador::where('periodo_id', $periodo->id)->where('maestro_id', $usuario->persona->maestro->id)->first();
        if ($coordinador != null) {
            $carreras = Carrera::where('id', $coordinador->carrera_id)->get();
        } else {
            $carreras = 0;
        }
        return view('horarios.index', ['carreras' => $carreras]);
    }

    public function create(User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $coordinador = Coordinador::where('periodo_id', $periodo->id)->where('maestro_id', $usuario->persona->maestro->id)->first();
        if ($coordinador != null) {
            $carreras = Carrera::where('id', $coordinador->carrera_id)->get();
        } else {
            $carreras = 0;
        }
        $grupos = new Grupo;
        $equipos = new ProyectoEquipo;
        $aulas = Aula::where('tipo', 1)->get();
        return view('horarios.create', ['carreras' => $carreras, 'grupos' => $grupos, 'equipos' => $equipos, 'aulas' => $aulas]);
    }

    public function store(Request $request, User $usuario)
    {

        $periodo = Periodo::where('activo', 1)->first();

        ProyectoHorario::create([
            'dia_id' => $request->input('dia_id'),
            'hora_id' => $request->input('hora_id'),
            'aula_id' => $request->input('aula_id'),
            'equipo_id' => $request->input('equipo_id'),
            'periodo_id' => $periodo->id,
            'persona_id' => $usuario->persona->id,
        ]);

        $coordinador = Coordinador::where('periodo_id', $periodo->id)->where('maestro_id', $usuario->persona->maestro->id)->first();
        if ($coordinador != null) {
            $carreras = Carrera::where('id', $coordinador->carrera_id)->get();
            $turno = $coordinador->turno_id;
        } else {
            $carreras = 0;
            $turno = 0;
        }

        $grupos = Grupo::where('carrera_id', $request->input('carrera_id'))->where('turno_id', $turno)->get();
        $equipos = ProyectoEquipo::where('grupo_id', $request->input('grupo_id'))
            ->whereNOTIn('proyecto_equipos.id', function ($query) {
                $periodo = Periodo::where('activo', 1)->first();
                $query->select('proyecto_horarios.equipo_id')->from('proyecto_horarios')->where('proyecto_horarios.periodo_id', $periodo->id);
            })
            ->get();
        $aulas = Aula::where('tipo', 1)->get();
        return view('horarios.create', ['carreras' => $carreras, 'grupos' => $grupos, 'equipos' => $equipos, 'aulas' => $aulas]);
    }

    public function getGrupos($id)
    {
        $carrera = Carrera::find($id);
        $periodo = Periodo::where('activo', 1)->first();
        $grupos = Grupo::where('carrera_id', $carrera->id)->where('periodo_id', $periodo->id)->get();

        $grupos = DB::table('grupos')
            ->select('grupos.grado', 'grupos.grupo', 'materias.nombre', 'materias.id')
            ->join('grupo_materias', 'grupo_materias.grupo_id', '=', 'grupos.id')
            ->join('materias', 'materias.id', '=', 'grupo_materias.materia_id')
            ->where('grupos.id', $grupo->id)
            ->get();

        return $grupos;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
