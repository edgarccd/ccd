<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $usuario = User::where('persona_id', auth()->user()->persona_id)->first();
        $usuario->password = Hash::make($validated['password']);
        $usuario->save();
        session()->flash('status', 'Contraseña actualizada con exito');
        /*
        $request->user()->update([
        'password' => Hash::make($validated['password']),
        ]);
         */

        return back()->with('status', 'Contraseña actualizada con exito');
    }
}
