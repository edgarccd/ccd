<div>
    <label for="proyecto_id">Proyecto</label>
    <select name="proyecto_id" id="proyecto_id" class="form-select" required>
        <option value="0">--Seleccionar--</option>
        @foreach ($proyectos as $proyecto)
            <option value={{ $proyecto->id }}>{{ $proyecto->nombre }}</option>
        @endforeach
    </select>
</div>
