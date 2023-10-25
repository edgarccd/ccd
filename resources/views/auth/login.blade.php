<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>
        <div class="mb-3">
            <x-input-label for="password" :value="__('Constraseña')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
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