<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarreraController extends Controller
{
    public function index()
    {
        $carreras = Carrera::orderBy('nombre')
            ->get();                
        return view('carreras.index', ['carreras' => $carreras]);
    }

    public function create()
    {
        $divisiones=Division::where('activo',1)->get();
        return view('carreras.create', ['carrera' => new Carrera(),'divisiones'=> $divisiones]);
    }

    public function store(Request $request)
    {     
        Carrera::create([
            'nombre' => $request->input('nombre'),
            'acronimo' => $request->input('acronimo'),
            'division_id' => $request->input('division_id'),
            'activo' => 1,
        ]);

        $carreras = Carrera::orderBy('nombre')
            ->get();

        return view('carreras.index', ['carreras' => $carreras]);
    }

    public function edit(Carrera $carrera)
    {
        $divisiones=Division::where('activo',1)->get();
        return view('carreras.edit', ['carrera' => $carrera,'divisiones'=> $divisiones]);
    }

    public function update(Request $request, $carrera)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'acronimo' => ['required'],
            'division_id' => ['required'],
        ]);

        $carrera = Carrera::find($carrera);
        $carrera->nombre = $request->input('nombre');
        $carrera->acronimo = $request->input('acronimo');
        $carrera->division_id = $request->input('division_id');
        $carrera->updated_at = now();
        $carrera->save();

        return to_route('carreras.index')->with('status', 'Carrera actualizada con exito');
    }

    public function activar(Carrera $carrera)
    {
        if ($carrera->activo == 1) {
            $carrera->activo = 0;
        } else {
            $carrera->activo = 1;
        }
        $carrera->save();

        $carreras = Carrera::orderBy('nombre')
            ->get();

        return view('carreras.index', ['carreras' => $carreras]);
    }

    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return to_route('carreras.index')->with('status', 'Carrera eliminada');
    }

    public function showall()
    {
        $carreras = DB::table('carreras')->get();
    }

}
