<x-app-layout>
    <main class="container">
        <br>
        <div class="major container col-8">
            <h3 class="text-center">Equipos de Trabajo</h3>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Grupo</th>
                            <th>Nombre</th>
                            <th>Proyecto</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo)
                            <tr>
                                <td>{{ $equipo->grado }} °
                                    @switch($equipo->grupo)
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
                                    {{ $equipo->acronimo }}
                                </td>
                                <td>{{ $equipo->nom }}</td>
                                <td>{{ $equipo->proy }}</td>
                                <td><a href="../../../../proyecto/catalogo/{{ $equipo->proyecto_id }}.pdf" target="_blank"
                                        class="btn btn-outline-secondary">PDF</a></td>
                                <td><a href="{{ route('equipos.registradosIntegrantes', $equipo->id) }}"
                                        class="btn btn-outline-primary">Integrantes</a></td>

                                <td> <a href="{{ route('equipos.registradosEntregables', $equipo->id) }}"
                                        class="btn btn-outline-dark">Entregables</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('equipos.registrados', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
    </main>
</x-app-layout>
