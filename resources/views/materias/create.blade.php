<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Materia</h2>
        <form action="{{ route('materias.store') }}" method="post" class="needs-validation">
            @csrf
            @include('materias.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('materias.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
