<?php

namespace App\Http\Controllers;


use App\Tag;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $tags = Tag::all();

        return view('frontend.tags.show', compact('tag', 'tags'));
    }
}
