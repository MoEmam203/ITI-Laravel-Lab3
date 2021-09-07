<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
// use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::all();
        // Eager Loading
        $posts = Post::with('user')->get();
        return PostResource::collection($posts);
    }

    // public function show($postID){
        // $post = Post::findOrFail($postID);
        
    public function show(Post $post){
        return new PostResource($post);
    }

    public function store(StorePostRequest $request){
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return new PostResource($post);
    }
}
