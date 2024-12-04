<x-app-layout>
    <main class="container">
        <br>
        <div class="major container col-8">

            <h3>{{ $equipo->grupo->grado }}
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
                @endswitch - {{ $equipo->nombre }} </h3><h5>{{ $equipo->proyecto->nombre }}</h5>
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
                                
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                  </svg> {{ $file->nombre }}</td>
                                <td><a href="../../../../storage/{{ $equipo->grupo->periodo->ciclo }}/{{ $equipo->grupo->carrera->acronimo }}/{{ $equipo->grupo->id }}/{{ $equipo->id }}/{{ $file->nombre }}"
                                        target="_blank" class="btn btn-outline-primary">Ver</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('equipos.showRegistrados', [Auth::user(), $equipo->grupo->carrera_id, $equipo->grupo->turno_id,$equipo->grupo->periodo->id]) }}"
                    class="btn btn-secondary">Regresar</a>
            </div>
    </main>
</x-app-layout>
