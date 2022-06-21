<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class GlobalTest extends TestCase {
    use RefreshDatabase;

    /**
     * Tests that inertia returns expected props without auth
     *
     * @return void
     */
    public function test_inertia_returns_props_no_auth(): void {
        $response = $this->get(route('home.index'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $inertia) => $inertia
            ->has('user', null)
        );
    }

    /**
     * Tests that inertia returns expected props with auth
     *
     * @return void
     */
    public function test_inertia_returns_props_with_auth(): void {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('dashboard.index'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $inertia) => $inertia
            ->has(
                'user',
                fn (AssertableInertia $iUser) => $iUser
                ->where('name', $user->name)
                ->where('email', $user->email)
            )
        );
    }
}
