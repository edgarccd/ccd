<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Aula</h2>
        <form action="{{route('aulas.store')}}" method="post" class="needs-validation">
            @csrf
            @include('aulas.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('aulas.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>