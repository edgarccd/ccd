<x-app-layout>
    <br>
    <div class="major container">
        <h2>Editar División</h2>
        <form action="{{route('divisiones.update', $division)}}" method="post">
            @csrf @method('PATCH')
            @include('divisiones.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('divisiones.index') }}" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
