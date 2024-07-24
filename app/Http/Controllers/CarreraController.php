<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Carrera;

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
        return view('carreras.create', ['carrera' => new Carrera()]);
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:4'],
            'acronimo' => ['required', 'max:50'],
            'division_id' => ['required'],                     
        ]);

        Carrera::create([
            'nombre' => $request->input('nombre'),
            'acronimo' => $request->input('acronimo'),
            'division_id' => $request->input('division_id'),
            'activo' => 1,
        ]);

        session()->flash('status', 'Carrera Registrada con exito');
        return to_route('carreras.index')->with('status', 'Carrera registrada con exito');
    }
 
    public function show(string $id)
    {
        //
    }

    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', ['carrera' => $carrera]);
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
   
    public function activar(Carrera $carrera){
        if($carrera->activo ==1){
            $carrera->activo = 0;
            }else{
            $carrera->activo = 1;
            }
            $carrera->save();
            return to_route('carreras.index')->with('status', 'Carrera actualizada');
    } 
    
    public function destroy(Carrera $carrera)
    {      
        $carrera->delete();              
        return to_route('carreras.index')->with('status', 'Carrera eliminada');
    }

    public function showall(){
        $carreras = DB::table('carreras')->get();
    }

}
