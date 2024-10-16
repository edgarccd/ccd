<label for="carrera_id">Carrera</label>
<select name="carrera_id" id="carrera_id" class="form-select" onchange="grupos(this)" required>
    <option selected disabled value="">-- Seleccionar --</option>
    @if ($carreras != null)
        @foreach ($carreras as $carrera)
            <option
                value={{ $carrera->id }}@if (isset($_POST['carrera_id'])) {{ old('carrera_id', $carrera->id) == $_POST['carrera_id'] ? 'selected' : '' }} @endif>
                {{ $carrera->nombre }}</option>
        @endforeach
    @endif
</select>

<div style="display:flex;flex-flow:row wrap;">

   <div class="col-2 m-3">
        <label for="grupo_id">Grupo</label>
        <select name="grupo_id" id="grupo_id" class="form-select" required>
            <option selected disabled value="">-- Seleccionar --</option>
        </select>
    </div>

    <div class="col-2 m-3">
        <label for="grupo_id">Equipo</label>
        <select name="grupo_id" id="grupo_id" class="form-select" required>
            <option selected disabled value="">-- Seleccionar --</option>
        </select>
    </div>
    
    <div class="col-2 m-3">
        <label for="dia_id">Aula</label>
        <select name="aula_id" id="aula_id" class="form-select" required>
            <option selected disabled value="">-- Seleccionar --</option>
        </select>
    </div>

    <div class="col-2 m-3">
        <label for="dia_id">Día</label>
        <select name="dia_id" id="dia_id" class="form-select" required>
            <option selected disabled value="">-- Seleccionar --</option>
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miercoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
        </select>
    </div>

    <div class="col-2 m-3">
        <label for="hora_id">Hora</label>
        <select name="hora_id" id="hora_id" class="form-select" required>
            <option selected disabled value="">-- Seleccionar --</option>
            <option value="1">8:00</option>
            <option value="2">8:30</option>
            <option value="3">9:00</option>
            <option value="4">9:30</option>
            <option value="5">10:00</option>
            <option value="6">10:30</option>
            <option value="7">11:00</option>
            <option value="8">11:30</option>
            <option value="9">12:00</option>
            <option value="10">12:30</option>
            <option value="11">13:00</option>
            <option value="12">13:30</option>
            <option value="13">14:00</option>
            <option value="14">14:30</option>
            <option value="15">17:00</option>
            <option value="16">17:30</option>
            <option value="17">18:00</option>
            <option value="18">18:30</option>
            <option value="19">19:00</option>
            <option value="20">19:30</option>
            <option value="21">20:00</option>
            <option value="22">20:30</option>
        </select>
    </div>

</div>


<script>
    function grupos(carreraSelect) {
        let careraID = carreraSelect.value;
        fetch('horarios/' + careraID + '/grupos')
            .then(function() {
                alert(response);
            })

    }
</script>
