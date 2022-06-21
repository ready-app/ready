<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class AuthTest extends TestCase {
    use RefreshDatabase;

    /**
     * Tests that login route returns correct inertia Page
     *
     * @return void
     */
    public function test_login_returns_inertia(): void {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $inertia) => $inertia
            ->component("LoginPage")
        );
    }

    /**
     * Tests that register route returns correct inertia Page
     *
     * @return void
     */
    public function test_register_returns_inertia(): void {
        $response = $this->get(route('register.index'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $inertia) => $inertia
            ->component("RegisterPage")
        );
    }
}
