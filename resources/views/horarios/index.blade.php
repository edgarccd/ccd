<x-app-layout>
    <main class="container">
        <x-slot name="header">
            <div class="upper">
                @auth
                    <div class="inside">
                        <h3>Horarios</h3>
                    </div>
                    <a href="{{ route('horarios.create', Auth::user()) }}"class="btn btn-primary">Registrar</a>
                @endauth
            </div>
        </x-slot>
        <br>
        <div class="major container">
            <form action="#" method="get" class="needs-validation" novalidate>
                <label for="carrera_id">Carrera</label>
                <select name="carrera_id" id="carrera_id" class="form-select" required>
                    <option selected disabled value="">-- Seleccionar --</option>
                    @if ($carreras != null)
                        @foreach ($carreras as $carrera)
                            <option value={{ $carrera->id }}>{{ $carrera->nombre }}</option>
                        @endforeach
                    @endif
                </select><br>
                <button type="submit" class="btn btn-secondary">Cargar</button>
            </form>
        </div>
    </main>
</x-app-layout>
