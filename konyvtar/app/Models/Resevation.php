<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resevation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'start',
        'message'
    ];

    //összetett kulcshoz tartozó mezők
    //felülírja a korábbi fg-t!
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('book_id', '=', $this->getAttribute('book_id'))
            ->where('start', '=', $this->getAttribute('start'));
        return $query;
    }

    public function books(){
        return $this->belongTo(Book::class, 'book_id', 'book_id');
    }

}