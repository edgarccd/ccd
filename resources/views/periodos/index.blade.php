<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>Periodos</h3>
                </div>
                <a href="{{ route('periodos.create') }}" class="btn btn-primary">Registrar</a>
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
                            <th>Ciclo</th>
                            <th>Activo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodos as $periodo)
                            <tr>
                                <td>{{ $periodo->nombre }}</td>
                                <td>{{ $periodo->ciclo }}</td>
                                <td>{{ $periodo->activo }}</td>
                                <td><a href="{{ route('periodos.edit',$periodo) }}" class="btn btn-outline-primary">  @switch($periodo->activo)
                                    @case(0)
                                       Activar 
                                    @break

                                    @case(1)
                                        Desactivar
                                    @break
                                @endswitch </a>                                                                       
                                <td>
                                    <form action="{{ route('periodos.destroy', $periodo) }}" method="post">
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
