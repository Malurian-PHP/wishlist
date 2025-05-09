<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * Get the authenticated User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUser(Request $request)
    {
        $user = User::find($request->user()->id);

        return $this->sendResponse($user, 'User retrieved successfully.');
    }

    public function logout(Request $request)
    {
        $user = User::find($request->user()->id);
        $user->tokens()->delete();

        return $this->sendResponse([], 'User logged out successfully.');
    }
}
