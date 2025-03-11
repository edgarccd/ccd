<x-app-layout>
    <main class="container">
        <br>
        <div class="major container">
            <h2>Registrar Semana de Proyectos</h2>
            <form action="{{ route('proyectos.fechaStore') }}" method="post" class="needs-validation">
                @csrf
                <label for="dia_id">Día</label>
                <input type="date" name="dia_id" id="dia_id" class="form-control" required>
                <label for="aula_id">Aula</label>
                <select name="aula_id" id="aula_id" class="form-control">
                    <option value="2">Auditorio PB</option>
                    <option value="1">Aula 504</option>
                </select>
                <label for="turno_id">Turno</label>
                <select name="turno_id" id="turno_id" class="form-control">
                    <option value="1">Matutino</option>
                    <option value="2">Vespertino</option>
                </select>
                <div style="margin: 10px;">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                </div>
            </form>
            <br>
        </div>

        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Día</th>
                        <th>Aula</th>
                        <th>Turno</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dias as $dia)
                        <tr>
                            <td>{{ $dia->dia }}

                            </td>
                            <td> @switch($dia->aula_id)
                                    @case(1)
                                        Aula 504
                                    @break

                                    @case(2)
                                        Auditorio PB
                                    @break
                                @endswitch
                            </td>
                            <td>
                                @switch($dia->turno_id)
                                    @case(1)
                                        Matutino
                                    @break

                                    @case(2)
                                        Vespertino
                                    @break
                                @endswitch
                            </td>

                            <td>
                                <form action="{{ route('proyectos.fechaDestroy', $dia) }}" method="post">
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

    </main>
</x-app-layout>
