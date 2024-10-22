<div class="col-2 m-3">
    <label for="dia_id">Aula</label>
    <select name="aula_id" id="aula_id" class="form-select" required>
        <option selected disabled value="">-- Seleccionar --</option>
        @foreach ($aulas as $aula)
            <option value={{ $aula->id }}>{{ $aula->nombre }}</option>
        @endforeach
    </select>
</div>