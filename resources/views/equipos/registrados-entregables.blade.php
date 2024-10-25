<x-app-layout>
    <main class="container">
        <br>
        <div class="major container col-8">

            <h4>{{ $equipo->grupo->grado }}
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
                @endswitch - {{ $equipo->nombre }} - {{ $equipo->proyecto->nombre }}</h4>
            Entregables
            <hr>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ver</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->nombre }}</td>
                                <td><a href="../../../../storage/{{ $equipo->grupo->periodo->ciclo }}/{{ $equipo->grupo->carrera->acronimo }}/{{ $equipo->grupo->id }}/{{ $equipo->id }}/{{ $file->nombre }}"
                                        target="_blank" class="btn btn-outline-primary">Ver</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('equipos.showRegistrados', [Auth::user(), $equipo->grupo->carrera_id, $equipo->grupo->turno_id]) }}"
                    class="btn btn-secondary">Regresar</a>
            </div>
    </main>
</x-app-layout>
