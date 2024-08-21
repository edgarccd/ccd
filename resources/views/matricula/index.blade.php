<x-app-layout>
    <main class="container">
        <x-slot name="header">
            <div class="upper">
                @auth
                    <div class="inside">
                        <h3>Matricula</h3>
                    </div>
                    <a href="{{ route('matricula.reinscribir', 0) }}"class="btn btn-primary">Reinscribir</a>
                @endauth
            </div>
        </x-slot>
        <br>
        <div class="major container">
            <header>
                <h3>Carrera</h3>
            </header>
            <form action="{{ route('matricula.showGrupos', 0) }}" method="get" class="needs-validation" novalidate>
                <select name="carrera_id" id="carrera_id" class="form-select" required>
                    <option selected disabled value="">-- Seleccionar --</option>
                    @foreach ($carreras as $carrera)
                        <option value={{ $carrera->id }}>{{ $carrera->nombre }}</option>
                    @endforeach
                </select><br>
                <button type="submit" class="btn btn-primary">Cargar</button>
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
