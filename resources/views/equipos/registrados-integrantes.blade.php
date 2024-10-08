<x-app-layout>
    <main class="container">
        <br>
        <div class="major container col-8">
        <h4> {{ $equipo->grupo->grado }}
            °
            @switch($equipo->grupo->grupo)
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
            @endswitch - {{ $equipo->nombre }} - {{ $equipo->proyecto->nombre }} </h4>
        Integrantes:
        <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->alumno->persona->apellido_pat }}</td>
                            <td>{{ $alumno->alumno->persona->apellido_mat }}</td>
                            <td>{{ $alumno->alumno->persona->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br> <a href="{{ route('equipos.showRegistrados',[Auth::user(),$equipo->grupo->carrera_id,$equipo->grupo->turno_id]) }}" class="btn btn-secondary">Regresar</a>
    </div>
</main>
</x-app-layout>
