<x-text-nombre value="{{ old('nombre', $carrera->nombre) }}" />
<x-text-acronimo value="{{ old('acronimo', $carrera->acronimo) }}" />
<div>
    <label for="division_id">División</label>
    <select name="division_id" id="division_id" class="form-select">
        <option selected disabled value="">--Seleccionar--</option>
        @foreach ($divisiones as $division)
            <option value={{ $division->id }}
                {{ old('division', $division->id) == $carrera->division_id ? 'selected' : '' }}>{{ $division->nombre }}
            </option>
        @endforeach
    </select>
</div>
<x-checkbox-activo checked />
