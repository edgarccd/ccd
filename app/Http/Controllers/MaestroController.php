<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MaestroController extends Controller
{

    public function index()
    {
        $maestros = DB::table('maestros')
            ->join('personas', 'maestros.persona_id', '=', 'personas.id')
            
            ->orderBy('personas.apellido_pat', 'asc')
            ->orderBy('personas.apellido_mat', 'asc')
            ->orderBy('personas.nombre', 'asc')
            ->get();

        return view('maestros.index', ['maestros' => $maestros]);
    }

    public function create()
    {
        return view('maestros.create', ['maestro' => new Maestro(), 'persona' => new Persona()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
        ]);

        Persona::create([
            'nombre' => strtoupper($request->input('nombre')),
            'apellido_pat' => strtoupper($request->input('apellido_pat')),
            'apellido_mat' => strtoupper($request->input('apellido_mat')),
            'sexo' => $request->input('sexo'),
            'correo' => $request->input('correo'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
        ]);

        $persona = Persona::latest('id')->first();
        $id = Maestro::latest('id')->first();

        $maestro = new Maestro;
        $maestro->id = $id->id + 1;
        $maestro->nomina = $request->input('nomina');
        $maestro->persona_id = $persona->id;
        $maestro->activo = 1;
        $maestro->save();

        User::create([
            'name' => $persona->nombre . " " . $persona->apellido_pat . " " . $persona->apellido_mat,
            'email' => $persona->correo,
            'password' => Hash::make($persona->correo),
            'persona_id' => $persona->id,
            'tipo_id' => 7,
        ]);

        session()->flash('status', 'Maestro Registrado con exito');
        return to_route('maestros.index')->with('status', 'Maestro Registrado con exito');
    }

    public function show($persona)
    {
        $maestro = Persona::where('id', $persona)->first();
        return view('maestros.show', ['maestro' => $maestro]);
    }

    public function edit(Persona $persona)
    {
        $maestro = Maestro::where('persona_id', $persona->id)->get()->first();
        return view('maestros.edit', ['maestro' => $maestro, 'persona' => $persona]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'apellido_pat' => ['required', 'max:255'],
            'apellido_mat' => ['required', 'max:255'],
        ]);

        $maestro = Maestro::where('persona_id', $id)->get()->first();
        $maestro->nomina = $request->input('nomina');
        $maestro->save();

        $persona = Persona::where('id', $maestro->persona_id)->get()->first();
        $persona->nombre = strtoupper($request->input('nombre'));
        $persona->apellido_pat = strtoupper($request->input('apellido_pat'));
        $persona->apellido_mat = strtoupper($request->input('apellido_mat'));
        $persona->sexo = $request->input('sexo');
        $persona->correo = $request->input('correo');
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->save();

        return to_route('maestros.index')->with('status', 'Maestro actualizado con exito');
    }

    public function destroy($id)
    {
        $maestro = Maestro::where('persona_id', $id)->get()->first();
        $maestro->delete();
        $usuario = User::where('persona_id', $id)->get()->first();
        $usuario->delete();
        $persona = Persona::where('id', $id)->get()->first();
        $persona->delete();

        return to_route('maestros.index')->with('status', 'Maestro eliminado');

    }
    public function search(Request $request)
    {
        if ($request->input('busqueda') == "nombre") {
            $maestros = DB::table('personas')
                ->join('maestros', 'maestros.persona_id', '=', 'personas.id')
                ->where('personas.nombre', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "paterno") {
            $maestros = DB::table('personas')
                ->join('maestros', 'maestros.persona_id', '=', 'personas.id')
                ->where('personas.apellido_pat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "materno") {
            $maestros = DB::table('personas')
                ->join('maestros', 'maestros.persona_id', '=', 'personas.id')
                ->where('personas.apellido_mat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('personas.apellido_pat', 'asc')
                ->orderBy('personas.apellido_mat', 'asc')
                ->orderBy('personas.nombre', 'asc')
                ->get();
        }
        
        return view('maestros.search', ['maestros' => $maestros]);       
    }
}
