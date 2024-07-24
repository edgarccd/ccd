<div>
    <label for="carrera_id">Carrera</label>
    <select name="carrera_id" id="carrera_id" class="form-select">
        <option value=0>--Seleccionar--</option>
        @foreach ($carreras as $carrera)
            <option value={{ $carrera->id }}>{{ $carrera->nombre }}</option>
        @endforeach
    </select>
</div>
