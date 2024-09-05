<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Carrera</h2>
        <form action="{{route('carreras.store')}}" method="post" class="needs-validation" novalidate>
            @csrf
            @include('carreras.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('carreras.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
            
        </form>
    </div>
</x-app-layout>