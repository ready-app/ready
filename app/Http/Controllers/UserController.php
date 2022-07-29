<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UserController extends Controller {

    /**
     * Shows page with list of users
     */
    public function index(Request $request) {
        $users = User::query()
            ->when($request->input("query"), function ($q, $query) {
                $q->where('name', 'ilike', "%{$query}%");
            })
            ->paginate(10);
        return inertia('admin/UsersPage', [
            'users' => $users
        ]);
    }

    /**
     * Shows page with specific user
     *
     * @param User $user
     */
    public function show(User $user) {
        return inertia('admin/UserPage', [
            'editingUser' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest  $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse {
        if ($user->update($request->validated())) {
            return redirect()->back()->with('success', 'User updated');
        }
        return redirect()->back()->with('error', 'Failed to update user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse {
        if ($user->delete()) {
            return redirect()->route('users.index')->with('success', 'User deleted');
        }
        return redirect()->route('users.index')->with('error', 'Failed to delete user');
    }
}
