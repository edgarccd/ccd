<x-app-layout>
    <br>
    <div class="major container">
        <h1>Materias Asignadas</h1>
        <h3>
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
        </h3>
        <hr>
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
            <div style="text-align: justify;margin: 20px;">
                <br>
                <button type="submit" class="btn btn-primary">Grabar</button>
                @foreach ($carrera as $c)
                    <a href="{{ route('grupos.showGrupos', [$c->id, $grupo->turno_id]) }}"
                        class="btn btn-secondary">Regresar</a>
                @endforeach
            </div>
        </form>
    </div>
</x-app-layout>
