<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Grupo;
use App\Models\GrupoAlumno;
use App\Models\Periodo;
use App\Models\Persona;
use App\Models\Temporal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MatriculaController extends Controller
{

    public function index()
    {
        $carreras = Carrera::where('activo',1)->get();
        return view('matricula.index', ['carreras' => $carreras]);
    }

    public function create($carrera_id)
    {
        $periodo = Periodo::where('activo', 1)->first();
        $carrera = Carrera::where('id', $carrera_id)->first();
        $grupos = Grupo::where('carrera_id', $carrera_id)
            ->where('periodo_id', $periodo->id)
            ->orderBy('grado')->get();
        $temporales = Temporal::get();
        return view('matricula.create', ['carrera' => $carrera, 'temporales' => $temporales, 'grupos' => $grupos]);
    }

    public function store($carrera_id, Request $request)
    {
        $temporales = Temporal::get();

        foreach ($temporales as $temporal) {

            if ($temporal->sexo == "Mujer") {
                $sex = 1;
            }

            if ($temporal->sexo == "Hombre") {
                $sex = 2;
            }

            Persona::create([
                'nombre' => $temporal->nombre,
                'apellido_pat' => $temporal->apellido_pat,
                'apellido_mat' => $temporal->apellido_mat,
                'sexo' => $sex,
                'correo' => $temporal->correo,
                'direccion' => " ",
                'telefono' => " ",
            ]);

            $persona = Persona::latest('id')->first();

            Alumno::create([
                'matricula' => $temporal->matricula,
                'persona_id' => $persona->id,
                'status_id' => 1,
            ]);

            $alumno = Alumno::latest('id')->first();

            GrupoAlumno::create([
                'alumno_id' => $alumno->id,
                'grupo_id' => $request->input('grupo_id'),
            ]);

            User::create([
                'name' => $temporal->nombre . " " . $temporal->apellido_pat . " " . $temporal->apellido_mat,
                'email' => $temporal->correo,
                'password' => Hash::make('12345678'),
                'persona_id' => $persona->id,
                'tipo_id' => 5,
            ]);

        }

        Temporal::query()->delete();

        $periodo = Periodo::where('activo', 1)->first();
        $carrera = Carrera::where('id', $carrera_id)->first();
        $grupos = Grupo::where('carrera_id', $carrera_id)
            ->where('periodo_id', $periodo->id)
            ->orderBy('grado')
            ->orderBy('grupo')
            ->get();

        return view('matricula.show-grupos', ['grupos' => $grupos, 'carrera' => $carrera, 'periodo' => $periodo]);
    }

    public function showGrupos(Request $request, $idCarrera)
    {
        $periodo = Periodo::where('activo', 1)->first();

        if ($request->input('carrera_id') != null) {
            $id = $request->input('carrera_id');
            $carrera = Carrera::where('id', $id)->first();
            $grupos = Grupo::where('carrera_id', $id)
                ->where('periodo_id', $periodo->id)
                ->orderBy('grado')
                ->orderBy('grupo')
                ->get();
        } else {
            $carrera = Carrera::where('id', $idCarrera)->first();
            $grupos = Grupo::where('carrera_id', $idCarrera)
                ->where('periodo_id', $periodo->id)
                ->orderBy('grado')
                ->orderBy('grupo')
                ->get();
        }
        return view('matricula.show-grupos', ['grupos' => $grupos, 'carrera' => $carrera, 'periodo' => $periodo]);
    }

    public function showAlumnos($grupo)
    {
        $g = Grupo::find($grupo);

        $alumnos = DB::table('grupo_alumnos')
            ->select('personas.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre', 'grupos.grado', 'grupos.grupo', 'grupos.turno_id', 'grupo_alumnos.alumno_id', 'alumnos.matricula')
            ->join('grupos', 'grupo_alumnos.grupo_id', '=', 'grupos.id')
            ->join('alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
            ->join('personas', 'alumnos.persona_id', '=', 'personas.id')
            ->where('grupo_alumnos.grupo_id', $grupo)
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        $carrera = Carrera::where('id', $g->carrera_id)->first();

        return view('matricula.show-alumnos', ['alumnos' => $alumnos, 'grupo' => $g, 'carrera' => $carrera]);
    }

    public function reinscribir()
    {
        $periodo = Periodo::where('activo', 1)->first();
        $gruposAnteriores = Grupo::where('periodo_id', $periodo->id - 1)->orderBy('carrera_id')->orderBy('turno_id')->orderBy('grado')->get();
        $gruposActuales = Grupo::where('periodo_id', $periodo->id)->where('grado', '>', '1')->orderBy('carrera_id')->orderBy('turno_id')->orderBy('grado')->get();
        return view('matricula.reinscribir', ['periodo' => $periodo, 'gruposAnteriores' => $gruposAnteriores, 'gruposActuales' => $gruposActuales]);
    }

    public function reinstore(Periodo $periodo, Request $request)
    {

        $grupos = Grupo::where('periodo_id', $periodo->id - 1)
            ->orderBy('carrera_id')
            ->orderBy('turno_id')
            ->orderBy('grado')
            ->orderBy('grupo')
            ->get();



            
        foreach ($grupos as $grupo) {
            $name = "grupo_" . $grupo->id;

            if ($request->input($name) != 0) {
                $alumnos = DB::table('grupo_alumnos')->where('grupo_id', $grupo->id)->get();
             


                foreach ($alumnos as $alumno) {
                 
                    GrupoAlumno::create([                    
                    'alumno_id' => $alumno->alumno_id,
                    'grupo_id' => $request->input($name),
                    ]);

                    $alu = Alumno::where('id',$alumno->alumno_id)->first();
                    $persona= Persona::where('id',$alu->persona_id)->first();

                    User::create([
                        'name' => $persona->nombre . " " . $persona->apellido_pat . " " . $persona->apellido_mat,
                        'email' => $persona->correo,
                        'password' => Hash::make('12345678'),
                        'persona_id' => $alu->persona->id,
                        'tipo_id' => 5,
                    ]);
                   
                } 


            }
        }

        $carreras = Carrera::where('activo',1)->get();

       return view('matricula.index', ['carreras' => $carreras]);
    }

    public function search(Grupo $grupo, Request $request)
    {
        if ($request->input('busqueda') == "nombre") {
            $alumnos = DB::table('personas')
                ->join('alumnos', 'alumnos.persona_id', '=', 'personas.id')
                ->where('personas.nombre', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "paterno") {
            $alumnos = DB::table('personas')
                ->join('alumnos', 'alumnos.persona_id', '=', 'personas.id')
                ->where('personas.apellido_pat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "materno") {
            $alumnos = DB::table('personas')
                ->join('alumnos', 'alumnos.persona_id', '=', 'personas.id')
                ->where('personas.apellido_mat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }
        return view('matricula.search', ['grupo' => $grupo, 'alumnos' => $alumnos]);
    }

    public function agregar(Alumno $alumno, Grupo $grupo)
    {
        GrupoAlumno::create([
            'alumno_id' => $alumno->id,
            'grupo_id' => $grupo->id,
        ]);

        $alumnos = DB::table('grupo_alumnos')
            ->select('personas.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre', 'grupos.grado', 'grupos.grupo', 'grupos.turno_id', 'grupo_alumnos.alumno_id', 'alumnos.matricula')
            ->join('grupos', 'grupo_alumnos.grupo_id', '=', 'grupos.id')
            ->join('alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
            ->join('personas', 'alumnos.persona_id', '=', 'personas.id')
            ->where('grupo_alumnos.grupo_id', $grupo->id)
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        $carrera = Carrera::where('id', $grupo->carrera_id)->first();

        return view('matricula.show-alumnos', ['alumnos' => $alumnos, 'grupo' => $grupo, 'carrera' => $carrera]);
    }

    public function edit(Persona $persona, Grupo $grupo)
    {
        return view('matricula.edit', ['persona' => $persona, 'grupo' => $grupo]);
    }

    public function update(Persona $persona, Grupo $grupo, Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'apellido_pat' => ['required', 'min:4'],
            'apellido_mat' => ['required', 'min:4'],
        ]);

        $persona->nombre = $request->input('nombre');
        $persona->apellido_pat = $request->input('apellido_pat');
        $persona->apellido_mat = $request->input('apellido_mat');
        $persona->correo = $request->input('correo');
        $persona->sexo = $request->input('sexo');
        $persona->updated_at = now();
        $persona->save();

        $alumno = Alumno::where('persona_id', $persona->id)->get()->first();
        $alumno->matricula = $request->input('matricula');
        $alumno->save();

        $alumnos = DB::table('grupo_alumnos')
            ->select('personas.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre', 'grupos.grado', 'grupos.grupo', 'grupos.turno_id', 'grupo_alumnos.alumno_id', 'alumnos.matricula')
            ->join('grupos', 'grupo_alumnos.grupo_id', '=', 'grupos.id')
            ->join('alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
            ->join('personas', 'alumnos.persona_id', '=', 'personas.id')
            ->where('grupo_alumnos.grupo_id', $grupo->id)
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        $carrera = Carrera::where('id', $grupo->carrera_id)->first();

        return view('matricula.show-alumnos', ['alumnos' => $alumnos, 'grupo' => $grupo, 'carrera' => $carrera]);
    }

    public function destroy(Alumno $alumno, Grupo $grupo)
    {
        $grupoAlumno = GrupoAlumno::where('alumno_id', $alumno->id)->where('grupo_id', $grupo->id)->first();
        $grupoAlumno->delete();

        $alumnos = DB::table('grupo_alumnos')
            ->select('personas.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre', 'grupos.grado', 'grupos.grupo', 'grupos.turno_id', 'grupo_alumnos.alumno_id', 'alumnos.matricula')
            ->join('grupos', 'grupo_alumnos.grupo_id', '=', 'grupos.id')
            ->join('alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
            ->join('personas', 'alumnos.persona_id', '=', 'personas.id')
            ->where('grupo_alumnos.grupo_id', $grupo->id)
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        $carrera = Carrera::where('id', $grupo->carrera_id)->first();

        return view('matricula.show-alumnos', ['alumnos' => $alumnos, 'grupo' => $grupo, 'carrera' => $carrera]);
    }

    public function alta(Request $request, Grupo $grupo)
    {

        Persona::create([
            'nombre' => $request->input('nombre'),
            'apellido_pat' => $request->input('apellido_pat'),
            'apellido_mat' => $request->input('apellido_mat'),
            'sexo' => $request->input('sexo'),
            'correo' => $request->input('correo'),
            'direccion' => " ",
            'telefono' => " ",
        ]);

        $persona = Persona::latest('id')->first();

        Alumno::create([
            'matricula' => $request->input('matricula'),
            'persona_id' => $persona->id,
            'status_id' => 1,
        ]);

        $alumno = Alumno::latest('id')->first();

        GrupoAlumno::create([
            'alumno_id' => $alumno->id,
            'grupo_id' => $grupo->id,
        ]);

        $alumnos = DB::table('grupo_alumnos')
            ->select('personas.id', 'personas.apellido_pat', 'personas.apellido_mat', 'personas.nombre', 'grupos.grado', 'grupos.grupo', 'grupos.turno_id', 'grupo_alumnos.alumno_id', 'alumnos.matricula')
            ->join('grupos', 'grupo_alumnos.grupo_id', '=', 'grupos.id')
            ->join('alumnos', 'grupo_alumnos.alumno_id', '=', 'alumnos.id')
            ->join('personas', 'alumnos.persona_id', '=', 'personas.id')
            ->where('grupo_alumnos.grupo_id', $grupo->id)
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        $carrera = Carrera::where('id', $grupo->carrera_id)->first();

        return view('matricula.show-alumnos', ['alumnos' => $alumnos, 'grupo' => $grupo, 'carrera' => $carrera]);

    }

}
