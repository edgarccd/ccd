<x-app-layout>
    <main class="container">
        <x-slot name="header">
            <div class="upper">
                @auth
                    <div class="inside">
                        <h3>Equipos</h3>
                    </div>
                    <a href="{{ route('equipos.create', Auth::user()) }}"class="btn btn-primary">Registrar</a> &nbsp;&nbsp;
                &nbsp;&nbsp; @endauth
                {{ $grupo->grado }}°
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

                @switch($grupo->turno_id)
                    @case(1)
                        Matutino
                    @break

                    @case(2)
                        Vespertino
                    @break
                @endswitch
                - {{ $grupo->carrera->nombre }}
            </div>

        </x-slot>
        <br>

    </main>
</x-app-layout>
