<?php

namespace Tests\Features;


use Tests\TestCase;
use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\NameChangeRequest;

class NameChangeTest extends TestCase {
    /**
     * Test if the name change is successful. 
     *
     * @return void
     */
    public function test_NameChange() {
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
