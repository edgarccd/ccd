<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Proyecto;

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
    public function render(): View|Closure|string
    {
        $proyectos = Proyecto::orderBy('nombre')->get();
        return view('components.select-proyecto', ['proyectos' => $proyectos]);
      
    }
}
