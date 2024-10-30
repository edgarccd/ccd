<x-app-layout>
    <br>
    <div class="major container col-7">
        <h3 class="text-center"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
          </svg> &nbsp;Registrar Equipos de Trabajo</h3>
        <h5 class="text-center">
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
        - {{ $grupo->carrera->nombre }}</h5>
        <br>
        <form action="{{ route('equipos.store',  $grupo) }}" method="post" class="needs-validation" novalidate>
            @csrf
            @include('equipos.form-fields')
            <br>
            <h4>Seleccionar alumnos</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>                
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <td><input type="checkbox" name="alumno_{{$alumno->alumno_id}}" id="alumno_{{$alumno->alumno_id}}"></td>                              
                                <td>{{ $alumno->apellido_pat }}</td>
                                <td>{{ $alumno->apellido_mat }}</td>
                                <td>{{ $alumno->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('equipos.index', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
