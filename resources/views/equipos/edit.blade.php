<x-app-layout>
    <br>
    <div class="major container">

        <br>
        <h2 class="text-center"> Editar Equipo</h2>
        <form action="{{ route('equipos.update', $equipo->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" placeholder="Nombre"
                    value="{{ old('nombre', $equipo->nombre) }}" required>
                <label for="nombre">Nombre</label>
            </div>

            <div class="form-floating mb-3">
                <input type="textarea" name="comentarios" id="comentarios" class="form-control text-uppercase"
                    placeholder="Comentarios" value="{{ old('comentarios', $equipo->comentarios) }}">
                <label for="comentarios">Comentarios</label>
            </div>
            <div>
                <label for="proyecto_id">Proyecto</label>
                <select name="proyecto_id" id="proyecto_id" class="form-select" required>
                    <option selected disabled value="">--Seleccionar--</option>
                    @foreach ($proyectos as $proyecto)
                        <option value={{ $proyecto->id }}
                            {{ old('proyecto_id', $proyecto->id == $equipo->proyecto_id ? 'selected' : '') }}>
                            {{ $proyecto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('equipos.index', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
        <h2 class="text-center"> Alumnos</h2>
        <form action="{{ route('equipos.search', $equipo) }}" method="get">
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="submit">Buscar por</button>
                <select class="form-select" id="busqueda" name="busqueda" required>
                    <option value="todos" selected>Todos</option>
                    <option value="paterno">Apellido Paterno</option>
                    <option value="materno">Apellido Materno</option>
                    <option value="nombre">Nombre</option>
                </select>
                <input id="nombre" name="nombre" type="text" class="form-control"
                    aria-label="Text input with segmented dropdown button" placeholder="Nombre del Alumno">
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->alumno->persona->apellido_pat }}</td>
                            <td>{{ $alumno->alumno->persona->apellido_mat }}</td>
                            <td>{{ $alumno->alumno->persona->nombre }}</td>
                            <td>
                                <form action="{{ route('equipos.deleteAlumno', $alumno) }}" method="post">
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
</x-app-layout>
