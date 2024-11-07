<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Carrera;
use App\Models\Coordinador;
use App\Models\Grupo;
use App\Models\Periodo;
use App\Models\ProyectoEquipo;
use App\Models\ProyectoHorario;
use App\Models\ProyectoSemana;
use App\Models\User;
use Carbon\Carbon;
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

        $aulas = Aula::where('tipo', 1)->orderBy('nombre', 'asc')->get();
        $dias = ProyectoSemana::where('periodo_id', $periodo->id)->where('turno_id', $coordinador->turno_id)->get();

        return view('horarios.index', ['carreras' => $carreras, 'turnos' => $turnos, 'aulas' => $aulas, 'dias' => $dias]);
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
        $aulas = Aula::where('tipo', 1)->orderBy('nombre', 'asc')->get();
        $dias = ProyectoSemana::where('periodo_id', $periodo->id)->where('turno_id', $coordinador->turno_id)->get();

        return view('horarios.create', ['carreras' => $carreras, 'grupos' => $grupos, 'equipos' => $equipos, 'aulas' => $aulas,
            'turno' => $coordinador->turno_id, 'dias' => $dias]);
    }

    public function store(Request $request, User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();

        $horario = ProyectoHorario::where('periodo_id', $periodo->id)
            ->where('dia_id', $request->input('dia_id'))
            ->where('hora_id', $request->input('hora_id'))
            ->where('aula_id', $request->input('aula_id'))
            ->first();

        if ($horario == null) {
            ProyectoHorario::create([
                'dia_id' => $request->input('dia_id'),
                'hora_id' => $request->input('hora_id'),
                'aula_id' => $request->input('aula_id'),
                'equipo_id' => $request->input('equipo_id'),
                'periodo_id' => $periodo->id,
                'persona_id' => $usuario->persona->id,
            ]);
            session()->flash('status', 'Registrado Correctamente');
        } else {
            session()->flash('status', 'Existe un equipo registrado en el horario seleccionado');
        }

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

        $aulas = Aula::where('tipo', 1)->orderBy('nombre', 'asc')->get();
        $dias = ProyectoSemana::where('periodo_id', $periodo->id)->where('turno_id', $coordinador->turno_id)->get();

        return view('horarios.create', ['carreras' => $carreras, 'grupos' => $grupos, 'equipos' => $equipos, 'aulas' => $aulas,
            'turno' => $coordinador->turno_id, 'dias' => $dias]);

    }

    public function show(User $usuario, Request $request)
    {
        $aula = Aula::where('id', $request->input('aula_id'))->first();
        $periodo = Periodo::where('activo', 1)->first();
        $dias = ProyectoSemana::where('periodo_id', $periodo->id)->where('turno_id', $request->input('turno_id'))->get();
        //echo Carbon::parse($dias->dia)->format('d');
        
        if ($request->input('turno_id') == 1) {
            $hlun = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('dia_id', 1)->get();
            $hmar = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('dia_id', 2)->get();
            $hmier = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('dia_id', 3)->get();
            $hjue = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('dia_id', 4)->get();
            $hvie = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('dia_id', 5)->get();

            return view('horarios.show', ['hlun' => $hlun, 'hmar' => $hmar, 'hmier' => $hmier,
                'hjue' => $hjue, 'hvie' => $hvie, 'aula' => $aula, 'turno' => $request->input('turno_id'), 'dias' => $dias]);
        }

        if ($request->input('turno_id') == 2) {
            $horarios17 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 11)->get();
            $horarios173 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 12)->get();
            $horarios18 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 13)->get();
            $horarios183 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 14)->get();
            $horarios19 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 15)->get();
            $horarios193 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 16)->get();
            $horarios20 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 17)->get();
            $horarios203 = ProyectoHorario::where('aula_id', $request->input('aula_id'))->where('hora_id', 18)->get();

            return view('horarios.show', ['horarios17' => $horarios17, 'horarios173' => $horarios173, 'horarios18' => $horarios18,
                'horarios183' => $horarios183, 'horarios19' => $horarios193, 'horarios20' => $horarios20, 'horarios203' => $horarios203,
                'aula' => $aula, 'turno' => $request->input('turno_id'), 'dias' => $dias]);
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
