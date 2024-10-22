<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Aula;

class selectAula extends Component
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
        
        $aulas = Aula::where('activo', 1)
        ->orderBy('nombre')
        ->get();
        return view('components.select-aula', ['aulas' => $aulas]);
        
    }
}
