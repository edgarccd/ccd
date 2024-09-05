<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth

                <div class="inside">
                    <h3>Divisiones</h3>
                </div>
                <a href="{{ route('divisiones.create') }}" class="btn btn-primary">Registrar</a>
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
                            <th>Acronimo</th>
                            <th>Activo</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($divisiones as $division)
                            <tr>
                                <td>{{ $division->nombre }}</td>
                                <td>{{ $division->acronimo }}</td>
                                <td>{{ $division->activo }}</td>
                                <td>
                                    <a href="{{ route('divisiones.activar', $division) }}"
                                        class="btn btn-outline-dark"> @switch($division->activo)
                                            @case(0)
                                                Activar
                                            @break

                                            @case(1)
                                                Desactivar
                                            @break
                                        @endswitch </a>
                                </td>
                                <td><a href="{{ route('divisiones.edit', $division) }}"
                                        class="btn btn-outline-primary">Editar</a></td>
                                <td>
                                    <form action="{{ route('divisiones.destroy', $division) }}" method="post">
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
