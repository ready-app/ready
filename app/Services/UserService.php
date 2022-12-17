<?php

namespace App\Services;

use App\Models\User;
use Hash;

class UserService {
    public function createNewUser(array $params): void {
        $params['password'] = Hash::make($params['password']);
        User::create($params);
    }

    public function updateName(User $user, array $params): bool {
        $user->name = $params['name'];
        return $user->save();
    }

    public function updatePassword(User $user, array $params): bool {
        $user->password = Hash::make($params['new_password']);
        return $user->save();
    }
}
