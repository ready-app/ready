<?php

namespace Tests\Features;


use Tests\TestCase;
use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\NameChangeRequest;

class NameChangeTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_NameChange() {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);

        $response = $this->actingAs($user)->post(route('settings.updateName'), [
            'name' => 'John'
        ]);
        dd($response);
       $response->assertRedirect(route('settings.index'));
        $response->assertSessionHas('success');


    }
}
