<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $dates = ["anoPublicacao"];
    protected $guarded = [];

    public function hasUser(){
        return $this->belongsTo(User::class);
    }
}
