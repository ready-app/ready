<?php

namespace Tests\Feature;

use App\Models\Term;
use App\Models\User;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class TermControllerTest extends TestCase {
    /**
     * Test that guests can't access controller routes
     */
    public function test_guest_cannot_access_route() {
        $response = $this->get(route('terms.index'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Test that normal users can't access controller routes
     */
    public function test_normal_user_cannot_access_route() {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('terms.index'));

        $response->assertRedirect(route('home.index'));
    }

    /**
     * Test that index route returns inertia response
     */
    public function test_index_route() {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        Term::factory(5)->create();

        $response = $this->actingAs($admin)->get(route('terms.index'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn (AssertableInertia $inertia) => $inertia
                ->component('admin/TermsPage')
                ->has(
                    'terms',
                    5
                )
        );
    }

    /**
     * Test that editing user actually edits data
     */
    public function test_editing_term() {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $term = Term::factory()->create();

        $this->assertDatabaseHas('terms', [
            'code' => $term->code
        ]);

        $response = $this->actingAs($admin)->patch(route('terms.update', $term->id), [
            'code' => 'New Code'
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('terms', [
            'code' => $term->code
        ]);

        $this->assertDatabaseHas('terms', [
            'code' => 'New Code'
        ]);
    }

    /**
     * Tests that deleting a term removes from database
     */
    public function test_deleting_term() {
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $term = Term::factory()->create();

        $this->assertDatabaseCount('terms', 1);

        $response = $this->actingAs($admin)->delete(route('terms.destroy', $term->id));

        $response->assertRedirect(route('terms.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseCount('terms', 0);
    }
}
