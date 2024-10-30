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
          <a class="nav-link" href="{{ route('conocenos') }}">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('nosotros') }}">Conocenos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('division') }}">Carreras</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Proyectos
          </a>
          <ul class="dropdown-menu">
          <!--
            <li><a class="dropdown-item" href="/proyecto/dulceria">Dulcería</a></li>
            <li><a class="dropdown-item" href="/proyecto/jugueteria">Juguetería</a></li>
            <li><a class="dropdown-item" href="/proyecto/futbol">Canchas</a></li>
            <li><a class="dropdown-item" href="/proyecto/candi">Dulcería Candi</a></li>
            <li><a class="dropdown-item" href="/proyecto/refaccionaria">Refaccionaria</a></li>
            <li><a class="dropdown-item" href="/proyecto/cerveceria">Cervecería</a></li>
            <li><a class="dropdown-item" href="/proyecto/minisuper">Mini Super</a></li>
            <li><a class="dropdown-item" href="/proyecto/soporte">Soporte Técnico</a></li>
            <li><a class="dropdown-item" href="/proyecto/medica">Red Médica</a></li>
            <li><a class="dropdown-item" href="/proyecto/canchas">Futbol</a></li>-->
            <li><a class="dropdown-item" href="/pdf/horarios2024C.pdf" target="_blank">Horarios</a></li>
            <li><a class="dropdown-item" href="/pdf/normativa.pdf" target="_blank">Normativa</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
              <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
              <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
            </svg> <b>Entregables</b></a></li>
            <li><a class="dropdown-item" href="/pdf/entregables_matutino.pdf" target="_blank">Matutino</a></li>
            <li><a class="dropdown-item" href="/pdf/entregables_vespertino.pdf" target="_blank">Vespertino</a></li>
                     </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pdf/interactic2024.pdf" target="blank">InteracTIC</a>
          </li>
<!--
          <li class="nav-item">
            <a class="nav-link" href="/algoritmia" target="blank">Club de Algoritmia</a>
          </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            InteraTIC
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/interatic2023" target="blank">IA</a></li>
            <li><a class="dropdown-item" href="#">Panelistas</a></li>
            <li><a class="dropdown-item" href="#">Talleres</a></li>
            <li><a class="dropdown-item" href="#">Registro de Participantes</a></li>
          </ul>
        </li>
    -->
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
