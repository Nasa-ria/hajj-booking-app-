<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentCollection;
use App\Models\Agent;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
    //   dd($request->all());
    $agent = Agent::all();
        $this->validate($request,[
            'author'=>'required',
            'comment'=>'required',
            'agent_id'=>'required',
        ]);
        $comment = new Comment;
        $comment-> author = $request->input('author');
        $comment-> comment   = $request->input('comment');
        $comment-> agent_id   = $request->input('agent_id');
        $comment->save();
        return Redirect::back()->with('success','Comment Created Successfully');
    }
  
    public function destroy(Comment $comment)
    {
        $agent = Agent::all();
      $comment->delete();
      return Redirect::back()->with('success','Comment deleted successfully !'); 
    }


    public function show()
    {
        $comment = Comment::all();

        return new CommentCollection($comment);
    }
}
