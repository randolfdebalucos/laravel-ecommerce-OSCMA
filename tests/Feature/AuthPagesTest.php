<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthPagesTest extends TestCase
{
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
        $response->assertSessionHas('status', 'Login attempted (placeholder).');
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
        $response->assertSessionHas('status', 'Registration successful (placeholder).');
    }
}
