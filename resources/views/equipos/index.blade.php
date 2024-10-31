<x-app-layout>
    <main class="container">
        <x-slot name="header">
            <div class="upper">
                @auth
                    <div class="inside">
                        <h3>  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                          </svg> &nbsp;&nbsp; Equipos</h3>
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
