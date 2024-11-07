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
        <div class=" major container">
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

                                        {{Carbon\Carbon::parse($dia->dia)->format('d')}}
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse{{ $dia->id }}"
                                    class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <!-- ------------------------------------------------------------ -->
                                        <div style="display:flex;">
                                            @foreach ($hlun as $horario)
                                                <div class="card col-1.5 m-1">
                                                    <div class="card-header">
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
                                                    </div>
                                                    <div class="card-body">
                                                        <div>
                                                            <h5 class="card-title">{{ $horario->equipo_id }}</h5>
                                                            <p class="card-text">{{ $horario->proyecto_id }}</p>
                                                        </div>
                                                        <div>
                                                            <form action="#" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor" class="bi bi-trash3-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                                    </svg></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
