<x-app-layout>
    <br>
    <div class="major container col-8">
        <h3 class="text-center"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg> Registrar Maestro</h3>
        <hr>

        <form action="{{ route('maestros.store') }}" method="post" class="needs-validation" novalidate>
            @csrf
            @include('maestros.form-fields')
            <hr>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Grabar</button>
                <a href="{{ route('maestros.index') }}" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
