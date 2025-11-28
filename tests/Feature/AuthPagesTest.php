<?php
/**
 * Feature Test: AuthPagesTest
 * Purpose: Verifies the login and registration pages and basic flows
 * using the lightweight session-based authentication implementation.
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_renders()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Sign in to Online Shop MotorCycle Accessories');
    }

    public function test_register_page_renders()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Create your Online Shop MotorCycle Accessories account');
    }

    public function test_login_post_redirects_back_with_status()
    {
        $response = $this->post('/login', ['email' => 'foo@example.com', 'password' => 'secret']);
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Invalid credentials.');
    }

    public function test_register_post_redirects_to_login()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('status', 'Registration successful.');
    }
}
