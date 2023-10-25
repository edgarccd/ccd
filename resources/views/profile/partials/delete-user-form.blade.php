<section >
    <header>
        <h2 >
            {{ __('Eliminar Cuenta') }}
        </h2>
        <p >
                {{ __('Una vez que tu cuenta sea eliminada, todos tus recursos y datos serán permanentemente eliminados. Por favor instroduce nuevamente tu contraseña para confirmar que quieres eliminar permanentemente tu cuenta.') }}
            </p>
    </header>

    <x-danger-button class="btn btn-outline-secondary" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Eliminar Cuenta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" >
            @csrf
            @method('delete')

            <h2 >
                {{ __('¿Estas seguro de querer eliminar tu cuenta de acceso al sistema?') }}
            </h2>

            <p >
                {{ __('Una vez que tu cuenta sea eliminada, todos tus recursos y datos serán permanentemente borrados. Por favor instroduce nuevamente tu contraseña para confirmar que quieres eliminar permanentemente tu cuenta.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div >
                <x-secondary-button x-on:click="$dispatch('close')" class="btn btn-outline-secondary">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="btn btn-outline-secondary" >
                    {{ __('Eliminar Cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
