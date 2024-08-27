<x-app-layout>
    <br>
    <div class="major container">
        <h1 style="text-align: center;">Materias</h1>
        <hr>
        <h5 style="text-align: center;">{{ $carrera->nombre }}</h5>
        <h5 style="text-align: center;">
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

            -

            @switch($grupo->turno_id)
                @case(1)
                    Matutino
                @break

                @case(2)
                    Vespertino
                @break
            @endswitch
        </h5>
        <form action="{{ route('grupos.maestroStore', $grupo) }}" method="get" class="needs-validation" novalidate>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Maestro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materias as $materia)
                        <tr>
                            <td>{{ $materia->nombre }}</td>
                            <td>
                                <select name="materia_{{ $materia->id }}" id="materia_{{ $materia->id }}"
                                    class="form-select" required>
                                    <option selected disabled value="">-- Seleccionar --</option>
                                    @foreach ($maestros as $maestro)
                                        <option value="{{ $maestro->id }}"
                                            @foreach ($grupoMateria as $gp)
                                            {{ old('materia_' . $materia->id, $maestro->id) == $gp->maestro_id && $materia->id == $gp->materia_id ? 'selected' : '' }} @endforeach>
                                            {{ $maestro->apellido_pat }} {{ $maestro->apellido_mat }}
                                            {{ $maestro->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
            
                <button type="submit" class="btn btn-primary">Grabar</button>

                <a href="{{ route('grupos.showGrupos', [$carrera->id, $grupo->turno_id]) }}"
                    class="btn btn-secondary">Regresar</a>

            
        </form>
    </div>
</x-app-layout>
