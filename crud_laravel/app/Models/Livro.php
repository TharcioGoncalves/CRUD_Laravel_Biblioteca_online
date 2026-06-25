<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use SoftDeletes;

    protected $dates = ["anoPublicacao"];
    protected $guarded = [];

    public function hasUser(){
        return $this->belongsTo(User::class);
    }
}
