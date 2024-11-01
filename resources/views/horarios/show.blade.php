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
        <div class=" major container col-8">
            <h3 class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                    <path
                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                </svg> &nbsp; Horario</h3>
            <h5 class="text-center"> {{ $aula->nombre }}</h5>


            @if ($turno == 1 )
            <div class="container">
                <!-- Inicia acordeon -->
                <div class="accordion" id="accordionPanelsStayOpenExample">

                    <!-- Inicia 9:00 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseOne">
                                9:00 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                            <div class="accordion-body">

                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios9 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '1')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-2 m-3"></div>
                                        @endif

                                        @if ($horario->dia_id == 2 && $horario->hora_id == '1')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 3 && $horario->hora_id == '1')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 4 && $horario->hora_id == '1')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '1')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 9:00 hrs -->


                    <!-- Inicia 9:30 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                                9:30 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios93 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '2')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 2 && $horario->hora_id == '2')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 3 && $horario->hora_id == '2')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 4 && $horario->hora_id == '2')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '2')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 9:30 hrs -->



                    <!-- Inicia 10:00 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseThree">
                                10:00 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios10 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '3')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 2 && $horario->hora_id == '3')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 3 && $horario->hora_id == '3')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 4 && $horario->hora_id == '3')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '3')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 10:00 hrs -->


                    <!-- Inicia 10:30 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseFour">
                                10:30 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                            <div class="accordion-body">

                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios103 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '4')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '4')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '4')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '4')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '4')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 10:30 hrs -->

                    <!-- Inicia 11:00 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseFive">
                                11:00 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                            <div class="accordion-body">

                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios11 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '5')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '5')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '5')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '5')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '5')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 11:00 hrs -->


                    <!-- Inicia 11:30 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseSix">
                                11:30 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                            <div class="accordion-body">

                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios113 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 11:30 hrs -->



                    <!-- Inicia 12:00 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseSeven">
                                12:00 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse">
                            <div class="accordion-body">

                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios12 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '6')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 12:00 hrs -->




                    <!-- Inicia 12:30 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseEight">
                                12:30 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse">
                            <div class="accordion-body">

                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios123 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '7')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '7')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '7')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '7')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '7')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 12:30 hrs -->



                    <!-- Inicia 13:00 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseNine">
                                13:00 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse">
                            <div class="accordion-body">

                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios13 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '8')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '8')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '8')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '8')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '9')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 13:00 hrs -->



                    <!-- Inicia 13:30 hrs -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTen">
                                13:30 hrs
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse">
                            <div class="accordion-body">

                                <!-- ------------------------------------------------------------ -->
                                <div style="display:flex;">
                                    @foreach ($horarios133 as $horario)
                                        @if ($horario->dia_id == 1 && $horario->hora_id == '10')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Lunes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>                                    
                                        @endif
                                        @if ($horario->dia_id == 2 && $horario->hora_id == '10')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Martes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>                                        
                                        @endif
                                        @if ($horario->dia_id == 3 && $horario->hora_id == '10')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Miercoles
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>                                        
                                        @endif
                                        @if ($horario->dia_id == 4 && $horario->hora_id == '10')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Jueves
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto </p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>                                
                                        @endif
                                        @if ($horario->dia_id == 5 && $horario->hora_id == '10')
                                            <div class="card col-2 m-3">
                                                <div class="card-header">
                                                    Viernes
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title">Equipo</h5>
                                                        <p class="card-text">Proyecto</p>
                                                    </div>
                                                    <div>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Eliminar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>                                    
                                        @endif
                                    @endforeach
                                </div>
                                <!-- ------------------------------------------------------------ -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin 13:30 hrs -->
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
