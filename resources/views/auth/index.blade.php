<x-app-layout>
    <x-slot name="header">
        <div style="padding: 10px;background-color: whitesmoke;">
            <div style="float:left; width: 300px;text-align:center;">
                <h3>Usuarios</h3>
            </div>
            @auth
            <a href="{{ route('usuarios.registro') }}" class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>


    <main>
        <br>
        <div class="container" style="margin:auto;padding: 10px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);border-radius: 10px;background-color: whitesmoke;">
            <table class="table table-striped" style="border-radius: 25px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Actualizar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{$usuario->id }}</th>
                        <td>{{$usuario->name }}</td>
                        <td>{{$usuario->email }}</td>
                        <td><a href="" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="" method="post">
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