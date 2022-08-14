<?php

namespace App\Services;

use App\Models\User;
use Hash;

class UserService {
    /**
     * @param array $data
     * @return void
     */
    public function createNewUser(array $params) {
        User::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password'])
        ]);
    }

    public function updateName(User $user, array $params): bool {
        $user->name = $params['name'];
        return $user->save();
    }

    public function updatePassword(User $user, array $params): bool {
        $user->password = Hash::make($params['NewPassword']);
        return $user->save();
    }
}
