<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title' , 'description'
    ];
    public static function valid(){
        return array('description'=>"required");
        // return array('user' => 'required');
    }
    public function commentsbooks(){
        return $this->hasMany('App\CommentBook','book_id');
    }
    public function authors(){
        return $this->hasMany('App\Author','book_id');
    }
}
