<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Hash;

class PasswordChangeTest extends TestCase {
    /**
     * Test if the password change is successful.
     *
     * @return void
     */
    public function test_password_change() {
        $user = User::factory()->create();
        $old_password = $user->password;
        $this->assertDatabaseHas('users', [
            'password' => $old_password
        ]);

        $response = $this->actingAs($user)->post(route('settings.updatePassword'), [
            'password' => 'password',
            'new_password' => 'projectready',
            'new_password_confirmation' => 'projectready'
        ]);
        $response->assertRedirect(route('settings.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('users', [
            'password' => $old_password
        ]);

        $this->assertTrue(Hash::check('projectready', $user->password));
    }

    /**
     * Test functionality with invalid password
     *
     * @return void
     */
    public function test_password_fail() {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('settings.updatePassword'), [
            'password' => 'wrong',
            'new_password' => 'newpassword',
            'new_password_confirmation' => 'newpassword'
        ]);
        $response->assertSessionHasErrors('password');
    }
}
