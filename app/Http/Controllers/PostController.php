<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index - Liste des articles
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Formulaire de création d'un article
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store - Fonction de sauvegarde (création) d'un article
     * @param Request $request
     * @return RedirectResponse
     */
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

    /**
     * Formulaire d'édition d'un article
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update - Fonction de sauvegarde (édition) d'un article
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
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

    /**
     * Fonction de suppression d'un article
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Article bien supprimé');
    }
}
