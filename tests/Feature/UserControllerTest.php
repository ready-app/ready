<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
     * Test that user index route returns correct result
     */
    public function test_listing_users() {
        $users = User::factory(10)->create();
        $users->sortBy('name');
        $users->get(0)->is_admin = true;
        $users->get(0)->save();

        $response = $this->actingAs($users->get(0))->get(route('users.index'));
        $users = $users->map(function ($user) {
            return $user->only(['id', 'name', 'email', 'created_at', 'updated_at', 'is_admin']);
        });
        $users = $users->map(function ($user) {
            $user['created_at'] = $user['created_at']->toIso8601ZuluString('microsecond');
            $user['updated_at'] = $user['updated_at']->toIso8601ZuluString('microsecond');
            return $user;
        });
        $this->assertEqualsCanonicalizing($users->toArray(), $response->json());

        $response->assertStatus(200);
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

        $response = $this->actingAs($admin)->get(route('users.index'));

        $response->assertStatus(200);
        $this->assertCount(2, $response->json());

        $response = $this->actingAs($admin)->delete(route('users.destroy', $user->id));

        $response->assertStatus(200);

        $response = $this->actingAs($admin)->get(route('users.index'));

        $response->assertStatus(200);
        $this->assertCount(1, $response->json());
    }
}
