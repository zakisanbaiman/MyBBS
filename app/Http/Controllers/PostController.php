<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index() {
        // $posts = Post::orderBy("created_at","desc")->paginate(10);
        $posts = Post::latest()->paginate(10);
        return view('index')
            ->with([
                'posts' => $posts
            ]);
    }

    // Implicit Binding（routingの最後の名前と引数名を合わせることでPost::findしたのと同じ結果になる）
    public function show(Post $post) {
        // $post = Post::findOrFail($id);
        return view('posts.show')
            ->with([
                'post' => $post
            ]);
    }

    public function edit(Post $post) {
        return view('posts.edit')
            ->with([
                'post'=> $post
            ]);
    }

    public function create() {
        return view('posts.create');
    }

    // store
    // PostRequest型にすることで、PostRequestのバリデーションが実行されてからここにくる
    public function store(PostRequest $request) {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function update(PostRequest $request, Post $post) {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index');
    }
}


