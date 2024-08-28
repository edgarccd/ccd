<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <br>
        <div class="input-group mb-3">
            <span class="input-group-text"
                id="inputGroup-sizing-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correo</span>
            <input id="email" type="email" name="email" :value="old('email')" required class="form-control"
                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            <x-input-error :messages="$errors->get('password')" />
        </div>
        <br>
        <div>
            @if (Route::has('password.request'))
                <a class="form-text" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu Contraseña?') }}
                </a>
            @endif
            &nbsp; &nbsp; &nbsp;
            <x-primary-button>
                {{ __('Ingresar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
