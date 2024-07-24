<x-app-layout>
    <br>
    <div class="major container">
        <h1>ID: {{$proyecto->id}}</h1> <br>
        <h2>{{$proyecto->nombre}}</h2> <br>
             
        <div style="text-align: justify;margin: 20px;">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$proyecto->descripcion}}</p>
            <br> <a href="{{ route('proyectos.index') }}" class="btn btn-outline-secondary">Regresar</a>
        </div>
    </div>
</x-app-layout>