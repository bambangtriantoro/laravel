<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'book_id' , 'user'
    ];
    // protected $table='comment_books';
    
    public static function validasi() {
        return array('user' => 'required');
    }
    public function book() {
        return $this->belongsTo('App\Book', 'book_id');
    }
}
