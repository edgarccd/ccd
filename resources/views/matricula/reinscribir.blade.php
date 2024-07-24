<x-app-layout>
    <main class="container">
        <br>
        <div class="major container">
            <header>
                <h3>Reinscripción</h3>
            </header>
            <form action="{{ route('matricula.reinstore',$periodo)}}" method="get">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Grupo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gruposAnteriores as $grupo)
                            <tr>
                                <td>
                                    {{ $grupo->grado }} ° @switch($grupo->grupo)
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

                                    {{ $grupo->carrera->acronimo }} -
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
                                    <select name="grupo_{{ $grupo->id }}" id="grupo_{{ $grupo->id }}" class="form-select">
                                        @foreach ($gruposActuales as $grupoA)
                                            <option value="{{ $grupoA->id }}">
                                                {{ $grupoA->grado }}°@switch($grupoA->grupo)
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
                                                @endswitch - {{ $grupoA->carrera->acronimo }} -
                                                @switch($grupoA->turno_id)
                                                    @case(1)
                                                        Matutino
                                                    @break

                                                    @case(2)
                                                        Vespertino
                                                    @break
                                                @endswitch
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <button type="submit" class="btn btn-primary">Reinscribir</button>
                <a href="{{ route('matricula.index') }}" class="btn btn-secondary">Regresar</a>
            </div>
            </form>
            
    </main>
</x-app-layout>
