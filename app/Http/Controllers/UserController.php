<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->responseSuccess(
            UserResource::collection(
                User::all()
            )
        );
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        if ($user->save()) {
            return $this->responseSuccess(
                new UserResource($user),
                ['post created successfully'],
                201
            );
        } else {
            return $this->responseError(['post not created, please try again'], 501);
        }

    }


    public function show(User $user)
    {
        $user->load('posts');
        return $this->responseSuccess(new UserResource($user));
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();
        return $this->responseSuccess(new UserResource($user));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->responseSuccess(null, [], 204);
    }
}
