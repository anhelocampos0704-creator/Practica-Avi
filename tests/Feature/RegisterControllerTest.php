<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_page_renders_the_create_account_form(): void
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertSee('action="'.route('register.store').'"', false)
            ->assertSee('name="_token"', false)
            ->assertSee('name="name"', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="password"', false)
            ->assertSee('name="terms"', false)
            ->assertSee('name="marketing_consent"', false);
    }

    public function test_registration_form_restores_old_name_email_and_checkbox_values_without_password(): void
    {
        $this->withSession([
            '_old_input' => [
                'name' => 'Elena Romero',
                'email' => 'elena@example.com',
                'password' => 'must-not-be-rendered',
                'terms' => '1',
                'marketing_consent' => '1',
            ],
        ])->get(route('register'))
            ->assertOk()
            ->assertSee('value="Elena Romero"', false)
            ->assertSee('value="elena@example.com"', false)
            ->assertSee('name="terms" type="checkbox" value="1" checked', false)
            ->assertSee('name="marketing_consent" type="checkbox" value="1" checked', false)
            ->assertDontSee('must-not-be-rendered');
    }

    public function test_registration_creates_user_with_marketing_consent_and_authenticates(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Elena Romero',
            'email' => 'elena@example.com',
            'password' => 'secure-password',
            'terms' => '1',
            'marketing_consent' => '1',
        ]);

        $response->assertRedirect(route('editarperfil'));

        $user = User::where('email', 'elena@example.com')->firstOrFail();
        $this->assertSame('Elena Romero', $user->name);
        $this->assertTrue(Hash::check('secure-password', $user->password));
        $this->assertTrue($user->terms);
        $this->assertTrue($user->marketing_consent);
        $this->assertAuthenticatedAs($user);
    }

    public function test_registration_defaults_marketing_consent_to_false_when_omitted(): void
    {
        $this->post(route('register.store'), [
            'name' => 'Elena Romero',
            'email' => 'elena@example.com',
            'password' => 'secure-password',
            'terms' => '1',
        ])->assertRedirect(route('editarperfil'));

        $this->assertDatabaseHas('users', [
            'email' => 'elena@example.com',
            'marketing_consent' => false,
        ]);
    }

    public function test_registration_requires_all_required_fields_and_accepted_terms_in_spanish(): void
    {
        $response = $this->from(route('register'))->post(route('register.store'), []);

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors([
            'name' => 'El nombre es obligatorio.',
            'email' => 'El correo electrónico es obligatorio.',
            'password' => 'La contraseña es obligatoria.',
            'terms' => 'Debes aceptar los términos y condiciones.',
        ]);
        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }

    public function test_registration_rejects_duplicate_email_and_short_password(): void
    {
        User::factory()->create(['email' => 'existing@example.com']);

        $this->post(route('register.store'), [
            'name' => 'Elena Romero',
            'email' => 'existing@example.com',
            'password' => 'short',
            'terms' => '1',
        ])->assertSessionHasErrors([
            'email' => 'Este correo electrónico ya está registrado.',
            'password' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        $this->assertDatabaseCount('users', 1);
        $this->assertGuest();
    }

    public function test_registration_rejects_an_invalid_email_and_a_name_over_the_limit(): void
    {
        $this->post(route('register.store'), [
            'name' => str_repeat('A', 256),
            'email' => 'correo-invalido',
            'password' => 'secure-password',
            'terms' => '1',
        ])->assertSessionHasErrors([
            'name' => 'El nombre no debe superar los 255 caracteres.',
            'email' => 'Ingresa un correo electrónico válido.',
        ]);

        $this->assertDatabaseCount('users', 0);
        $this->assertGuest();
    }
}
