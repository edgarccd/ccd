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
        <div class="container col-10">
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
                                @foreach ($horarios9 as $horario)
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
                            </div>
                            <!-- ------------------------------------------------------------ -->
                        </div>
                    </div>
                </div>
                <!-- Fin 13:30 hrs -->



            </div>
            <!-- Finaliza acordeon -->

        </div>
    </main>
</x-app-layout>
