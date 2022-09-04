<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage() {
        $this->get('/login')
            ->assertSeeText("login");
    }

    public function testLoginSuccess() {
        $this->post('/login', [
            "user" => "acla",
            "password" => "rahasia"
        ])->assertRedirect("/")
          ->assertSessionHas("user", "acla");
    }

    public function testLoginValidationError() {
        $this->post("/login", [])
            ->assertSeeText("User or password is required");
    }

    public function testLoginFailed() {
        $this->post('/login', [
            'user' => 'wrong',
            'password' => 'wrong'
        ])->assertSeeText("User or password is wrong");
    }
}
