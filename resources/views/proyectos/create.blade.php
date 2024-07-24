<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Proyecto</h2>
        <form action="{{ route('proyectos.store') }}" method="post">
            @csrf
            @include('proyectos.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('proyectos.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
