<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getComments(Post $post)
    {
        return $post->comments()->with('comments')->get();
    }
}
