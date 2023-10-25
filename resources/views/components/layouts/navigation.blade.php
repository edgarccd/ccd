<nav class="navbar navbar-expand-md  navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('welcome') }}">CCD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('division') }}">Carreras</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Proyectos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">DSM</a></li>
            <li><a class="dropdown-item" href="#">EVND</a></li>
            <li><a class="dropdown-item" href="/pdf/normativa.pdf" target="_blank">Normativa</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            InteraTIC
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('interatic') }}">IA</a></li>
            <li><a class="dropdown-item" href="#">Panelistas</a></li>
            <li><a class="dropdown-item" href="#">Talleres</a></li>
            <li><a class="dropdown-item" href="#">Registro de Participantes</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://transparencia.info.jalisco.gob.mx/sites/default/files/AVISO%20DE%20PRIVACIDAD%20UTJ.pdf" target="_blank">Aviso de Privacidad</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
        </li>
       <!-- 
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Registrar</a>
        </li>
        -->
      </ul>
    </div>
  </div>
</nav>