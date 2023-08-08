<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:5|max:5000|string',
            'post_id' => 'required|exists:posts,id'
        ]);

        Comment::create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/posts/' . $request->post_id)->with('status', 'Comment successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|min:3|max:5000|string'
        ]);

        $user = Auth::user();
        $comment =  Comment::find($request->comment_id);
        if($user->id !== $comment->user->id) {
            return redirect('/posts/' . $request->post_id)->withErrors('This is not your comment!');
        }

        $comment->content = $request->content;
        $comment->save();
        return redirect('/posts/' . $request->post_id)->with('status', 'Comment updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'post_id' => 'required|exists:posts,id'
        ]);

        $user = Auth::user();
        $comment =  Comment::find($request->comment_id);
        if($user->id !== $comment->user->id) {
            return redirect('/posts/' . $request->post_id)->withErrors('This is not your comment!');
        }

        $comment->delete();
        return redirect('/posts/' . $request->post_id)->with('status', 'Comment deleted.');
    }
}
