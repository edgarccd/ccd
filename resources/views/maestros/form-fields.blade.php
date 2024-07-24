<x-text-nombre value="{{old('nombre',$persona->nombre)}}" />

<div class="form-floating mb-3">
    <input type="text" class="form-control text-uppercase" id="apellido_pat" name="apellido_pat" placeholder="Apellido Paterno"
    value="{{old('apellido_pat',$persona->apellido_pat)}}" required>
    <label for="apellido_pat">Apellido Paterno</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control text-uppercase" id="apellido_mat" name="apellido_mat" placeholder="Apellido Materno"
    value="{{old('apellido_mat',$persona->apellido_mat)}}" required>
    <label for="apellido_mat">Apellido Materno</label>
</div>

<div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
        <label class="form-check-label" for="inlineRadio1">Hombre</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
        <label class="form-check-label" for="inlineRadio2">Mujer</label>
    </div>

</div>
<br>
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">@</span>
    <input type="text" class="form-control" placeholder="Correo" aria-label="Username" name="correo"
        aria-describedby="addon-wrapping" value="{{old('correo',$persona->correo)}}" required>
</div>
<br>

<div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Dirección</span>
    <input type="text" class="form-control" aria-label="Sizing example input" name="direccion"
        aria-describedby="inputGroup-sizing-default" value="{{old('direccion',$persona->direccion)}}">
</div>

<div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Telefono</span>
    <input type="text" class="form-control" aria-label="Sizing example input" name="telefono"
        aria-describedby="inputGroup-sizing-default" value="{{old('telefono',$persona->telefono)}}">
</div>

<div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Nomina</span>
    <input type="text" class="form-control" aria-label="Sizing example input" name="nomina"
        aria-describedby="inputGroup-sizing-default" value="{{old('nomina',$maestro->nomina)}}">
</div>

<x-checkbox-activo />
