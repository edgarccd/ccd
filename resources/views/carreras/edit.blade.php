<x-app-layout>
    <br>
    <div class="major container">
        <h2>Editar Carrera</h2>
        <form action="{{route('carreras.update',$carrera)}}" method="post">
            @csrf @method('PATCH')
            @include('carreras.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('carreras.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>