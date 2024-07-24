<x-app-layout>
    <br>
    <div class="major container">
        <h2>Editar Materia</h2>
        <form action="{{ route('materias.update', $materia) }}" method="post">
            @csrf @method('PATCH')
            @include('materias.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('materias.show') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
