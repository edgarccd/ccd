<x-app-layout>
    <main class="container">
        <x-slot name="header">
            <div class="upper">
                @auth
                    <div class="inside">
                        <h3>Horarios</h3>
                    </div>
                    <a href="{{ route('horarios.create', [Auth::user()]) }}"class="btn btn-primary">Registrar</a>
                @endauth
            </div>
        </x-slot>
        <br>
        <div class=" major container col-8">
            <h3 class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
              </svg> &nbsp; Horario</h3>
            <h5 class="text-center">Seleccionar</h5>
            <hr>
            <form action="{{ route('horarios.show', Auth::user()) }}" method="get">
            <label for="aula_id">Aula</label>
            <select name="aula_id" id="aula_id"  class="form-select" required>
                @foreach ($aulas as $aula)
                <option value="{{$aula->id}}">{{$aula->nombre}}</option>
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
