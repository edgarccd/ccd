<x-app-layout>
    <main class="container">
        <br>
        <div class="major container">
            <h2>Cargar Alumnos </h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombre</th>
                            <th>Matricula</th>
                            <th>Sexo</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($temporales as $temporal)
                            <tr>
                                <td>{{ $temporal->apellido_pat }}</td>
                                <td>{{ $temporal->apellido_mat }}</td>
                                <td>{{ $temporal->nombre }}</td>
                                <td>{{ $temporal->matricula }}</td>
                                <td>{{ $temporal->sexo }}</td>
                                <td>{{ $temporal->correo }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <h3>
               
                    {{ $carrera->nombre }}
               
            </h3>
            <form action="{{ route('matricula.store', $carrera->id) }}" method="post" class="needs-validation">
                @csrf
                <select name="grupo_id" id="grupo_id" class="form-select">
                    <option value=0>--Seleccionar--</option>
                    @foreach ($grupos as $grupo)
                        <option value={{ $grupo->id }}>{{ $grupo->grado }} ° @switch($grupo->grupo)
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
                        </option>
                    @endforeach
                </select>
                <div style="margin: 10px;">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="{{ route('matricula.index') }}" class="btn btn-secondary">Regresar</a>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
