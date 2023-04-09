<?php

namespace App\Traits;

use App\Models\Comment;

trait Commentable
{
    public function saveComment($request)
    {
        $comment = new Comment();
        $comment->parent_id = $request->parent_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->phone = $request->phone;
        $comment->comment = $request->comment;
        $comment->commentable()->associate($this);
        $comment->save();
    }

    public function deleteComment($comment_id)
    {
        $this->comments()->where('comment_id', $comment_id)->delete();
    }
}
