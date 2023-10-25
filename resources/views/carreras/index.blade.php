<x-app-layout>
    <x-slot name="header">
        <div style="padding: 10px;background-color: whitesmoke;">
            @auth
                <div style="float:left; width: 300px;text-align:center;">
                    <h3>Carreras</h3>
                </div>
                <a href="{{ route('carreras.create') }}"class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>

    <main class="container">
        <br>
        <div class="container"
            style="margin:auto;padding: 10px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);border-radius: 10px;background-color: whitesmoke;">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acrónimo</th>
                            <th>División</th>
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
                                <td>{{ $carrera->division_id }}</td>
                                <td>{{ $carrera->activo }}</td>
                                <td>
                                    <form action="{{route('carreras.activar',$carrera)}}" method="post">
                                        @csrf @method('PATCH')
                                        @if($carrera->activo ==0)
                                        <button type="submit" class="btn btn-outline-secondary">Activar</button>
                                        @else
                                        <button type="submit" class="btn btn-outline-secondary">Desactivar</button>                                    
                                        @endif
                                    </form>
                                </td>
                                <th><a href="{{route('carreras.edit',$carrera)}}" class="btn btn-outline-primary">Editar</a></th>
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
