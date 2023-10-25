<x-app-layout>
    <x-slot name="header">
        <div style="padding: 10px;background-color: whitesmoke;">
            @auth
            
            <div style="float:left; width: 300px;text-align:center;">
                <h3>Periodos</h3>
            </div>
            <a href="{{route('periodos.create')}}" class="btn btn-primary">Registrar</a>
            @endauth
        </div>

    </x-slot>

    <main class="container">
        <br>
        <div class="container" style="margin:auto;padding: 10px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);border-radius: 10px;background-color: whitesmoke;">
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
                        @foreach($periodos as $periodo)
                        <tr>
                            <td>{{$periodo->nombre }}</td>
                            <td>{{$periodo->ciclo }}</td>
                            <td>{{$periodo->activo }}</td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Activar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('periodos.destroy',$periodo)}}" method="post">
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