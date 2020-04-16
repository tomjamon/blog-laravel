<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:posts|max:255',
        ]);

        if(!empty($data)) {
            $post = new Post;
            $post->title = $data['title'];
            $post->save();
        }

        return redirect()->route('posts.index')->with('status', 'Article bien ajouté');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|unique:posts|max:255',
        ]);

        if(!empty($data)) {
            $post = Post::find($id);
            $post->title = $data['title'];
            $post->save();
        }

        return redirect()->route('posts.index')->with('status', 'Article bien modifié');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Article bien supprimé');
    }
}
