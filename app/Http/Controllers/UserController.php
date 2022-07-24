<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller {

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user): Response {
        return response($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest  $request
     * @param User $user
     * @return Response
     */
    public function update(UserUpdateRequest $request, User $user): Response {
        $updated = $user->update($request->validated());
        return response(['updated' => $updated]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user): Response {
        $deleted = $user->delete();
        return response(['deleted' => $deleted]);
    }
}
