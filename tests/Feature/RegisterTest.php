<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase; // Asegura un entorno limpio para cada prueba

    /**
     * Prueba que la página de inicio se carga correctamente.
     */
    public function test_home_page_is_accessible()
    {
        $response = $this->get('/'); // Simula una solicitud GET a la ruta de inicio

        $response->assertStatus(200); // Verifica que la respuesta tenga un código 200 (éxito)
    }

    /**
     * Prueba que los usuarios pueden registrarse.
     */
    public function test_users_can_register(): void
    {
        $this->withoutMiddleware(); // Desactiva temporalmente el middleware CSRF para esta prueba.

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        // Verificar que el usuario fue creado en la base de datos
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        // Verificar la redirección
        $response->assertRedirect('/dashboard');
    }


    public function test_users_can_login(): void
    {
        // Crea un usuario en la base de datos
        $user = \App\Models\User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'), // Hasheamos la contraseña
        ]);

        // Simula un login con los datos del usuario
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '12345678',
        ]);

        // Verifica que el usuario esté autenticado
        $this->assertAuthenticatedAs($user);

        // Verifica la redirección al dashboard
        $response->assertRedirect('/dashboard');
    }

    public function test_users_can_logout(): void
    {
        // Crea un usuario y lo autentica
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        // Simula la solicitud de logout
        $response = $this->post('/logout');

        // Verifica que el usuario ya no esté autenticado
        $this->assertGuest();

        // Verifica la redirección a la página de inicio
        $response->assertRedirect('/');
    }

    public function test_guests_cannot_access_dashboard(): void
    {
        // Intenta acceder al dashboard sin autenticarse
        $response = $this->get('/dashboard');

        // Verifica que se redirija al login
        $response->assertRedirect('/login');
    }

    public function test_authenticated_users_can_access_dashboard(): void
    {
        // Crea un usuario y lo autentica
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        // Intenta acceder al dashboard autenticado
        $response = $this->get('/dashboard');

        // Verifica que la página se cargue correctamente
        $response->assertStatus(200);
    }


    public function test_registration_requires_valid_data(): void
    {
        // Intenta registrarse con datos faltantes
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => '123',
            'password_confirmation' => '456',
        ]);

        // Verifica que no se cree el usuario en la base de datos
        $this->assertDatabaseMissing('users', [
            'email' => 'not-an-email',
        ]);

        // Verifica que la respuesta incluya errores de validación
        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function test_news_page_is_accessible(): void
    {
        // Verifica que la página de noticias se cargue
        $response = $this->get('/noticias');
        $response->assertStatus(200);
    }

    public function test_specific_news_can_be_viewed(): void
    {
        // Crea una noticia
        $news = \App\Models\Noticia::factory()->create([
            'titulo' => 'Noticia de prueba',
            'contenido' => 'Contenido de prueba',
        ]);

        // Verifica que se pueda ver la noticia
        $response = $this->get("/noticias/{$news->id}");
        $response->assertStatus(200);
        $response->assertSee('Noticia de prueba');
        $response->assertSee('Contenido de prueba');
    }

}
