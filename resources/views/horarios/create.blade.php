<x-app-layout>
    <br>
    <div class="major container">
        <h2>Registrar Horario</h2>
        <form action="#" method="post" class="needs-validation" novalidate>
            @csrf
            @include('horarios.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('horarios.index', Auth::user()) }}" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
