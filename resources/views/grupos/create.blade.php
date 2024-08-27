<x-app-layout>
    <br>
    <div class="major container">       
        <h2>Registrar Grupo</h2>
        <hr>
        <form action="{{route('grupos.store')}}" method="post" class="needs-validation" novalidate>
            @csrf
            @include('grupos.form-fields')
            <hr>
          
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Regresar</a>
       
        </form>
        
    </div>
</x-app-layout>