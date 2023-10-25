<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre',$periodo->nombre)}}">
    <label for="nombre">Nombre</label>
</div>
<div class="form-floating">
    <input type="text" class="form-control" id="ciclo" name="ciclo" placeholder="Ciclo" value="{{old('ciclo',$periodo->ciclo)}}">
    <label for="ciclo">Ciclo</label>
</div>
<div class="form-check form-check-reverse">
    <input class="form-check-input" type="checkbox" value="" id="reverseCheck1" checked>
    <label class="form-check-label" for="reverseCheck1">
        Activo
    </label>
</div>