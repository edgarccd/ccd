<x-app-layout>
    <main class="container">
        <div class="card mt-3 col-7"  style="margin: auto;">
            <div class="card-header">
                Cargar Entregables
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </h5>
                <form action="{{ route('equipos.storeEntregables', [$equipo,Auth::user()]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="files[]" id="files[]" multiple class="form-control" required>
                    <button type="submit" class="mt-4 btn btn-primary ">Cargar</button>
                    <a href="{{ route('equipos.index', Auth::user()) }}" class="mt-4 btn btn-secondary">Regresar</a>
                </form>
            </div>
        </div>
        <div class="card mt-3 col-7"  style="margin: auto;">
            <div class="card-header">
                Entregables del equipo: {{ $equipo->nombre }} - 
                @if ($grupo != null)
                {{ $grupo->carrera->acronimo }} -
                {{ $grupo->grado }}°
                @switch($grupo->grupo)
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
                @switch($grupo->turno_id)
                    @case(1)
                        Matutino
                    @break

                    @case(2)
                        Vespertino
                    @break
                @endswitch
                <br>
            @else
                <h3> NO tiene grupos asignados</h3>
            @endif
           
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Ver</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <th scope="row">{{ $file->id }}</th>
                                <td>{{ $file->nombre }}</td>
                                <td><a href="../../../storage/{{ $grupo->periodo->ciclo }}/{{$grupo->carrera->acronimo}}/{{$grupo->id}}/{{ $file->nombre }}" target="_blank"
                                        class="btn btn-outline-primary">Ver</a> </td>
                                <td>
                                    <form action="#" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                    </form>                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
