<x-app-layout>
    <main class="container">
        <br>
        <div class="major container col-8">
            <h3 class="text-center"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
              </svg> &nbsp;Asignar Profesores Eje</h3>
            <h5 class="text-center">Seleccionar</h5>
            <hr>
            <form action="{{ route('ejes.create', Auth::user()) }}" method="get">
                <label for="carrera_id">Carrera</label>
                <select name="carrera_id" id="carrera_id" class="form-select" required>
                    @foreach ($carreras as $carrera)
                        <option value={{ $carrera->carrera_id }}>{{ $carrera->nombre }}</option>
                    @endforeach
                </select>

                <label for="turno_id">Turno</label>
                <select name="turno_id" id="turno_id" class="form-select" required>
                    @foreach ($turnos as $turno)
                        @if ($turno->turno_id == 1)
                            <option value="1">Matutino</option>
                        @endif
                        @if ($turno->turno_id == 2)
                            <option value="2">Vespertino</option>
                        @endif
                    @endforeach
                </select><br>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-secondary">Cargar</button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
