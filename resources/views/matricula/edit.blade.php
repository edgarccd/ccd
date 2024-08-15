<x-app-layout>
    <br>
    <div class="major container">
        <h2>Editar Alumno</h2>
        <form action="{{ route('matricula.update', [$persona,$grupo]) }}" method="post">
            @csrf @method('PATCH')
            @include('matricula.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('matricula.showAlumnos', $grupo) }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
