<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class MaestroController extends Controller
{
    
    public function index()
    {
        $maestros = Maestro::get();
        return view('maestros.index', ['maestros' => $maestros]);
    }
  
    public function create()
    {
        return view('maestros.create', ['maestro' => new Maestro(),'persona' => new Persona()]);
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
            'sexo' => $request->input('inlineRadioOptions'),
            'correo' => $request->input('correo'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
        ]);

        $persona = Persona::latest('id')->first();
        $id = Maestro::latest('id')->first();

        $maestro = new Maestro;
        $maestro->id =  $id->id+1;
        $maestro->nomina    = $request->input('nomina');
        $maestro->persona_id = $persona->id;
        $maestro->activo = 1;
        $maestro->save(); 
  
        User::create([
            'name' => $persona->nombre." ".$persona->apellido_pat." ".$persona->apellido_mat,
            'email' => $persona->correo,
            'password' => Hash::make($persona->correo),
            'persona_id' =>  $persona->id,
        ]);

        session()->flash('status', 'Maestro Registrado con exito');
        return to_route('maestros.index')->with('status', 'Maestro Registrado con exito');
    }

    public function show(string $id)
    {
        //
    }
  
    public function edit(Maestro $maestro)
    {
        $persona=Persona::where('id',$maestro->persona_id)->get()->first();    
        return view('maestros.edit', ['maestro' => $maestro,'persona'=>$persona]);
    }

   
    public function update(Request $request, $maestro)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'apellido_pat' => ['required', 'max:255'],    
                        
        ]);

        $maestro = Maestro::find($maestro);
        $maestro->nomina = $request->input('nomina');
        $maestro->save();

        $persona = Persona::where('id',$maestro->persona_id)->get()->first();
        $persona->nombre = $request->input('nombre');
        $persona->apellido_pat = $request->input('apellido_pat');
        $persona->apellido_mat = $request->input('apellido_mat');
        $persona->sexo = 1;
        $persona->correo = $request->input('correo');
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->save();


        return to_route('maestros.index')->with('status', 'Maestro actualizado con exito');
    }

    public function destroy(Maestro $maestro)
    {
        $id=$maestro->persona_id;
        $maestro->delete(); 
        $usuario=User::where('persona_id',$id)->get()->first();
        $usuario->delete();
        $persona=Persona::where('id', $id)->get()->first();
        $persona->delete();
        
                     
        return to_route('maestros.index')->with('status', 'Maestro eliminado');
    }
}
