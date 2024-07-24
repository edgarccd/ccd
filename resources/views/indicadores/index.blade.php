<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>Indicadores</h3>
                </div>
                <a href="{{ route('indicadores.create') }}"class="btn btn-primary">Registrar</a>
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
                            <th>Descripción</th>
                            <th>Ponderación</th>
                            <th>Criterio</th>
                            <th>Cuestionario</th>
                            <th>Activo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicadores as $indicador)
                            <tr>
                                <td>{{ $indicador->descripcion }}</td>
                                <td>{{ $indicador->ponderacion }}</td>
                                <td>
                                    @switch($indicador->criterio_id)
                                        @case(1)
                                            Exposición
                                        @break

                                        @case(2)
                                            Funcionalidad
                                        @break

                                        @case(3)
                                            Problemática
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    @switch($indicador->cuestionario_id)
                                        @case(1)
                                            Evaluación de Proyectos
                                        @break

                                        @case(2)
                                            Otro
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    {{ $indicador->activo }}
                                </td>
                                <th><a href="{{ route('indicadores.edit', $indicador) }}"
                                        class="btn btn-outline-primary">Editar</a></th>
                                <td>
                                    <form action="{{ route('indicadores.destroy', $indicador) }}" method="post">
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
