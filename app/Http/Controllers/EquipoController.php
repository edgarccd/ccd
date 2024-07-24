<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Periodo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{

    public function index(User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $grupo = Grupo::where('maestro_eje_id', $usuario->persona->maestro->id)->where('periodo_id', $periodo->id)->first();
        return view('equipos.index',['grupo' => $grupo]);
    }

    public function create(User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $grupo = Grupo::where('maestro_eje_id', $usuario->persona->maestro->id)->where('periodo_id', $periodo->id)->first();
        $alumnos = $carreras = DB::table('alumnos')
            ->join('personas', 'personas.id', '=', 'alumnos.persona_id')
            ->join('grupo_alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
            ->where('grupo_alumnos.grupo_id', $grupo->id)
            ->orderBy('personas.apellido_pat')
            ->orderBy('personas.apellido_mat')
            ->orderBy('personas.nombre')
            ->get();
        return view('equipos.create', ['grupo' => $grupo, 'alumnos' => $alumnos]);
    }

    public function store(Request $request)
    {
        //
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
