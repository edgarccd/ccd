<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Periodo;
use App\Models\ProyectoAlumno;
use App\Models\ProyectoEquipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{

    public function index(User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $grupo = Grupo::where('maestro_eje_id', $usuario->persona->maestro->id)->where('periodo_id', $periodo->id)->first();
        if ($grupo != null) {
            $equipos = ProyectoEquipo::where('grupo_id', $grupo->id)->get();
        } else {
            $grupo = 0;
            $equipos = 0;
        }
        return view('equipos.index', ['grupo' => $grupo, 'equipos' => $equipos]);

    }

    public function create(Grupo $grupo)
    {
        $alumnos = $carreras = DB::table('alumnos')
            ->join('personas', 'personas.id', '=', 'alumnos.persona_id')
            ->join('grupo_alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
            ->where('grupo_alumnos.grupo_id', $grupo->id)
            ->whereNOTIn('alumnos.id', function ($query) {
                $periodo = Periodo::where('activo', 1)->first();
                $query->select('proyecto_alumnos.alumno_id')->from('proyecto_alumnos')->where('proyecto_alumnos.periodo_id', $periodo->id);
            })
            ->orderBy('personas.apellido_pat')
            ->orderBy('personas.apellido_mat')
            ->orderBy('personas.nombre')
            ->get();

        return view('equipos.create', ['grupo' => $grupo, 'alumnos' => $alumnos]);
    }

    public function store(Request $request, Grupo $grupo)
    {

        $periodo = Periodo::where('activo', 1)->first();

        ProyectoEquipo::create([
            'nombre' => strtoupper($request->input('nombre')),
            'comentarios' => $request->input('comentarios'),
            'proyecto_id' => $request->input('proyecto_id'),
            'grupo_id' => $grupo->id,
        ]);

        $equipo = ProyectoEquipo::latest('id')->first();

        $alumnos = $carreras = DB::table('alumnos')
            ->join('personas', 'personas.id', '=', 'alumnos.persona_id')
            ->join('grupo_alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
            ->where('grupo_alumnos.grupo_id', $grupo->id)
            ->whereNOTIn('alumnos.id', function ($query) {
                $periodo = Periodo::where('activo', 1)->first();
                $query->select('proyecto_alumnos.alumno_id')->from('proyecto_alumnos')->where('proyecto_alumnos.periodo_id', $periodo->id);
            })
            ->orderBy('personas.apellido_pat')
            ->orderBy('personas.apellido_mat')
            ->orderBy('personas.nombre')
            ->get();

        foreach ($alumnos as $alumno) {
            $name = "alumno_" . $alumno->alumno_id;
            if ($request->input($name) == true) {

                ProyectoAlumno::create([
                    'periodo_id' => $periodo->id,
                    'equipo_id' => $equipo->id,
                    'alumno_id' => $alumno->alumno_id,
                ]);

            }
        }

        $equipos = ProyectoEquipo::where('grupo_id', $grupo->id)->get();

        return view('equipos.index', ['grupo' => $grupo, 'equipos' => $equipos]);

    }

    public function show(ProyectoEquipo $equipo)
    {
        $alumnos = ProyectoAlumno::where('equipo_id', $equipo->id)
            ->get();

        return view('equipos.show', ['alumnos' => $alumnos, 'equipo' => $equipo]);
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

    public function destroy(ProyectoEquipo $equipo)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $alumnos = ProyectoAlumno::where('equipo_id', $equipo->id)
            ->where('periodo_id', $periodo->id)
            ->get();
        foreach ($alumnos as $alumno) {
            echo "<br>";
            echo $alumno;
        }

        /*

    //  $proyecto->delete();

    $alumnos = ProyectoAlumno::where('equipo_id', $equipo->id)
    ->get();

    return view('equipos.show', ['alumnos' => $alumnos, 'equipo' => $equipo]);
     */
    }
}
