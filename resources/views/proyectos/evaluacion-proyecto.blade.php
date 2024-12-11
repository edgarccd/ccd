<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            <div class="inside">
                <h3><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-clipboard-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                        <path
                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                        <path
                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                    </svg> Evaluación</h3>
            </div>
            @auth
                <ul class="nav nav-underline">
                    @foreach ($grupos as $grupo)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                style="color:black;" aria-expanded="false">{{ $grupo->grado }} ° @switch($grupo->grupo)
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
                                @endswitch - {{ $grupo->acronimo }}</a>
                            <ul class="dropdown-menu">
                                @foreach ($equipos as $equipo)
                                    @if ($equipo->grupo_id == $grupo->grupo_id)
                                        <li><a class="dropdown-item" href="{{ route('proyectos.evaluacionProyecto', $equipo->id) }}">{{ $equipo->nombre }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            @endauth
        </div>
    </x-slot>
    <main class="container">

    </main>
</x-app-layout>
