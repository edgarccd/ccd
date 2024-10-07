<x-app-layout>
    <br>
    <div class="major container">
        <h4> {{ $equipo->nombre }} - {{ $equipo->proyecto->nombre }} </h4>
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
        <br> <a href="{{ route('equipos.registrados', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
    </div>
</x-app-layout>
