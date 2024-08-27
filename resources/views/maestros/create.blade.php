<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Maestro</h2>
        <hr>
        <form action="{{ route('maestros.store') }}" method="post" class="needs-validation" novalidate>
            @csrf
            @include('maestros.form-fields')
            <hr>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{ route('maestros.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</x-app-layout>
