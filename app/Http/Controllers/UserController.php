<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UserController extends Controller {

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest  $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse {
        if ($user->update($request->validated())) {
            return redirect()->route('admin.index')->with('success', 'User updated');
        }
        return redirect()->route('admin.index')->with('error', 'Failed to update user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse {
        if ($user->delete()) {
            return redirect()->route('admin.index')->with('success', 'User deleted');
        }
        return redirect()->route('admin.index')->with('error', 'Failed to delete user');
    }
}
