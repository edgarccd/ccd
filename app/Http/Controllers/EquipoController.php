<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Coordinador;
use App\Models\Grupo;
use App\Models\Periodo;
use App\Models\Proyecto;
use App\Models\ProyectoAlumno;
use App\Models\ProyectoEntregable;
use App\Models\ProyectoEquipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function edit(ProyectoEquipo $equipo)
    {
        $alumnos = ProyectoAlumno::where('equipo_id', $equipo->id)
            ->get();
            $proyectos = Proyecto::whereNOTIn('id', function ($query) {
                $periodo = Periodo::where('activo', 1)->first();
                $query->select('proyecto_equipos.proyecto_id')
                    ->from('proyecto_equipos')
                    ->join('grupos', 'grupos.id', '=', 'proyecto_equipos.grupo_id')
                    ->where('grupos.periodo_id', $periodo->id);
            })->orderBy('nombre')->get();
        return view('equipos.edit', ['alumnos' => $alumnos, 'equipo' => $equipo, 'proyectos' => $proyectos]);
    }

    public function deleteAlumno(ProyectoAlumno $palumno)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $equipo = ProyectoEquipo::where('id', $palumno->equipo_id)->first();
        $palumno->delete();
        $alumnos = ProyectoAlumno::where('equipo_id', $equipo->id)
            ->get();
            $proyectos = Proyecto::whereNOTIn('id', function ($query) {
                $periodo = Periodo::where('activo', 1)->first();
                $query->select('proyecto_equipos.proyecto_id')
                    ->from('proyecto_equipos')
                    ->join('grupos', 'grupos.id', '=', 'proyecto_equipos.grupo_id')
                    ->where('grupos.periodo_id', $periodo->id);
            })->orderBy('nombre')->get();
        return view('equipos.edit', ['alumnos' => $alumnos, 'equipo' => $equipo, 'proyectos' => $proyectos]);
    }

    public function update(Request $request, ProyectoEquipo $equipo)
    {
        $equipo->nombre = $request->input('nombre');
        $equipo->comentarios = $request->input('comentarios');
        $equipo->proyecto_id = $request->input('proyecto_id');
        $equipo->updated_at = now();
        $equipo->save();

        $alumnos = ProyectoAlumno::where('equipo_id', $equipo->id)
            ->get();

        return view('equipos.show', ['alumnos' => $alumnos, 'equipo' => $equipo]);
    }

    public function search(Request $request, ProyectoEquipo $equipo)
    {
        if ($request->input('busqueda') == "todos") {
            $alumnos = DB::table('personas')
                ->join('alumnos', 'alumnos.persona_id', '=', 'personas.id')
                ->join('grupo_alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
                ->where('grupo_alumnos.grupo_id', $equipo->grupo_id)
                ->whereNOTIn('alumnos.id', function ($query) {
                    $periodo = Periodo::where('activo', 1)->first();
                    $query->select('proyecto_alumnos.alumno_id')->from('proyecto_alumnos')->where('proyecto_alumnos.periodo_id', $periodo->id);
                })
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }

        if ($request->input('busqueda') == "nombre") {
            $alumnos = DB::table('personas')
                ->join('alumnos', 'alumnos.persona_id', '=', 'personas.id')
                ->join('grupo_alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
                ->where('grupo_alumnos.grupo_id', $equipo->grupo_id)
                ->where('personas.nombre', 'like', '%' . $request->input('nombre') . '%')
                ->whereNOTIn('alumnos.id', function ($query) {
                    $periodo = Periodo::where('activo', 1)->first();
                    $query->select('proyecto_alumnos.alumno_id')->from('proyecto_alumnos')->where('proyecto_alumnos.periodo_id', $periodo->id);
                })
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "paterno") {
            $alumnos = DB::table('personas')
                ->join('alumnos', 'alumnos.persona_id', '=', 'personas.id')
                ->join('grupo_alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
                ->where('grupo_alumnos.grupo_id', $equipo->grupo_id)
                ->where('personas.apellido_pat', 'like', '%' . $request->input('nombre') . '%')
                ->whereNOTIn('alumnos.id', function ($query) {
                    $periodo = Periodo::where('activo', 1)->first();
                    $query->select('proyecto_alumnos.alumno_id')->from('proyecto_alumnos')->where('proyecto_alumnos.periodo_id', $periodo->id);
                })
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "materno") {
            $alumnos = DB::table('personas')
                ->join('alumnos', 'alumnos.persona_id', '=', 'personas.id')
                ->join('grupo_alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
                ->where('grupo_alumnos.grupo_id', $equipo->grupo_id)
                ->where('personas.apellido_mat', 'like', '%' . $request->input('nombre') . '%')
                ->whereNOTIn('alumnos.id', function ($query) {
                    $periodo = Periodo::where('activo', 1)->first();
                    $query->select('proyecto_alumnos.alumno_id')->from('proyecto_alumnos')->where('proyecto_alumnos.periodo_id', $periodo->id);
                })
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }

        return view('equipos.search', ['alumnos' => $alumnos, 'equipo' => $equipo]);
    }

    public function destroy(ProyectoEquipo $pequipo)
    {
        $grupo = Grupo::where('id', $pequipo->grupo_id)->first();
        $periodo = Periodo::where('activo', 1)->first();
        $alumnos = ProyectoAlumno::where('equipo_id', $pequipo->id)
            ->where('periodo_id', $periodo->id)
            ->get();
        foreach ($alumnos as $alumno) {
            $alumno->delete();
        }
        $pequipo->delete();
        $equipos = ProyectoEquipo::where('grupo_id', $grupo->id)->get();
        return view('equipos.index', ['grupo' => $grupo, 'equipos' => $equipos]);
    }

    public function agregar(ProyectoEquipo $pequipo, Alumno $alumno)
    {
        $periodo = Periodo::where('activo', 1)->first();

        ProyectoAlumno::create([
            'periodo_id' => $periodo->id,
            'equipo_id' => $pequipo->id,
            'alumno_id' => $alumno->id,
        ]);

        $alumnos = ProyectoAlumno::where('equipo_id', $pequipo->id)
            ->get();

            $proyectos = Proyecto::whereNOTIn('id', function ($query) {
                $periodo = Periodo::where('activo', 1)->first();
                $query->select('proyecto_equipos.proyecto_id')
                    ->from('proyecto_equipos')
                    ->join('grupos', 'grupos.id', '=', 'proyecto_equipos.grupo_id')
                    ->where('grupos.periodo_id', $periodo->id);
            })->orderBy('nombre')->get();

        return view('equipos.edit', ['alumnos' => $alumnos, 'equipo' => $pequipo, 'proyectos' => $proyectos]);
    }

    public function entregables(ProyectoEquipo $pequipo, User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $grupo = Grupo::where('maestro_eje_id', $usuario->persona->maestro->id)->where('periodo_id', $periodo->id)->first();
        $files = ProyectoEntregable::where('periodo_id', $periodo->id)
            ->where('persona_id', $usuario->persona->id)
            ->where('grupo_id', $grupo->id)
            ->where('equipo_id', $pequipo->id)
            ->get();

        return view('equipos.entregables', ['grupo' => $grupo, 'equipo' => $pequipo, 'files' => $files]);
    }

    public function storeEntregables(Request $request, ProyectoEquipo $pequipo, User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $grupo = Grupo::where('maestro_eje_id', $usuario->persona->maestro->id)->where('periodo_id', $periodo->id)->first();
        $max_size = (int) ini_get('upload_max_filesize') * 10240;
        $files = $request->file('files');
        foreach ($files as $file) {
            if (Storage::putFileAs('/public/' . $periodo->ciclo . '/' . $grupo->carrera->acronimo . '/' . $grupo->id . '/' . $pequipo->id . '/', $file, $file->getClientOriginalName())) {
                ProyectoEntregable::create([
                    'nombre' => $file->getClientOriginalName(),
                    'periodo_id' => $periodo->id,
                    'equipo_id' => $pequipo->id,
                    'grupo_id' => $grupo->id,
                    'persona_id' => $usuario->persona->id,
                ]);
            }
        }
        $files = ProyectoEntregable::where('periodo_id', $periodo->id)
            ->where('persona_id', $usuario->persona->id)
            ->where('grupo_id', $grupo->id)
            ->where('equipo_id', $pequipo->id)
            ->get();

        return view('equipos.entregables', ['grupo' => $grupo, 'equipo' => $pequipo, 'files' => $files]);
    }

    public function destroyEntregables(Request $request, $id, User $usuario, ProyectoEquipo $pequipo)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $grupo = Grupo::where('maestro_eje_id', $usuario->persona->maestro->id)->where('periodo_id', $periodo->id)->first();
        $file = ProyectoEntregable::where('id', $id)->firstOrFail();

        unlink(public_path('storage/' . $periodo->ciclo . '/' . $grupo->carrera->acronimo . '/' . $grupo->id . '/' . $pequipo->id . '/' . $file->nombre));
        $file->delete();

        $files = ProyectoEntregable::where('periodo_id', $periodo->id)
            ->where('persona_id', $usuario->persona->id)
            ->where('grupo_id', $grupo->id)
            ->where('equipo_id', $pequipo->id)
            ->get();

        return view('equipos.entregables', ['grupo' => $grupo, 'equipo' => $pequipo, 'files' => $files]);
    }

    public function registrados(User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $turnos = Coordinador::select('turno_id')->where('maestro_id', $usuario->persona->maestro->id)->where('periodo_id', $periodo->id)->groupBy('turno_id')->get();
        $carreras = DB::table('carreras')
            ->select('carrera_id', 'nombre')
            ->join('coordinadors', 'coordinadors.carrera_id', '=', 'carreras.id')
            ->where('coordinadors.maestro_id', $usuario->persona->maestro->id)
            ->where('coordinadors.periodo_id', $periodo->id)
            ->groupBy('carrera_id', 'nombre')
            ->get();

        return view('equipos.registrados', ['carreras' => $carreras, 'turnos' => $turnos]);
    }

    public function showRegistrados(User $usuario, $carrera_id, $turno_id, Request $request)
    {
        $periodo = Periodo::where('activo', 1)->first();

        if($request->input('carrera_id')!=null){
        $equipos = DB::table('proyecto_equipos')
            ->select('proyecto_equipos.id', 'proyecto_equipos.nombre as nom', 'proyectos.nombre as proy', 'grupos.grado', 'grupos.grupo', 'proyecto_equipos.proyecto_id', 'carreras.acronimo')
            ->join('grupos', 'proyecto_equipos.grupo_id', '=', 'grupos.id')
            ->join('proyectos', 'proyecto_equipos.proyecto_id', '=', 'proyectos.id')
            ->join('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->where('grupos.periodo_id', $periodo->id)
            ->where('grupos.carrera_id', $request->input('carrera_id'))
            ->where('grupos.turno_id', $request->input('turno_id'))
            ->orderBy('grupos.grado', 'asc')
            ->orderBy('grupos.grupo', 'asc')
            ->orderBy('proyecto_equipos.nombre', 'asc')
            ->get();
        }else{
            $equipos = DB::table('proyecto_equipos')
            ->select('proyecto_equipos.id', 'proyecto_equipos.nombre as nom', 'proyectos.nombre as proy', 'grupos.grado', 'grupos.grupo', 'proyecto_equipos.proyecto_id', 'carreras.acronimo')
            ->join('grupos', 'proyecto_equipos.grupo_id', '=', 'grupos.id')
            ->join('proyectos', 'proyecto_equipos.proyecto_id', '=', 'proyectos.id')
            ->join('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->where('grupos.periodo_id', $periodo->id)
            ->where('grupos.carrera_id', $carrera_id)
            ->where('grupos.turno_id', $turno_id)
            ->orderBy('grupos.grado', 'asc')
            ->orderBy('grupos.grupo', 'asc')
            ->orderBy('proyecto_equipos.nombre', 'asc')
            ->get();
        }

        return view('equipos.registrados-mostrar', ['equipos' => $equipos]);
    }

    public function registradosIntegrantes(ProyectoEquipo $equipo)
    {
        $alumnos = ProyectoAlumno::where('equipo_id', $equipo->id)
            ->get();

        return view('equipos.registrados-integrantes', ['alumnos' => $alumnos, 'equipo' => $equipo]);
    }

    public function registradosEntregables(ProyectoEquipo $equipo){

        $periodo = Periodo::where('activo', 1)->first();       

        $files = ProyectoEntregable::where('periodo_id', $periodo->id)          
            ->where('equipo_id', $equipo->id)
            ->get();

        return view('equipos.registrados-entregables', ['equipo' => $equipo, 'files' => $files]);

    }
}
