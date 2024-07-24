<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Periodo</h2>
        <form action="{{route('periodos.store')}}" method="post">
            @csrf
            @include('periodos.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('periodos.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>