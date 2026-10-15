<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditarPerfilTest extends TestCase
{
    use RefreshDatabase;

    public function test_edit_profile_route_requires_authentication(): void
    {
        $this->get(route('editarperfil'))
            ->assertRedirect(route('login'));
    }
}
