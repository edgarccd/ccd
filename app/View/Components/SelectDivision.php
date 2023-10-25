<?php
namespace App\View\Components;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Division;

class SelectDivision extends Component
{
    
    public function __construct()
    {
       //
    }

   
    public function render(): View|Closure|string
    {
        $divisiones = Division::where('activo', 1)
        ->orderBy('nombre')
        ->get();
        return view('components.select-division', ['divisiones' => $divisiones]);
    }
}
