<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>Grupos</h3>
                </div>
                <a href="{{ route('grupos.create') }}"class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>

    <main class="container">
        <br>

        <div class="major container">
        
            <h3 style="text-align: center;">
                {{ $carrera->nombre }} <br>
            </h3>
            <h5 style="text-align: center;">
                @switch($turno)
                    @case(1)
                        Matutino
                    @break

                    @case(2)
                        Vespertino
                    @break
                @endswitch
            </h5>
            
            <form action="{{ route('grupos.tutorStore', [$carrera, $turno]) }}" method="get" class="needs-validation"
                novalidate>
                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Grado</th>
                                <th>Grupo</th>
                                <th>Turno</th>
                                <th>Tutor</th>
                                <th>Materias</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)
                                <tr>
                                    <td>{{ $grupo->grado }}</td>
                                    <td>
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

                                    </td>
                                    <td>
                                        @switch($grupo->turno_id)
                                            @case(1)
                                                Matutino
                                            @break

                                            @case(2)
                                                Vespertino
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <select name="tutor_{{ $grupo->id }}" id="tutor_{{ $grupo->id }}"
                                            class="form-select" required>
                                            <option selected disabled value="">-- Seleccionar --</option>
                                            @foreach ($maestros as $maestro)
                                                <option value="{{ $maestro->id }}"
                                                    @foreach ($tutores as $tutor){{ old('tutor_' . $grupo->id, $maestro->id == $tutor->maestro_tutor_id&&$grupo->id==$tutor->id ? 'selected' : '') }} @endforeach>
                                                    {{ $maestro->apellido_pat }} {{ $maestro->apellido_mat }}
                                                    {{ $maestro->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('grupos.showMaterias', $grupo) }}"
                                            class="btn btn-outline-dark">Materias</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('grupos.destroy', $grupo) }}" method="post">
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
           
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Regresar</a>
            
        </div>
        </form>
    </main>
</x-app-layout>
