<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment, App\Article;
use Validator;
use Session;
use Redirect;

class CommentsController extends Controller
{
    public function store(Request $request){
        $validate = Validator::make($request->all(), Comment::valid());
        if($validate->fails()){
            return Redirect::to('articles/'. $request->article_id)->withErrors($validate)
            ->withInput();
        } else {
            $comments = Comment::create($request->all());
            return response()->json(['comments' => $comments, 'status' => 'success']);
            // Session::flash('notice', 'Success add comment');
            // return Redirect::to('articles/'. $request->article_id);
        }
    }
}
