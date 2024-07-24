<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Grupo</h2>
        <form action="{{route('grupos.store')}}" method="post" class="needs-validation">
            @csrf
            @include('grupos.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('grupos.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>