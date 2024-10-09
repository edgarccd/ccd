<x-app-layout>
    <main class="container">
        <br>
        <div class="major container col-8">
            <h3>Seleccionar Carrera</h3><hr>
            <form action="{{ route('ejes.create', Auth::user())}}" method="get">
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
                <button type="submit" class="btn btn-secondary">Cargar</button>
            </form>
        </div>
    </main>
</x-app-layout>
