<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Maestro</h2>
        <form action="{{ route('maestros.store') }}" method="post" class="needs-validation">
            @csrf
            @include('maestros.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('maestros.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
