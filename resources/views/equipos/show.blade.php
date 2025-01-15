<x-app-layout>
    <br>
    <div class="major container col-7">
        <h4> {{ $equipo->nombre }} </h4>
        {{ $equipo->proyecto->nombre }}
        <h1>Integrantes:</h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="30"
                                    height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg></td>
                            <td>{{ $alumno->alumno->persona->apellido_pat }}</td>
                            <td>{{ $alumno->alumno->persona->apellido_mat }}</td>
                            <td>{{ $alumno->alumno->persona->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="../../proyecto/catalogo/{{ $equipo->proyecto->id }}.pdf" target="_blank"
                class="btn btn-primary">PDF</a>
            <a href="{{ route('equipos.entregables', [$equipo, Auth::user()]) }}"
                class="btn btn-dark">Entregables</a>
            <a href="{{ route('equipos.index', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</x-app-layout>
