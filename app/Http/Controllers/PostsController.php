<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public  function index(){
        // $postsCollection = Post::all();
        $postsCollection = Post::paginate(10);
        return view('posts.index',['postsCollection' => $postsCollection]);
    }

    public function create(){
        $users = User::all();
        // dd($users);
        return view('posts.create',['users' => $users]);
    }

    public function store(StorePostRequest $requestObj){

        // $data = request()->all();
        // Post::create([
        //     'title' => $data['title'],
        //     'description' => $data['description'],
        //     'user_id' => $data['postedby']
        // ]);

        // $data = $requestObj->all();

        Post::create([
            // 'title' => $data['title'],
            // 'description' => $data['description'],
            // 'user_id' => $data['postedby']
            'title' => $requestObj->title,
            'description' => $requestObj->description,
            'user_id' => $requestObj->user_id
        ]);



        return redirect()->route('posts.index')
        ->with('success' , 'Post Saved Successfully');
    }

    public function show($post){
        $postData = Post::findOrFail($post);
        // dd($postData);
        return view('posts.show' , ['postData' => $postData]);
    }

    public function edit($postID){
        $post = Post::findOrFail($postID);
        $users = User::all();
        return view('posts.edit' , ['post'=>$post , 'users'=>$users]);
    }

    // public function update($postID, Request $request){
    public function update( StorePostRequest $requestObj,Post $post){
        $post->update($requestObj->all());
        return redirect()->route('posts.index')
        ->with('success' , 'Post Updated Successfully');
    }

    public function destroy($postID){
        $post = Post::findOrFail($postID);

        $post->delete();

        return redirect()->route('posts.index')
        ->with('success' , 'Post Deleted Successfully');
    }
}
