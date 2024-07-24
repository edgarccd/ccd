<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            <div class="inside">
                <h3>Proyectos</h3>
            </div>
            @auth
                <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>
    <main class="container">
        <br>
        <div style="display:flex;flex-flow:row wrap;">
            @foreach ($proyectos as $proyecto)
                <div class="card"
                    style="margin: 10px; margin: 10px;width: 411px; height: 200px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);">
                    <div class="card-header">
                        <a href="{{ route('proyectos.show', $proyecto->id) }}">ID {{ $proyecto->id }}</a>
                    </div>
                    <div class="card-body">
                        <div style="height:50%;">
                            <h5 class="card-title">{{ $proyecto->nombre }}</h5>
                        </div>
                        <div style="display:flex;flex-flow: row wrap; align-items:center;height:50%;">
                            <a href="{{ route('proyectos.edit', $proyecto) }}"
                                class="btn btn-outline-primary">Editar</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

                            <form action="{{ route('proyectos.destroy', $proyecto) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</x-app-layout>
