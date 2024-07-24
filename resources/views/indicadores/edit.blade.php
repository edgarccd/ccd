<x-app-layout>
    <br>
    <div class="major container">
        <h2>Editar Indicador</h2>
        <form action="{{ route('indicadores.update', $indicador) }}" method="post">
            @csrf @method('PATCH')
            @include('indicadores.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('indicadores.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
