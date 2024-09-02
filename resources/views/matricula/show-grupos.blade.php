<x-app-layout>
    <x-slot name="header">
        <div class="upper">
            <div class="inside">
                <h3>Matricula</h3>
            </div>
            
                <a href="{{ route('matricula.create', $carrera) }}" class="btn btn-primary">Cargar Alumnos</a>
            
        </div>
    </x-slot>
    <main class="container">
        <br>
        <div class="major container">
            <h3 style="text-align: center;">
               
                    {{$carrera->nombre }} <br>
                    {{$periodo->nombre }}
            </h3>
         
            <hr>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Grado</th>
                            <th>Grupo</th>
                            <th>Turno</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->grado }}</td>
                                <td>
                                    @switch($grupo->grupo)
                                        @case(1)
                                            A
                                        @break

                                        @case(2)
                                            B
                                        @break

                                        @case(3)
                                            C
                                        @break

                                        @case(4)
                                            D
                                        @break
                                    @endswitch

                                </td>
                                <td>
                                    @switch($grupo->turno_id)
                                        @case(1)
                                            Matutino
                                        @break

                                        @case(2)
                                            Vespertino
                                        @break
                                    @endswitch
                                </td>
                                <td><a href="{{ route('matricula.showAlumnos', $grupo) }}"
                                        class="btn btn-outline-dark">Alumnos</a> </td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <a href="{{ route('matricula.index') }}" class="btn btn-secondary">Regresar</a>
         
            </div>
        </div>
    </main>
</x-app-layout>
