<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Admin Login Test by Sunil Gaur.
     *
     * @return void
     */
    public function testAdminLogin()
    {
        $response = $this->get('/admin')->assertRedirect('/login');
    }

    
    // Authentication Test
    public function testAuthenticatedUser()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/admin')
        ->assertOk();
    }
}
