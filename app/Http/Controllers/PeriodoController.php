<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodos = Periodo::orderBy('ciclo')
            ->get();

        return view('periodos.index', ['periodos' => $periodos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periodos.create', ['periodo' => new Periodo()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'ciclo' => ['required'],                     
        ]);

        Periodo::create([
            'nombre' => $request->input('nombre'),
            'ciclo' => $request->input('ciclo'),
            'activo' => 1,
    

        ]);

        session()->flash('status', 'Periodo Registrado con exito');

        return to_route('periodos.index')->with('status', 'Periodo registrado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(Periodo $periodo)
    {
        $periodo->delete();
        return to_route('periodos.index')->with('status', 'Periodo eliminado');
    }
}
