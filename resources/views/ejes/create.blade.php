<x-app-layout>
    <main class="container">
        <br>
        <div class="major container col-8">
            <h3 class="text-center"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
              </svg> &nbsp;Asignar Profesores Eje</h3>
            <h5 class="text-center"> {{ $carrera->nombre }} </h5>
            <form action="{{ route('ejes.store', [Auth::user(), $carrera, $turno]) }}" method="post"
                class="needs-validation">
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
                                                    {{ $maestro->apellido_pat }}
                                                    {{ $maestro->apellido_mat }}
                                                    {{ $maestro->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Asignar</button>
                    <a href="{{ route('ejes.index', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
                </div>
            </form>



        </div>

        <b> {{ Session('status') }}</b>
    </main>
</x-app-layout>
