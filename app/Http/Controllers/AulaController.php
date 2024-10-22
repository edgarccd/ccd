<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{

    public function index()
    {
        $aulas = Aula::orderBy('nombre')
            ->get();
        return view('aulas.index', ['aulas' => $aulas]);
    }

    public function create()
    {
        return view('aulas.create', ['aula' => new Aula()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'descripcion' => ['required'],
            'tipo' => ['required'],
            'activo' => ['required'],
        ]);

        Aula::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'tipo' => 1,
            'activo' => 1,
        ]);

        session()->flash('status', 'Aula Registrada con exito');
        return to_route('aulas.index')->with('status', 'Aula registrada con exito');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Aula $aula)
    {
        return view('aulas.edit', ['aula' => $aula]);
    }

    public function update(Request $request, $aula)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'descripcion' => ['required', 'max:255'],
            'activo' => ['required'],
        ]);

        $aula = Aula::find($aula);
        $aula->nombre = $request->input('nombre');
        $aula->descripcion = $request->input('descripcion');
        $aula->activo = $request->input('activo');
        $aula->updated_at = now();
        $aula->save();

        return to_route('aulas.index')->with('status', 'Aula actualizada con exito');
    }

    public function destroy(Aula $aula)
    {
        $aula->delete();
        return to_route('aulas.index')->with('status', 'Aula eliminada');
    }
}
