<x-app-layout>
    <br>
    <div class="major container">
        <h3>Resultados de la busqueda</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Apellido Pat</th>
                    <th>Apellido Mat</th>
                    <th>Nombre</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alu)
                <tr>
                    <td>{{ $alu->apellido_pat }}</td>
                    <td>{{ $alu->apellido_mat }}</td>
                    <td>{{ $alu->nombre }}</td>
                    <td><a href="{{ route('matricula.agregar', [$alu->id,$grupo]) }}" class="btn btn-outline-primary">Agregar</a></td>
                </tr>
                 @endforeach
            </tbody>
        </table>

        <a href="{{ route('matricula.showAlumnos', $grupo) }}" class="btn btn-secondary">Regresar</a>
    </div>
</x-app-layout>
