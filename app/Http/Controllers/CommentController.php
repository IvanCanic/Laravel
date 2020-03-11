<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store (Request $request, $id) {

        $data = request()->validate([
            'nickname' => 'required',
            'comment' => 'required'
        ]);
        
        $comment = new \App\Comment;
        $comment->nickname= request('nickname');
        $comment->post_id = $id;
        $comment->comment = request('comment');
        $comment->save();

        return redirect('/posts');
    }
}
