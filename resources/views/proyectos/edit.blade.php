<x-app-layout>
    <br>
    <div class="major container">
        <h2>Editar Proyecto</h2>
        <form action="{{ route('proyectos.update', $proyecto) }}" method="post">
            @csrf @method('PATCH')
            @include('proyectos.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('proyectos.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
