<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
<br>
        <div class="form-floating mb-3">
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="email">Correo Electrónico</label>
         <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="form-floating mb-3">
            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="password">Contraseña</label>
         <x-input-error :messages="$errors->get('email')" />
        </div>

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