<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Solo dejanos saber tu dirección de correo electrónico y te enviaremos un enlace que te permitira escoger uno nuevo.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
          
            <x-text-input id="email" class="block mt-1 w-full" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn btn-primary">
                {{ __('Enviar Correo') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
