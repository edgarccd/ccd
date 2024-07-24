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