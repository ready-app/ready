<?php

namespace Tests\Feature;

use App\Models\User;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class UserControllerTest extends TestCase {
    /**
     * Test that guests can't access controller routes
     */
    public function test_guest_cannot_access_route() {
        $response = $this->get(route('users.index'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Test that normal users can't access controller routes
     */
    public function test_normal_user_cannot_access_route() {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('users.index'));

        $response->assertRedirect(route('home.index'));
    }

    /**
     * Test that index route returns inertia response
     */
    public function test_index_route() {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        User::factory(10)->create();

        $response = $this->actingAs($admin)->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $inertia) => $inertia
            ->component('admin/UsersPage')
            ->has(
                'users.data',
                10
            )
        );
    }

    /**
     * Test that editing user actually edits data
     */
    public function test_editing_user() {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);

        $response = $this->actingAs($admin)->patch(route('users.update', $user->id), [
            'name' => 'New Name'
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('users', [
            'name' => $user->name
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'New Name'
        ]);
    }

    /**
     * Tests that deleting a user removes from database
     */
    public function test_deleting_user() {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $user = User::factory()->create();

        $this->assertDatabaseCount('users', 2);

        $response = $this->actingAs($admin)->delete(route('users.destroy', $user->id));

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseCount('users', 1);
    }
}
