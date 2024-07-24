<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar División</h2>
        <form action="{{route('divisiones.store')}}" method="post" class="needs-validation">
            @csrf
            @include('divisiones.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('divisiones.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>