<x-app-layout>
    <br>
    <div class="major container">
        <hr>
        <h4> {{ $equipo->proyecto->nombre }}</h4>
         <p>{{ $equipo->id }} - {{ $equipo->nombre }} </p>
         <hr>       
            <h2 style="text-align: center;">Alumnos</h2>        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->alumno->persona->apellido_pat }}</td>
                            <td>{{ $alumno->alumno->persona->apellido_mat }}</td>
                            <td>{{ $alumno->alumno->persona->nombre }}</td>
                            <td>
                                <form action="{{ route('equipos.destroy', [$alumno->alumno, $equipo]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br> <a href="{{ route('equipos.index', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
    </div>
</x-app-layout>
