<section>
    <br>
    <div class="container" style="margin:auto;padding: 30px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);border-radius: 25px;background-color: whitesmoke;">
    <header>
      
        <h2> {{ __('Actualizar Contraseña') }}</h2>
        <p>{{ Auth::user()->name }} {{ __('una contraseña segura te ayuda a proteger tu información.') }}</p>       
    </header>
<br>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Contraseña Actual</span>
            <input type="password" id="current_password" name="current_password" class="form-control" >
            <x-input-error :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nueva Contraseña</span>
            <input type="password" id="password" name="password" class="form-control" >
            <x-input-error :messages="$errors->updatePassword->get('password')" />
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Confirmar Contraseña</span>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" >
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <br>
        <div>
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

        </div>
    </form>
    </div>
    <div style="width: 400px; margin:auto; text-align:center;">
<br>
    @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)">{{ __(' Contraseña cambiada') }}</p>
            @endif
            </div>
</section>