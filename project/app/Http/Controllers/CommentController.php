<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use DB;
class CommentController extends Controller
{
    public function newComment(Request $request)
    {
        $comment = new Comment();
        $comment->visitor_id = $request->visitor_id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('/blog-details/' . $request->blog_id)->with('message', 'Your comment is successfully posted');
    }
    public function manageComment()
    {
        $comments =  DB::table('comments')
            ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
            ->join('blogs', 'comments.blog_id', '=', 'blogs.id')
            ->select('comments.*', 'visitors.first_name', 'visitors.last_name', 'blogs.blog_title')
            ->orderBy('comments.id', 'desc')
            ->get();
        return view('admin.comment.manage-comment', [
            'comments' => $comments
        ]);
    }
    public function deleteComment(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->delete();
        return redirect('/manage-comments')->with('message', 'Comment Deleted Successfully');
    }
    public function commentUnpublished(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->publication_status = 0;
        $comment->save();
        return redirect('/manage-comments')->with('message', 'Comment Unpublished!');
    }
    public function commentPublished(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->publication_status = 1;
        $comment->save();
        return redirect('/manage-comments')->with('message', 'Comment Published!');
    }
}
