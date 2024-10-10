<nav class="navbar navbar-expand-lg  bg-body-tertiary" style="box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">CCD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @if (Auth::user()->tipo_id == 1)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Catálogos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('divisiones.index') }}">Divisiones</a></li>
                            <li><a class="dropdown-item" href="{{ route('carreras.index') }}">Carreras</a></li>
                            <li><a class="dropdown-item" href="{{ route('materias.index') }}">Materias</a></li>
                            <li><a class="dropdown-item" href="{{ route('proyectos.index') }}">Proyectos</a></li>
                            <li><a class="dropdown-item" href="{{ route('indicadores.index') }}">Indicadores</a></li>
                            <li><a class="dropdown-item" href="{{ route('aulas.index') }}">Aulas</a></li>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('periodos.index') }}">Periodos</a></li>
            </ul>
            </li>
            @endif

            @if (Auth::user()->tipo_id == 1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Administración
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                        <li><a class="dropdown-item" href="{{ route('maestros.index') }}">Maestros</a></li>
                        <li><a class="dropdown-item" href="{{ route('coordinadores.index') }}">Coordinadores</a>
                        <li><a class="dropdown-item" href="{{ route('grupos.index') }}">Grupos</a></li>
                        <li><a class="dropdown-item" href="{{ route('matricula.index') }}">Matricula</a></li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->tipo_id == 7)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Proyectos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('equipos.index', Auth::user()) }}">Equipos de
                                Trabajo</a></li>
                        <li><a class="dropdown-item" href="{{ route('proyectos.catalogo') }}">Catálogo Disponible</a>
                        </li>
                    </ul>
                </li>
            @endif
             
            @if (Auth::user()->tipo_id == 3)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Proyectos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('proyectos.catalogoCompleto') }}">Catálogo Disponible</a></li>
                        <li><a class="dropdown-item" href="{{ route('ejes.index', Auth::user()) }}">Asignar Ejes</a></li>
                        <li><a class="dropdown-item" href="{{ route('equipos.index', Auth::user()) }}">Registrar Equipos</a></li>
                        <li><a class="dropdown-item" href="{{ route('equipos.registrados', Auth::user()) }}">Concentrado</a></li>                
                    </ul>
                </li>
            @endif



            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">Perfil</a>
            </li>

            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                        {{ __('Salir') }}
                    </x-nav-link>
                </form>
            </li>
            </ul>
        </div>
    </div>
</nav>
