<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CommentBook, App\Book;
use Validator;
use Session;
use Redirect;

class CommentsBooksController extends Controller
{
    public function store(Request $request){
        $validate = Validator::make($request->all(), CommentBook::valid());
        if($validate->fails()){
            return Redirect::to('books/'. $request->book_id)->withErrors($validate)
            ->withInput();
        } else {
            CommentBook::create($request->all());
            Session::flash('notice', 'Success add comment');
            return Redirect::to('books/'. $request->book_id);
        }
    }
}
