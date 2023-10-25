<x-app-layout>
    <br>
    <div class="container" style="margin:auto;padding: 30px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);border-radius: 25px;background-color: whitesmoke;">
        <h2>Registrar Carrera</h2>
        <form action="{{route('carreras.store')}}" method="post" class="needs-validation">
            @csrf
            @include('carreras.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('carreras.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>