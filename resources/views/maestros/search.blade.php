<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        Maestros
                    </h3>
                </div>
                <a href="{{ route('maestros.create') }}" class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>
    <br>
    <div class="major container">
        <h3 class="text-center">Resultados de la busqueda</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Apellido Pat</th>
                    <th>Apellido Mat</th>
                    <th>Nombre</th>
                    <th> </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maestros as $maestro)
                    <tr>
                        <td><a href="{{ route('maestros.show', $maestro->persona_id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-file-person" viewBox="0 0 16 16">
                                    <path
                                        d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                            </a></td>
                        <td>{{ $maestro->apellido_pat }}</td>
                        <td>{{ $maestro->apellido_mat }}</td>
                        <td>{{ $maestro->nombre }}</td>
                        <td><a href="{{ route('maestros.edit', $maestro->persona_id) }}"
                            class="btn btn-outline-primary">Editar</a></td>
                    <td>
                        <form action="{{ route('maestros.destroy', $maestro->persona_id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('maestros.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</x-app-layout>
