<nav class="navbar navbar-expand-lg  bg-body-tertiary" style="box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">CCD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catálogos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('divisiones.index')}}">Divisiones</a></li>
            <li><a class="dropdown-item" href="{{route('carreras.index')}}">Carreras</a></li>
            <li><a class="dropdown-item" href="{{route('materias.index')}}">Materias</a></li>
            <li><a class="dropdown-item" href="{{route('proyectos.index')}}">Proyectos</a></li>
            <li><a class="dropdown-item" href="#">Indicadores</a></li>
            <li><a class="dropdown-item" href="#">Aulas</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administración
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('usuarios.index')}}">Usuarios</a></li>
            <li><a class="dropdown-item" href="#">Alumnos</a></li>
            <li><a class="dropdown-item" href="#">Maestros</a></li>
            <li><a class="dropdown-item" href="{{route('periodos.index')}}">Periodos</a></li>
            <li><a class="dropdown-item" href="#">Grupos</a></li>
            <li><a class="dropdown-item" href="#">Reinscripción</a></li>

          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Proyectos
          </a>
          <ul class="dropdown-menu">

            <li><a class="dropdown-item" href="#">Asignar Profesores Ejes</a></li>
            <li><a class="dropdown-item" href="#">Estructurar Equipos de Trabajo</a></li>
            <li><a class="dropdown-item" href="#">Asignar Horarios</a></li>
            <li><a class="dropdown-item" href="#">Calificar Proyectos</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            InteraTIC
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Concentrado de Participantes</a></li>            
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('profile.edit')}}">Perfil</a>
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