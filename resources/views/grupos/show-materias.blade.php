<x-app-layout>
    <br>
    <div class="major container">
        <h1>Materias Asignadas</h1>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                    <tr>
                        <td align="center"> - </td>
                        <td>{{ $materia->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: justify;margin: 20px;">
            <br>
            @foreach ($carrera as $c)
                
                    <br> <a href="{{ route('grupos.showGrupos', $c->id, $grupo->id) }}" class="btn btn-secondary">Regresar</a>
               
            @endforeach
        </div>
    </div>
</x-app-layout>
