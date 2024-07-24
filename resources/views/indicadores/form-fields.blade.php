<x-text-descripcion value="{{old('descripcion',$indicador->descripcion)}}" /> 
<div class="form-floating mb-3">
    <input type="number" class="form-control" id="ponderacion" name="ponderacion" placeholder="ponderacion" value="{{old('ponderacion',$indicador->ponderacion)}}" >
    <label for="ponderacion">Ponderación</label>
</div>

<label for="criterio_id">Criterio</label>
<select name="criterio_id" id="criterio_id" class="form-select" ">
    <option value="0">--Seleccionar--</option>
    <option value="1" @selected(old('criterio_id',$indicador->criterio_id) == 1) >Exposición</option>
    <option value="2" @selected(old('criterio_id',$indicador->criterio_id) == 2)>Funcionalidad</option>
    <option value="3" @selected(old('criterio_id',$indicador->criterio_id) == 3)>Problemática</option>
</select>

<label for="cuestionario_id">Cuestionario</label>
<select name="cuestionario_id" id="cuestionario_id" class="form-select" >
    <option value="0">--Seleccionar--</option>
    <option value="1" @selected(old('cuestionario_id',$indicador->cuestionario_id) == 1)>Evaluación de Proyectos</option>
    <option value="2" @selected(old('cuestionario_id',$indicador->cuestionario_id) == 2)>Otro</option>
</select>
<x-checkbox-activo required />