<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentBook extends Model
{
    protected $fillable = [
        'book_id' , 'description', 'user'
    ];
    public static function valid() {
        return array('description' => 'required');
    }
    public function book() {
        return $this->belongsTo('App\Book', 'book_id');
    }
}
