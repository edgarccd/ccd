<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre',$materia->nombre)}}" required>
    <label for="nombre">Nombre</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="plan" name="plan" placeholder="Plan" value="{{old('nombre',$materia->nombre)}}" required>
    <label for="plan">Plan</label>
</div>
<x-select-carrera />
<label for="grado">Grado</label>
<select name="grado" id="grado" class="form-select">
    <option value="0">--Seleccionar--</option>
        <option value="1">1ero</option>
    <option value="2">2do</option>
    <option value="3">3ero</option>
    <option value="4">4to</option>
    <option value="5">5to</option>
    <option value="6">6to</option>
    <option value="7">7mo</option>
    <option value="8">8vo</option>
    <option value="9">9no</option>
    <option value="10">10mo</option>
       </select>
       <label for="turno">Turno</label>
       <select name="turno" id="turno" class="form-select">
        <option value="0">--Seleccionar--</option>
        <option value="1">Matutino</option>
    <option value="2">vespertino</option>

       </select>
