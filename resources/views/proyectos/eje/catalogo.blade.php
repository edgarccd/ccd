<x-app-layout>
    <main class="container">        
        <br>
        <div class="major container col-7">
            <h3>Catalogo Disponible</h3>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proyectos as $proyecto)
                        <tr>
                           <td>{{ $proyecto->id }}</td>
                            <td>{{ $proyecto->nombre }}</td>
                            <td><a href="../../proyecto/catalogo/{{$proyecto->id}}.pdf" target="_blank" class="btn btn-outline-primary">Ver</a></td>
                        </tr>                    
                    @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-app-layout>
