<label for="carrera_id">
    Carrera</label>
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
                        {{ $grupo->grado }}°
                        @switch($grupo->grupo)
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
                <option value={{ $aula->id }}
                    @if (isset($_POST['aula_id'])) {{ old('aula_id', $aula->id) == $_POST['aula_id'] ? 'selected' : '' }} @endif>
                    {{ $aula->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-2 m-3">
        <label for="dia_id">Día</label>
        <select name="dia_id" id="dia_id" class="form-select" required>
            <option selected disabled value="">-- Seleccionar --</option>
            @foreach ($dias as $dia)
                <option value="{{ $dia->id }}"
                    @if (isset($_POST['dia_id'])) {{ old('dia_id', $dia->id) == $_POST['dia_id'] ? 'selected' : '' }} @endif>
                    @switch(Carbon\Carbon::parse($dia->dia)->format('N'))
                        @case(1)
                            Lunes
                        @break

                        @case(2)
                            Martes
                        @break

                        @case(3)
                            Miercoles
                        @break

                        @case(4)
                            Jueves
                        @break

                        @case(5)
                            Viernes
                        @break
                    @endswitch
                    {{ Carbon\Carbon::parse($dia->dia)->format('d') }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-2 m-3">
        <label for="hora_id">Hora</label>
        <select name="hora_id" id="hora_id" class="form-select" required>
            <option selected disabled value="">-- Seleccionar --</option>
            @if ($turno == 1)
                <option value="1">9:00</option>
                <option value="2">9:30</option>
                <option value="3">10:00</option>
                <option value="4">10:30</option>
                <option value="5">11:00</option>
                <option value="6">11:30</option>
                <option value="7">12:00</option>
                <option value="8">12:30</option>
                <option value="9">13:00</option>
                <option value="10">13:30</option>
            @endif
            @if ($turno == 2)
                <option value="11">17:00</option>
                <option value="12">17:30</option>
                <option value="13">18:00</option>
                <option value="14">18:30</option>
                <option value="15">19:00</option>
                <option value="16">19:30</option>
                <option value="17">20:00</option>
                <option value="18">20:30</option>
            @endif
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

        var length = grupoSelect.length;
        for (var i = 0; i < length; i++) {
            grupoSelect.remove(i);
        }
        grupoSelect.remove(0);

        var opcionEtiqueta = document.createElement('option');
        opcionEtiqueta.value = '';
        opcionEtiqueta.innerHTML = '-- Seleccionar--';
        grupoSelect.append(opcionEtiqueta);

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
                    letraGrupo = "D";
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
