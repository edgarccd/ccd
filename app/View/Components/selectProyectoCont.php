<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class selectProyectoCont extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        
       
        $proyectos = Proyecto::whereNOTIn('id', function ($query) {
            $periodo = Periodo::where('activo', 1)->first();
            $query->select('proyecto_equipos.proyecto_id')
                ->from('proyecto_equipos')
                ->join('grupos', 'grupos.id', '=', 'proyecto_equipos.grupo_id')
                ->where('grupos.periodo_id', $periodo->id);
        })->orderBy('nombre')->get();
        
        return view('components.select-proyecto-cont', ['proyectos' => $proyectos]);       
    }
}
