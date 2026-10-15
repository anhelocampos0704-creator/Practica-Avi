<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_edit_shows_the_authenticated_users_profile(): void
    {
        $user = User::factory()->create([
            'name' => 'Elena Romero',
            'email' => 'elena@example.com',
            'phone' => '+34 612 345 678',
            'birth_date' => '1994-05-18',
        ]);

        $this->actingAs($user)
            ->withSession(['status' => 'Tu perfil se actualizó correctamente.'])
            ->get(route('editarperfil'))
            ->assertOk()
            ->assertSee('action="'.route('editarperfil.update').'"', false)
            ->assertSee('value="Elena Romero"', false)
            ->assertSee('value="elena@example.com"', false)
            ->assertSee('value="+34 612 345 678"', false)
            ->assertSee('value="1994-05-18"', false)
            ->assertSee('action="'.route('logout').'" method="POST"', false)
            ->assertSee('Cerrar sesión')
            ->assertSee('Tu perfil se actualizó correctamente.');
    }

    public function test_profile_update_persists_profile_and_routine_fields(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->patch(route('editarperfil.update'), [
                'name' => 'Elena Romero',
                'email' => $user->email,
                'phone' => '+34 612 345 678',
                'birth_date' => '1994-05-18',
                'toggleMorning' => '1',
                'toggleHarvest' => '1',
            ])
            ->assertRedirect(route('editarperfil'));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Elena Romero',
            'phone' => '+34 612 345 678',
            'morning_routine' => true,
            'evening_routine' => false,
            'harvest_notifications' => true,
        ]);

        $this->assertSame('1994-05-18', $user->fresh()->birth_date->toDateString());
    }

    public function test_profile_update_rejects_an_email_used_by_another_user(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create(['email' => 'taken@example.com']);

        $this->actingAs($user)
            ->patch(route('editarperfil.update'), [
                'name' => $user->name,
                'email' => 'taken@example.com',
            ])
            ->assertSessionHasErrors([
                'email' => 'Este correo electrónico ya está registrado.',
            ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => $user->email,
        ]);
        $this->assertModelExists($otherUser);
    }

    public function test_profile_update_validates_phone_and_birth_date_with_spanish_messages(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->patch(route('editarperfil.update'), [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => str_repeat('1', 21),
                'birth_date' => 'fecha-invalida',
            ])
            ->assertSessionHasErrors([
                'phone' => 'El teléfono no debe superar los 20 caracteres.',
                'birth_date' => 'Ingresa una fecha de nacimiento válida.',
            ]);
    }
}
