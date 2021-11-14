<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->responseSuccess(PostResource::collection(Post::all()));
    }


    public function store(Request $request)
    {
        $post = new Post();
        $post->fill($request->all());
        if ($post->save()) {
            return $this->responseSuccess(
                new PostResource($post),
                ['post created successfully'],
                201
            );
        } else {
            return $this->responseError(['post not created, please try again'], 501);
        }

    }


    public function show(Post $post)
    {
        return $this->responseSuccess(new PostResource($post));
    }

    public function update(Request $request, Post $post)
    {
        $post->fill($request->all());
        $post->save();
        return $this->responseSuccess(new PostResource($post));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return $this->responseSuccess(null, [], 204);
    }
}
