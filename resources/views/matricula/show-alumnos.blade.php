<x-app-layout>
    <br>
    <div class="major container">
        <h3>
        </h3>
        <b>
            @foreach ($carrera as $car)
                {{ $car->nombre }}
            @endforeach
            <br>
            {{ $grupo->grado }} °
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

            @if ($grupo->turno_id == 1)
                Matutino
            @else
                Vespertino
            @endif

        </b>
        <hr>
        <form action="{{ route('matricula.alta', $grupo) }}" method="get">
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="submit">Registrar</button>
                <input id="apellido_pat" name="apellido_pat" type="text" class="form-control"
                    aria-label="Text input with segmented dropdown button" placeholder="Apellido Paterno" required>
                <input id="apellido_mat" name="apellido_mat" type="text" class="form-control"
                    aria-label="Text input with segmented dropdown button" placeholder="Apellido Materno" required>
                <input id="nombre" name="nombre" type="text" class="form-control"
                    aria-label="Text input with segmented dropdown button" placeholder="Nombre" required>
                <input id="matricula" name="matricula" type="text" class="form-control"
                    aria-label="Text input with segmented dropdown button" placeholder="Matricula" required>
                    <input id="correo" name="correo" type="text" class="form-control"
                    aria-label="Text input with segmented dropdown button" placeholder="Correo" required>
                    <select class="form-select" id="sexo" name="sexo" required>
                        <option value="2">Hombre</option>
                        <option value="1">Mujer</option>             
                    </select>
            </div>
        </form>
        <form action="{{ route('matricula.search', [$grupo]) }}" method="get">
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="submit">Buscar por</button>
                <select class="form-select" id="busqueda" name="busqueda" required>
                    <option value="paterno" selected>Apellido Paterno</option>
                    <option value="materno">Apellido Materno</option>
                    <option value="nombre">Nombre</option>
                </select>
                <input id="nombre" name="nombre" type="text" class="form-control"
                    aria-label="Text input with segmented dropdown button" placeholder="Nombre del Alumno" required>
            </div>
        </form>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>

                    <th>Apellido Pat</th>
                    <th>Apellido Mat</th>
                    <th>Nombre</th>
                    <th>Matricula</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>

                        <td>{{ $alumno->apellido_pat }} </td>
                        <td>{{ $alumno->apellido_mat }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->matricula }}</td>
                        <td>
                            <a href="{{ route('matricula.edit', [$alumno->id, $grupo]) }}"
                                class="btn btn-outline-primary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('matricula.destroy', [$alumno->alumno_id, $grupo]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: justify;margin: 20px;">
            @foreach ($carrera as $c)
                <br> <a href="{{ route('matricula.showGrupos', $c->id) }}" class="btn btn-secondary">Regresar</a>
            @endforeach
        </div>
    </div>
</x-app-layout>
