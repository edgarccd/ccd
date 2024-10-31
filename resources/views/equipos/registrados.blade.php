<x-app-layout>
    <main class="container">
        <br>
        <div class="major container col-8">
            <h3 class="text-center"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
              </svg> Concentrado de Equipos</h3>
            <h5 class="text-center">Seleccionar Carrera</h5>
            <hr>
            <form action="{{ route('equipos.showRegistrados', [Auth::user(), 0, 0]) }}" method="get">
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
