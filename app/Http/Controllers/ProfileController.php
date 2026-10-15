<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();

        abort_unless($user instanceof User, 403);

        return view('auth.editarperfil', ['user' => $user]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        abort_unless($user instanceof User, 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'birth_date' => ['nullable', 'date'],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no debe superar los 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'phone.max' => 'El teléfono no debe superar los 20 caracteres.',
            'birth_date.date' => 'Ingresa una fecha de nacimiento válida.',
        ]);

        $user->fill([
            ...$validated,
            'morning_routine' => $request->boolean('toggleMorning'),
            'evening_routine' => $request->boolean('toggleEvening'),
            'harvest_notifications' => $request->boolean('toggleHarvest'),
        ])->save();

        return redirect()->route('editarperfil')->with('status', 'Tu perfil se actualizó correctamente.');
    }
}
