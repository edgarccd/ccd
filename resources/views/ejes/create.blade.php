<x-app-layout>
    <main class="container">
        <br>
        <div class="major container">
            <h3>Asignación de Profesores Eje</h3>
            {{$carrera->nombre}} 
            <form action="{{ route('ejes.store', [Auth::user(),$carrera,$turno]) }}" method="post" class="needs-validation">
                @csrf
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Grado</th>
                                <th>Grupo</th>
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
                                        <select name="maestro_{{ $grupo->id }}"
                                            id="maestro_{{ $grupo->id }}"class="form-select" required>
                                            <option value="0">--Seleccionar--</option>
                                            @foreach ($maestros as $maestro)
                                                <option value={{ $maestro->id }}
                                                    {{ old('maestro_' . $grupo->id, $maestro->id) == $grupo->maestro_eje_id ? 'selected' : '' }}>
                                                    {{ $maestro->persona->apellido_pat }}
                                                    {{ $maestro->persona->apellido_mat }}
                                                    {{ $maestro->persona->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Asignar</button>
                <a href="{{ route('ejes.index', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
            </form>
            
                
            
        </div>

       <b> {{Session('status')}}</b>
    </main>
</x-app-layout>