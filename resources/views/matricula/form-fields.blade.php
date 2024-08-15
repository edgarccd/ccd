<div class="form-floating mb-3">
    <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" 
    placeholder="Apellido Paterno"  value="{{old('apellido_pat',$persona->apellido_pat)}}" required>
    <label for="apellido_pat">Apellido Paterno</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" 
    placeholder="Apellido Materno"  value="{{old('apellido_mat',$persona->apellido_mat)}}" required>
    <label for="apellido_mat">Apellido Materno</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" 
    placeholder="Nombre"  value="{{old('nombre',$persona->nombre)}}" required>
    <label for="nombre">Nombre</label>
</div>

<div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="2"{{ old('sexo', $persona->sexo) == 2 ? 'checked' : '' }}>
        <label class="form-check-label" for="inlineRadio1" >Hombre</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="1"{{ old('sexo', $persona->sexo) == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="inlineRadio2" >Mujer</label>
    </div>

</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="matricula" name="matricula" 
    placeholder="Matricula"  value="{{old('matricula',$persona->alumno->matricula)}}" required>
    <label for="nombre">Matricula</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="correo" name="correo" 
    placeholder="Correo"  value="{{old('correo',$persona->correo)}}" required>
    <label for="correo">Correo</label>
</div>

