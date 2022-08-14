<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateNameTest extends TestCase {
    /**
     * Test if the name updates
     */
    public function test_updateName() {
        $user = User::factory()->create();
        $user->name = 'New Name';
        $user->save();
        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);

        $user->updateName('Jane Doe');
        $this->assertDatabaseHas('users', [
            'name' => 'Jane Doe'
        ]);
    }
}
