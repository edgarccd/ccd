<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>Materias</h3>
                </div>
                <a href="{{ route('materias.create') }}"class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>

    <main class="container">
        <br>
        <div class="major container">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Plan</th>
                            <th>Grado</th>
                            <th>Turno</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materias as $materia)
                            <tr>
                                <td>{{ $materia->nombre }}</td>
                                <td>{{ $materia->plan }}</td>
                                <td>{{ $materia->grado }}</td>
                                <td> @switch($materia->turno)
                                        @case(1)
                                            Matutino
                                        @break

                                        @case(2)
                                            Vespertino
                                        @break
                                    @endswitch
                                </td>

                                <th><a href="{{ route('materias.edit', $materia) }}"
                                        class="btn btn-outline-primary">Editar</a></th>
                                <td>
                                    <form action="{{ route('materias.destroy', $materia) }}" method="post">
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
            <a href="{{ route('materias.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </main>
</x-app-layout>
