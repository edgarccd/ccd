<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>Aulas</h3>
                </div>
                <a href="{{ route('aulas.create') }}"class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>

    <main class="container">
        <br>
        <div class=" major container">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Activo</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aulas as $aula)
                            <tr>
                                <td>{{ $aula->nombre }}</td>
                                <td>{{ $aula->descripcion }}</td>
                                <td>{{ $aula->activo }}</td>
                                <td>                               
                                </td>
                                <th><a href="{{route('aulas.edit',$aula)}}" class="btn btn-outline-primary">Editar</a></th>
                                <td>
                                    <form action="{{ route('aulas.destroy', $aula) }}" method="post">
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
