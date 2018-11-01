<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Session;

class AuthorsController extends Controller
{
    public function store(Request $request){
        $validate = Validator::make($request->all(), Author::valid());
        if($validate->fails()){
            return Redirect::to('books/'. $request->book_id)->withErrors($validate)
            ->withInput();
        } else {
            Author::create($request->all());
            Session::flash('notice', 'Success add comment');
            return Redirect::to('books/'. $request->book_id);
        }
    }
}
