<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserControllerTest extends TestCase {
    /**
     * Test that guests can't access controller routes
     */
    public function test_guest_cannot_access_route() {
        $response = $this->get(route('users.show', 1));

        $response->assertRedirect(route('login'));
    }

    /**
     * Test that normal users can't access controller routes
     */
    public function test_normal_user_cannot_access_route() {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('users.show', $user->id));

        $response->assertRedirect(route('home.index'));
    }

    /**
     * Test that user show result returns correct data
     */
    public function test_showing_specific_user() {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $user = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('users.show', $user->id));

        $response->assertStatus(200);
        $response->assertJson($user->toArray());
    }

    /**
     * Test that editing user actually edits data
     */
    public function test_editing_user() {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $user = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('users.show', $user->id));

        $response->assertStatus(200);
        $this->assertEquals($user->name, $response->json()['name']);

        $response = $this->actingAs($admin)->patch(route('users.update', $user->id), [
            'name' => "New Name"
        ]);

        $response->assertStatus(200);

        $response = $this->actingAs($admin)->get(route('users.show', $user->id));

        $response->assertStatus(200);
        $this->assertEquals("New Name", $response->json()['name']);
    }

    /**
     * Tests that deleting a user removes from database
     */
    public function test_deleting_user() {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $user = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('users.show', $user->id));

        $response->assertStatus(200);

        $response = $this->actingAs($admin)->delete(route('users.destroy', $user->id));

        $response->assertStatus(200);

        $response = $this->actingAs($admin)->get(route('users.show', $user->id));

        $response->assertStatus(404);
    }
}
