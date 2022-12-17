<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class NameChangeTest extends TestCase {
    /**
     * Test if the name change is successful.
     *
     * @return void
     */
    public function test_name_change() {
        $user = User::factory()->create();
        $old_name = $user->name;
        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);

        $response = $this->actingAs($user)->post(route('settings.updateName'), [
            'name' => 'John'
        ]);
        $response->assertRedirect(route('settings.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('users', [
            'name' => $old_name
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John'
        ]);
    }
}
