<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller

{


    public function index() {

        $posts = \App\Post::orderBy('created_at', 'DESC')->paginate('5');

        return view('posts.index', ['posts' => $posts]);
    }

    public function show ($id) {

        $post = \App\Post::findOrFail($id);

        $comments = \App\Comment::where('post_id', $id)->get();

        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    public function create () {
    
        return view('posts.create');
    }

    public function store (Request $request) {

        $data = request()->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $id = Auth::id();
        $post = new \App\Post;
        $post->title = request('title');
        $post->user_id = $id;
        $post->category = request('category');
        $post->description = request('description');
        $post->save();

        return redirect('/posts');
    }

    public function edit ($id) {

        $post = \App\Post::findOrFail($id);

        return view('posts.edit', ['post' => $post]);
    }

    public function update ($id) {

        $data = request()->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $post = \App\Post::findOrFail($id);

        $post->title = request('title');
        $post->category = request('category');
        $post->description = request('description');
        $post->save();

        return redirect('home');
    }

    public function destroy ($id) {
        $post = \App\Post::findOrFail($id);

        $post->delete();

        return redirect('home');
    }

    public function showMovies () {

        $posts = \App\Post::where('category', 'movie')->orderBy('created_at', 'DESC')->paginate('5');

        return view('posts.category', ['posts' => $posts]);
    }

    public function showTvshow () {
        $posts = \App\Post::where('category', 'tvshow')->orderBy('created_at', 'DESC')->paginate('5');

        return view('posts.category', ['posts' => $posts]);
    }

    public function showAuthorPosts ($id) {

        $posts = \App\Post::where('user_id', $id)->orderBy('created_at', 'DESC')->paginate('5');

        return view('posts.category', ['posts' => $posts]);

    }
}

