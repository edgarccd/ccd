<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre',$carrera->nombre)}}" required>
    <label for="nombre">Nombre</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="acronimo" name="acronimo" placeholder="Acronimo" value="{{old('nombre',$carrera->acronimo)}}" required>
    <label for="acronimo">Acrónimo</label>
</div>
<x-select-division/>
  
<div class="form-check form-check-reverse">
    <input class="form-check-input" type="checkbox" value="" id="reverseCheck1" checked>
    <label class="form-check-label" for="reverseCheck1">
        Activo
    </label>
</div>
