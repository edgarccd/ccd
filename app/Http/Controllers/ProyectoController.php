<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\Proyecto;
use App\Models\ProyectoEquipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::orderBy('nombre')
            ->get();

        return view('proyectos.index', ['proyectos' => $proyectos]);
    }

    public function create()
    {
        return view('proyectos.create', ['proyecto' => new Proyecto]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'descripcion' => ['required'],
            'ruta' => ['required'],

        ]);

        Proyecto::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'ruta' => $request->input('ruta'),
            'tipo' => 1,
            'activo' => 1,
        ]);

        session()->flash('status', 'Proyecto Registrado con exito');

        return to_route('proyectos.index')->with('status', 'Proyecto registrado con exito');
    }

    public function show(Proyecto $proyecto)
    {
        return view('proyectos.show', ['proyecto' => $proyecto]);
    }

    public function edit(Proyecto $proyecto)
    {
        return view('proyectos.edit', ['proyecto' => $proyecto]);
    }

    public function update(Request $request, $proyecto)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'descripcion' => ['required'],
            'ruta' => ['required'],
        ]);

        $proyecto = Proyecto::find($proyecto);
        $proyecto->nombre = $request->input('nombre');
        $proyecto->ruta = $request->input('ruta');
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->updated_at = now();
        $proyecto->save();

        return to_route('proyectos.index')->with('status', 'Proyecto actualizado con exito');
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return to_route('proyectos.index')->with('status', 'Proyecto eliminado');
    }

    public function showall()
    {
        $proyectos = DB::table('proyectos')->get();
        return view('catproy', ['proyectos' => $proyectos]);
    }

    public function catalogo(Request $request)
    {
        $proyectos = Proyecto::whereNOTIn('id', function ($query) {
            $periodo = Periodo::where('activo', 1)->first();
            $query->select('proyecto_equipos.proyecto_id')
                ->from('proyecto_equipos')
                ->join('grupos', 'grupos.id', '=', 'proyecto_equipos.grupo_id')
                ->where('grupos.periodo_id', $periodo->id);
        })->orderBy('nombre')->get();

        return view('proyectos.eje.catalogo', ['proyectos' => $proyectos]);
    }

    public function catalogoCompleto(Request $request)
    {
        $proyectos = Proyecto::orderBy('nombre')->get();

        return view('proyectos.coordinador.catalogo', ['proyectos' => $proyectos]);
    }

    public function evaluar(User $usuario)
    {
        $periodo = Periodo::where('activo', 1)->first();

        $grupos = DB::table('grupos')
            ->join('grupo_materias', 'grupo_materias.grupo_id', '=', 'grupos.id')
            ->join('materias', 'materias.id', '=', 'grupo_materias.materia_id')
            ->join('carreras', 'carreras.id', '=', 'grupos.carrera_id')
            ->where('grupos.periodo_id', $periodo->id)
            ->where('grupo_materias.maestro_id', $usuario->persona->maestro->id)
            ->orderBy('grupos.carrera_id', 'asc')
            ->orderBy('grupos.grado', 'asc')
            ->orderBy('grupos.grupo', 'asc')
            ->get();

        $equipos = DB::table('grupos')
            ->join('grupo_materias', 'grupo_materias.grupo_id', '=', 'grupos.id')
            ->join('materias', 'materias.id', '=', 'grupo_materias.materia_id')
            ->join('carreras', 'carreras.id', '=', 'grupos.carrera_id')
            ->join('proyecto_equipos', 'proyecto_equipos.grupo_id', '=', 'grupos.id')
            ->where('grupos.periodo_id', $periodo->id)
            ->where('grupo_materias.maestro_id', $usuario->persona->maestro->id)
            ->orderBy('grupos.carrera_id', 'asc')
            ->orderBy('grupos.grado', 'asc')
            ->orderBy('grupos.grupo', 'asc')
            ->get();

        return view('proyectos.evaluar', ['grupos' => $grupos, 'equipos' => $equipos]);
    }

    public function evaluacionProyecto(ProyectoEquipo $equipo)
    {

        $periodo = Periodo::where('activo', 1)->first();

        $grupos = DB::table('grupos')
            ->join('grupo_materias', 'grupo_materias.grupo_id', '=', 'grupos.id')
            ->join('materias', 'materias.id', '=', 'grupo_materias.materia_id')
            ->join('carreras', 'carreras.id', '=', 'grupos.carrera_id')
            ->where('grupos.periodo_id', $periodo->id)
            ->where('grupo_materias.maestro_id', $usuario->persona->maestro->id)
            ->orderBy('grupos.carrera_id', 'asc')
            ->orderBy('grupos.grado', 'asc')
            ->orderBy('grupos.grupo', 'asc')
            ->get();

        $equipos = DB::table('grupos')
            ->join('grupo_materias', 'grupo_materias.grupo_id', '=', 'grupos.id')
            ->join('materias', 'materias.id', '=', 'grupo_materias.materia_id')
            ->join('carreras', 'carreras.id', '=', 'grupos.carrera_id')
            ->join('proyecto_equipos', 'proyecto_equipos.grupo_id', '=', 'grupos.id')
            ->where('grupos.periodo_id', $periodo->id)
            ->where('grupo_materias.maestro_id', $usuario->persona->maestro->id)
            ->orderBy('grupos.carrera_id', 'asc')
            ->orderBy('grupos.grado', 'asc')
            ->orderBy('grupos.grupo', 'asc')
            ->get();

        return view('proyectos.evaluacionProyecto', ['equipo' => $equipo,'grupos' => $grupos, 'equipos' => $equipos]);
    }
}
