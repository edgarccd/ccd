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
             <hr> <h3>
                @foreach ($carrera as $car)
                    {{ $car->nombre }}
            </h3>
            @endforeach
            <hr>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Grado</th>
                            <th>Grupo</th>
                            <th>Turno</th>
                            <th></th>
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
                                    <a href="{{ route('grupos.showMaterias', $grupo) }}"
                                        class="btn btn-outline-dark">Materias</a></td>
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
            <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </main>
</x-app-layout>
