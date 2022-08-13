<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // Show All Posts
    public function index() {
        $posts = DB::select('select * from posts');
        return view('posts.index', [
            'posts' => $posts
        ]);
    }
    // Show Single Post
    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }
    // Show Create Form
    public function create() {
        return view('posts.create');
    }
    // Store Post Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();
        
        Post::create($formFields);
        return redirect('/')->with('message', 'Post created successfully!');
    }
    // Show Edit Form
    public function edit(Post $post) {
        return view('posts.edit', [
            'post' => $post
        ]);
    }
    // Update Post Data
    public function update(Request $request, Post $post) {

        $formFields = $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();

        $post->update($formFields);
        return redirect('/')->with('message', 'Post updated successfully!');
    }
    // Delete Post
    public function destroy(Post $post) {

        $post->delete();
        return redirect('/')->with('message', 'Post deleted successfully!');
    }
    // Manage Posts 
    public function manage() {
        return view('posts.manage', ['posts' => auth()->user()->posts()->get()]);
    }
}
