<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
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
        $proyectos = Proyecto::orderBy('nombre')
        ->get();

    return view('proyectos.eje.catalogo', ['proyectos' => $proyectos]);
    }
}
