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
            <h3 class="text-center">Revisar Horarios</h3>
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
