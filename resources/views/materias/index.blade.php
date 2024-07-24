<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>Materias</h3>
                </div>
                <a href="{{ route('materias.create') }}"class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>

    <main class="container">
        <br>
        <div class="major container">
            <form action="{{ route('materias.show') }}" method="get">
                <label for="carrera_id">Carrera</label>
                <select name="carrera_id" id="carrera_id" class="form-select" required>
                    <option value=0>--Seleccionar--</option>
                    @foreach ($carreras as $carrera)
                        <option value={{ $carrera->id }}>{{ $carrera->nombre }}</option>
                    @endforeach
                </select>
                <label for="turno_id">Turno</label>
                <select name="turno_id" id="turno_id" class="form-select" required>
                    <option value=0>--Seleccionar--</option>
                    <option value=1>Matutino</option>
                    <option value=2>Vespertino</option>
                </select><br>
                <button type="submit" class="btn btn-secondary">Cargar</button>
            </form>

        </div>
    </main>
</x-app-layout>
