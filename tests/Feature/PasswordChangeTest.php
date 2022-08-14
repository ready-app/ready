<?php

namespace Tests\Features;

use App\Models\User;
use Tests\TestCase;
use App\Services\UserService;
use App\Http\Requests\PasswordChangeRequest;
use Hash;

class PasswordChangeTest extends TestCase {
    /**
     * Test if the password change is successful.
     *
     * @return void
     */
    public function test_PasswordChange() {
        $user = User::factory()->create();
        $old_password = $user->password;
        $this->assertDatabaseHas('users', [
            'password' => $old_password
        ]);

        $response = $this->actingAs($user)->post(route('settings.updatePassword'), [
            'password' => $user->password,
            'NewPassword' => 'projectready',
            'ConfirmPassword' => 'projectready'

        ]);
        $response->assertRedirect(route('settings.index'));
        $response->assertSessionHas('success');


        $this->assertDatabaseMissing('users', [
            'password' => $old_password
        ]);

        $this->assertTrue(Hash::check('projectready', $user->password));
    }
}
