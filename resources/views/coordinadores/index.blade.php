<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Coordinador</h2>
        <form action="{{ route('coordinadores.store') }}" method="post" class="needs-validation">
            @csrf
            @include('coordinadores.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Grabar</button>

            </div>
        </form>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Profesor</th>
                        <th>Carrera</th>
                        <th>Turno</th>
                        <th>Area</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coordinadores as $coordinador)
                        <tr>
                            <td>{{ $coordinador->maestro->persona->apellido_pat}}
                                {{ $coordinador->maestro->persona->apellido_mat}}
                                {{ $coordinador->maestro->persona->nombre}}
                            </td>
                            <td>{{ $coordinador->carrera->acronimo}}</td>
                            <td>
                                @switch($coordinador->turno_id)
                                    @case(1)
                                        Matutino
                                    @break

                                    @case(2)
                                        Vespertino
                                    @break
                                @endswitch
                            </td>
                            <td>
                                @switch($coordinador->area_id)
                                    @case(1)
                                        Proyectos
                                    @break
                                @endswitch
                            </td>
                            <td>
                                <form action="{{ route('coordinadores.destroy', $coordinador) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</x-app-layout>
