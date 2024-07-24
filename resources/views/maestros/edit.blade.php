<x-app-layout>
    <br>
    <div class="major container">
        <h2>Editar Maestro</h2>
        <form action="{{route('maestros.update',$maestro)}}" method="post">
            @csrf @method('PATCH')
            @include('maestros.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('maestros.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>