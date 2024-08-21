<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            @auth
                <div class="inside">
                    <h3>Grupos</h3>
                </div>
                <a href="{{ route('grupos.create') }}"class="btn btn-primary">Registrar</a>
            @endauth
        </div>
    </x-slot>

    <main class="container">
        <br>
        <div class="major container">
            <form action="{{ route('grupos.showGrupos', 0) }}" method="get" class="needs-validation" novalidate>
                <label for="carrera_id">Carrera</label>
                <select name="carrera_id" id="carrera_id" class="form-select" required>
                    <option selected disabled value="">-- Seleccionar --</option>
                    @foreach ($carreras as $carrera)
                        <option value={{ $carrera->id }}>{{ $carrera->nombre }}</option>
                    @endforeach
                </select>
                <label for="turno_id">Turno</label>
                <select name="turno_id" id="turno_id" class="form-select" required>
                    <option selected disabled value="">-- Seleccionar --</option>
                    <option value=1>Matutino</option>
                    <option value=2>Vespertino</option>
                </select><br>
                <button type="submit" class="btn btn-secondary">Cargar</button>
            </form>
        </div>

        <script>
            (() => {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>
    </main>
</x-app-layout>
