<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginViewTest extends TestCase
{
    public function test_login_route_renders_the_form_with_csrf_local_images_and_a_post_target(): void
    {
        $response = $this->get(route('login'));

        $response->assertOk();
        $response->assertSee('Bienvenida de vuelta a tu espacio botánico.');
        $response->assertSee('action="'.route('login.store').'"', false);
        $response->assertSee('name="_token"', false);
        $response->assertSee('name="email"', false);
        $response->assertSee('name="password"', false);
        $response->assertSee('name="remember"', false);
        $response->assertSee('href="'.route('register').'"', false);
        $response->assertSee(asset('images/avil-logo.jpg'), false);
        $response->assertSee(asset('images/profile-menu-avatar.jpg'), false);
    }

    public function test_login_form_preserves_the_old_email_after_validation(): void
    {
        $response = $this->withSession([
            '_old_input' => ['email' => 'elena@example.com'],
        ])->get(route('login'));

        $response->assertOk();
        $response->assertSee('value="elena@example.com"', false);
    }
}
