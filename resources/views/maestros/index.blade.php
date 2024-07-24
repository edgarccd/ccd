<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>Maestros</h3>
                </div>
                <a href="{{ route('maestros.create') }}" class="btn btn-primary">Registrar</a>
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
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombre</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maestros as $maestro)
                            <tr>
                                <td>{{ $maestro->persona->apellido_pat }}</td>
                                <td>{{ $maestro->persona->apellido_mat }}</td>
                                <td>{{ $maestro->persona->nombre }}</td>
                                <td></td>
                                <td><a href="{{ route('maestros.edit', $maestro) }}"
                                        class="btn btn-outline-primary">Editar</a></td>
                                <td>
                                    <form action="{{ route('maestros.destroy', $maestro) }}" method="post">
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
