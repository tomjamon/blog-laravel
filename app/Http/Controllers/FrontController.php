<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class FrontController
 * @package App\Http\Controllers
 */
class FrontController extends Controller
{
    /**
     * Page d'accueil avec tous les articles (posts)
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::all();

        return view('frontend.index', compact('posts'));
    }

    /**
     * Vue d'un article (post)
     *
     * @param $slug
     * @return Application|Factory|View
     */
    public function article($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        return view('frontend.posts.show', compact('post'));
    }
}
