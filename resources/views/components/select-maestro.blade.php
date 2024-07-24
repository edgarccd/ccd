<div>
    <label for="maestro_id">Profesor</label>
    <select name="maestro_id" id="maestro_id" class="form-select" required>
        <option value="0">--Seleccionar--</option>
        @foreach ($maestros as $maestro)
            <option value={{ $maestro->id }}>{{ $maestro->persona->apellido_pat }}
                {{ $maestro->persona->apellido_mat }} {{ $maestro->persona->nombre }}</option>
        @endforeach
    </select>
</div>
