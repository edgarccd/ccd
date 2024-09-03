<x-app-layout>
    <br>
    <div class="major container">
        <h2> Editar equipo</h2>
        
        <div class="form-floating mb-3">
            <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" placeholder="Nombre"
                {{ old('nombre', $equipo->nombre) }} required>
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
                                    <form action="{{ route('equipos.destroy', [$alumno->alumno, $equipo]) }}"
                                        method="post">
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
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{ route('equipos.index', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
     
    </div>
</x-app-layout>
