<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Maestro;

class selectMaestro extends Component
{

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {        
        $maestros = Maestro::where('activo',1)->get();
        return view('components.select-maestro', ['maestros' => $maestros]);
    }
}
