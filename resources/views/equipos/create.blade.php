<x-app-layout>
    <br>
    <div class="major container">
        <h3 class="text-center">Registrar Equipo</h3>
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
