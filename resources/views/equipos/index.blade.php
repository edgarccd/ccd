<x-app-layout>
    <main class="container">
        <x-slot name="header">
            <div class="upper">
                @auth
                    <div class="inside">
                        <h3>Equipos</h3>
                    </div>
                    @if ($grupo != null)
                        <a href="{{ route('equipos.create', $grupo) }}"class="btn btn-primary">Registrar</a> &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        {{ $grupo->grado }}°
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
                        @switch($grupo->turno_id)
                            @case(1)
                                Matutino
                            @break

                            @case(2)
                                Vespertino
                            @break
                        @endswitch
                        - {{ $grupo->carrera->nombre }}
                    @else
                        <h3> NO tiene grupos asignados</h3>
                    @endif
                @endauth
            </div>
        </x-slot>
        <br>
        @if ($grupo != null)
            <div style="display:flex;flex-flow:row wrap;">
                @foreach ($equipos as $equipo)
                    <div class="card"
                        style="margin: 10px; margin: 10px;width: 411px; height: 250px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);">
                        <div class="card-header">
                            <a href="{{ route('equipos.show', $equipo) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                              </svg></a>
                        </div>
                        <div class="card-body">
                            <div style="height:50%;">
                                <h5 class="card-title">{{ $equipo->nombre }}</h5>
                                <p class="card-text">{{ $equipo->proyecto->nombre }} </p>
                            </div>
                            <div style="display:flex;flex-flow: row wrap; align-items:center;height:50%;">
                                <a href="{{ route('equipos.edit', $equipo) }}"
                                    class="btn btn-outline-primary">Editar</a>&nbsp; &nbsp;&nbsp;
                                <form action="{{ route('equipos.destroy', $equipo) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>&nbsp; &nbsp;&nbsp;
                                <a href="../proyecto/catalogo/{{$equipo->proyecto->id}}.pdf" target="_blank"
                                    class="btn btn-outline-secondary">PDF</a>&nbsp; &nbsp;&nbsp;
                                <a href="{{ route('equipos.entregables', [$equipo,Auth::user()]) }}"
                                    class="btn btn-outline-dark">Entregables</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
</x-app-layout>
