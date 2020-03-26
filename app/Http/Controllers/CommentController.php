<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index','detail']);
    }
    public function add() {
    	$validator = validator(request()->all(),[
            'comment' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
    	$comment = new Comment();
    	$comment->comment = request()->comment;
    	$comment->student_id = request()->student_id;
    	$comment->save();
    	return back()->with('cmtMSG','Added a comment sucessfully');
    }
    public function delete($id) {
    	$comment = Comment::find($id);
    	$comment->delete();

    	return back()->with('delCMT','Comment Delete Sucessfully');
    }
}
