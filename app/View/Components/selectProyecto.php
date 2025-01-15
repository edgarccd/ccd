<?php

namespace App\View\Components;

use App\Models\Periodo;
use App\Models\Proyecto;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class selectProyecto extends Component
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
    public function render(): View | Closure | string
    {
         $proyectos = DB::table('proyectos')->orderBy('nombre')->get();

        return view('components.select-proyecto', ['proyectos' => $proyectos]);

    }
}
