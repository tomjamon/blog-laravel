<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $message = $request->input('message');
        $comment_id = $request->input('comment_id');
        $post_id = $request->input('post_id');

        if (!empty($message) && !empty($post_id)) {
            $comment = new Comment;
            $comment->content = $message;
            $comment->post_id = $post_id;
            if ($comment_id) {
                $comment->comment_id = $comment_id;
            }
            $comment->user_id = $request->user()->id;
            $comment->save();

            return true;
        }

        return false;
    }
}
