<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class HomeTest extends TestCase {
    use RefreshDatabase;

    /**
     * Tests that navigating to / redirects to home page
     *
     * @return void
     */
    public function test_home_redirection_without_auth(): void {
        $response = $this->get('/');

        $response->assertRedirect(route('home.index'));
    }

    /**
     * Tests that home route returns correct inertia response
     *
     * @return void
     */
    public function test_home_returns_inertia(): void {
        $response = $this->get(route('home.index'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $inertia) => $inertia
            ->component("HomePage")
        );
    }

    /**
     * Tests that navigating to the home page while authenticated
     * redirects to dashboard
     *
     * @return void
     */
    public function test_home_redirection_with_auth(): void {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/home');

        $response->assertRedirect(route('dashboard.index'));
    }
}
