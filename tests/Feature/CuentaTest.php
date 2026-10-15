<?php

namespace Tests\Feature;

use Tests\TestCase;

class CuentaTest extends TestCase
{
    public function test_account_route_renders_account_and_routine_content_with_local_images(): void
    {
        $response = $this->get(route('cuenta'));

        $response->assertOk();
        $response->assertSee('Mi Cuenta & Rutina');
        $response->assertSee('Mi rutina diaria');
        $response->assertSee('Ritual de mañana');
        $response->assertSee('action="'.route('login').'"', false);
        $response->assertSee('name="_token"', false);
        $response->assertSee(asset('images/avil-logo.jpg'), false);
        $response->assertSee(asset('images/elena-romero.jpg'), false);
        $response->assertSee(asset('images/profile-menu-avatar.jpg'), false);
    }

    public function test_account_form_preserves_the_old_email_after_validation(): void
    {
        $response = $this->withSession([
            '_old_input' => ['email' => 'elena@example.com'],
        ])->get(route('cuenta'));

        $response->assertOk();
        $response->assertSee('value="elena@example.com"', false);
    }
}
