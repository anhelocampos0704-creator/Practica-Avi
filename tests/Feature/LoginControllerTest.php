<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_credentials_authenticate_and_redirect_to_profile(): void
    {
        $user = User::factory()->create([
            'email' => 'elena@example.com',
            'password' => 'secure-password',
        ]);

        $this->post(route('login.store'), [
            'email' => 'elena@example.com',
            'password' => 'secure-password',
            'remember' => '1',
        ])->assertRedirect(route('editarperfil'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_credentials_return_a_spanish_email_error(): void
    {
        User::factory()->create([
            'email' => 'elena@example.com',
            'password' => 'secure-password',
        ]);

        $this->from(route('login'))->post(route('login.store'), [
            'email' => 'elena@example.com',
            'password' => 'incorrect-password',
        ])->assertRedirect(route('login'))
            ->assertSessionHasErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros.',
            ]);

        $this->assertGuest();
    }

    public function test_logout_ends_the_authenticated_session_and_redirects_to_login(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }
}
