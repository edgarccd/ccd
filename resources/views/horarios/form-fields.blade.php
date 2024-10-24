<label for="carrera_id">Carrera</label>
<select name="carrera_id" id="carrera_id" class="form-select" onchange="cargarGrupos(this);" required>
    <option selected disabled value="">-- Seleccionar --</option>
    @if ($carreras != null)
        @foreach ($carreras as $carrera)
            <option
                value={{ $carrera->id }}@if (isset($_POST['carrera_id'])) {{ old('carrera_id', $carrera->id) == $_POST['carrera_id'] ? 'selected' : '' }} @endif>
                {{ $carrera->nombre }}
            </option>
        @endforeach
    @endif
</select>

<div style="display:flex;flex-flow:row wrap;">
    <div class="col-2 m-3">
        <label for="grupo_id">Grupo</label>
        <select name="grupo_id" id="grupo_id" class="form-select" onchange="cargarEquipos(this);" required>
            <option selected disabled value="">-- Seleccionar --</option>
            @if ($grupos instanceof Illuminate\Database\Eloquent\Collection)
                @foreach ($grupos as $grupo)
                    <option
                        value={{ $grupo->id }}@if (isset($_POST['grupo_id'])) {{ old('grupo_id', $grupo->id) == $_POST['grupo_id'] ? 'selected' : '' }} @endif>
                        {{ $grupo->grado }}°@switch($grupo->grupo)
                            @case(1)
                                A
                            @break

                            @case(2)
                                B
                            @break

                            @case(3)
                                C
                            @break

                            @case(4)
                                D
                            @break
                        @endswitch
                    </option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="col-2 m-3">
        <label for="equipo_id">Equipo</label>
        <select name="equipo_id" id="equipo_id" class="form-select" required>
            
            @if ($equipos instanceof Illuminate\Database\Eloquent\Collection)
                @foreach ($equipos as $equipo)
                    <option value={{ $equipo->id }}>{{ $equipo->nombre }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="col-2 m-3">
        <label for="dia_id">Aula</label>
        <select name="aula_id" id="aula_id" class="form-select" required>
            <option selected disabled value="">-- Seleccionar --</option>
            @foreach ($aulas as $aula)
                <option value={{ $aula->id }} @if (isset($_POST['aula_id'])) {{ old('aula_id', $aula->id) == $_POST['aula_id'] ? 'selected' : '' }} @endif>{{ $aula->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-2 m-3">
        <label for="dia_id">Día</label>
        <select name="dia_id" id="dia_id" class="form-select" required>
            <option selected disabled value="">-- Seleccionar --</option>
            <option value="1" @if (isset($_POST['dia_id'])) {{ old('dia_id', 1) == $_POST['dia_id'] ? 'selected' : '' }} @endif>Lunes</option>
            <option value="2" @if (isset($_POST['dia_id'])) {{ old('dia_id', 2) == $_POST['dia_id'] ? 'selected' : '' }} @endif>Martes</option>
            <option value="3" @if (isset($_POST['dia_id'])) {{ old('dia_id', 3) == $_POST['dia_id'] ? 'selected' : '' }} @endif>Miercoles</option>
            <option value="4" @if (isset($_POST['dia_id'])) {{ old('dia_id', 4) == $_POST['dia_id'] ? 'selected' : '' }} @endif>Jueves</option>
            <option value="5" @if (isset($_POST['dia_id'])) {{ old('dia_id', 5) == $_POST['dia_id'] ? 'selected' : '' }} @endif>Viernes</option>
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
    function cargarGrupos(element) {

        var carreraId = element.value;
        fetch('../' + carreraId + '/grupos')
            .then(function(response) {
                return response.json();
            })
            .then(function(jsonData) {
                llenarGrupos(jsonData);
            });
    }

    function llenarGrupos(jsonGrupos) {
        var grupoSelect = document.getElementById('grupo_id');
        jsonGrupos.forEach(function(grupo) {
            var opcionEtiqueta = document.createElement('option');
            opcionEtiqueta.value = grupo.id;
            var letraGrupo = " ";
            switch (grupo.grupo) {
                case '1':
                    letraGrupo = "A";
                    break;
                case '2':
                    letraGrupo = "B";
                    break;
                case '3':
                    letraGrupo = "C";
                    break;
                case '4':
                    letraGrupo = "C";
                    break;
            }
            opcionEtiqueta.innerHTML = grupo.grado + " ° " + letraGrupo;
            grupoSelect.append(opcionEtiqueta);
        });
    }

    function cargarEquipos(element) {
        var equipoSelect = document.getElementById('equipo_id');
        var length = equipoSelect.length;
        for (var i = 0; i < length - 1; i++) {
            equipoSelect.remove(i);
        }
        var grupoId = element.value;

        fetch('/horarios/' + grupoId + '/equipos')
            .then(function(response) {
                return response.json();
            })
            .then(function(jsonData) {
                llenarEquipos(jsonData);
            });
    }


    function llenarEquipos(jsonEquipos) {
        var equipoSelect = document.getElementById('equipo_id');
        var length = equipoSelect.length;
        for (var i = 0; i < length; i++) {
            equipoSelect.remove(i);
        }
        equipoSelect.remove(0);
        jsonEquipos.forEach(function(equipo) {
            var opcionEtiqueta = document.createElement('option');
            opcionEtiqueta.value = equipo.id;
            opcionEtiqueta.innerHTML = equipo.nombre;
            equipoSelect.append(opcionEtiqueta);
        });
    }
</script>
