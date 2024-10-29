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

class HorarioController extends Controller
{
    public function index(User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $coordinador = Coordinador::where('periodo_id', $periodo->id)->where('maestro_id', $usuario->persona->maestro->id)->first();
        $turnos = Coordinador::select('turno_id')->where('maestro_id', $usuario->persona->maestro->id)->where('periodo_id', $periodo->id)->groupBy('turno_id')->get();
        if ($coordinador != null) {
            $carreras = Carrera::where('id', $coordinador->carrera_id)->get();
        } else {
            $carreras = 0;
        }
        $aulas = Aula::where('tipo', 1)->orderBy('nombre','asc')->get();
        return view('horarios.index', ['carreras' => $carreras, 'turnos' => $turnos, 'aulas' => $aulas]);
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
        $aulas = Aula::where('tipo', 1)->orderBy('nombre','asc')->get();
        return view('horarios.create', ['carreras' => $carreras, 'grupos' => $grupos, 'equipos' => $equipos, 'aulas' => $aulas, 'turno' => $coordinador->turno_id]);
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

        $aulas = Aula::where('tipo', 1)->orderBy('nombre','asc')->get();
        return view('horarios.create', ['carreras' => $carreras, 'grupos' => $grupos, 'equipos' => $equipos, 'aulas' => $aulas, 'turno' => $coordinador->turno_id]);
    }

    public function show(User $usuario, Request $request)
    {
        if ($request->input('turno_id') == 1) {

            $horarios9 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 1)->get();
            $horarios93 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 2)->get();
            $horarios10 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 3)->get();
            $horarios103 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 4)->get();
            $horarios11 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 5)->get();
            $horarios113 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 6)->get();
            $horarios12 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 7)->get();
            $horarios123 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 8)->get();
            $horarios13 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 9)->get();
            $horarios133 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 10)->get();

            return view('horarios.show', ['horarios9' => $horarios9, 'horarios93' => $horarios93, 'horarios10' => $horarios10,
                'horarios103' => $horarios103, 'horarios11' => $horarios11, 'horarios113' => $horarios113, 'horarios12' => $horarios123,
                'horarios13' => $horarios13, 'horarios133' => $horarios133]);
        }

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
