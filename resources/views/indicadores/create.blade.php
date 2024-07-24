<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Indicador</h2>
        <form action="{{route('indicadores.store')}}" method="post" class="needs-validation">
            @csrf
            @include('indicadores.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('indicadores.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>