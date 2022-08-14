<?php

namespace Tests\Features;

use App\Models\User;
use PHPUnit\Framework\TestCase;
use App\Services\UserService;
use App\Http\Requests\PasswordChangeRequest;

class PasswordChangeTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_PasswordChange() {
         $user = User::factory()->create(
            [
                'email' => 'filler',
                'name' => 'temporary',
                'password' => 'password'
            ]
        );
        
        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);

        $request = new PasswordChangeRequest();
        $request->merge([
            'password' => 'password',
            'NewPassword' => 'newpassword',
            'ConfirmPassword' => 'newpassword'
        ]);

        $response = $this->actingAs($user)->updatePassword($request);
        $response->assertRedirect(route('settings.index'));
        $response->assertSessionHas('success');
    }
}
