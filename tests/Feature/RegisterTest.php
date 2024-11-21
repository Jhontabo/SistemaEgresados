<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifica que la página principal se carga correctamente.
     */
    public function test_home_page_is_accessible()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Verifica que los usuarios puedan registrarse.
     */
    public function test_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        $response->assertRedirect('/dashboard');
    }

    /**
     * Verifica que los usuarios puedan iniciar sesión.
     */
    public function test_users_can_login(): void
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '12345678',
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/dashboard');
    }

    /**
     * Verifica que los usuarios puedan cerrar sesión.
     */
    public function test_users_can_logout(): void
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');

        $this->assertGuest();

        $response->assertRedirect('/');
    }

    /**
     * Verifica que los invitados no puedan acceder al dashboard.
     */
    public function test_guests_cannot_access_dashboard(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    /**
     * Verifica que los usuarios autenticados puedan acceder al dashboard.
     */
    public function test_authenticated_users_can_access_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }

    /**
     * Verifica que el registro requiere datos válidos.
     */
    public function test_registration_requires_valid_data(): void
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => '123',
            'password_confirmation' => '456',
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    /**
     * Verifica que los usuarios puedan acceder a su perfil.
     */
    public function test_users_can_access_profile(): void
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/perfil');

        $response->assertStatus(200);
    }

    /**
     * Verifica que los invitados no puedan acceder al perfil.
     */
    public function test_guests_cannot_access_profile(): void
    {
        $response = $this->get('/perfil');

        $response->assertRedirect('/login');
    }

    /**
     * Verifica que los usuarios puedan actualizar su perfil.
     */

}
