<x-app-layout>
    <main class="container">
        <x-slot name="header">
            <div class="upper">
                @auth
                    <div class="inside">
                        <h3>Horarios</h3>
                    </div>
                    <a href="{{ route('horarios.create', [Auth::user()]) }}"class="btn btn-primary">Registrar</a>
                @endauth
            </div>
        </x-slot>
        <br>
        <div class="major container col-11">
            <h3 class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                    <path
                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                </svg> &nbsp; Horario</h3>
            <h5 class="text-center"> {{ $aula->nombre }}</h5>
            @if ($turno == 1)
                <div class="container">
                    <!-- Inicia acordeon -->
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        @foreach ($dias as $dia)
                            <!-- Inicia dia -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapse{{ $dia->id }}"
                                        aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapse{{ $dia->id }}">
                                        @switch(Carbon\Carbon::parse($dia->dia)->format('N'))
                                            @case(1)
                                                Lunes
                                            @break

                                            @case(2)
                                                Martes
                                            @break

                                            @case(3)
                                                Miercoles
                                            @break

                                            @case(4)
                                                Jueves
                                            @break

                                            @case(5)
                                                Viernes
                                            @break
                                        @endswitch
                                        {{ Carbon\Carbon::parse($dia->dia)->format('d') }}
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse{{ $dia->id }}"
                                    class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <!-- ------------------------------------------------------------ -->
                                        <div style="display:flex;">
                                            @foreach ($horarios as $horario)
                                                @if ($dia->dia == $horario->proyectoSemana->dia)
                                                    <div class="card col-2 m-1">
                                                        <div class="card-header">
                                                            <div style="float:left;">
                                                                @if($horario->persona_id==Auth::user()->persona->id)
                                                                <form
                                                                    action="{{ route('horarios.destroy', [$horario, $aula, $turno]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor" class="bi bi-trash3"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                                        </svg></button>
                                                                </form>
                                                        
                                                                    
                                                                @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" fill="currentColor" class="bi bi-calendar2-check" viewBox="0 0 16 16">
                                                                    <path d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
                                                                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z"/>
                                                                  </svg>
                                                                
                                                                @endif
                                                            </div>
                                                            <div style="float:right;">
                                                                <b>
                                                                    @switch($horario->hora_id)
                                                                        @case(1)
                                                                            9:00 hrs
                                                                        @break

                                                                        @case(2)
                                                                            9:30 hrs
                                                                        @break

                                                                        @case(3)
                                                                            10:00 hrs
                                                                        @break

                                                                        @case(4)
                                                                            10:30 hrs
                                                                        @break

                                                                        @case(5)
                                                                            11:00 hrs
                                                                        @break

                                                                        @case(6)
                                                                            11:30 hrs
                                                                        @break

                                                                        @case(7)
                                                                            12:00 hrs
                                                                        @break

                                                                        @case(8)
                                                                            12:30 hrs
                                                                        @break

                                                                        @case(9)
                                                                            13:00 hrs
                                                                        @break

                                                                        @case(10)
                                                                            13:30 hrs
                                                                        @break
                                                                    @endswitch
                                                                </b>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="text-center">
                                                                {{ $horario->proyectoEquipo->grupo->grado }} °
                                                                @switch($horario->proyectoEquipo->grupo->grupo)
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
                                                                -
                                                                {{ $horario->proyectoEquipo->grupo->carrera->acronimo }}
                                                            </h5>
                                                            <hr>
                                                            <b class="card-title fs-6 ">
                                                                {{ $horario->proyectoEquipo->nombre }}

                                                            </b>
                                                            <p class="card-text">
                                                                {{ $horario->proyectoEquipo->proyecto->nombre }}</p>

                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <!-- ------------------------------------------------------------ -->
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Dia -->
                        @endforeach
                    </div>
                    <!-- Finaliza acordeon -->
                </div>
            @endif
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('horarios.index', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
            </div>
        </div>
    </main>
</x-app-layout>
