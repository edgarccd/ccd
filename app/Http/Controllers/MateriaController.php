<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Carrera;
use Illuminate\Http\Request;

class MateriaController extends Controller
{

    public function index()
    {
        $carreras = Carrera::get();
        return view('materias.index', ['carreras' => $carreras]);
    }

    public function create()
    {
        return view('materias.create', ['materia' => new Materia()]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'plan' => ['required', 'max:50'],
            'grado' => ['required'],
            'turno' => ['required'],
            'carrera_id' => ['required'],
        ]);

        Materia::create([
            'nombre' => $request->input('nombre'),
            'plan' => $request->input('plan'),
            'grado' => $request->input('grado'),
            'turno' => $request->input('turno'),
            'carrera_id' => $request->input('carrera_id'),
        ]);

        return to_route('materias.create')->with('status', 'Materia registrada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $CarreraID = $request->input('carrera_id');
        $TurnoID = $request->input('turno_id');
        $materias = Materia::where('carrera_id', $CarreraID)
            ->where('turno', $TurnoID)
            ->get();
            return view('materias.show', ['materias' => $materias]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        return view('materias.edit', ['materia' => $materia]);
    }


    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'plan' => ['required'],
            'grado' => ['required'],
            'turno' => ['required'],
            'carrera_id' => ['required'],
        ]);

        $materia = Materia::find($materia);
        $materia->nombre = $request->input('nombre');
        $materia->plan = $request->input('plan');
        $materia->grado = $request->input('grado');
        $materia->turno = $request->input('turno');
        $materia->carrera_id = $request->input('carrera_id');
        $materia->updated_at = now();
        $materia->save();

        return to_route('materias.index')->with('status', 'Materia actualizada con exito');
    }


    public function destroy(Materia $materia)
    {
        $materia->delete();
        return to_route('materias.show')->with('status', 'Materia eliminada');
    }
}
