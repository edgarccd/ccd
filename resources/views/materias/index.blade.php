<x-app-layout>
    <x-slot name="header">
        <div style="padding: 10px;background-color: whitesmoke;">
            @auth
                <div style="float:left; width: 300px;text-align:center;">
                    <h3>Materias</h3>
                </div>
                <a href="{{ route('materias.create') }}"class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>

    <main class="container">
        <br>
        <div class="container"
            style="margin:auto;padding: 10px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);border-radius: 10px;background-color: whitesmoke;">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Plan</th>
                            <th>Grado</th>
                            <th>Turno</th>
                            <th>Carrera</th>
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
                                <td>{{ $materia->turno }}</td>
                                <td>{{ $materia->carrera_id }} </td>
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
        </div>
    </main>
</x-app-layout>
