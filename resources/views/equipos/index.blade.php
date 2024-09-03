<x-app-layout>
    <main class="container">
        <x-slot name="header">

            <div class="upper">
                @auth
                    <div class="inside">
                        <h3>Equipos</h3>
                    </div>

                    @if ($grupo != 0)
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
                        <h3> NO tiene grupos asignados este cuatrimestre</h3>
                    @endif
                @endauth
            </div>
        </x-slot>
        <br>
        @if ($grupo != 0)
            <div style="display:flex;flex-flow:row wrap;">
                @foreach ($equipos as $equipo)
                    <div class="card"
                        style="margin: 10px; margin: 10px;width: 411px; height: 250px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);">
                        <div class="card-header">
                            <a href="{{ route('equipos.show', $equipo) }}" class="btn btn-dark">ID {{ $equipo->id }}
                            </a>
                        </div>
                        <div class="card-body">
                            <div style="height:50%;">
                                <h5 class="card-title">{{ $equipo->nombre }}</h5>
                                <p class="card-text">{{ $equipo->proyecto->nombre }} </p>
                            </div>
                            <div style="display:flex;flex-flow: row wrap; align-items:center;height:50%;">
                                <a href="{{ route('proyectos.edit', $equipo) }}"
                                    class="btn btn-outline-primary">Editar</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

                                <form action="{{ route('equipos.destroy', $equipo) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
</x-app-layout>
