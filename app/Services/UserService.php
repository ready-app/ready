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

    public function updateName(User $user, array $params) {
        // $user = auth()->user();
        $user->name = $params['name'];
        $user->save();
    }

    public function updatePassword(array $params) {

        $user = auth()->user();
        $user->password = Hash::make($params['new_password']);
        $user->save();
    }
}
