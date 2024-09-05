<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>Carreras</h3>
                </div>
                <a href="{{ route('carreras.create') }}"class="btn btn-primary">Registrar</a>
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
                            <th>Acrónimo</th>

                            <th>Activo</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carreras as $carrera)
                            <tr>
                                <td>{{ $carrera->nombre }}</td>
                                <td>{{ $carrera->acronimo }}</td>
                                <td>{{ $carrera->activo }}</td>
                                <td>
                                    <a href="{{ route('carreras.activar', $carrera) }}" class="btn btn-outline-dark">
                                        @switch($carrera->activo)
                                            @case(0)
                                                Activar
                                            @break

                                            @case(1)
                                                Desactivar
                                            @break
                                        @endswitch </a>
                                </td>
                                <th><a href="{{ route('carreras.edit', $carrera) }}"
                                        class="btn btn-outline-primary">Editar</a></th>
                                <td>
                                    <form action="{{ route('carreras.destroy', $carrera) }}" method="post">
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
