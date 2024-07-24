<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Carrera;

class SelectCarrera extends Component
{
   
    public function __construct()
    {
       
    }

    public function render(): View|Closure|string
    {

        $carreras = Carrera::where('activo', 1)
        ->orderBy('nombre')
        ->get();
        return view('components.select-carrera', ['carreras' => $carreras]);
    }
}
