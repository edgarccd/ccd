<x-app-layout>
    <br>
    <div class="container" style="margin:auto;padding: 30px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);border-radius: 25px;background-color: whitesmoke;">
    <h2>Registrar Usuario</h2>  
    <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>
            <div>
                <x-input-label for="email" :value="__('Correo Electronico')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" />
            </div>
            <div>
                <x-input-label for="password" :value="__('Constraseña')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" />
            </div>
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <br>
            <div>
                <x-primary-button>
                    {{ __('Registrar') }}
                </x-primary-button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>